<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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

        return view('auth.adiministracao', ['users' => $users , 'user_logado' =>$user_logado]);
    }

    public function destroy($id)
    {

        User::findOrFail($id)->delete();

        return redirect('auth/adiministracao')->with(['msg', "Registro excluído com sucesso !"]);
    }
}
