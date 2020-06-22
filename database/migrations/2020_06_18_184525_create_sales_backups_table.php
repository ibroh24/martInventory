<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesBackupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_backups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('itemname');
            $table->string('itemcategory')->nullable();
            $table->double('itemprice', 15, 2);
            $table->integer('remainitem')->nullable();
            $table->double('totalprice', 15,2);
            $table->string('itemqty');
            $table->string('soldby');
            $table->string('itemtype')->nullable();
            $table->string('itemslug');
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
        Schema::dropIfExists('sales_backups');
    }
}
