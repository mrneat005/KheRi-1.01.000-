<?php

namespace KheRi;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    protected $fillable = [
        'name','price','status','main_photo','section_id',
        'catagory_id','discription','url',
        'discount','meta_title','meta_discription',
        'meta_keyword','code','weight','size','stock','url','isFeatured'

/*

       id: "",
        name: "",
        catagory_id: "",
        section_id: "",
        code: "",
        color: "",
        price: "",
        discount: "",
        weight: "",
        main_photo: "",
        side_photo: "",
        front_photo: "",
        size: "",
        stock: "",
        url: "",
        discription: "",
        isFeatured: "",
        meta_title: "",
        meta_discription: "",
        meta_keyword: "",
        created_at: "",
        updated_at: "",

*/



    ];
}
