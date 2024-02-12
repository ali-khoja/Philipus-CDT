<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comapp extends Model
{
    use HasFactory;
        protected $table = 'comapp';

    protected $fillable = [
        'name',
        'comser_id' 	,
        'comname' 	,
        'email' 	,
        'description' 	,
        'phone' 
    ];
    public function comser()
    {
        return $this->belongsTo(Comser::class);
    }
}
