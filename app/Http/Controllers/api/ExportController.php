<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Visitor;
use Barryvdh\DomPDF\Facade\Pdf;
use function view;

//use Barryvdh\DomPDF\PDF;

class ExportController extends Controller
{
    public function index()
    {
        $user = User::all();

        return view('export.index' , compact('user'));
    }

    public function show($id)
    {
        $user = Visitor::find($id);

        return view('export.index' , compact('user'));
    }

    /**
     * Download pdf.
     *
     * @return \Illuminate\Http\Response
     */

    public function downloadPdf($id)
    {
        $user = User::find($id);

        view()->share('export.index',$user);

        $pdf = PDF::loadView('export.index',['user' => $user]);

        return $pdf->stream();
    }
}
