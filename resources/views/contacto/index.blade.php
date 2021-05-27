<!--Llegamos aqui con http://localhost:3000/public/contacto-->
@if(Session::has('mensaje'))
    {{Session::get('mensaje')}}
@endif

<table>
    <thead>
        <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($contactos as $contacto)
        <tr>
            <td>{{$contacto->id}}</td>
            <td>{{$contacto->nombre}}</td>
            <td>{{$contacto->apellido}}</td>
            <td>{{$contacto->tlf}}</td>
            <td>{{$contacto->email}}</td>
            <td><a href="{{url('/contacto/'.$contacto->id.'/edit')}}">Editar</a> | 
                <form action="{{url('/contacto/'.$contacto->id)}}" method="POST">
                    @csrf
                    {{method_field('DELETE')}}
                    <input type="submit" onclick="return confirm('¿Quiéres eliminar este contacto?')" value="Borrar">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<button onclick="window.location.href = 'http://localhost:3000/public/contacto/create'">Nuevo Contacto</button>