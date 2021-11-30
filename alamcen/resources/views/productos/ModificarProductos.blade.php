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

            $("#div").load("{{ url('/Productos') }}");

        }
    </script>




    <script type="text/javascript">
        $('#from1').on('submit', function(e) {
            e.preventDefault();

            let id = $('#id').val();
            let Nombre_del_producto = $('#Nombre_del_producto').val();
            let Descripcion_del_producto = $('#Descripcion_del_producto').val();
            let Clave_del_sat = $('#Clave_del_sat').val();
            let Clave_de_unidad = $('#Clave_de_unidad').val();
            let Tipo = $('#Tipo').val();
            let Precio_unitario = $('#Precio_unitario').val();
            let Existencias_actuales = $('#Existencias_actuales').val();
            let Punto_de_reabastecimiento = $('#Punto_de_reabastecimiento').val();
            let Cuenta_de_activo_de_inventario = $('#Cuenta_de_activo_de_inventario').val();

            var url = '{{ route("producto.update", ":id") }}';
            url = url.replace(':id', id.value);


            $.ajax({
                url: url,
                type: "PUT",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id,
                    Nombre_del_producto: Nombre_del_producto,
                    Descripcion_del_producto: Descripcion_del_producto,
                    Clave_del_sat: Clave_del_sat,
                    Clave_de_unidad: Clave_de_unidad,
                    Tipo: Tipo,
                    Precio_unitario: Precio_unitario,
                    Existencias_actuales: Existencias_actuales,
                    Punto_de_reabastecimiento: Punto_de_reabastecimiento,
                    Cuenta_de_activo_de_inventario: Cuenta_de_activo_de_inventario,
                },
                success: function(response) {
                    console.log(response);
                    alert('Producto se modifico correctamente');
                    $("#div").load("{{ url('/Productos') }}");
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
            <h1>Modificacion de productos</h1>

            <form data-parsley-validate="true" id="from1">


                @foreach($productos as $item)
                <input type="hidden" value="{{$item->SKU}}" id="id" />
                <label class="form-label">Nombre del producto</label>
                <input class="form-control" id="Nombre_del_producto" type="text" placeholder="Nombre" value="{{$item->Nombre_del_producto}}" />
                <label class="form-label">Descriptcion del producto</label>
                <textarea class="form-control" id="Descripcion_del_producto" placeholder="Descrpcion del producto">{{$item->Descripcion_del_producto}}</textarea>
                <label class="form-label">Clave del sat</label>
                <input type="number" id="Clave_del_sat" class="form-control mb-5px" placeholder="Correo" value="{{$item->Clave_del_sat}}" />
                <label class="form-label">Clave de unidad</label>
                <input type="text" id="Clave_de_unidad" class="form-control" placeholder="Telefono" value="{{$item->Clave_de_unidad}}" />
                <label class="form-label">Tipo</label>
                <input type="text" id="Tipo" class="form-control" placeholder="Telefono" value="{{$item->Tipo}}" />
                <label class="form-label">Precio unitario</label>
                <input type="number" id="Precio_unitario" class="form-control" placeholder="Telefono" value="{{$item->Precio_unitario}}" />
                <label class="form-label">Existencias actuales</label>
                <input type="number" id="Existencias_actuales" class="form-control" placeholder="Telefono" value="{{$item->Existencias_actuales}}" />
                <label class="form-label">Puntos de reabastecimiento</label>
                <input type="number" id="Punto_de_reabastecimiento" class="form-control" placeholder="Telefono" value="{{$item->	Punto_de_reabastecimiento}}" />
                <label class="form-label">Cuenta de activo de inventario</label>
                <input type="number" id="Cuenta_de_activo_de_inventario" class="form-control" placeholder="Telefono" value="{{$item->Cuenta_de_activo_de_inventario}}" />
                <br>

                <button type="submit" class="btn btn-primary">Modificar el producto</button>
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