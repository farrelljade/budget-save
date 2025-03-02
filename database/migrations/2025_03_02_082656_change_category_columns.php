<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn(['user_id', 'type']);
        });

        $categories = [
            ['name' => 'Fuel', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Food Shopping', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Clothes', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Eating Out', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Travel', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Holidays', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('categories')->insert($categories);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
