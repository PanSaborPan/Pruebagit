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

            $("#div").load("{{ url('/Clientes') }}");

        }
    </script>




    <script type="text/javascript">
        $('#from1').on('submit', function(e) {
            e.preventDefault();

            let id = $('#id').val();
            let Nombre_de_contacto = $('#Nombre_de_contacto').val();
            let Nombre_de_empresa = $('#Nombre_de_empresa').val();
            let Razonsocial = $('#Razonsocial').val();
            let Rfc = $('#Rfc').val();
            let Telefono = $('#Telefono').val();
            let Movil = $('#Movil').val();
            let Correo_electronico_1 = $('#Correo_electronico_1').val();
            let Correo_electronico_2 = $('#Correo_electronico_2').val();
            let Calle = $('#Calle').val();
            let Numero = $('#Numero').val();
            let Codigo_Postal = $('#Codigo_Postal').val();
            let Ciudad = $('#Ciudad').val();
            let Estado = $('#Estado').val();
            let Pais = $('#Pais').val();

            var url = '{{ route("cliente.update", ":id") }}';
            url = url.replace(':id', id.value);


            $.ajax({
                url: url,
                type: "PUT",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id,
                    Nombre_de_contacto: Nombre_de_contacto,
                    Nombre_de_empresa: Nombre_de_empresa,
                    Razonsocial: Razonsocial,
                    Rfc: Rfc,
                    Telefono: Telefono,
                    Movil: Movil,
                    Correo_electronico_1: Correo_electronico_1,
                    Correo_electronico_2: Correo_electronico_2,
                    Calle: Calle,
                    Numero: Numero,
                    Codigo_Postal: Codigo_Postal,
                    Ciudad: Ciudad,
                    Estado: Estado,
                    Pais: Pais,
                },
                success: function(response) {
                    console.log(response);
                    alert('Cliente se modifico correctamente');
                    $("#div").load("{{ url('/Clientes') }}");
                },
                error: function(response) {

                },
            });
        });
    </script>



    @show
</head>

<body>
    @if(Session::has('users.Usuario'))
    <div id="div">
        <div class="mb-3">
            <h1>Modificacion de clientes</h1>

            <form data-parsley-validate="true" id="from1">


                @foreach($clientes as $item)
                <input type="hidden" value="{{$item->Id_cliente}}" id="id" />
                <label class="form-label">Nombre de contacto</label>
                <input class="form-control" id="Nombre_de_contacto" type="text" placeholder="Nombre" value="{{$item->Nombre_de_contacto}}" />
                <label class="form-label">Nombre de empresa</label>
                <input class="form-control" id="Nombre_de_empresa" type="text" placeholder="Compañia" value="{{$item->Nombre_de_empresa}}" />
                <label class="form-label">Razon social</label>
                <input type="text" id="Razonsocial" class="form-control mb-5px" placeholder="Correo" value="{{$item->Razonsocial}}" />
                <label class="form-label">RFC</label>
                <input type="text" id="Rfc" class="form-control" placeholder="Telefono" value="{{$item->Rfc}}" />
                <label class="form-label">Telefono</label>
                <input type="text" id="Telefono" class="form-control" placeholder="Telefono" value="{{$item->Telefono}}" />
                <label class="form-label">Movil</label>
                <input type="text" id="Movil" class="form-control" placeholder="Telefono" value="{{$item->Movil}}" />
                <label class="form-label">Correo electronico 1</label>
                <input type="text" id="Correo_electronico_1" class="form-control" placeholder="Telefono" value="{{$item->Correo_electronico_1}}" />
                <label class="form-label">Correo electronico 2</label>
                <input type="text" id="Correo_electronico_2" class="form-control" placeholder="Telefono" value="{{$item->Correo_electronico_2}}" />
                <br>
                <label aling="center" class="form-label">DIRECCION:</label><br>
                <label class="form-label">Calle</label>
                <input type="text" id="Calle" class="form-control" placeholder="Celular" value="{{$item->Calle}}" />
                <label class="form-label">Numero</label>
                <input type="text" id="Numero" class="form-control" placeholder="Calle" value="{{$item->Numero}}" />
                <label class="form-label">Codigo postal</label>
                <input type="text" id="Codigo_Postal" class="form-control" placeholder="Numero" value="{{$item->Codigo_Postal}}" />
                <label class="form-label">Ciudad</label>
                <input type="text" id="Ciudad" class="form-control" placeholder="Ciudad" value="{{$item->Ciudad}}" />
                <label class="form-label">Estado</label>
                <input type="text" id="Estado" class="form-control" placeholder="Estado" value="{{$item->Estado}}" />
                <label class="form-label">Pais</label>
                <input type="text" id="Pais" class="form-control" placeholder="Pais" value="{{$item->Pais}}" />
                <br>

                <button type="submit" class="btn btn-primary">Modificar el cliente</button>
                @endforeach
            </form>
            <button onclick="volver()" id="volver" class="btn btn-danger">volver</button>

        </div>
    </div>
    @else
    <script>
        window.location = "{{ route('home') }}";
        alert('no has iniciado session');
    </script>
    @endif
</body>