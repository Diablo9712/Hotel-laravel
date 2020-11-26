<?php

namespace App\Imports;

use App\Country;
use Maatwebsite\Excel\Concerns\ToModel;

class CsvImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        return new Country([
            'code' => $row[0],
            'name' => (isset($row[1]) ? $row[1] : ''),    
        ]);
    }
}