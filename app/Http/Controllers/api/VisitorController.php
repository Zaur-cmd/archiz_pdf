<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\VisitorRequest;
use App\Http\Resources\VisitorResource;
use App\Models\Visitor;
use Barryvdh\DomPDF\Facade\Pdf;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return VisitorResource::collection(Visitor::orderBy('id', 'asc')->paginate(20));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\VisitorRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(VisitorRequest $request)
    {
        $user = Visitor::create($request->validated());


        return view('export.index' , compact('user'));

//        return (new VisitorResource($Visitor))->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visitor  $Visitor
     * @return VisitorResource
     */
    public function show(Visitor $Visitor)
    {
        return new VisitorResource($Visitor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\VisitorRequest  $request
     * @param   \App\Models\Visitor  $Visitor
     * @return \Illuminate\Http\Response
     */
    public function update(VisitorRequest $request, Visitor $Visitor)
    {
        $Visitor->update($request->validated());

        return response()->noContent();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visitor  $Visitor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visitor $Visitor)
    {
        $Visitor->delete();

        return response()->noContent();
    }
}
