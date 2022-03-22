@extends('layouts.main')

@section('title', 'Index')

@section('content')

@extends('layouts.nav')
<div class="card adm">
    <h5 class="card-title">Usuários cadastrados no Sistema</h5>

    <div class="card-body">
        <div class="btn-group pesquisa-externo" role="group" aria-label="Basic mixed styles example">
            <div class="btn-group pesquisa-interno">
                <buttom class="btn btn-success pesquisa-btn">
                    <ion-icon name="search"></ion-icon>
                </buttom>
                <input type="text" class="form-control pesquisa" placeholder="Nome" aria-label="Nome" aria-describedby="Nome">
            </div>
            <div class="btn-group pesquisa-interno">

                <buttom class="btn btn-success pesquisa-btn">
                    <ion-icon name="search"></ion-icon>
                </buttom>
                <input type="text" class="form-control pesquisa" placeholder="Sexo" aria-label="Nome" aria-describedby="Nome">
            </div>
            <div class="btn-group pesquisa-interno">

                <buttom class="btn btn-success pesquisa-btn">
                    <ion-icon name="search"></ion-icon>
                </buttom>
                <input type="text" class="form-control pesquisa" placeholder="Nome" aria-label="Nome" aria-describedby="Nome">
            </div>
            <div class="btn-group pesquisa-interno">

                <buttom class="btn btn-success pesquisa-btn">
                    <ion-icon name="search"></ion-icon>
                </buttom>
                <input type="text" class="form-control pesquisa" placeholder="Estado" aria-label="Nome" aria-describedby="Nome">
            </div>
            <div class="btn-group pesquisa-interno">

                <buttom class="btn btn-success pesquisa-btn">
                    <ion-icon name="search"></ion-icon>
                </buttom>
                <input type="text" class="form-control pesquisa" placeholder="Data de Cadastro" aria-label="Nome" aria-describedby="Nome">
            </div>
        </div>


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
                            <a href="" class="btn btn-warning">
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