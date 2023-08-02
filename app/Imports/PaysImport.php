<?php

namespace App\Imports;

use App\Models\Pays;
use Maatwebsite\Excel\Concerns\ToModel;

class PaysImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pays([
        'name'=>$row[1],
        'capital'=>$row[2]
        ]);
    }
}
