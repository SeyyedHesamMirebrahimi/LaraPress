<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;

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


    public function dashboard()
    {
        return View('dashboard.dashboard');
    }


    public function editProfile()
    {
      return View('dashboard.editProfile',['user'=>Auth::User()]);
    }

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
//            send error data to telegram bot
            return back()->with('danger', 'خطا در ذخیره اطلاعات');
        }
    }

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
//            send error data to telegram bot
                    return back()->with('danger', 'خطا در بروزرسانی کلمه عبور');
                }
            }else{
                return back()->with('danger', 'کلمه عبور های جدید با هم مطابقت ندارند');
            }
        }else{
            return back()->with('danger', 'کلمه عبور فعلی اشتباه وارد شده است');
        }
    }

    public function updateProfileAvatarPOST(Request $request)
    {
        if ($request->file('avatar')){
            try{
                $user = User::find(Auth::user()->id);
                $path = $request->file('avatar')->store(
                    '/',
//                    uniqid('user_', true).'.'.$request->file('avatar')->getClientOriginalExtension(),
                    'avatars'
                );
                $user->avatar = $path;
                $user->updated_at = new \DateTime();
                $user->save();
                return back()->with('success', 'بروزرسانی آواتار با موفقیت انجام شد');
            }catch (\Exception $e){
//            send error data to telegram bot
                return back()->with('danger', 'خطا در بروزرسانی آواتار');
            }
        }else{
            return back()->with('danger', 'فایلی انتخاب نشده');
        }
    }

}
