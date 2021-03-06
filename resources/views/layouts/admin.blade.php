<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css')}}" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap-theme.min.css')}}" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <!-- Latest compiled and minified JavaScript -->
    <script src="{{URL::asset('js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap.min.js')}}" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="{{URL::asset('js/ckeditor.js')}}"></script>
    <script>
       ClassicEditor
           .create( document.querySelector( '#editor' ) )
           .catch( error => {
               console.error( error );
           } );
    </script>
    <script>
    $('document').ready(function(){


       $("#organisasi").change(function(){
        if($(this).val() == "sema")
            {
              organisasi='sema';
              $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              })
               $.ajax({
                type: "POST",
                url: "get",
               data: "organisasi="+organisasi,
                success: function(html,data){
                  //console.log('success');
                  //console.log(data);
                  //alert(html);
                  $(".showlist").empty();
                  $('.showlist').append(html.html);
                  ClassicEditor
                      .create( document.querySelector( '#editor' ) )
                      .catch( error => {
                          console.error( error );
                      } );
                      ClassicEditor
                          .create( document.querySelector( '#editor1' ) )
                          .catch( error => {
                              console.error( error );
                          } );
                },
                beforeSend:function()
                {
       //           alert("Mohon Tunggu Sebentar");
                }

               });
             return false;

            }
        else
            {
              organisasi='dema';
              $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              })
               $.ajax({
                type: "POST",
                url: "get",
               data: "organisasi="+organisasi,
                success: function(html,data){
                  //console.log('success');
                  //console.log(data);
                  //alert(html);
                  $(".showlist").empty();
                  $('.showlist').append(html.html);
                  ClassicEditor
                      .create( document.querySelector( '#editor' ) )
                      .catch( error => {
                          console.error( error );
                      } );
                      ClassicEditor
                          .create( document.querySelector( '#editor1' ) )
                          .catch( error => {
                              console.error( error );
                          } );

                },
                beforeSend:function()
                {
       //           alert("Mohon Tunggu Sebentar");
                }

               });
             return false;
            }
        });
    });
    </script>
</body>
</html>
