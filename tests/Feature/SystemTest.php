<?php

namespace Tests\Feature;

use App\Models\Tarefa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SystemTest extends TestCase
{
    public function test_full_tarefa_crud(){
//criar uma tarefa
$tarefa = Tarefa ::create([
    'titulo' => 'Nova Tarefa',
    'descricao' => 'Tarefa de Teste',
    'concluida' => false,
]);
$this->assertDatabaseHas('Tarefas',[
    'titulo' =>'Nova Tarefa'
]);
//read
 $tarefaRecuperada = Tarefa::find($tarefa->id);
 $this->assertEquals('Nova Tarefa', $tarefaRecuperada->titulo);
 $this->assertEquals('Tarefa de Teste', $tarefaRecuperada->descricao);

 //update
 $tarefaRecuperada->update(['titulo'=> 'Tarefa Atualizada']);
 $this->assertEquals('Tarefa Atualizada', $tarefaRecuperada->titulo);

 //delete 
 $tarefaRecuperada->delete();
 $this->assertDatabaseMissing('tarefas',['id'=> $tarefaRecuperada->id]);
    }
    
}

