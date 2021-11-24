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
    <link href="{{ asset('plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/datatables.net-fixedcolumns-bs4/css/fixedColumns.bootstrap4.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('plugins/jquery-ui-dist/jquery-ui.min.css')}}" />






    @show

    @section('script')
    <script src="{{ asset('js/vendor.min.js') }}"></script>
    <script src="{{ asset('js/app.min.js') }}"></script>
    <script src="{{ asset('js/theme/default.min.js') }}"></script>
    <script src="{{ asset('js/demo/render.highlight.js')}}"></script>
    <script src="{{ asset('plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('plugins/jquery.maskedinput/src/jquery.maskedinput.js') }}"></script>


    <script>
        $("#telefono").mask("(99)-9999-9999");
    </script>

    <script>
        function volver() {

            $("#div").load("{{ url('/Usuarios') }}");

        }
    </script>




    <script type="text/javascript">
        $('#from1').on('submit', function(e) {
            e.preventDefault();

            let Nombre = $('#nombre').val();
            let Area = $('#area').val();
            let Usuario = $('#usuario').val();
            let Contraseña = $('#password').val();
            let Id_usuario = $('#id').val();

            console.log(Id_usuario.value);

            var url = '{{ route("users.update", ":id") }}';
            url = url.replace(':id', Id_usuario.value);


            $.ajax({
                url: url,
                type: "PUT",
                data: {
                    "_token": "{{ csrf_token() }}",
                    Nombre: Nombre,
                    Area: Area,
                    Usuario: Usuario,
                    Contraseña: Contraseña,
                    Id_usuario: Id_usuario,
                },
                success: function(response) {
                    console.log(response);
                    alert('Usuario se modifico correctamente');
                    $("#div").load("{{ url('/Usuarios') }}");
                },
                error: function(response) {

                },
            });
        });
    </script>



    @show
</head>

<body>
    <div id="div">
        <div class="mb-3">
            <h1>Modificacion de usuarios</h1>

            <form data-parsley-validate="true" id="from1">


                @foreach($Usuarios as $item)
                <input type="hidden" value="{{$item->Id_usuario}}" id="id" />
                <label class="form-label">Nombre</label>
                <input class="form-control" id="nombre" type="text" placeholder="Nombre" value="{{$item->Nombre}}" />
                <label class="form-label">Area</label>
                <input class="form-control" id="area" type="text" placeholder="Area" value="{{$item->Area}}" />
                <label class="form-label">Usuario</label>
                <input type="text" id="usuario" class="form-control mb-5px" placeholder="Usuario" value="{{$item->Usuario}}" />
                <label class="form-label">Contraseña</label>
                <input type="password" id="password" class="form-control" placeholder="Contraseña" value="{{$item->Contraseña}}" />
                <br>
                <button type="submit" class="btn btn-primary">Modificar el usuarios</button>
                @endforeach
            </form>
            <button onclick="volver()" id="volver" class="btn btn-danger">volver</button>

        </div>
    </div>
</body>