<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'parent'];

    public function subCategories(){
        return $this->hasMany(SELF::class, 'parent_id', 'id');
    }

    public function parentCategories(){
        return $this->hasMany(SELF::class, 'parent_id', 'id');
    }

   public function scopeParent($query){
       return $query->whereNull('parent_id');
   }

   public function scopeChild($query){
       return $query->whereNotNull('parent_id');
   }
}
