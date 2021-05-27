<form action="{{url('contacto')}}" method="POST" enctype="multipart/form-data">
@csrf
{{method_field('POST')}}
@include('contacto.form');
<input type="submit" value="Guardar Contacto">
</form>