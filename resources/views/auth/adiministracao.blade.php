@extends('layouts.main')

@section('title', 'Index')

@section('content')

@extends('layouts.nav')
<div class="card adm">
    <h5 class="card-title">Usuários cadastrados no Sistema </h5>

    <div class="card-body">
        <form action="/auth/adiministracao" method="GET" class="btn-group search">


            <button class="btn btn-success btn-search" type="submit" name="search" value="O">
                <ion-icon name="search"></ion-icon>
            </button>



            <input type="text" class="form-control nome-search" placeholder="Nome" name="search_nome" aria-label="Nome" value="{{$search_nome}}" aria-describedby="Nome">

            <select class="form-select sexo-search" aria-label="sexo" name="search_sexo">
                <option selected value="">Sexo</option>
                <option value="ND" @if ($search_sexo == "ND" ) {{ 'selected' }} @endif>Prefiro não Declarar</option>
                <option value="F"  @if ($search_sexo == "F" ) {{ 'selected' }} @endif>Feminino</option>
                <option value="M"  @if ($search_sexo == "M" ) {{ 'selected' }} @endif>Masculino</option>
            </select>

            <input type="text" class="form-control estado-search" placeholder="Estado"  name="search_estado" value="{{$search_estado}}">

            <input type="date" class="form-control data-search" placeholder="Data de Cadastro" name="search_data" value="{{$search_data}}">

            <a href="/auth/adiministracao" class="btn btn-danger btn-search2 ">X</a>
        </form>


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">RG</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Celular</th>
                    <th scope="col">CEP</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Situação</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->rg}}</td>
                    <td>{{$user->cpf}}</td>
                    <td>{{$user->telefone}}</td>
                    <td>{{$user->celular}}</td>
                    <td>{{$user->cep}}</td>
                    <td>{{$user->endereco}}</td>
                    <td>{{$user->status}}</td>
                    <td class="btn-group">

                        <div class="btn-change">
                            <a href="/auth/adiministracao/edit/{{$user->id}}" class="btn btn-warning">
                                <ion-icon name="create-outline"></ion-icon>
                            </a>
                        </div>
                        @if($user->id != $user_logado->id)
                        <form action="/auth/adiministracao/{{$user->id}}" method="POST" onsubmit="return confirm('Deseja mesmo excluir esse registro?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">
                                <ion-icon name="trash"></ion-icon>
                            </button>
                        </form>
                        @endif

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection