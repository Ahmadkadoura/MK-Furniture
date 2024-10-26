<?php

namespace App\Http\Repositories;

use App\Models\Photo;

class photoRepository extends baseRepository
{
    public function __construct(Photo $model)
    {
        parent::__construct($model);
    }
    public function indexPhotoByColor($product_id,$color)
    {
        $data = Photo::where('product_id', $product_id)
            ->where('color', $color)->with('product')->get();
        if ($data->isEmpty()) {
            $message = "There are no color at the moment";
        } else {
            $message = "Color indexed successfully";
        }
        return ['message' => $message, "Photo" => $data];

    }
}
