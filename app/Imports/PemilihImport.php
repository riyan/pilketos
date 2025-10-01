<?php

namespace App\Imports;

use App\Models\Pemilih;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class PemilihImport implements ToModel, WithHeadingRow, WithUpserts
{
    public function model(array $row)
    {
        return new Pemilih([
            'nipd' => $row['nipd'],
            'nisn' => $row['nisn'],
            'nama' => $row['nama'],
            'jk' => $row['jk'],
            'tmpt_lahir' => $row['tmpt_lahir'],
            'tgl_lahir' => $row['tgl_lahir'],
            'agama' => $row['agama'],
            'rombel' => $row['rombel'],
            'passcode' => $row['passcode'],
        ]);
    }

    public function uniqueBy()
    {
        return 'nisn';
    }
}
