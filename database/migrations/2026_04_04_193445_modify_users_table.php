<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void
{
    Schema::table('users', function (Blueprint $table) {
        // Переименовать id → user_id
        $table->renameColumn('id', 'user_id');

        // Добавить role_id
        $table->foreignId('role_id')->after('user_id')->constrained('roles', 'role_id');

        // Добавить phone
        $table->string('phone', 20)->nullable()->after('email');
    });
}

public function down(): void
{
    Schema::table('users', function (Blueprint $table) {
        // Откат изменений
        $table->renameColumn('user_id', 'id');
        $table->dropColumn('role_id');
        $table->dropColumn('phone');
    });
}


};
