<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catagories extends Model
{
    //
    protected $fillable = [
        'name','status','photo','parent_id',
        'section_id','discription','url',
        'discount','meta_title','meta_discription',
        'meta_keyword'
    ];
}
