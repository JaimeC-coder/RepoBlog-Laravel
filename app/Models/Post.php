<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];
    // *protege guarded se usa para los parametros que no nesecitan asignacion masiva

    //Relacion uno a muchos inversa
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //Relacion uno a muchos inversa
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    //Relacion muchos a muchos
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    //Relacion uno a uno polimorfica
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
