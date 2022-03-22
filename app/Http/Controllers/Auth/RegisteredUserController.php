<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\Estado;
use App\Models\Cidade;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $estados = Estado::All();
        $cidades = Cidade::All();
       
        return view('auth.register', ['estados' => $estados,'cidades' => $cidades]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'cpf'       => 'required|string|unique:users|min:14|max:14',
            'rg'        => 'required|string|unique:users|min:12|max:12',
            'data_nascimento' => 'required|date',
            'sexo'      => 'required|in:M,F,ND',
            'cep'       => 'required|string|min:10|max:10',
            'endereco'  => 'required|string|max:255',
            'numero'    => 'required|string|max:50',
            'bairro'    => 'required|string|max:255',
            'complemento' => 'max:255',
            'cidade_id'    => 'required|numeric|max:5',
            'telefone'  => 'required|string|min:14|max:15',
            'celular'   => 'required|string|min:14|max:15',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cpf' => $request->cpf,
            'rg' => $request->rg,
            'data_nascimento' => $request->data_nascimento,
            'sexo' => $request->sexo,
            'cep' => $request->cep,
            'endereco' => $request->endereco,
            'numero' => $request->numero,
            'bairro' => $request->bairro,
            'complemento' => $request->complemento,
            'cidade_id' => $request->cidade_id,
            'telefone' => $request->telefone,
            'celular' => $request->celular,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    
}
