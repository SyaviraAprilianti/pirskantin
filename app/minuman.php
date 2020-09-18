<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class minuman extends Model
{
    protected $table ="minuman";
   
    protected $fillable = ['nama','harga','stok','deskripsi','gambar'];
}
