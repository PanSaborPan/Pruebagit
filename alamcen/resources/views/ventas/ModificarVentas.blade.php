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

            $("#div").load("{{ url('/Ventas') }}");

        }
    </script>




    <script type="text/javascript">
        $('#from1').on('submit', function(e) {
            e.preventDefault();

            let Id = $('#id').val();

            let Cliente = $('#cliente').val();
            let Producto = $('#producto').val();
            let Descripcion = $('#descripcion').val();
            let Cantidad = $('#cantidad').val();
            let Precio_Unitario = $('#precio_unitario').val();

            var url = '{{ route("ventas.update", ":id") }}';
            url = url.replace(':id', id.value);


            $.ajax({
                url: url,
                type: "PUT",
                data: {
                    "_token": "{{ csrf_token() }}",

                    Cliente: Cliente,
                    Producto: Producto,
                    Descripcion: Descripcion,
                    Cantidad: Cantidad,
                    Precio_Unitario: Precio_Unitario,
                    Iva: "14.6",
                    Sub_Total: "1000",
                    Total: "1200",
                    Folio: Id,

                },
                success: function(response) {
                    console.log(response);
                    alert('La venta se modifico correctamente');
                    $("#div").load("{{ url('/Ventas') }}");
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
            <h1>Modificacion de ventas</h1>

            <form data-parsley-validate="true" id="from1">


                @foreach($Ventas as $item)

                <input type="hidden" value="{{$item->Folio}}" id="id" />

                <label class="form-label">Cliente</label>
                <input class="form-control" id="cliente" value="{{$item->Cliente}}" type="text" placeholder="Cliente" />
                <label class="form-label">Producto</label>
                <input class="form-control" id="producto" value="{{$item->Producto}}" type="text" placeholder="Producto" />
                <label class="form-label">Descripcion</label>
                <textarea id="descripcion" class="form-control mb-5px" placeholder="Descripcion">{{$item->Descripcion}}</textarea>
                <label class="form-label">Cantidad</label>
                <input type="number" id="cantidad" value="{{$item->Cantidad}}" class="form-control" placeholder="Cantidad" />
                <label class="form-label">Precio por unidad</label>
                <input type="number" class="form-control" step="0.01" id="precio_unitario" value="{{$item->Precio_Unitario}}" placeholder="Precio_Unitario" />

                <br>
                <button type="submit" class="btn btn-primary">Modificar la venta</button>
                @endforeach
            </form>

            <button onclick="volver()" id="volver" class="btn btn-danger">volver</button>

        </div>
    </div>

</body>