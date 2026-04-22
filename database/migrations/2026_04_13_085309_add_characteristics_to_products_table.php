<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('material')->nullable();
            $table->string('color')->nullable();
            $table->string('style')->nullable();
            $table->string('size')->nullable();
            $table->string('power')->nullable();
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['material', 'color', 'style', 'size', 'power']);
        });
    }

};
