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
<h1>Novo Candidato</h1>
<div class="card border">
    <div class="card-body">
        <form action="/candidatos" method="POST">
            @csrf
            <div class="jumbotron bg-light border border-secondary">
                <label for="nomeCandidato">Nome</label>
                <input type="text" class="form-control" name="nomeCandidato" id="nomeCandidato" placeholder="João da Silva" required>
                <label for="telefoneCandidato">Telefone</label>
                <input type="text" class="form-control" name="telefoneCandidato" id="telefoneCandidato" placeholder="(00)98765-4321">
                <label for="emailCandidato">E-mail</label>
                <input type="text" class="form-control" name="emailCandidato" id="emailCandidato" placeholder="joao@gmail.com">
            </div>
            <div class="jumbotron bg-light border border-secondary">
                <label for="experienciasCandidato">Experiências Profissionais</label>
                <input type="text" class="form-control" name="experienciasCandidato" id="experienciasCandidato" placeholder="Analista de Sistemas, Testador de Software.">
                <label for="formacoesCandidato">Formações Acadêmicas</label>
                <input type="text" class="form-control" name="formacoesCandidato" id="formacoesCandidato" placeholder="Sistemas de Informação, Desenvolvimento Full Stack.">
            </div>
            <div  class="jumbotron bg-light border border-secondary">
                <label for="usuarioCandidato">Usuário</label>
                <input type="text" class="form-control" name="usuarioCandidato" id="usuarioCandidato" placeholder="Joao.Silva123" required>
                <label for="senhaCandidato">Senha</label>
                <input type="password" class="form-control" name="senhaCandidato" id="senhaCandidato" required>
                <label for="confirmacaoSenhaCandidato">Confirmação de Senha</label>
                <input type="password" class="form-control" name="confirmacaoSenhaCandidato" id="confirmacaoSenhaCandidato" required>                
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <a class="btn btn-danger btn-sm" href="/">Cancelar</a>
        </form>
    </div>
</div>

@endsection