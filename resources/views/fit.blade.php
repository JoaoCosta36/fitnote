@extends('layouts.app')
@section('title', 'FitNote')
@section('content')
@csrf
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Medidas</title>
  <table align="center">
  <tr>
 <h1 align="center"> {{$nome}}</h1>
   <th>Profile ID</th> 
    <th>Barriga</th>
    <th>Coxa</th>
    <th>Gémeo</th>
    <th>Ancas</th>
    <th>Data do registo</th>
  </tr>
@foreach($dados as $row)
  <tr>
    <td >{{$row->id_perfil }} </td>
    <td>{{ $row->barriga }}</td>
    <td>{{ $row->coxa }}</td>
    <td>{{ $row->gemeo }}</td>
    <td>{{ $row->ancas }}</td>
    <td>{{ $row->date }}</td>
  </tr>
@endforeach
</table>
<body>
  
</body>
</html>



@endsection
