<?php

namespace App\Imports;

use App\Models\Alternance;
use App\Models\Entreprise;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class AlternanceImport implements ToModel, WithHeadingRow, WithValidation
{
    public function model(array $row)
    {
        $entreprise = Entreprise::firstOrCreate(
            ['nom' => $row['nom_entreprise']],
            [
                'domaine'     => $row['domaine'] ?? null,
                'code_postal' => $row['code_postal'] ?? null,
                'contact'     => $row['contact'] ?? null,
                'email'       => $row['email'] ?? null,
                'tel'         => $row['tel'] ?? null,
                'siteweb'     => $row['siteweb'] ?? null,
            ]
        );

        return new Alternance([
            'entreprise_id'   => $entreprise->id,
            'nom_etudiant'    => $row['nom_etudiant'],
            'prenom_etudiant' => $row['prenom_etudiant'],
            'type'            => strtolower($row['type']),
            'mois_annee'      => is_numeric($row['mois_annee'])
                ? Date::excelToDateTimeObject($row['mois_annee'])->format('m/Y')
                : $row['mois_annee'],
            'duree'           => $row['duree'],
            'descriptif'      => $row['descriptif'] ?? '',
            'prof_referent'   => $row['prof_referent'] ?? '',
            'qualite_travail' => $row['qualite_travail'] ?? '',
            'technos'         => $row['technos'] ?? '',
        ]);
    }

    public function rules(): array
    {
        return [
            'nom_entreprise'  => 'required|string|max:255',
            'nom_etudiant'    => 'required|string|max:255',
            'prenom_etudiant' => 'required|string|max:255',
            'type'            => 'required|string',
            'duree'           => 'required',
            'technos'         => 'nullable|string|max:500',
        ];
    }

    public function prepareForValidation(array $data, int $index): array
    {
        return array_map(
            fn($value) => is_string($value) ? strip_tags(trim($value)) : $value,
            $data
        );
    }
}
