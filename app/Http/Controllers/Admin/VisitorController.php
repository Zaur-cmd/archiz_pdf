<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\VisitorRequest;
use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Barryvdh\DomPDF\Facade\Pdf;

class VisitorController extends Controller
{

    public function index()
    {
        return view('dashboard.visitor.index')
            ->with(['visitors' =>  Visitor::all()]);
    }

    public function create()
    {
        return view('dashboard.visitor.create');
    }

    public function store(VisitorRequest $request)
    {
        Visitor::create($request->validated());

        alert()->success('Успешно!','Сотрудник успешно добавлен!');

        return redirect()->route('visitor.index');

    }

    public function show($id)
    {
        $user = Visitor::find($id);

        return view('dashboard.visitor.export' , compact('user'));
    }

    /**
     * Download pdf.
     *
     * @return \Illuminate\Http\Response
     */

    public function downloadPdf($id)
    {
        $user = Visitor::find($id);

        view()->share('dashboard.visitor.export',$user);

        $pdf = PDF::loadView('dashboard.visitor.export',['user' => $user]);

        return $pdf->stream();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Visitor $visitor)
    {
        return view('dashboard.visitor.edit')->with(['visitor' => $visitor]);
    }

    public function update(VisitorRequest $visitorRequest, Visitor $visitor)
    {
        $visitor->update($visitorRequest->validated());

        alert()->success('Успешно!','Сотрудник успешно обновлен!');

        return redirect()->route('visitor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visitor $visitor)
    {
        $visitor->delete();

        alert()->success('Успешно!','Сотрудник успешно удален!');

        return back();
    }
}
