<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsItemsPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units_items_pivot', function (Blueprint $table) {
            $table->foreignId('unit_id')->references('id')->on('units')->cascadeOnDelete();
            $table->foreignId('item_id')->references('id')->on('items')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('units_items_pivot');
    }
}
