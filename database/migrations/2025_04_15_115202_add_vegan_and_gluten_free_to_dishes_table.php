<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('dishes', function (Blueprint $table) {
            $table->boolean('is_vegan')->default(false);
            $table->boolean('is_gluten_free')->default(false);
        });
    }
    
    public function down()
    {
        Schema::table('dishes', function (Blueprint $table) {
            $table->dropColumn(['is_vegan', 'is_gluten_free']);
        });
    }
    
};
