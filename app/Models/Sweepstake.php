<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Sweepstake extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'number_winners',
        'end_date',
        'description'
    ];

    protected $casts = [
        'end_date' => 'datetime',
    ];

    //define a chave como uma string
    protected $keyType = 'string';

    //define a chave como nao incremental
    public $incrementing = false;


    public static function boot()
    {
        parent::boot();

        //ao registar-se um sorteio, sera gerado automaticamente um uuid
        static::creating(function (Model $model) {

            if (empty($model->id)) {
                $model->id = Str::uuid();
            }
        });
    }

    public function user()
    {
        //significa que cada sorteio eh registado por um user
        return $this->belongsTo(User::class);
    }

    public function participants(){
        //cada sorteio possui muitos participantes
        return $this->hasMany(Participant::class);
    }

}