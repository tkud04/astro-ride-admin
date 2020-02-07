<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesItems extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'sales_id', 'product_id', 'qty'
    ];
}
