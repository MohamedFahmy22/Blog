<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = 'offers';
    protected $fillable = [ 'name','price','details' ,'created_at','updated_at']; // white box to be inserted or updated in database
    protected $hidden = ['created_at','updated_at'];               // make the hidden from the response
}
