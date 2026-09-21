<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Models\Service;

Route::get('/services', function () {
    $services = Service::latest()->get()->map(function ($service) {
        return [
            'id' => $service->id,
            'name' => $service->name,
            'price' => $service->price,
            'description' => $service->description,
            'image' => $service->image,
            'image_url' => $service->image
                ? url(Storage::url($service->image))
                : null,
            'created_at' => $service->created_at,
            'updated_at' => $service->updated_at,
        ];
    });

    return response()->json($services);
});