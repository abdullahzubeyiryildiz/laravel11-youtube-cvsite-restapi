<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;
class Category extends Model
{
  use HasFactory;
  use Sluggable;

  protected $fillable = ['name','image'];
 public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

     public function blog() {
        return $this->belongsTo(Category::class,'category_id','id');
     }
}
