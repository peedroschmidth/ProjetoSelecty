<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TesteCadastro extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function Validacao_Forumlario_Contato_Correto()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/cadastro/novo')
            ->type('nomeCandidato','Pedro');
            ->type('telefoneCandidato','(51)97654-2021');
            ->type('emailCandidato','pedro@gmail.com');
            ->type('experienciasCandidato','Desenvolvedor Full Stack');
            ->type('formacoesCandidato','Ciência da Computação');
            ->type('usuarioCandidato','pedro.schmidt');
            ->type('senhaCandidato','1234');
            ->type('confirmacaoSenhaCandidato','1234');
            ->press('Salvar')
            ->assertPathIs('/');
        });
    }
    public function Validacao_Forumlario_Contato_Incorreto()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/cadastro/novo')
            ->type('nomeCandidato','Pedro');
            ->type('telefoneCandidato','(51)97654-2021');
            ->type('emailCandidato','');
            ->type('experienciasCandidato','Suporte Técnico');
            ->type('formacoesCandidato','Ciência da Computação');
            ->type('usuarioCandidato','pedro.schmidt');
            ->type('senhaCandidato','1234');
            ->type('confirmacaoSenhaCandidato','1234');
            ->press('Salvar')
            ->assertSee('Um dos campos de contato deve ser preenchido.');
        });
    }
    public function Validacao_Forumlario_Senha_Incorreta()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/cadastro/novo')
            ->type('nomeCandidato','Pedro');
            ->type('telefoneCandidato','(51)97654-2021');
            ->type('emailCandidato','pedro@gmail.com');
            ->type('experienciasCandidato','Suporte Técnico');
            ->type('formacoesCandidato','Ciência da Computação');
            ->type('usuarioCandidato','pedro.schmidt');
            ->type('senhaCandidato','1234');
            ->type('confirmacaoSenhaCandidato','12345');
            ->press('Salvar')
            ->assertSee('Um dos campos de contato deve ser preenchido.');
        });
    }
}