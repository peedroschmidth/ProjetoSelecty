@extends('layouts.app')

@section('body')
@if (session('alert'))
    <div class="alert alert-danger">
        {{ session('alert') }}
    </div>
@endif

<h2>Lista de Candidatos<h2>
<div class="card border">
    <div class="card-body">
    <a href="/candidatos/novo" class="btn btn-sm btn-primary" role="button">Novo Candidato</a>

@if(count($candidatos) > 0)
        <table class="table table-ordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>E-mail</th>
                    <th>Experiência</th>
                    <th>Formação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
    @foreach($candidatos as $c)
                <tr>
                    <td>{{$c->id}}</td>
                    <td>{{$c->nome}}</td>
                    <td>{{$c->telefone}}</td>
                    <td>{{$c->email}}</td>
                    <td>{{$c->experiencias}}</td>
                    <td>{{$c->formacoes}}</td>
                    <td>
                        <a href="/candidatos/editar/{{$c->id}}" class="btn btn-sm btn-primary">Editar</a>
                        <a href="/candidatos/apagar/{{$c->id}}" class="btn btn-sm btn-danger">Apagar</a>
                    </td>
                </tr>
    @endforeach                
            </tbody>
        </table>
@else
    <h4>Você não possui candidatos cadastrados, comece cadastrando um!</h4> 
@endif

</div>
</div>
@endsection