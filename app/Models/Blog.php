<?php

namespace App\Models;

use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
//    protected $dates = ['publish_at', 'created_at', 'updated_at'];
    protected $guarded = [];
    public function getCreatedAtAttribute($val)
    {
        return Verta::instance($val)->formatDifference();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(BlogCategory::class);
    }
}
