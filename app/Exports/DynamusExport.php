<?php

namespace RW940cms\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use RW940cms\Models\Dynamus;

use Maatwebsite\Excel\Concerns\WithHeadings;

class DynamusExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
       public function headings(): array{
        return [
        '#',
        'nome',
        'cpf',
        'telefone',
        'telefone_recado',
        'email',
        'data_nascimento',
        'posicao_1',
        'posicao_2',
        'tamanho_uniforme',
      
        'endereco',
        'indicacao',
        'sugestoes_criticas',
        'status_inscricao',
        'id_time'
        ];
    }
    
    public function collection()
    {
        $inscritos = Dynamus::all();

        foreach ($inscritos as $key => $value) {
        	$value->status_inscricao = $value->status->titulo_pagamento;
        }
        return $inscritos;
    }
}
