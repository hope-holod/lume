<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            // 1. Вернуть user_id → id, если нужно
            if (Schema::hasColumn('users', 'user_id')) {
                $table->renameColumn('user_id', 'id');
            }

            // 2. Добавить role_id с default = 1
            if (!Schema::hasColumn('users', 'role_id')) {
                $table->foreignId('role_id')
                    ->default(1)
                    ->after('id')
                    ->constrained('roles', 'role_id');
            }

            // 3. Добавить phone
            if (!Schema::hasColumn('users', 'phone')) {
                $table->string('phone', 20)->nullable()->after('email');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            // Удалить role_id
            if (Schema::hasColumn('users', 'role_id')) {
                $table->dropConstrainedForeignId('role_id');
            }

            // Удалить phone
            if (Schema::hasColumn('users', 'phone')) {
                $table->dropColumn('phone');
            }

            // Вернуть id → user_id
            if (Schema::hasColumn('users', 'id')) {
                $table->renameColumn('id', 'user_id');
            }
        });
    }
};
