<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\DareResource;
use App\Models\Dare;
use App\Http\Requests\DareRequestCreate;
use App\Http\Requests\DareUpdateRequest;

class DareController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            "data" => DareResource::collection(Dare::all())
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
    public function store(DareRequestCreate $request)
    {
        Dare::create($request->validated());
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
    public function update(DareUpdateRequest $request, Dare $dare)
    {
        $dare->update($request->validated());
        $dare->update(["asked" => $dare->asked + 1]);
        return response()->json(["data" => new DareResource($dare)], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
