@extends('layouts.app')
@section('title', 'FitNote')
@section('content')
<form action = "/profile" method = "post">
@csrf
@method('PUT')                  
<script>
function imc(){
  var peso = document.getElementById('peso').value;
  var altura = document.getElementById('altura').value;
  var imc = (peso)/(altura*altura);
 
 document.getElementById('imc').value = imc.toFixed(2);

 if(imc<=18.5){
   document.getElementById('result')='Abaixo do peso';
}
  else if(imc>=18.6 && imc<=24.9){document.getElementById('result').innerHTML='Peso ideal. Parabéns!';
  }
  else if(imc>=25.0 && imc<=29.9){document.getElementById('result').innerHTML='Peso Levemente acima do peso!';
  }
  else if(imc>=30.0 && imc<=34.9){document.getElementById('result').innerHTML='Obesidade Grau 1';
  }
  else if(imc>=35.0 && imc<=39.9){document.getElementById('result').innerHTML='Obesidade Grau 2 (severa)';
  }
  else if(imc>=40.0){document.getElementById('result').innerHTML='Obesidade Grau 3 (mórbida)';
  }
  else{
    document.getElementById('result').innerHTML='UPS!';
  }

}

</script>


<h1 align="center">Perfil</h1>


<div align="center" class="profile-form">
<label for="name">Nome</label>      
<input type="text" name="nome" id="nome" placeholder="Nome" value="{{ $nome }}">
</p>
<label for="idade">Idade</label>   
  <input type="text" name="idade" id="idade" placeholder="Idade" value="{{ $idade }}">
</p>
<div style="margin-bottom:5px; margin-right:92px;">
<label for="sexo">Sexo</label>
<select name="sexo"  id="sexo" >
<option value="{{$sexo}}">{{$sexo}}</option>
<option value="Masculino">Masculino</option>
<option value="Feminino">Feminino</option>
</select> 
</div>
</p>
<label for="altura">Altura</label>   
  <input type="text" name="altura" id="altura" placeholder="Altura" value="{{$altura}}">
</p>
<label for="peso">Peso</label>   
  <input type="text" name="peso" id="peso" placeholder="Peso" value="{{$peso}}">
</p>
<div style="margin-left:100px;">
<label for="imc">IMC</label>   
  <input type="text" name="imc" id="imc" placeholder="IMC" value="{{$imc}}" >
  <label style="border-style: dotted; width:85px;" onclick="imc()">calcular imc</label>
  <label id=result></label>
  </div>
<div class="col-md-8 offset-md-4">
<button type="submit" class="btn btn-primary">Guardar</button>
</div>

</div>
</form>

@endsection
