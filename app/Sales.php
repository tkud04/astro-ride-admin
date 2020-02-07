<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'user_id', 'customer_id', 'tax', 'shipping', 'discount', 'notes', 'status'
    ];
}
