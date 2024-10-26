<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Repositories\photoRepository;
use App\Http\Resources\PhotoResource;
use App\Http\Resources\ProductResource;
use App\Models\Photo;
use Illuminate\Http\Request;

class photoContoller extends Controller
{
    private photoRepository $photoRepository;
    public function __construct(photoRepository $photoRepository)
    {
        $this->photoRepository =$photoRepository;
         $this->middleware(['auth:sanctum', 'Localization']);
    }

    public function indexPhotoByColor($product_id,$color)
    {
        $data = $this->photoRepository->indexPhotoByColor($product_id,$color);
        return $this->showOneCollection($data['Photo'], PhotoResource::class,__($data['message']));
    }
}
