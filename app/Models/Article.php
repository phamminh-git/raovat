<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable=[
        'title', 'content', 'user_id', 'province_id',
        'district_id', 'ward_id', 'valid_date', 'thubnail'
    ];

    public function categories(){
        return $this->belongsToMany('App\Models\Category');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

}
