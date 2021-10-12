<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    //Table Name
    protected $table = 'state';

    public function lgas()
    {
        return $this->hasMany(Lga::class);
    }
}
