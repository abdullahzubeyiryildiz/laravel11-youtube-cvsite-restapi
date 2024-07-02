<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['name','category_id','content','image'];
   public function sluggable(): array
      {
          return [
              'slug' => [
                  'source' => 'name'
              ]
          ];
      }

    public function category() {
       return $this->hasOne(Category::class,'id','category_id');
    }
}
