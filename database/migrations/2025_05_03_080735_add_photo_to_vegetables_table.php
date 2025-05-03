<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('vegetables', function (Blueprint $table) {
        $table->string('description')->nullable();
        $table->string('photo')->nullable();
    });
}

public function down()
{
    Schema::table('vegetables', function (Blueprint $table) {
        $table->dropColumn('description');
        $table->dropColumn('photo');
    });
}

};
