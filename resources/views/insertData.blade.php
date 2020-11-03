@extends('layouts.app')
@section('title', 'FitNote')
@section('content')
<form action = "/insertData" method = "post">
@csrf
@method('post')                  

<h1 align="center">Inserir Dados</h1>
<div align="center">
<label>Barriga:<input id="barriga" name="barriga" type="text"  required>
<label>Coxa:<input id="coxa" name="coxa" type="text"  required>  
<label>Gémeo:<input id="gemeo" name="gemeo"  type="text"  required>
<label>Ancas:<input id="ancas" name="ancas" type="text"  required>
<button type="submit" class="btn btn-primary">Guardar</button>
</div>
</div>
</form>

@endsection
