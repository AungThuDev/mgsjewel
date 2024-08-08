<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['product_id','brand_name','mass','density','refractive_index','measurement','cut_shape','color','text_conclusion','qr_image','image'];
}
