<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            // Añade la columna 'category' si no existe
            if (!Schema::hasColumn('products', 'category')) {
                $table->string('category')->after('name')->nullable();
            }
        });
        
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->decimal('product_id', 6, 0);
            $table->string('name');
            $table->decimal('price', 6, 2);
            $table->decimal('quantity', 6, 0);
            $table->date('date');
            $table->time('time');
            $table->decimal('subtotal', 6, 2);
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
        Schema::dropIfExists('carts');

        Schema::table('products', function (Blueprint $table) {
            // Elimina la columna 'category'
            $table->dropColumn('category');
        });
    }
}