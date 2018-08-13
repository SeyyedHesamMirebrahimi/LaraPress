<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
        <title>{{ config('app.name', 'داشبورد') }}</title>
		    <link rel="stylesheet" href="{{ asset('assets/plugins/morris/morris.css') }}">
        <link href="{{ asset('assets/css/bootstrap-rtl.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/core.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/components.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/pages.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/menu.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')  }}">
        <link rel="stylesheet" href="{{ asset('css/dropify.css') }}">
        <script src="https://code.jquery.com/jquery-3.3.1.js" charset="utf-8"></script>
        <script src="{{ asset('js/dropify.js') }}" charset="utf-8"></script>
    </head>
    <body class="fixed-left">
        <div id="wrapper">
            <div class="topbar">
                <div class="topbar-left">
                    <a href="index.html" class="logo"><span>{{ config('app.name', 'Laravel') }}</span><i class="zmdi zmdi-layers"></i></a>
                </div>
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <button class="button-menu-mobile open-left">
                                    <i class="zmdi zmdi-menu"></i>
                                </button>
                            </li>
                            <li>
                                <h4 class="page-title">@yield('title')</h4>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-box">
                        <div class="user-img">
                            <img src="https://www.gravatar.com/avatar/{{ md5(Auth::user()->name) }}" alt="user-img" title="{{ Auth::user()->name }}" class="img-circle img-thumbnail img-responsive">
                            <div class="user-status offline"><i class="zmdi zmdi-dot-circle"></i></div>
                        </div>
                        <h5><a href="#">{{ Auth::user()->name }}</a> </h5>
                        <ul class="list-inline">
                            <li>
                                <a href="#" >
                                    <i class="zmdi zmdi-settings"></i>
                                </a>
                            </li>
                            <li>
                              <a class="text-custom" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                               <i class="zmdi zmdi-power"></i>
                              </a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
                            </li>
                        </ul>
                    </div>
                    @include('layouts.menu')
                </div>
            </div>
            <div class="content-page">
                <div class="content">
                    <div class="container">
                      <main class="py-4">
                          <div class="row">
                            @yield('content')
                          </div>
                      </main>
								</div>
                    </div>
                </div>
                <footer class="footer text-right">
                  All Rights Reserved
                </footer>
            </div>
        </div>
@yield('js')
        <script src="{{ asset('assets/js/jquery.core.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.app.js') }}"></script>
        <script>var resizefunc = [];</script>
        <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>

        <script src="{{ asset('assets/plugins/fileuploads/js/dropify.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap-rtl.min.js') }}"></script>
        <script src="{{ asset('assets/js/detect.js') }}"></script>
        <script src="{{ asset('assets/js/fastclick.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.blockUI.js') }}"></script>
        <script src="{{ asset('assets/js/waves.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.scrollTo.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/jquery-knob/jquery.knob.js') }}"></script>
		    <script src="{{ asset('assets/plugins/morris/morris.min.js') }}"></script>
		    <script src="{{ asset('assets/plugins/raphael/raphael-min.js') }}"></script>
        <script src="{{ asset('assets/pages/jquery.dashboard.js') }}"></script>
    </body>
</html>
