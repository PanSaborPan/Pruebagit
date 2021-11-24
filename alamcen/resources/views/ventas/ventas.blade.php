<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <title>@section('title') @show</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @section('style')
    <link href="{{ asset('css/vendor.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/facebook/app.min.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{{ asset('plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/datatables.net-fixedcolumns-bs4/css/fixedColumns.bootstrap4.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('plugins/jquery-ui-dist/jquery-ui.min.css')}}" />


    @show
</head>
@section('script')
<script src="{{ asset('js/vendor.min.js') }}"></script>
<script src="{{ asset('js/app.min.js') }}"></script>
<script src="{{ asset('js/theme/default.min.js') }}"></script>
<script src="{{ asset('js/demo/render.highlight.js')}}"></script>
<script src="{{ asset('plugins/@highlightjs/cdn-assets/highlight.min.js')}}"></script>
<script src="{{ asset('plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/jquery.maskedinput/src/jquery.maskedinput.js') }}"></script>



<script type="text/javascript">
    $('#data-table-default').DataTable({
        responsive: true
    });
</script>

<script>
    function clickaction(b) {

        var url = '{{ route("ventas.edit", ":id") }}';
        url = url.replace(':id', b.value);
        $("#div").load(url);

    };
</script>

<script>
    function clickdelete(b) {

        var url = '{{ route("ventas.delete", ":id") }}';
        url = url.replace(':id', b.value);
        $("#div").load(url);
    };
</script>


<script type="text/javascript">
    $('#from1').on('submit', function(e) {
        e.preventDefault();

        let Cliente = $('#cliente').val();
        let Producto = $('#producto').val();
        let Descripcion = $('#descripcion').val();
        let Cantidad = $('#cantidad').val();
        let Precio_Unitario = $('#precio_unitario').val();


        $.ajax({
            url: "{{ route('ventas.create') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",

                Cliente: Cliente,
                Producto: Producto,
                Descripcion: Descripcion,
                Cantidad: Cantidad,
                Precio_Unitario: Precio_Unitario

            },
            success: function(response) {
                console.log(response);
                alert('La venta se inserto correctamente');
                $("#div").load("{{ url('/Ventas') }}");
            },
            error: function(response) {

            },
        });
    });
</script>




@show

<body>

    <div id="div">

        <h1>Captura de ventas</h1>
        <form id="from1">

            @csrf

            <label class="form-label">Cliente</label>
            <input class="form-control" id="cliente" type="text" placeholder="Cliente" />
            <label class="form-label">Producto</label>
            <input class="form-control" id="producto" type="text" placeholder="Producto" />
            <label class="form-label">Descripcion</label>
            <textarea id="descripcion" class="form-control mb-5px" placeholder="Descripcion"></textarea>
            <label class="form-label">Cantidad</label>
            <input type="number" id="cantidad" class="form-control" placeholder="Cantidad" />
            <label class="form-label">Precio por unidad</label>
            <input type="number" class="form-control" step="0.01" id="precio_unitario" placeholder="Precio_Unitario" />
            <br>
            <button id="subir" type="submit" class="btn btn-primary">Crear nueva venta</button>
        </form>


        <br>
        <br>




        <h1>Tabla de ventas actuales</h1>


        <table id="data-table-default" class="table table-striped table-bordered align-middle">
            <thead>
                <tr>
                    <th width="1%" data-orderable="false">Folio</th>
                    <th width="1%" data-orderable="false">Cliente</th>
                    <th width="1%" data-orderable="false">Producto</th>
                    <th width="1%" data-orderable="false">Descripcion</th>
                    <th width="1%" data-orderable="false">Cantidad</th>
                    <th width="1%" data-orderable="false">Precio_Unitario</th>
                    <th width="1%" data-orderable="false">Iva</th>
                    <th width="1%" data-orderable="false">Sub_Total</th>
                    <th width="1%" data-orderable="false">Total</th>
                    <th width="1%" data-orderable="false">Acciones</th>
                </tr>
            </thead>
            <tbody>


                @foreach($ventas as $item)
                <tr class="fradeX odd">

                    <td style="display: none;">{{$item->Folio}}</td>
                    <td style="display: none;">{{$item->Cliente}}</td>
                    <td style="display: none;">{{$item->Producto}}</td>
                    <td style="display: none;">{{$item->Descripcion}}</td>
                    <td style="display: none;">{{$item->Cantidad}}</td>
                    <td style="display: none;">{{$item->Precio_Unitario}}</td>
                    <td style="display: none;">{{$item->Iva}}</td>
                    <td style="display: none;">{{$item->Sub_Total}}</td>
                    <td style="display: none;">{{$item->Total}}</td>
                    <td style="display: none;">



                        <button class="id" id='Modificar' onclick="clickaction(this)" value="{{$item->Folio}}">Modificar</button>
                        <button class="id" id='Modificar' onclick="clickdelete(this)" value="{{$item->Folio}}">Borrar</button>

                    </td>

                </tr>
                @endforeach
        </table>

    </div>
</body>