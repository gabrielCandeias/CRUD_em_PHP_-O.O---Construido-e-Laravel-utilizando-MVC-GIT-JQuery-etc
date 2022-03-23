<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Estado;
use App\Models\Cidade;

class SystemController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function adiministracao()
    {

        $users = User::All();
        $user_logado = auth()->user();

        return view('auth.adiministracao', ['users' => $users, 'user_logado' => $user_logado]);
    }

    public function show(){
        
    }

    public function destroy($id)
    {

        User::findOrFail($id)->delete();

        return redirect('/auth/adiministracao')->with(['msg', "Registro excluído com sucesso !"]);
    }

    public function edit($id)
    {

        $user = User::findOrFail($id);
        $estados = Estado::All();
        $cidades = Cidade::All();

        return view('auth.edit', ['user' => $user, 'estados' => $estados, 'cidades' => $cidades]);
    }

    public function edituser()
    {
        $users = auth()->user();
        $user = User::findOrFail($users->id);
        $estados = Estado::All();
        $cidades = Cidade::All();

        return view('auth.edituser', ['user' => $user, 'estados' => $estados, 'cidades' => $cidades]);
    }

    public function update(Request $request)
    {

        User::findOrFail($request->id)->update($request->all());


        return redirect('/auth/adiministracao')->with(['msg', "Usuario editado com sucesso !"]);
    }

    public function updateuser(Request $request)
    {
        $users = auth()->user();
        if ($request->id == $users->id) {
            User::findOrFail($request->id)->update($request->all());
            return redirect('/')->with(['msg', "Usuario editado com sucesso !"]);
        } else {
            return redirect('/')->with(['msg', "Usuario Incorreto !"]);
        }
    }
}
