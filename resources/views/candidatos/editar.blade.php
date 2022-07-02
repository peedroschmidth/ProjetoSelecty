@extends('layouts.app')

@section('body')
@if($errors->any())
<div class="card-footer">
    @foreach($errors->all() as $e)
        <div class="alert alert-danger" role="alert">
            {{$e}}
        </div>
    @endforeach
</div>
@endif
<h1>Editar Candidato</h1>
<div class="card border">
    <div class="card-body">
        <form action="/candidatos/{{$candidato->id}}" method="POST">
            @csrf
            <div class="jumbotron bg-light border border-secondary">
                <label for="nomeCandidato">Nome</label>
                <input type="text" class="form-control" name="nomeCandidato" id="nomeCandidato" placeholder="João da Silva" value='{{$candidato->nome}}' required>
                <label for="telefoneCandidato">Telefone</label>
                <input type="text" class="form-control" name="telefoneCandidato" id="telefoneCandidato" placeholder="(00)98765-4321" value='{{$candidato->telefone}}'>
                <label for="emailCandidato">E-mail</label>
                <input type="text" class="form-control" name="emailCandidato" id="emailCandidato" placeholder="joao@gmail.com" value='{{$candidato->email}}'>
            </div>
            <div class="jumbotron bg-light border border-secondary">
                <label for="experienciasCandidato">Experiências Profissionais</label>
                <input type="text" class="form-control" name="experienciasCandidato" id="experienciasCandidato" placeholder="Analista de Sistemas, Testador de Software." value='{{$candidato->experiencias}}'>
                <label for="formacoesCandidato">Formações Acadêmicas</label>
                <input type="text" class="form-control" name="formacoesCandidato" id="formacoesCandidato" placeholder="Sistemas de Informação, Desenvolvimento Full Stack." value='{{$candidato->formacoes}}'>
            </div>
            <div  class="jumbotron bg-light border border-secondary">
                <label for="usuarioCandidato">Usuário</label>
                <input type="text" class="form-control" name="usuarioCandidato" id="usuarioCandidato" placeholder="Joao.Silva123" value='{{$candidato->usuario}}' required>
                <label for="senhaCandidato">Senha</label>
                <input type="password" class="form-control" name="senhaCandidato" id="senhaCandidato" value='{{$candidato->senha}}' required>
                <label for="confirmacaoSenhaCandidato">Confirmação de Senha</label>
                <input type="password" class="form-control" name="confirmacaoSenhaCandidato" id="confirmacaoSenhaCandidato" value='{{$candidato->confirmacaoSenha}}' required>                
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <a class="btn btn-danger btn-sm" href="/">Cancelar</a>
        </form>
    </div>
</div>

@endsection