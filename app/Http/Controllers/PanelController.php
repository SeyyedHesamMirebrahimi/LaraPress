<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\RssFeedsModel;
use App\Models\Category;
use App\Models\Services as services;
use ArandiLopez\Feed\Providers\FeedServiceProvider as Feed;

class PanelController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dashboard()
    {

        return View('dashboard.dashboard');
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editProfile()
    {
      return View('dashboard.editProfile',['user'=>Auth::User()]);
    }

    
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editProfilePOST(Request $request)
    {
        try{
            $user = User::find(Auth::user()->id);
            $user->name = $request->get('name');
            $user->family = $request->get('family');
            $user->phone = $request->get('phone');
            $user->telegram = $request->get('telegram');
            $user->instagram = $request->get('instagram');
            $user->twitter = $request->get('twitter');
            $user->facebook = $request->get('facebook');
            $user->linkedin = $request->get('linkedin');
            $user->biography = $request->get('biography');
            $user->experts = $request->get('experts');
            $user->updated_at = new \DateTime();
            $user->save();
            return back()->with('success', 'اطلاعات با موفقیت ذخیره گردید');
        }catch (\Exception $e){
            return back()->with('danger', 'خطا در ذخیره اطلاعات');
        }
    }

    
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePasswordPOST(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $current_password = $user->password;
        if (Hash::check($request->get('current_password'), $current_password)){
            if ($request->get('new_password') == $request->get('confirm_password')){
                try{
                    $user->password = Hash::make($request->get('new_password'));
                    $user->updated_at = new \DateTime();
                    $user->save();
                    return back()->with('success', 'کلمه عبور با موفقیت بروز شد');
                }catch (\Exception $e){
                    return back()->with('danger', 'خطا در بروزرسانی کلمه عبور');
                }
            }else{
                return back()->with('danger', 'کلمه عبور های جدید با هم مطابقت ندارند');
            }
        }else{
            return back()->with('danger', 'کلمه عبور فعلی اشتباه وارد شده است');
        }
    }

    
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfileAvatarPOST(Request $request)
    {
        if ($request->file('avatar')){
            try{
                $user = User::find(Auth::user()->id);
                $path = $request->file('avatar')->store(
                    '/',
                    'avatars'
                );
                $user->avatar = $path;
                $user->updated_at = new \DateTime();
                $user->save();
                return back()->with('success', 'بروزرسانی آواتار با موفقیت انجام شد');
            }catch (\Exception $e){
                return back()->with('danger', 'خطا در بروزرسانی آواتار');
            }
        }else{
            return back()->with('danger', 'فایلی انتخاب نشده');
        }
    }
    
    
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addRssFeed()
    {
        $feed = RssFeedsModel::all();
        return View('dashboard.addRssFeed',compact('feed'));
    }

    
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addRssFeedPOST(Request $request)
    {
        try{
            $url = $request->get('url');
            $user_id = Auth::user()->id;
            $feed = new RssFeedsModel;
            $feed->url = $url;
            $feed->user_id = $user_id;
            $feed->save();
            return back()->with('success', 'منبع خبری با موفقیت ثبت شد');
        }catch (\Exception $e){
            return back()->with('danger','خطایی رخ داد');
        }
    }

    
    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteRssFeed($id)
    {
        $feed = RssFeedsModel::find($id);
        if ($feed != null){
            if ($feed->user_id == Auth::id()){
                try{
                    $feed->delete();
                    return back()->with('success', 'منبع خبری با موفقیت حذف شد');
                }catch (\Exception $e){
                    return back()->with('danger', 'خطایی رخ داد');
                }
            }else{
                return back()->with('danger', 'شما اجازه حذف این منبع را ندارید');
            }
        }else{
            return redirect()->Route('addRssFeed')->with('danger', 'شما اجازه انجام این کار را ندارید');
        }
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function RssFeeder()
    {
        $userFeeds = RssFeedsModel::where('user_id',Auth::id())->get();
        $feeds = [];
        foreach ($userFeeds as $userFeed) {
            array_push($feeds, $userFeed['url']);
        }
        $siteFeeds = array();
        foreach($feeds as $feed) {
            $xml = simplexml_load_file($feed);
            $siteFeeds = array_merge($siteFeeds,array_slice($xml->xpath("//item"),0,10) );
        }
        return View('dashboard.RssFeeder',compact('siteFeeds'));
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function categoryList()
    {
        $data = Category::all();
        return View('dashboard.categoryList',compact('data'));
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function categoryAdd()
    {
        return View('dashboard.addCategory');
    }

    
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function categoryAddPOST(Request $request)
    {
        try{
            $category = new Category;
            $name = $request->get('name');
            $slug = str_slug($request->get('slug'));
            if ($request->file('thumbnail')){
                $thumbnail = $request->file('thumbnail')->store(
                    '/',
                    'categorys'
                );
                $category->thumbnail = $thumbnail;
            }
            if ($request->file('background')){
                $background = $request->file('background')->store(
                    '/',
                    'categorys'
                );
                $category->background = $background;
            }
            $color = $request->get('color');
            $category->name = $name;
            $category->slug = $slug;
            $category->color= $color;
            if ($category::where('slug',$slug)->count() > 0){
                return back()->with('danger', 'نامک مورد نظر از قبل موجود است');
            }
            $category->save();
            return redirect()->route('categoryList')->with('success','دسته مورد نظر با موفقیت اضافه شد');
        }catch (\Exception $e){
            return back()->with('danger','خطایی رخ داد');
        }
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function categoryDelete($id)
    {
     if ($id == 0){
         return back()->with('danger', 'دسته پایه حذف نمیشود');
     }
        try{
            $articles = Articles::where('category_id',$id)->get();
            foreach ($articles as $article) {
                $single_article = Articles::find($article->id);
                $single_article->category_id = '0';
                $single_article->save();
            }
             $category = Category::find($id);
             $category->delete();
            return back()->with('success', 'دسته مورد نظر با موفقیت حذف شد');
        }catch (\Exception $e){
            return back()->with('danger', 'خطا در حذف دسته');
        }
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function categoryEdit($id)
    {
        $category = Category::find($id);
        return View('dashboard.editCategory',compact('category'));
    }


    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function categoryEditPOST($id , Request $request)
    {
        try{
            $category = Category::find($id);
            $slug = str_slug($request->get('slug'));
            $category->slug = $slug;
            if ($category->slug != $request->get('slug')){
                if ($category::where('slug',$slug)->count() > 0){
                    return back()->with('danger', 'نامک مورد نظر از قبل موجود است');
                }
            }
            $name = $request->get('name');
            if ($request->file('thumbnail')){
                $thumbnail = $request->file('thumbnail')->store(
                    '/',
                    'categorys'
                );
                $category->thumbnail = $thumbnail;
            }elseif($request->file('thumbnail') == null){
                $category->thumbnail = null;
            }
            if ($request->file('background')){
                $background = $request->file('background')->store(
                    '/',
                    'categorys'
                );
                $category->background = $background;
            }elseif($request->file('background') == null){
                $category->background = null;
            }
            $color = $request->get('color');
            $category->name = $name;
            $category->color= $color;
            $category->save();
            return redirect()->route('categoryList')->with('success','دسته مورد نظر با موفقیت بروزرسانی شد');
        }catch (\Exception $e){
            return back()->with('danger','خطایی رخ داد');
        }
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function articleAdd()
    {
        $categories = Category::all();
        return View('dashboard.addArticle',compact('categories'));
    }


    public function articleAddPOST(Request $request)
    {
        $slug = str_slug($request->get('slug'),'-');
        $count = Articles::where(
            ['slug' => $slug,]
        )->count();
        if ($count > 0){
            return back()->with('danger','نامک مورد نظر قبلا استفاده شده است')->withInput();
        }

        try{
        $article = new Articles();
        $article->title = $request->get('title');
        $article->slug = $slug;
        $article->comment_status = $request->get('comment_status');
        $article->category_id = $request->get('category');
        $article->content = $request->get('content');
        $article->seo = serialize([
            'keyword' => $request->get('meta_keyword'),
            'description' => $request->get('meta_description'),
        ]);
        $article->post_status = $request->get('post_status');
        $path = $request->file('thumbnail')->store(
            '/',
            'articles'
        );
        $article->thumbnail = $path;
        $article->updated_at = new \DateTime();
        $article->save();
            return redirect()->route('articlesList')->with('success','مقاله با موفقیت ثبت شد');
        }catch (\Exception $e){
            return back()->with('danger','خطا در ثبت مقاله')->withInput();
        }
        $created_at_input = explode('-',$request->get('created_at'));
        $jalaliDate = explode('/',$created_at_input[0]);
        $day =jalali_to_gregorian(toLatin_number($jalaliDate[0]),toLatin_number($jalaliDate[1]),toLatin_number($jalaliDate[2]),$mod='-');
        $time = toLatin_number($created_at_input[1]);
        $created_at = date_create($day.' '.$time);






        


    }

    public function articlesList(Request $request , $page = 1)
    {
        $limit = 10;
        $page = $request->query->get('page');
        if ($page == ''){
            $page = 1;
        }
        $articles = Articles::skip(($page-1)*$limit)->take($limit)->get();
        $buttonCount =Articles::count()/10 ;
        $buttonCount = explode('.',$buttonCount);
        $buttonCount = $buttonCount[0]+1;
        return View('dashboard.articlesList',compact('buttonCount','articles'));
    }


    public function articlesDelete($id)
    {
        try{
            $article = Articles::find( $id );
            $article->delete();
            return redirect()->route('articlesList')->with('success','مقاله مورد نظر با موفقیت حذف شد');
        }catch (\Exception $e){
            return redirect()->route('articlesList')->with('danger','خطایی رخ داد');
        }
    }

    public function articlesEdit($id)
    {
        $article = Articles::find($id);
        $categories = Category::all();
        return View('dashboard.editArticle',compact('article','categories'));
    }

    public function articlesEditPOST(Request $request,$id)
    {
        $slug = str_slug($request->get('slug'),'-');
//        $count = Articles::where(
//            ['slug' => $slug,]
//        )->count();
//        if ($count > 0){
//            return back()->with('danger','نامک مورد نظر قبلا استفاده شده است')->withInput();
//        }

        try{
            $article = Articles::find($id);
            if ($request->get('title') != $article->title){
                $article->title = $request->get('title');
            }
            if ($request->get('comment_status') != $article->comment_status){
                $article->comment_status = $request->get('comment_status');
            }
            if ($request->get('category') != $article->category_id){
                $article->category_id = $request->get('category');
            }
            if ($request->get('content') != $article->content){
                $article->content = $request->get('content');
            }
            $article->seo = serialize([
                'keyword' => $request->get('meta_keyword'),
                'description' => $request->get('meta_description'),
            ]);
            if ($request->get('post_status') != $article->post_status){
                $article->post_status = $request->get('post_status');
            }
            if ($request->file('thumbnail') != null){
                $path = $request->file('thumbnail')->store(
                    '/',
                    'articles'
                );
                $article->thumbnail = $path;
            }
            $article->updated_at = new \DateTime();

            if ($slug != $article->slug){
                $article->slug = $slug;
            }
            $article->save();
            return redirect()->route('articlesList')->with('success','مقاله با موفقیت ثبت شد');
        }catch (\Exception $e){
            return back()->with('danger','خطا در ثبت مقاله')->withInput();
        }
        $created_at_input = explode('-',$request->get('created_at'));
        $jalaliDate = explode('/',$created_at_input[0]);
        $day =jalali_to_gregorian(toLatin_number($jalaliDate[0]),toLatin_number($jalaliDate[1]),toLatin_number($jalaliDate[2]),$mod='-');
        $time = toLatin_number($created_at_input[1]);
        $created_at = date_create($day.' '.$time);
    }






















}
