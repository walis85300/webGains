<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CreateOfficeRequest;
use App\Http\Requests\UpdateOfficeRequest;

use App\Office;

use App\Http\Transformers\OfficeItemTransformer;
use App\Http\Transformers\OfficeCollectionTransformer;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offices = Office::paginate(10);

        return response()->collection($offices, new OfficeCollectionTransformer);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOfficeRequest $request)
    {
        $office = Office::create($request->all());

        return response()->json(['ok' => 'created'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $office = Office::findOrFail($id);

        return response()->item($office, new OfficeItemTransformer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOfficeRequest $request, $id)
    {
        $office = Office::findOrFail($id);

        $office->update([
            'city' => $request->city,
            'phone' => $request->phone,
            'addressLine1' => $request->addressLine1,
            'addressLine2' => $request->addressLine2,
            'state' => $request->state,
            'country' => $request->country,
            'postalCode' => $request->postalCode,
            'territory' => $request->territory,
        ]);

        return response()->json(['ok' => 'updated'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $office = Office::findOrFail($id);

        $office->delete();

        return response()->json(['ok' => 'deleted'], 200);
    }
}
