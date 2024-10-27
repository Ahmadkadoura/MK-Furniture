<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'product_id', 'image', 'color',
    ];

    /**
     * Relationship to Product.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
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
}
