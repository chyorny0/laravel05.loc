<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $fillable = ['cur_abbr', 'cur_full_name', 'cur_scale'];
    use HasFactory;

    public function rates(){
        return $this->hasMany(Rate::class);
    }

}
