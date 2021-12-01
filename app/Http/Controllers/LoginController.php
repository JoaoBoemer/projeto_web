<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        if (isset($request->usuario) and isset($request->senha)) {
            $nome = $request->usuario;
            $password = $request->senha;
            $component = User::select('*')->where(['name' => $request->usuario, 'password' => $request->senha])->get();
            foreach ($component as $object) {
                if ($password == $object->password and $nome == $object->name) {
                    return redirect()->route('main')->with('success', 'Usuario conectado');
                }
            }
        } else {
            session()->flash('sem_usuario_senha', 'Usuario/senha obrigatórios.');
            return redirect()->route('home')->with('message', 'Usuario/senha obrigatorios');
        }
        session()->flash('usuario_nao_encontrado', 'Usuario/senha incorretos.');
        return redirect()->route('home')->with('message', 'Usuario/senha obrigatorios');
    }
}
