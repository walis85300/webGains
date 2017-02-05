<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CreateProductLineRequest;
use App\Http\Requests\UpdateProductLineRequest;

use App\ProductLine;

use App\Http\Transformers\ProductLineCollectionTransformer;
use App\Http\Transformers\ProductLineItemTransformer;

class ProductLineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productLines = ProductLine::paginate(10);

        return response()->collection(
            $productLines, new ProductLineCollectionTransformer
        );
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
    public function store(CreateProductLineRequest $request)
    {
        $productLine = ProductLine::create($request->all());

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
        $productLine = ProductLine::findOrFail($id);

        return response()->item(
            $productLine, new ProductLineItemTransformer
        );
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
    public function update(UpdateProductLineRequest $request, $id)
    {
        $productLine = ProductLine::findOrFail($id);

        $productLine->update([
            'textDescription' => $request->textDescription,
            'htmlDescription' => $request->htmlDescription,
            'image' => $request->image
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
        $productLine = ProductLine::findOrFail($id);

        $productLine->delete();

        return response()->json(['ok' => 'deleted'], 200);
    }
}
