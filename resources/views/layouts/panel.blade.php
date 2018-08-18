<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {!! SEO::generate() !!}
        <link rel="shortcut icon" href="{{ asset('panel/assets/images/favicon.ico') }}">
        <link rel="stylesheet" href="{{ asset('panel/assets/plugins/morris/morris.css') }}">
        <link href="{{ asset('panel/assets/css/bootstrap-rtl.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('panel/assets/css/core.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('panel/assets/css/components.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('panel/assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('panel/assets/css/pages.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('panel/assets/css/menu.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('panel/assets/css/responsive.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('panel/css/main.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset('panel/css/font-awesome.min.css')  }}">
        <link rel="stylesheet" href="{{ asset('panel/css/dropify.css') }}">
        <link rel="stylesheet" href="https://unpkg.com/persian-datepicker@1.1.3/dist/css/persian-datepicker.css">
        <script src="https://code.jquery.com/jquery-3.3.1.js" charset="utf-8"></script>
        <script src="{{ asset('panel/js/dropify.js') }}" charset="utf-8"></script>
        {{--<script src="{{ asset('panel/ckeditor.js') }}" charset="utf-8"></script>--}}
        <script>
            var route_prefix = "{{ url(config('lfm.url_prefix')) }}";
        </script>
        <!-- TinyMCE init -->
        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>
            var editor_config = {
                path_absolute : "",
                selector: "textarea[name=content]",
                plugins: [
                    "link image"
                ],
                relative_urls: false,
                height: 129,
                file_browser_callback : function(field_name, url, type, win) {
                    var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                    var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
                    var cmsURL = editor_config.path_absolute + route_prefix + '?field_name=' + field_name;
                    if (type == 'image') {
                        cmsURL = cmsURL + "&type=Images";
                    } else {
                        cmsURL = cmsURL + "&type=Files";
                    }
                    tinyMCE.activeEditor.windowManager.open({
                        file : cmsURL,
                        title : 'Filemanager',
                        width : x * 0.8,
                        height : y * 0.8,
                        resizable : "yes",
                        close_previous : "no"
                    });
                }
            };

            tinymce.init(editor_config);
        </script>
        <script>
            {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/stand-alone-button.js')) !!}
        </script>
        <script>
            $('#lfm').filemanager('image', {prefix: route_prefix});
            $('#lfm2').filemanager('file', {prefix: route_prefix});
        </script>
        <script src="{{ asset('panel/js/persian-date.js') }}"></script>
        <script src="https://unpkg.com/persian-datepicker@1.1.3/dist/js/persian-datepicker.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $(".jdate").pDatepicker({
                    format: 'YYYY/MM/DD-H:MM:ss',
                });
            });
        </script>
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
        <script src="{{ asset('panel/assets/js/jquery.core.js') }}"></script>
        <script src="{{ asset('panel/assets/js/jquery.app.js') }}"></script>
        <script>var resizefunc = [];</script>
        <script src="{{ asset('panel/assets/js/modernizr.min.js') }}"></script>
        <script src="{{asset('panel/js/sweetalert.min.js')}}"></script>
        @if(Session::has('success'))
            <script>
                swal({
                    text: "{{ Session::get('success') }}",
                    icon: "success",
                    button: "ok",
                });
            </script>
        @endif
        @if(Session::has('danger'))
            <script>
                swal({
                    text: "{{ Session::get('danger') }}",
                    icon: "error",
                    button: "ok",
                });
            </script>
        @endif
        @if(Session::has('warning'))
            <script>
                swal({
                    text: "{{ Session::get('warning') }}",
                    icon: "warning",
                    button: "ok",
                });
            </script>
        @endif
        @if(Session::has('info'))
            <script>
                swal({
                    text: "{{ Session::get('info') }}",
                    icon: "info",
                    button: "ok",
                });
            </script>
        @endif
        <style>
            .text-r{text-align: right!important;}
        </style>

        <script src="{{ asset('panel/assets/plugins/fileuploads/js/dropify.min.js') }}"></script>
        <script src="{{ asset('panel/assets/js/bootstrap-rtl.min.js') }}"></script>
        <script src="{{ asset('panel/assets/js/detect.js') }}"></script>
        <script src="{{ asset('panel/assets/js/fastclick.js') }}"></script>
        <script src="{{ asset('panel/assets/js/jquery.blockUI.js') }}"></script>
        <script src="{{ asset('panel/assets/js/waves.js') }}"></script>
        <script src="{{ asset('panel/assets/js/jquery.nicescroll.js') }}"></script>
        <script src="{{ asset('panel/assets/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('panel/assets/js/jquery.scrollTo.min.js') }}"></script>
        <script src="{{ asset('panel/assets/plugins/jquery-knob/jquery.knob.js') }}"></script>
		<script src="{{ asset('panel/assets/plugins/morris/morris.min.js') }}"></script>
		<script src="{{ asset('panel/assets/plugins/raphael/raphael-min.js') }}"></script>
        <script src="{{ asset('panel/assets/pages/jquery.dashboard.js') }}"></script>

    </body>
</html>
