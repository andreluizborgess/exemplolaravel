<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TarefaIntegracaoTest extends TestCase
{
    /**
     * A basic feature test example.
     */


    use RefreshDatabase;
    public function test_criar_tarefa_por_meio_da_api()
    {
        $response = $this->postJson('/api/tarefas', [
            'titulo' => 'Nova tarefa',
            'descricao' => 'Descrição da Nova tarefa',
            'concluida' => false,
        ]);
        $response->assertStatus(201)
            ->assertJson([
                'titulo' => 'Nova tarefa',
                'descricao' => 'Descrição da Nova tarefa',
                'concluida' => false,
            ]);
    }
    public function test_criar_tarefa_validar_required()
    {
        $response = $this->postJson('api/tarefas', [
            'descricao' => 'Descrição da Nova tarefa',
            'concluida' => false,
        ]);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['titulo']);
    }
}
