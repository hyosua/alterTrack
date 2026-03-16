<?php

namespace App\Imports;

use App\Models\Entreprise;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

class EntrepriseImport implements ToModel, WithHeadingRow, SkipsEmptyRows
{
    public function model(array $row)
    {
        if (empty($row['nom_entreprise'])) {
            return null;
        }

        $nom = strip_tags(trim($row['nom_entreprise']));

        return Entreprise::firstOrCreate(
            ['nom' => $nom],
            [
                'domaine'     => isset($row['domaine']) ? strip_tags(trim($row['domaine'])) : null,
                'code_postal' => isset($row['code_postal']) ? strip_tags(trim((string) $row['code_postal'])) : null,
                'contact'     => isset($row['contact']) ? strip_tags(trim($row['contact'])) : null,
                'email'       => isset($row['email']) ? strip_tags(trim($row['email'])) : null,
                'tel'         => isset($row['tel']) ? strip_tags(trim((string) $row['tel'])) : null,
                'siteweb'     => isset($row['siteweb']) ? strip_tags(trim($row['siteweb'])) : null,
            ]
        );
    }
}
