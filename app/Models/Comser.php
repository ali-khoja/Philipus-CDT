<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comser extends Model
{
    use HasFactory;
    
    protected $table = 'comser';

    protected $fillable = [
        'name',
    ];
    public function comapps()
    {
        return $this->hasMany(Comapp::class);
    }
}
