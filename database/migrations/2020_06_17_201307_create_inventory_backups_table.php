<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryBackupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_backups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('productname');
            $table->string('productdescription');
            $table->string('productcategory');
            $table->string('productuom')->nullable();
            $table->double('sellingprice', 15, 2)->nullable();
            $table->double('buyingprice', 15, 2)->nullable();
            $table->double('profit', 15, 2)->nullable();
            $table->string('enteredby');
            $table->string('productqty')->nullable();            
            $table->string('productremain')->nullable();            
            $table->string('productsupplier')->nullable();            
            $table->string('productslug');
            // $table->double('unitsellingprice', 15, 2)->nullable();
            // $table->double('unitbuyingprice', 15, 2)->nullable();
            // $table->double('bulkprofit', 15, 2)->nullable();
            // $table->string('productunitqty')->nullable();
            // $table->string('productunitremain')->nullable();
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
        Schema::dropIfExists('inventory_backups');
    }
}
