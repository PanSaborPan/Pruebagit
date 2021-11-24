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

        var url = '{{ route("producto.edit", ":id") }}';
        url = url.replace(':id', b.value);
        $("#div").load(url);

    };
</script>

<script>
    function clickdelete(b) {

        var url = '{{ route("producto.delete", ":id") }}';
        url = url.replace(':id', b.value);
        $("#div").load(url);
    };
</script>


<script type="text/javascript">
    $('#from1').on('submit', function(e) {
        e.preventDefault();

        let Nombre_del_producto = $('#Nombre_del_producto').val();
        let Descripcion_del_producto = $('#Descripcion_del_producto').val();
        let Clave_del_sat = $('#Clave_del_sat').val();
        let Clave_de_unidad = $('#Clave_de_unidad').val();
        let Tipo = $('#Tipo').val();
        let Precio_unitario = $('#Precio_unitario').val();
        let Existencias_actuales = $('#Existencias_actuales').val();
        let Punto_de_reabastecimiento = $('#Punto_de_reabastecimiento').val();
        let Cuenta_de_activo_de_inventario = $('#Cuenta_de_activo_de_inventario').val();

        $.ajax({
            url: "{{ route('producto.create') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
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
                alert('Producto se inserto correctamente');
                $("#div").load("{{ url('/Productos') }}");
            },
            error: function(response) {

            },
        });
    });
</script>




@show

<body>
    @if(Session::has('users.Usuario'))

    <div id="div">

        <h1>Captura de Proveedores</h1>
        <form id="from1">

            @csrf

            <label class="form-label">Nombre del producto</label>
            <input class="form-control" id="Nombre_del_producto" type="text" placeholder="Nombre" />
            <label class="form-label">Descriptcion del producto</label>
            <input class="form-control" id="Descripcion_del_producto" type="text" placeholder="Compañia" />
            <label class="form-label">Clave del sat</label>
            <input type="text" id="Clave_del_sat" class="form-control mb-5px" placeholder="Correo" />
            <label class="form-label">Clave de unidad</label>
            <input type="text" id="Clave_de_unidad" class="form-control" placeholder="Telefono" />
            <label class="form-label">Tipo</label>
            <input type="text" id="Tipo" class="form-control" placeholder="Telefono" />
            <label class="form-label">Precio unitario</label>
            <input type="text" id="Precio_unitario" class="form-control" placeholder="Telefono" />
            <label class="form-label">Existencias actuales</label>
            <input type="text" id="Existencias_actuales" class="form-control" placeholder="Telefono" />
            <label class="form-label">Puntos de reabastecimiento</label>
            <input type="text" id="Punto_de_reabastecimiento" class="form-control" placeholder="Telefono" />
            <label class="form-label">Cuenta de activo de inventario</label>
            <input type="text" id="Cuenta_de_activo_de_inventario" class="form-control" placeholder="Telefono" />
            <br>
            <br>
            <button id="subir" type="submit" class="btn btn-primary">Crear nuevo usuario</button>
        </form>


        <br>
        <br>




        <h1>Tabla de usuarios actuales</h1>


        <table id="data-table-default" class="table table-striped table-bordered align-middle">
            <thead>
                <tr>
                    <th width="1%">id</th>
                    <th width="1%">Nombre del producto</th>
                    <th width="1%">Descripcion del producto</th>
                    <th width="1%">Clave del sat</th>
                    <th width="1%">Clave de unidad</th>
                    <th width="1%">Tipo</th>
                    <th width="1%">Precio unitario</th>
                    <th width="1%">Existencias actuales</th>
                    <th width="1%">Punto de reabastecimiento</th>
                    <th width="1%">Punto de reabastecimiento</th>
                    <th width="1%">Acciones</th>
                </tr>
            </thead>
            <tbody>


                @foreach($productos as $item)
                <tr class="fradeX odd">

                    <td style="display: none;">{{$item->SKU}}</td>
                    <td style="display: none;">{{$item->Nombre_del_producto}}</td>
                    <td style="display: none;">{{$item->Descripcion_del_producto}}</td>
                    <td style="display: none;">{{$item->Clave_del_sat}}</td>
                    <td style="display: none;">{{$item->Clave_de_unidad}}</td>
                    <td style="display: none;">{{$item->Tipo}}</td>
                    <td style="display: none;">{{$item->Precio_unitario}}</td>
                    <td style="display: none;">{{$item->Existencias_actuales}}</td>
                    <td style="display: none;">{{$item->Punto_de_reabastecimiento}}</td>
                    <td style="display: none;">{{$item->Cuenta_de_activo_de_inventario}}</td>
                    <td style="display: none;">



                        <button class="id" id='Modificar' onclick="clickaction(this)" value="{{$item->SKU}}">edit</button>
                        <button class="id" id='Modificar' onclick="clickdelete(this)" value="{{$item->SKU}}">delete</button>

                    </td>

                </tr>
                @endforeach
        </table>

    </div>
    @else
    <script>
        window.location = "{{ route('home') }}";
        alert('no has iniciado session');
    </script>
    @endif
</body>