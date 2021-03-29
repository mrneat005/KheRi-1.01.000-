<?php

namespace KheRi;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    //

    protected $fillable = [
        'id','shop_number','shop_name','Address',
        'Location','discription','main_photo','Second_photo','Third_photo',
        'plan','cnic_front','cnic_back',
        'shop_reg_doc_photo','slogan','status'
    ];

}
