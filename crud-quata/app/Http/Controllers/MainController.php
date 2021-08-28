<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Http\Controllers\Auth;

class MainController extends Controller
{
    public function index(){

        $data = Usuario::all();

        return view('main', ['usuarios' => $data]);

    }

    public function add(){

        return view('user.add');
    }

    public function edit(){
        
        
        return view('user.update');
        

    }

    public function view(){
        
        return view('user.view');
    }
    
}
