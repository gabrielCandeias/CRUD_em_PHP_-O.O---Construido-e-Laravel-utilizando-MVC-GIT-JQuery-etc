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

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
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
            'cpf'       => 'required|numeric|unique:users',
            'rg'        => 'required|numeric|unique:users',
            'data_nascimento' => 'required|date',
            'sexo'      => 'required|in:M,F,ND',
            'cep'       => 'required|string|max:20',
            'endereco'  => 'required|string|max:255',
            'numero'    => 'required|string|max:50',
            'bairro'    => 'required|string|max:255',
            'complemento' => 'string|max:255',
            'estado'    => 'required|string|max:255',
            'cidade'    => 'required|string|max:255',
            'telefone'  => 'required|string|max:50',
            'celular'   => 'required|string|max:50',
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
            'estado' => $request->estado,
            'cidade' => $request->cidade,
            'telefone' => $request->telefone,
            'celular' => $request->celular,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}