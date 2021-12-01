<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'usuario' => 'required',
            'senha' => 'required'
        ]);
        
        $component = User::select('*')->where(['email' => $request->email])->get();
        if($component[0]->email == $request->email){
            session()->flash('email_existente', 'O email ja está cadastrado');
            return redirect()->route('register');
        }

        User::insert([
            'email' => $request->email,
            'name' => $request->usuario,
            'password' => $request->senha
        ]);
        session()->flash('cadastrado', 'Usuário cadastrado com sucesso');
        return redirect()->route('home');
    }
}