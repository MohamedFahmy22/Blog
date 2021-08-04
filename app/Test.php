<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
        protected $table = 'offers';

        protected $fillable = [ 'name','price','details' ,'created_at','updated_at']; // white box to be inserted or updated in database

}
