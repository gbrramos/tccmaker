<?php

namespace RW940cms\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use RW940cms\Models\Reserva;

class ReservasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Reserva::all();
    }
}
