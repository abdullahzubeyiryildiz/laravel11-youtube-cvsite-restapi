<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
class Blog extends Model  implements Viewable
{
    use HasFactory;
    use Sluggable;
    use InteractsWithViews;

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
