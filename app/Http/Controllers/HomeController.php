<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $email = Auth::user()->email;
        $nome = DB::table('perfil')->where('email', $email)->value('nome');
        return view('home')->with($nome);
    }
    public function mostrarPerfil(){
        $email = Auth::user()->email;
        $nome = DB::table('perfil')->where('email', $email)->value('nome');
        $idade = DB::table('perfil')->where('email', $email)->value('idade');
        $sexo = DB::table('perfil')->where('email', $email)->value('sexo');
        $altura = DB::table('perfil')->where('email', $email)->value('altura');
        $peso = DB::table('perfil')->where('email', $email)->value('peso');
        $imc = DB::table('perfil')->where('email', $email)->value('imc');
        $dadosPerfil = [
            'nome'=>$nome,
            'idade'=>$idade,
            'sexo'=>$sexo,
            'altura'=>$altura,
            'peso'=>$peso,
            'imc'=>$imc
        ];
        return view('profile')->with($dadosPerfil) ;
    }
    public function medidasfit(){
        $email = Auth::user()->email;
        $id_perfil = DB::table('perfil')->where('email', $email)->value('id_perfil');
        $dados = DB::table('medidas')->get()->where('id_perfil',$id_perfil); 
        $nome = DB::table('perfil')->where('email', $email)->value('nome');
    
        return view('fit')->with('dados',$dados->toArray())->with('nome',$nome);
    }
    public function inserirMedidas(Request $request){
        $email= Auth::user()->email;
        $id_perfil = DB::table('perfil')->where('email', $email)->value('id_perfil');
        $barriga1 = DB::table('medidas')->where('id_perfil', $id_perfil)->value('barriga');
        $coxa1 = DB::table('medidas')->where('id_perfil', $id_perfil)->value('coxa');
        $ancas1 = DB::table('medidas')->where('id_perfil', $id_perfil)->value('ancas');
        $gemeo1 = DB::table('medidas')->where('id_perfil', $id_perfil)->value('gemeo');
        $barriga = $request->input('barriga');
        $coxa = $request->input('coxa');
        $ancas = $request->input('ancas');
        $gemeo = $request->input('gemeo');
        
      
            $dadosMedidas = [
           'barriga'=>$barriga1,
           'coxa'=>$coxa1,
           'gemeo'=>$ancas1,
           'ancas'=>$gemeo1,
                  ];
        
        
        DB::insert('insert into medidas(id_perfil,barriga,coxa,gemeo,ancas,date) values(?,?,?,?,?,NOW())',[$id_perfil,$barriga,$coxa,$gemeo,$ancas]);
                  echo "<script>alert('Inserido com sucesso');</script>";
        return view('insertData')->with($dadosMedidas)->with($id_perfil)->with($barriga)->with($coxa)->with($gemeo)->with($ancas);
    }



    public function atualizarProfile(Request $request) {
        $email = Auth::user()->email;
       // $email = Auth::email();
       $nome1 = DB::table('perfil')->where('email', $email)->value('nome');
       $idade2 = DB::table('perfil')->where('email', $email)->value('idade');
       $sexo3 = DB::table('perfil')->where('email', $email)->value('sexo');
       $altura4 = DB::table('perfil')->where('email', $email)->value('altura');
       $peso5 = DB::table('perfil')->where('email', $email)->value('peso');
       $imc6 = DB::table('perfil')->where('email', $email)->value('imc');

       $dadosPerfil = [
           'nome'=>$nome1,
           'idade'=>$idade2,
           'sexo'=>$sexo3,
           'altura'=>$altura4,
           'peso'=>$peso5,
           'imc'=>$imc6
       ];
        $nome = $request->input('nome');
        $idade = $request->input('idade');
        $sexo = $request->input('sexo');
        $altura = $request->input('altura');
        $peso = $request->input('peso');
        $imc = $request->input('imc');
      
        $dadosPerfilUpdate = [
            'nome'=>$nome,
            'idade'=>$idade,
            'sexo'=>$sexo,  
            'altura'=>$altura,
            'peso'=>$peso,
            'imc'=>$imc
        ];
        /*DB::insert('insert into perfil(id_perfil,nome,idade,sexo,altura,peso) values(?,?,?,?,?,?)',[1,$nome,$idade,$sexo,$altura,$peso]);*/
       $validate=  DB::table('perfil')->where('email',$email);
        if($validate){
            echo "<script>alert('Inserido com sucesso'); </script>";
            DB::insert('insert into perfil(nome,idade,sexo,altura,peso,email,imc) values(?,?,?,?,?,?,?)',[$nome,$idade,$sexo,$altura,$peso,$email,$imc]);
        }else{
            $query=  DB::table('perfil')->where('email',$email)->update($dadosPerfilUpdate);
        }
        
            echo "<script>alert('Editado com sucesso'); </script>";
            echo "<script>window.location.href = '/profile'; </script>";
        return view('profile')->with($dadosPerfil)->with($nome)->with($idade)->with($sexo)->with($altura)->with($peso)->with($img);
     }
}
