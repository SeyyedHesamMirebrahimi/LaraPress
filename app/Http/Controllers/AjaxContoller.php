<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User as User;

class AjaxContoller extends Controller
{
  public function getAvatarByEmail(Request $request)
  {
    $email = $request->email;
    $userCount = User::where('email',$email)->count();
    $user = User::where('email',$email)->first();
    // return Response($email);
    if ($userCount == 0 ) {
      return Response(['res' => false,]);
    }
    if ($user->avatar == null) {
      $name = $user->name;
      $url = 'https://www.gravatar.com/avatar/'.md5($user->email);
      return Response([
        'res' => true,
        'url' => $url,
        'name'=> $name,
      ]);
    }else {
      $name = $user->name;
      $url = route('index').'/avatars/'.$user->avatar;
      return Response([
        'res' => true,
        'url' => $url,
        'name'=> $name,
      ]);
    }
  }


}
