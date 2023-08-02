<?php

namespace App\Exports;

use App\Models\Pays;
use Maatwebsite\Excel\Concerns\FromCollection;

class PaysExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pays::all();
    }
}
