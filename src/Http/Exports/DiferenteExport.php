<?php

namespace Botble\IncasariConnector\Http\Exports;

use Botble\IncasariConnector\Http\Models\Mapper;
use Maatwebsite\Excel\Concerns\FromCollection;

class DiferenteExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Mapper::all();
    }
}
