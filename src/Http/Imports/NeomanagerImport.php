<?php


namespace Botble\IncasariConnector\Http\Imports;

use Botble\IncasariConnector\Http\Models\Neomanager;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class NeomanagerImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Neomanager([
            'id_comanda'        =>$row[6],
            'nume_client'     =>$row[1],
            'suma' =>$row[8]
        ]);
    }
}
