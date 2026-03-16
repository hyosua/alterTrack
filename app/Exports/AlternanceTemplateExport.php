<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AlternanceTemplateExport implements FromArray, WithHeadings, WithStyles, WithColumnWidths
{
    public function headings(): array
    {
        return [
            'nom_entreprise',
            'nom_etudiant',
            'prenom_etudiant',
            'type',
            'mois_annee',
            'duree',
            'descriptif',
            'prof_referent',
            'qualite_travail',
            'technos',
        ];
    }

    public function array(): array
    {
        return [
            [
                'Capgemini',
                'Martin',
                'Lucas',
                'alternance',
                '09/2024',
                '12',
                'Développement d\'une application web en Laravel',
                'M. Dupont',
                'Excellent',
                'PHP,Laravel,Vue.js',
            ],
        ];
    }

    public function styles(Worksheet $sheet): array
    {
        return [
            1 => [
                'font' => ['bold' => true, 'color' => ['argb' => 'FFFFFFFF']],
                'fill' => ['fillType' => 'solid', 'startColor' => ['argb' => 'FF4F46E5']],
            ],
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 25,
            'B' => 18,
            'C' => 18,
            'D' => 12,
            'E' => 14,
            'F' => 10,
            'G' => 40,
            'H' => 20,
            'I' => 20,
            'J' => 30,
        ];
    }
}
