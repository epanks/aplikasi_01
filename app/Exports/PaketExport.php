<?php

namespace App\Exports;

use App\Paket;

use Maatwebsite\Excel\Concerns\FromCollection;

class PaketExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Paket::all();
    }
}
