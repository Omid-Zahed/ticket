<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('forms', function (Blueprint $table) {
            $table->text("c_1")->nullable();
            $table->text("c_2")->nullable();
            $table->text("c_3")->nullable();
            $table->text("c_4")->nullable();
            $table->text("c_5")->nullable();
            $table->text("c_6")->nullable();
            $table->text("c_7")->nullable();
            $table->removeColumn("json_data");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forms');
    }
}
