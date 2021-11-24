@if(Session::has('users.Usuario'))
<script>
    $("#div").load("{{ url('/Productos') }}");
</script>
@else
<script>
    window.location = "{{ route('home') }}";
    alert('no has iniciado session');
</script>
@endif