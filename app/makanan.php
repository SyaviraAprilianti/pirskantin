<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class makanan extends Model
{
    protected $table ="makanans";
   
    protected $fillable = ['nama','harga','stok','deskripsi','gambar'];
}
