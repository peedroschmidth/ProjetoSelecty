<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Models\Candidato;
use DB;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidatos = Candidato::paginate(10);
        return view('candidatos.index', compact('candidatos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('candidatos.novo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'telefoneCandidato'                  => 'required_if:emailCandidato,==,NULL',
            'senhaCandidato'                     => 'same:confirmacaoSenhaCandidato'
        ];
        $mensagens = [ 
            'telefoneCandidato.required_if'      => 'Um dos campos de contato deve ser preenchido.',
            'same'                               => 'As senhas não conferem.'
        ];
        $request->validate($regras, $mensagens);

        $candidato = new Candidato();
        $candidato->nome = $request->input('nomeCandidato');
        $candidato->telefone = $request->input('telefoneCandidato');
        $candidato->email = $request->input('emailCandidato');
        $candidato->experiencias = $request->input('experienciasCandidato');
        $candidato->formacoes = $request->input('formacoesCandidato');
        $candidato->usuario = $request->input('usuarioCandidato');
        $candidato->senha = $request->input('senhaCandidato');
        $candidato->confirmacaoSenha = $request->input('confirmacaoSenhaCandidato');
        $candidato->save();

        return redirect ('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $candidato = Candidato::find($id)->first();
        if(isset($candidato)){
            return view('candidatos.editar', compact('candidato'));
        } else return redirect('/');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $regras = [
            'telefoneCandidato'                  => 'required_if:emailCandidato,==,NULL',
            'senhaCandidato'                     => 'same:confirmacaoSenhaCandidato'
        ];
        $mensagens = [ 
            'telefoneCandidato.required_if'      => 'Um dos campos de contato deve ser preenchido.',
            'same'                               => 'As senhas não conferem.'
        ];
        
        $request->validate($regras, $mensagens);
        
        $candidato = Candidato::find($id);

        if(isset($candidato)){
            $candidato->nome = $request->input('nomeCandidato');
            $candidato->telefone = $request->input('telefoneCandidato');
            $candidato->email = $request->input('emailCandidato');
            $candidato->experiencias = $request->input('experienciasCandidato');
            $candidato->formacoes = $request->input('formacoesCandidato');
            $candidato->usuario = $request->input('usuarioCandidato');
            $candidato->senha = $request->input('senhaCandidato');
            $candidato->confirmacaoSenha = $request->input('confirmacaoSenhaCandidato');
            $candidato->save();
        }
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candidato = Candidato::find($id);
        if (isset($candidato)){
            $candidato->delete();
        }
        return redirect('/');
    }
}
