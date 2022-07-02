<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    /** @test */
    public function CadastroCorreto()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/candidatos/novo')
            ->type('nomeCandidato','Pedro')
            ->type('telefoneCandidato','(51)97654-2021')
            ->type('emailCandidato','pedro@gmail.com')
            ->type('experienciasCandidato','Desenvolvedor Full Stack')
            ->type('formacoesCandidato','Ciência da Computação')
            ->type('usuarioCandidato','pedro.schmidt')
            ->type('senhaCandidato','1234')
            ->type('confirmacaoSenhaCandidato','1234')
            ->press('Salvar')
            ->assertPathIs('/');
        });
    }
    /** @test */
    public function CadastroIncorreto()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/candidatos/novo')
            ->type('nomeCandidato','Pedro')
            ->type('telefoneCandidato','')
            ->type('emailCandidato','')
            ->type('experienciasCandidato','Suporte Técnico')
            ->type('formacoesCandidato','Ciência da Computação')
            ->type('usuarioCandidato','pedro.schmidt')
            ->type('senhaCandidato','1234')
            ->type('confirmacaoSenhaCandidato','1234')
            ->press('Salvar')
            ->assertSee('Um dos campos de contato deve ser preenchido.');
        });
    }
    /** @test */
    public function SenhaIncorreta()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/candidatos/novo')
            ->type('nomeCandidato','Pedro')
            ->type('telefoneCandidato','(51)97654-2021')
            ->type('emailCandidato','pedro@gmail.com')
            ->type('experienciasCandidato','Suporte Técnico')
            ->type('formacoesCandidato','Ciência da Computação')
            ->type('usuarioCandidato','pedro.schmidt')
            ->type('senhaCandidato','1234')
            ->type('confirmacaoSenhaCandidato','12345')
            ->press('Salvar')
            ->assertSee('As senhas não conferem.');
        });
    }
}