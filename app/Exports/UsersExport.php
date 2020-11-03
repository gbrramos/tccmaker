<?php

namespace RW940cms\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use RW940cms\User;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }
}
