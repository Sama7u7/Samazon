<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Document</title>
</head>
<table border="1">
  <thead>
    <th>#</th>
    <th>Nombre</th>
    <th>Acciones</th>
  </thead>
  <tbody>
    @forelse ($categorias as $elemento)
        <tr>
          <td> {{$loop->iteration}} </td>
          <td> {{$elemento->nombre}}</td>
          <td> 
            <a href="{{route('categorias.show',$elemento->id)}}">mostrar</a>  
            <a href="{{route('categorias.edit',$elemento->id)}}">editar</a>  
            <form action="{{route('categorias.destroy',$elemento->id)}}" method="post">
              @csrf
              @method('DELETE')
              <input type="submit" value="borrar">
            </form>

          </td>
        </tr>
    @empty
        
    @endforelse


  </tbody>
</table>
<br><br><br>

<a href="{{route('categorias.create')}}">CREAR UNA NUEVA CATEGORIA</a>


</body>
</html>