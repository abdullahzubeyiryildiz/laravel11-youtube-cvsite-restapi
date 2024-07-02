<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Project extends Model
{
    use HasFactory;
    use Sluggable;
    protected $fillable= [
        'category_id',
        'name',
        'content',
        'slug',
        'image',
        'link',
        'finish_time',
        'tags',
        'status',
    ];

    protected $casts=[
        'tags'=>'array',
    ];
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
