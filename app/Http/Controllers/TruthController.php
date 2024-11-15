<?php

namespace App\Http\Controllers;

use App\Http\Requests\TruthCreateRequest;
use App\Http\Requests\TruthUpdateRequest;
use App\Models\Truth;
use App\Http\Resources\TruthResource;
use Illuminate\Http\Request;

class TruthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            "data" => TruthResource::collection(Truth::all())
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TruthCreateRequest $request)
    {
        Truth::create($request->validated());
        return response()->json([], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TruthUpdateRequest $request, Truth $truth)
    {
        $truth->update($request->validated());
        $truth->update(["asked" => $truth->asked + 1]);
        return response()->json(["data" => new TruthResource($truth)], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
