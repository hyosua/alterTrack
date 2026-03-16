<?php

namespace App\Http\Controllers;

use App\Exports\EntrepriseTemplateExport;
use App\Exports\AlternanceTemplateExport;
use Maatwebsite\Excel\Facades\Excel;

class TemplateController extends Controller
{
    public function downloadEntreprises()
    {
        return Excel::download(new EntrepriseTemplateExport, 'modele-entreprises.xlsx');
    }

    public function downloadAlternances()
    {
        return Excel::download(new AlternanceTemplateExport, 'modele-alternances.xlsx');
    }
}
