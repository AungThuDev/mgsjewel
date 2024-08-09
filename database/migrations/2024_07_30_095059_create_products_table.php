<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id');
            $table->string('brand_name');
            $table->float('mass', 8, 2);
            $table->float('density', 8, 2);
            $table->float('refractive_index', 8, 2);
            $table->string('measurement');
            $table->string('cut_shape');
            $table->string('color');
            $table->string('text_conclusion');
            $table->string('qr_image')->nullable();
            $table->longText('qrcode')->nullable();
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
