<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'slug',
        'parent_id', // Campo adicional para la categoría padre
    ];


    //relación con la categoria padre
    public function products()
    {
        return $this->hasMany(Product::class); // Relación "tiene muchos"
    }

    //relación con la categoria hija
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
