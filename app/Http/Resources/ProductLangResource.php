<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductLangResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
          return [
              'id' => $this->id,
              'name' => $this->getTranslations('name'),
              'modelNumber' => $this->modelNumber,
              'description' => $this->getTranslations('description'),
              'type' => $this->getTranslations('type'),
              'newPrice' => $this->newPrice,
              'oldPrice' => $this->oldPrice,
              'photos'=>$this->photos->map(function ($photo){
                  return new PhotoResource($photo);
              })
    ];
    }
}
