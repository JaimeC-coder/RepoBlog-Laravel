<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug'];
    public function getRouteKeyName()//este metodo es para que en la ruta no se considere el id sino algun otro campo que se le indique
  
    {
        return 'slug';
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
