<?php

namespace App\Imports;

use App\Models\Alternance;
use App\Models\Entreprise;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EntrepriseImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (empty($row['nom_entreprise'])) {
            return null;
        }
        return Entreprise::firstOrCreate(
            ['nom' => $row['nom_entreprise']],
            [
                'domaine' => $row['domaine'],
                'code_postal' => $row['code_postal'],
                'contact' => $row['contact'],
                'email' => $row['email'],
                'tel' => $row['tel'],
                'siteweb' => $row['siteweb'],
            ]
        );
    }
}