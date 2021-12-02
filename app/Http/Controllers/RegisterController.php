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
        $email = User::select('email')->where(['email' => $request->email])->first();
        $user = User::select('name')->where(['name' => $request->usuario])->first();
        if($user <> null){
            if ($user->name == $request->usuario) {
                session()->flash('usuario_existente', 'O usuario ja esta cadastrado');
                return redirect()->route('home');
            }
        }
        if($email <> null){
            if ($email->email == $request->email) {
                session()->flash('email_existente', 'O email ja está cadastrado');
                return redirect()->route('home');
            }
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
