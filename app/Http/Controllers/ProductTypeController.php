<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductTypeRequest;
use App\Http\Resources\ProductTypeResource;
use App\Models\ProductType;

class ProductTypeController extends Controller
{
    public function index()
    {
        return ProductTypeResource::collection(ProductType::all());
    }

    public function store(ProductTypeRequest $request)
    {
        return new ProductTypeResource(ProductType::create($request->validated()));
    }

    public function show(ProductType $productType)
    {
        return new ProductTypeResource($productType);
    }

    public function update(ProductTypeRequest $request, ProductType $productType)
    {
        $productType->update($request->validated());

        return new ProductTypeResource($productType);
    }

    public function destroy(ProductType $productType)
    {
        $productType->delete();

        return response()->json();
    }
}
