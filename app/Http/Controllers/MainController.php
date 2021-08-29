<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Http\Controllers\Auth;
use Illuminate\Support\Arr;

class MainController extends Controller
{
    public function index(){

        $data = Usuario::all();

        return view('main', ['usuarios' => $data]);

    }

    public function add(Request $request){

        if ($request->isMethod('post')) {
            //echo "<pre>";
            //print_r($request);
            //echo "<pre>";

            $needItens = ['nome', 'email', 'senha', 'role', 'status', 'idade', 'saldo'];

            $erros = array();
            foreach($needItens as $key){
                if($request->get($key) == ""){
                    $erros[] = $key;
                }
            }

            if( ! count($erros) > 0 ){
                // $request->request->remove('_token');
                // $response['success'] = true;
                // $response['message'] = "EAEEEE";
                // $response['data'] = $erros;
                // echo json_encode($response);
                // return;
                $userData = new Usuario;
                $userData->nome = $request->get('nome');
                $userData->email = $request->get('email');
                $userData->senha = $request->get('senha');
                $userData->role = $request->get('role');
                $userData->status = $request->get('status');
                $userData->idade = $request->get('idade');
                $userData->saldo = $request->get('saldo');
                $userData->observacao = $request->get('observacao');

                $userData->save();

                $response['success'] = true;
                $response['message'] = "Usuário criado com Sucesso!";
                $response['data'] =  $userData;
                echo json_encode($response);
                return;

                // return redirect('/usuarios');
            }else{
                $response['success'] = false;
                $response['message'] = "Preencha os seguintes campos: ".implode(", ", $erros);
                $response['data'] = $erros;
                echo json_encode($response);
                return;
            }


        }
        exit();
        //return view('user.add');
    }

    public function edit(){
        
        
        return view('user.update');
        

    }

    public function view(){
        
        return view('user.view');
    }
    
}
