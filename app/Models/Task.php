<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $fillable = ['title', 'status', 'content'];

    /**
     * relacionamento têm um com User
     * @return User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');        
    }

    /**
     * relacionamento têm um com category
     * @return Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
