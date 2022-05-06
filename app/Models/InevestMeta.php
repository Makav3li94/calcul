<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InevestMeta extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function invest(){
        return $this->belongsTo(Invest::class);
    }

}
