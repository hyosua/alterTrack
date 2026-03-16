<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class EntrepriseTemplateExport implements FromArray, WithHeadings, WithStyles, WithColumnWidths
{
    public function headings(): array
    {
        return [
            'nom_entreprise',
            'domaine',
            'code_postal',
            'contact',
            'email',
            'tel',
            'siteweb',
        ];
    }

    public function array(): array
    {
        return [
            [
                'Capgemini',
                'Informatique',
                '75008',
                'Jean Martin',
                'j.martin@capgemini.com',
                '0102030405',
                'https://capgemini.com',
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
            'B' => 20,
            'C' => 14,
            'D' => 20,
            'E' => 30,
            'F' => 15,
            'G' => 35,
        ];
    }
}
