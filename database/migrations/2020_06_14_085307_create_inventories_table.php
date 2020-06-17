<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('productname');
            $table->string('productdescription');
            $table->string('productcategory');
            $table->string('productuom')->nullable();
            $table->double('bulksellingprice', 15, 2)->nullable();
            $table->double('bulkbuyingprice', 15, 2)->nullable();
            $table->double('unitsellingprice', 15, 2)->nullable();
            $table->double('unitbuyingprice', 15, 2)->nullable();
            $table->double('bulkprofit', 15, 2)->nullable();
            $table->double('unitprofit', 15, 2)->nullable();
            $table->string('enteredby');
            $table->string('productbulkqty')->nullable();
            $table->string('productunitqty')->nullable();
            $table->string('productbulkremain')->nullable();
            $table->string('productunitremain')->nullable();
            $table->string('productsupplier')->nullable();            
            $table->string('productslug');
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
        Schema::dropIfExists('inventories');
    }
}
