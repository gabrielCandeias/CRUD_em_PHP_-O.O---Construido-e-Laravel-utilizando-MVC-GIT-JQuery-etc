@extends('layouts.main')

@section('title', 'Editando' . $user->name)

@section('content')

@extends('layouts.nav')

<div class="card adm">
    <h5 class="card-title">
        <ion-icon name="person"></ion-icon> Alteração de Usuario : {{$user->name}}
    </h5>

    <div class="card-body">
        <form action="/auth/adiministracao/update/{{$user->id}}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" required>
                </div>
                <div class="col">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" value="{{$user->email}}" required class="form-control" id="email">
                </div>
            </div>
            <!--  <div class="row">
                <div class="col">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="password" type="password" name="password" required autocomplete="new-password">
                </div>
                <div class="col">
                    <label for="password_confirmation" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                </div>
            </div> 
            -->
            <div class="row">
                <div class="col">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" value="{{$user->cpf}}" onkeypress="$(this).mask('000.000.000-00');" required>
                </div>
                <div class="col">
                    <label for="rg" class="form-label">RG</label>
                    <input type="text" class="form-control" id="rg" name="rg" value="{{$user->rg}}" onkeypress="$(this).mask('00.000.000-0');" required>
                </div>
                <div class="col">
                    <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="{{$user->data_nascimento}}" required>
                </div>
                <div class="col">
                    <label for="sexo" class="form-label">Sexo</label>
                    <select class="form-select" aria-label="Default select example" name="sexo" id="sexo">

                        <option value="ND" @if (($user->sexo) =="ND" ) {{ 'selected' }} @endif>Prefiro Não Declarar</option>
                        <option value="M" @if (($user->sexo) =="M" ) {{ 'selected' }} @endif>Masculino</option>
                        <option value="F" @if (($user->sexo) =="F" ) {{ 'selected' }} @endif>Feminino</option>

                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="cep" class="form-label">CEP</label>
                    <input type="text" class="form-control" id="cep" name="cep" : value="{{$user->cep}}" onkeypress="$(this).mask('00.000-000')" required />
                </div>
                <div class="col">
                    <label for="endereco" class="form-label">Endereco</label>
                    <input type="text" class="form-control" id="endereco" name="endereco" value="{{$user->endereco}}" required />
                </div>
                <div class="col">
                    <label for="numero" class="form-label">Número</label>
                    <input type="number" class="form-control" id="numero" name="numero" value="{{$user->numero}}" required />
                </div>
                <div class="col">
                    <label for="bairro" class="form-label">Bairro</label>
                    <input type="text" class="form-control" id="bairro" name="bairro" value="{{$user->bairro}}" required />
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="complemento" class="form-label">Complemento</label>
                    <input type="text" class="form-control" id="complemento" name="complemento" value="{{$user->complemento}}" />
                </div>
                <div class="col">
                    <label for="estado" class="form-label">Estado</label>
                    <select class="form-select block mt-1 w-full" aria-label="Default select example" name="estado" id="estado">
                        @foreach($estados as $estado)
                        <option value="{{$estado->id}}" @if (($user->cidade) =="{{$estado->id}}" ) {{ 'selected' }} @endif> {{$estado->nome}} </option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <label for="cidade_id" class="form-label">Cidade</label>
                     <select class="form-select block mt-1 w-full" aria-label="Default select example" name="cidade_id" id="cidade_id">
                        @foreach($cidades as $cidade)
                        <option value="{{$cidade->id}}" @if (($user->cidade)=="{{$cidade->id}}" ) {{ 'selected' }} @endif>{{$cidade->nome}}</option>
                        @endforeach
                        </select>
                </div>

            </div>
            <div class="row">
                <div class="col">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="tel" class="form-control" id="telefone" name="telefone" value="{{$user->telefone}}" onkeypress="$(this).mask('(00) 0000-00009')" required />
                </div>
                <div class="col">
                    <label for="celular" class="form-label">Celular</label>
                    <input type="tel" class="form-control" id="celular" name="celular" value="{{$user->celular}}" onkeypress="$(this).mask('(00) 0000-00009')" required />
                </div>

            </div>
            <a href="/auth/adiministracao" class="btn btn-primary">Voltar</a>
            <input type="submit" class="btn btn-dark" value="Salvar">
        </form>
    </div>
</div>
@endsection