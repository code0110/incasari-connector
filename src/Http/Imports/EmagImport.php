<?php

namespace Botble\IncasariConnector\Http\Imports;

use Botble\IncasariConnector\Http\Models\Emag;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class EmagImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {       
        return new Emag([
            'id_comanda'        =>$row[8],
            'nume_client'     =>$row[11],
            'suma' =>$row[16]
        ]);
    }
}
