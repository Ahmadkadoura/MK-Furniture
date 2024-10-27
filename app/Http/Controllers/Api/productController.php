<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Repositories\productRepository;
use App\Http\Requests\Product\storeProductRequest;
use App\Http\Requests\Product\updateProductRequest;
use App\Http\Resources\ProductLangResource;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Traits\FileUpload;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
class productController extends Controller
{
    use FileUpload;

    private productRepository $productRepository;
     public function __construct(productRepository $productRepository)
     {
         $this->productRepository =$productRepository;
         $this->middleware(['auth:sanctum'])->except(['index','show']);
         $this->middleware(['Localization']);
     }
    public function index(): JsonResponse
    {
        $data = $this->productRepository->index();
        return $this->showAll($data['Product'], ProductResource::class,__($data['message']));
    }
    public function show(Product $product)
    {
        return $this->showOne($product, ProductResource::class);
    }
    public function showWithLang(Product $product)
    {
        $data = $this->productRepository->showWithLang($product);
        return new ProductLangResource($data['Product']);
    }

    public function store(storeProductRequest $request): JsonResponse
    {
        $productData = $request->validated();
        // Check for photos and upload each one
        if ($request->has('photos')) {
            foreach ($request->file('photos') as $key => $photo) {
                $file = $photo['image'];
               $product=$request->name['en'];
                // Extract the image file from the array
                $fileName = 'photos/' .$product. $file->hashName();
                $productData['photos'][$key]['image'] = $this->createFile($file, Product::getDisk(), filename: $fileName);
            }
        }
        // Create transaction
        $product = $this->productRepository->create($productData);
        return $this->showOne($product['Product'], ProductResource::class, $product['message']);
    }

    public function update(UpdateProductRequest $request, Product $product): JsonResponse
    {
        $productData = $request->validated();

        if ($request->has('photos')) {
            foreach ($request->file('photos') as $key => $photo) {
                $file = $photo['image'];
                $modelNumber = $product->modelNumber;
                $fileName = 'photos/' . $modelNumber.'_'. $file->hashName();
                $productData['photos'][$key]['image'] = $this->createFile($file, Product::getDisk(), filename: $fileName);
            }
        }

        $updatedProduct = $this->productRepository->update($product ,$productData);

        return $this->showOne($updatedProduct['Product'], ProductResource::class, $updatedProduct['message']);
    }

    public function destroy(Product $product)
    {
        $data = $this->productRepository->destroy($product);
        return [__($data['message']),$data['code']];

    }

    public function showDel(): JsonResponse
    {

        $data=$this->productRepository->showDeleted();
        return $this->showAll($data['Product'],ProductResource::class,__($data['message']));
    }
    public function restore(Request $request){

        $data = $this->productRepository->restore($request);
        return [__($data['message']),$data['code']];
    }

}
