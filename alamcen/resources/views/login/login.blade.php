<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@section('title') @show</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @section('style')
    <!-- ================== BEGIN core-css ================== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="{{asset('css/vendor.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/facebook/app.min.css')}}" rel="stylesheet">
    <!-- ================== END core-css ================== -->
    @show
</head>

@section('script')
<!-- ================== BEGIN core-js ================== -->
<script src="{{asset('js/vendor.min.js')}}"></script>
<script src="{{asset('js/app.min.js')}}"></script>
<script src="{{asset('js/theme/facebook.min.js')}}"></script>
<!-- ================== END core-js ================== -->

<!-- ================== BEGIN page-js ================== -->
<script src="{{asset('js/demo/login-v2.demo.js')}}"></script>
<!-- ================== END page-js ================== -->

<script>

</script>

@show

<body class="pace-done pace-top">
    {{Session::flush()}}
    <div class="pace pace-inactive">
        <div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
            <div class="pace-progress-inner"></div>
        </div>
        <div class="pace-activity"></div>
    </div>
    <!-- BEGIN #loader -->
    <div id="loader" class="app-loader loaded">
        <span class="spinner"></span>
    </div>
    <!-- END #loader -->


    <!-- BEGIN #app -->
    <div id="app" class="app">
        <!-- BEGIN login -->
        <div class="login login-v2 fw-bold">
            <!-- BEGIN login-cover  url(../assets/img/login-bg/login-bg-17.jpg)  -->
            <div class="login-cover">
                <div class="login-cover-img" style="background-image: url({{ asset('img/login-bg/login-bg-17.jpg') }})" data-id="login-cover-image"></div>
                <div class="login-cover-bg"></div>
            </div>
            <!-- END login-cover -->

            <!-- BEGIN login-container -->
            <div class="login-container">
                <!-- BEGIN login-header -->
                <div class="login-header">
                    <div class="brand">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('img/login-bg/medical_blanco.png') }}" width="150" height="100">
                            <h1>Medical Services Pack</h1>
                        </div>

                    </div>

                </div>
                <!-- END login-header -->

                <!-- BEGIN login-content -->
                <div class="login-content">


                    <form action="{{ route('login') }}" method="get">
                        {{ csrf_field() }}
                        <div class="form-floating mb-20px {{ $errors->has('email' ? 'has-error' : '') }} ">
                            <input type="text" class="form-control fs-13px h-45px border-0" placeholder="Email Address" id="emailAddress" name="Usuario" value="{{ old('email') }}" required>
                            {!! $errors->first('Usuario','<span class="help-block">:message</span>' ) !!}
                            <label for="emailAddress" class="d-flex align-items-center text-gray-600 fs-13px">Email Address</label>
                        </div>
                        <div class="form-floating mb-20px {{ $errors->has('email' ? 'has-error' : '') }} ">
                            <input type="password" class="form-control fs-13px h-45px border-0" placeholder="Password" name="Contraseña" required>
                            {!! $errors->first('Contraseña','<span class="helpblock">:message</span>' ) !!}
                            <label for="emailAddress" class="d-flex align-items-center text-gray-600 fs-13px">Password</label>
                        </div>
                        <!-- <div class="form-check mb-20px">
                            <input class="form-check-input border-0" type="checkbox" value="1" id="rememberMe">
                            <label class="form-check-label fs-13px text-gray-500" for="rememberMe">
                                Remember Me
                            </label>
                        </div>-->
                        <div class="mb-20px">
                            <button type="submit" class="btn btn-success d-block w-100 h-45px btn-lg">Sign me in</button>
                        </div>
                        <!--<div class="text-gray-500">
                            Not a member yet? Click <a href="javascript:;" class="text-white">here</a> to register.
                        </div>-->
                    </form>
                </div>
                <!-- END login-content -->
                @if($errors->any())
                <h1 style="color: #FF0000;">{{$errors->first('msg')}}</h1>
                @endif
            </div>

            <!-- END login-container -->

        </div>
        <!-- END login -->

        <!-- BEGIN login-bg "../assets/img/login-bg/login-bg-17.jpg"  -->
        <div class="login-bg-list clearfix">
            <div class="login-bg-list-item active"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="{{asset('img/login-bg/login-bg-17.jpg')}}" style="background-image: url({{ asset('img/login-bg/login-bg-17.jpg') }})"></a></div>
            <div class="login-bg-list-item"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="{{asset('img/login-bg/login-bg-16.jpg')}}" style="background-image: url({{ asset('img/login-bg/login-bg-16.jpg') }})"></a></div>
            <div class="login-bg-list-item"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="{{asset('img/login-bg/login-bg-15.jpg')}}" style="background-image: url({{ asset('img/login-bg/login-bg-15.jpg') }})"></a></div>
            <div class="login-bg-list-item"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="{{asset('img/login-bg/login-bg-14.jpg')}}" style="background-image: url({{ asset('img/login-bg/login-bg-14.jpg') }})"></a></div>
            <div class="login-bg-list-item"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="{{asset('img/login-bg/login-bg-13.jpg')}}" style="background-image: url({{ asset('img/login-bg/login-bg-13.jpg') }})"></a></div>
            <div class="login-bg-list-item"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="{{asset('img/login-bg/login-bg-12.jpg')}}" style="background-image: url({{ asset('img/login-bg/login-bg-12.jpg') }})"></a></div>
        </div>
        <!-- END login-bg -->



    </div>
    <!-- END #app -->

</body>

</html>