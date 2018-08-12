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

    public function editProfilePOST()
    {
      dd('yeap');
      return View('dashboard.editProfile',['user'=>Auth::User()]);
    }

}
