<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Auth;
use Illuminate\Support\Arr;

class MainController extends Controller
{
    public function index(){
        $data = Usuario::all()->where('status', 1);
        return view('main', ['usuarios' => $data]);
    }

    public function add(Request $request){

        if ($request->isMethod('post')) {
        
            $needItens = ['nome', 'email', 'senha', 'role', 'idade', 'saldo'];

            $erros = array();
            foreach($needItens as $key){
                if($request->get($key) == ""){
                    $erros[] = $key;
                }
            }

            if( ! count($erros) > 0 ){
                
                $userData = new Usuario;
                $userData->nome = $request->get('nome');
                $userData->email = $request->get('email');
                $userData->senha = password_hash($request->get('senha'), PASSWORD_BCRYPT);
                $userData->role = $request->get('role');
                $userData->status = 1;
                $userData->idade = $request->get('idade');
                $userData->saldo = $request->get('saldo');
                $userData->observacao = $request->get('observacao');

                $userData->save();
                Storage::append('usuarios/'.date('Y-m').'/'.$userData->id.'/dados.txt', '['.now().'] O usuário '.$request->get('nome').' foi criado com sucesso!  => '.json_encode(request()->all()));

                $response['success'] = true;
                $response['message'] = "Usuário criado com Sucesso!";
                $response['data'] =  $userData;
                echo json_encode($response);
                return;
            }else{
                $response['success'] = false;
                $response['message'] = "Preencha os seguintes campos: ".implode(", ", $erros);
                $response['data'] = $erros;
                echo json_encode($response);
                return;
            }
        }else{
            $response['success'] = false;
            $response['message'] = "Você deve utilizar POST";
            $response['data'] = request()->all();
            echo json_encode($response);
            return;
        }
        
    }

    public function editload($id){
        if(isset($id)){
            $user = Usuario::find($id);
            if($user){
                if($user->status == 1){
                    if(auth()->check()){
                        return view('user.update', ['user' => $user, 'id' => $id]);
                    }else{
                        return redirect()->route('main');
                    }
                }else{
                    return redirect()->route('main');
                }
                
            }else{
                return redirect()->route('main');
            }
        }else{
            return redirect()->route('main');
        }   
    }

    public function edit(Request $request){

        if ($request->isMethod('post')) {
            if($request->get('id') != ""){
                $request->request->remove('_token');
                $id = $request->get('id');

                $needItens = ['nome', 'email', 'role', 'idade', 'saldo'];

                $erros = array();
                $dataUpdate = array();
                foreach($needItens as $key){
                    if($request->get($key) == ""){
                        $erros[] = $key;
                    }
                }
                if( ! count($erros) > 0 ){
                    
                    if($request->get('senha') == null){
                        $request->request->remove('senha');
                    }else{
                        $request->merge(['senha' => password_hash($request->get('senha'), PASSWORD_BCRYPT)]);
                    }

                    Usuario::where('id', $id)->update(request()->all());
                    Storage::append('usuarios/'.date('Y-m').'/'.$id.'/dados.txt', '['.now().'] O usuário '.$request->get('nome').' foi editado com sucesso!  => '.json_encode(request()->all()));
    
                    $response['success'] = true;
                    $response['message'] = "Usuário editado com Sucesso!";
                    $response['data'] = request()->all();
                    echo json_encode($response);
                    return;
                }else{
                    $response['success'] = false;
                    $response['message'] = "Preencha os seguintes campos: ".implode(", ", $erros);
                    $response['data'] = $erros;
                    echo json_encode($response);
                    return;
                }
            }else{
                $response['success'] = false;
                $response['message'] = "ID não encontrado";
                $response['data'] = request()->all();
                echo json_encode($response);
                return;
            }
        }
        $response['success'] = false;
        $response['message'] = "Você deve utilizar POST";
        $response['data'] = request()->all();
        echo json_encode($response);
        return;
        
    }

    public function delete(Request $request){
    

        if ($request->isMethod('post')) {
            if($request->get('id') != ""){
    
                $id = $request->get('id');

                if(auth()->check()){
                    $user = Usuario::find($id);
                    if($user){
                        if($user->status == 1){
                            $user->where('id', $id)->update(['status' => 0]);
                            Storage::append('usuarios/'.date('Y-m').'/'.$id.'/dados.txt', '['.now().'] O usuário '.$request->get('nome').' foi desativado!  => '.json_encode(request()->all()));

                            $response['success'] = true;
                            $response['message'] = "Usuário desativado com sucesso!";
                            $response['data'] = request()->all();
                            echo json_encode($response);
                            return;
                        }else{
                            $response['success'] = false;
                            $response['message'] = "O usuário já foi desativado antes!";
                            $response['data'] = request()->all();
                            echo json_encode($response);
                            return;
                        }

                    }else{
                        $response['success'] = false;
                        $response['message'] = "ID de usuário não encontrado!";
                        $response['data'] = request()->all();
                        echo json_encode($response);
                        return;
                    }
                }else{
                    $response['success'] = false;
                    $response['message'] = "Faça login para realizar essa operação!";
                    $response['data'] = request()->all();
                    echo json_encode($response);
                    return;
                }
            }else{
                $response['success'] = false;
                $response['message'] = "ID de usuário não encontrado!";
                $response['data'] = request()->all();
                echo json_encode($response);
                return;
            }
        }
        $response['success'] = false;
        $response['message'] = "Você deve utilizar POST";
        $response['data'] = request()->all();
        echo json_encode($response);
        return;
    }

    public function view($id){
        if(isset($id)){
            $user = Usuario::find($id);
            if($user){
                if($user->status == 1){
                    
                    return view('user.view', ['user' => $user, 'id' => $id]);
                    
                }else{
                    return redirect()->route('main');
                }
                
            }else{
                return redirect()->route('main');
            }
        }else{
            return redirect()->route('main');
        }   
    }
}


