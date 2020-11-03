<?php

namespace RW940cms\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use RW940cms\Models\Dizimistas;

class DizimistasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings(): array
    {
        return [
        '#',
        'nome',
        'cpf',
        'telefone',
        'email',
        'data_nascimento',
        'endereco',
        'codigo_carteirinha',
        'valor',
        'observacao'
        ];
    }
    public function collection()
    {
        return Dizimistas::all();
    }
}
