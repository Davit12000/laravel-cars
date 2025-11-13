<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Http\Resources\CarResource;
use App\Http\Resources\CarsIndexResource;
use App\Models\Car;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return CarsIndexResource::collection(Car::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarRequest $request): \Illuminate\Http\JsonResponse
    {
        Car::create($request->validated());
        return response()->json([
            'message' => 'Successfully created',
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car): CarResource
    {
        return new CarResource($car);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarRequest $request, Car $car): \Illuminate\Http\JsonResponse
    {
        $car->update($request->validated());
        return response()->json([
            'message' => 'Successfully updated',
        ], 201);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car): \Illuminate\Http\JsonResponse
    {
        $car->delete();
        return response()->json([
            'message' => 'Successfully deleted',
        ]);
    }
}
