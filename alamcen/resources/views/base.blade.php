<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <title>@section('title') @show</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @section('style')
    <link href="{{ asset('css/vendor.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/facebook/app.min.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    @show
</head>


@section('script')

<script src="{{ asset('js/vendor.min.js') }}"></script>
<script src="{{ asset('js/app.min.js') }}"></script>
<script src="{{ asset('js/theme/default.min.js') }}"></script>
<script src="{{ asset('js/demo/render.highlight.js')}}"></script>
<script src="{{ asset('plugins/@highlightjs/cdn-assets/highlight.min.js')}}"></script>


<script>
    function usuarios() {
        $("#contenido").load("{{ url('/Usuarios') }}");
    };
</script>




@show

<body>



    <!-- loader(cuando carga la pagina) -->

    <!-- loader -->
    <!-- #app -->
    <div id="app" class="app app-header-fixed app-sidebar-fixed has-scroll">


        <!-- [fin]header -->
        <div id="header" class="app-header">
            <!-- BEGIN navbar-header -->
            <div class="navbar-header">
                <a href="{{ url('/') }}" class="navbar-brand"><span class="navbar-logo"></span> Voblakye</a>

                <button type="button" class="navbar-mobile-toggler" data-bs-toggle="collapse" data-bs-target="#top-navbar">
                    <span class="fa-stack fa-lg">
                        <i class="far fa-square fa-stack-2x"></i>
                        <i class="fa fa-cog fa-stack-1x mt-1px"></i>
                    </span>
                </button>

                <!-- [inicio]icono de 3 rallas que se ve en celulares-->
                <button type="button" class="navbar-mobile-toggler" data-toggle="app-sidebar-mobile">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- [fin]icono de 3 rallas que se ve en celulares-->
            </div>
            <!-- END navbar-header -->

            <!-- BEGIN header-nav -->
            <div class="d-md-block me-auto collapse" id="top-navbar">
                <div class="navbar-nav">
                    <div class="navbar-item dropdown ">
                        <a href="#" class="navbar-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-id-card fa-fw me-1 me-md-0">
                            </i>
                            <span class="d-lg-inline d-md-none">Listado de usuarios</span>
                            <b class="caret ms-1 ms-md-0"></b>
                        </a>
                        <div class="dropdown-menu" style>
                            <a onclick="usuarios()" class="dropdown-item">Usuarios</a>
                            <div class="dropdown-divider"></div>
                            <a id="Clasificaciones" class="dropdown-item">Clasificaciones</a>
                            <div class="dropdown-divider"></div>
                            <a id="Projects" class="dropdown-item">Projects</a>
                            <div class="dropdown-divider"></div>
                            <a id="Lenguajes" class="dropdown-item">Lenguajes</a>
                            <div class="dropdown-divider"></div>
                            <a id="Fases" class="dropdown-item">Fases</a>

                        </div>
                    </div>


                </div>
            </div>

            <div class="navbar-nav">

                <div class="navbar-item dropdown">
                    <a href="#" data-bs-toggle="dropdown" class="navbar-link dropdown-toggle icon">
                        <i class="fa fa-bell"></i>
                        <span class="badge">5</span>
                    </a>
                    <div class="dropdown-menu media-list dropdown-menu-end">
                        <div class="dropdown-header">NOTIFICACIONES (1)</div>
                        <a href="javascript:;" class="dropdown-item media">
                            <div class="media-left">
                                <i class="fa fa-bug media-object bg-gray-500"></i>
                            </div>
                            <div class="media-body">
                                <h6 class="media-heading">Titulo <i class="fa fa-exclamation-circle text-danger"></i></h6>
                                <div class="text-muted fs-10px">Descripción</div>
                            </div>
                        </a>
                        <div class="dropdown-footer text-center">
                            <a href="javascript:;" class="text-decoration-none">Ver todas...</a>
                        </div>
                    </div>
                </div>


                <div class="navbar-item navbar-user dropdown">
                    <a href="#" class="navbar-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
                        <img src="" alt="" />
                        <span>
                            <span class="d-none d-md-inline"></span>
                            <b class="caret"></b>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end me-1">
                        <!--
                        <a href="javascript:;" class="dropdown-item">Editar Perfil</a>
                        <div class="dropdown-divider"></div>
                        -->
                        <a href="" class="dropdown-item">Log Out</a>
                    </div>
                </div>

            </div>
            <!-- END header-nav -->

        </div>

        <!-- [fin] header -->
        <!-- BEGIN #sidebar -->



        <!-- END #sidebar -->

    </div>
    <!-- termina app -->

    <div id="content-top" class="app-content mt-2">
        @section('container')
        <div id='contenido'>

        </div>
        @show

        <footer>
            <div id="footer" class="app-footer m-0">
                &copy; 2021 SeanTheme All Right Reserved
            </div>
        </footer>
    </div>
</body>