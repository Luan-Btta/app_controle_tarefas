<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;

    protected $fillable = ['tarefa', 'user_id', 'data_conclusao'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
