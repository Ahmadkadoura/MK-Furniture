<?php

namespace App\Http\Repositories;

use App\Models\Photo;
use App\Models\Product;

class productRepository extends baseRepository
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }
    public function index()
    {
        $data = Product::with('photos')->paginate(10);
        if ($data->isEmpty()){
            $message="There are no product at the moment";
        }else
        {
            $message="Product indexed successfully";
        }
        return ['message'=>$message,"Product"=>$data];

    }
    public function show(Product $product)
    {
        $data = Product::with('photos')->first();
        if ($data->isEmpty()){
            $message="There are no product at the moment";
        }else
        {
            $message="Product showed successfully";
        }
        return ['message'=>$message,"Product"=>$data];

    }
    public function create($productData): array
    {

        $product= Product::create($productData);
        if (isset($productData['photos']) && is_array($productData['photos']))
        {
            foreach ($productData['photos'] as $itemData) {
                Photo::create([
                    'product_id' => $product->id,
                    'image' => $itemData['image'],
                    'color' => $itemData['color'] ,
                ]);
            }
        }
        $message='Transaction created successfully';
        return ['message'=>$message,"Product"=>$product];
    }
}
