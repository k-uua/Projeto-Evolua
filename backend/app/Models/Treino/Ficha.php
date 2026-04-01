<?php

namespace App\Models\Treino;
use App\Models\Personal\Personal;
use Illuminate\Database\Eloquent\Model;



class Ficha extends Model
{
    protected $table = 'ficha';
    protected $fillable = [
        'nome_ficha',
        'status_ficha',
        'divisao_id',
        'personal_id',
    ];

    public function divisao()
    {
        return $this->belongsTo(Divisao::class, 'divisao_id');
    }

    public function personal()
        {
            return $this->belongsTo(Personal::class, 'personal_id');
        }
}
