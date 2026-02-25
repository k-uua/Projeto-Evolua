<?php

namespace App\Models\Personal;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table = 'personal';
    protected $fillable = [
        'usuario_id',
        'biografia',
    ];

    public function usuario(){
        return $this->belongsTo(User::class, 'usuario_id', 'personal_id');
    }
}
