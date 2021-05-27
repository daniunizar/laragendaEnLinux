<form action="{{url('/contacto/'.$contacto->id)}}" method="POST" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}
@include('contacto.form');
<input type="submit" value="Guardar Cambios">
</form>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $("#nombre").val("{{isset($contacto->nombre)?$contacto->nombre:''}}");
    $("#apellido").val("{{isset($contacto->apellido)?$contacto->apellido:''}}");
    $("#tlf").val("{{isset($contacto->tlf)?$contacto->tlf:''}}");
    $("#email").val("{{isset($contacto->email)?$contacto->email:''}}");
</script>