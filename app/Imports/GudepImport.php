<?php

namespace App\Imports;

use App\Models\Gudep;
use Maatwebsite\Excel\Concerns\ToModel;

class GudepImport implements ToModel
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //dd($row[0]);
        return new Gudep([
            'no_gudep'              => $row[0],
            'nama_gudep'            => $row[1],
            'kwaran_id'             => $row[2],
            'kategori_pendidikan_id'=> $row[3],
            'kode_kwaran'           => $row[4],
            'kode_putra'            => $row[5],
            'kode_putri'            => $row[6],
            'alamat'                => $row[7],
            
        ]);
    }
}
