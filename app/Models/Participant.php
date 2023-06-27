<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'sweepstake_id',
        'name',
        'email',
        'awarded_at'
    ];

    protected $casts = [
        'awarded_at' => 'datetime',
    ];

    public function sweepstake(){
        //cada participante pode estar incluso a um sorteios
        return $this->belongsTo(Sweepstake::class);
    }
}
