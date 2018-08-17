<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function index()
    {
        $user = Auth::user()->isAdmin();
      dd($user);
        return view('home');
    }


    /**
     * @Resource("foobar/photos", only={"index", "update"}, names={"index": "index.name"})
     * @Before("auth")
     * @Before("csrf", on={"post", "put", "delete"})
     * @Where({"id": "regex"})
     */
    public function oops()
    {
      // code...
    }

}
