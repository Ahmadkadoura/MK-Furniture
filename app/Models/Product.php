<?php

namespace App\Models;

use App\Observers\ProductObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasFactory, HasTranslations,SoftDeletes;

    protected $fillable = [
        'name',
        'modelNumber',
        'description',
        'type',
        'newPrice',
        'oldPrice'
    ];

    public $translatable = ['name', 'description','type']; // Define translatable fields
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
    public static function getDisk()
    {
        return Storage::disk('Product');
    }
    public function imageUrl(string $fieldName)
    {
        if(str_starts_with($this->$fieldName,'http')) {
            return $this->$fieldName;
        }else{

            return $this->$fieldName ? self::getDisk()->url($this->$fieldName) : null;
        }
    }
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($product) {
            $product->photos()->delete(); // لحذف الصور عند حذف المنتج
        });
        static::restoring(function ($product) {
            $product->photos()->onlyTrashed()->restore();
        });
            Product::observe(ProductObserver::class);
   }

}
