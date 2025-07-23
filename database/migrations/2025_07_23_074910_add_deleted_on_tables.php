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
        Schema::table('skpds', function (Blueprint $table) {
            $table->softDeletes(); // Add soft delete column
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
        });

        Schema::table('lembagas', function (Blueprint $table) {
            $table->softdeletes(); // Add soft delete column
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
        });

        
        Schema::table('permissions', function (Blueprint $table) {
            $table->softdeletes(); // Add soft delete column
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
        });

        Schema::table('roles', function (Blueprint $table) {
            $table->softdeletes(); // Add soft delete column
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
        });

        Schema::table('urusan_skpds', function (Blueprint $table) {
            $table->softdeletes(); // Add soft delete column
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('skpds', function (Blueprint $table) {
            $table->dropSoftDeletes(); // Remove soft delete column
            $table->dropColumn(['created_by', 'updated_by', 'deleted_by']);
        });

        Schema::table('lembagas', function (Blueprint $table) {
            $table->dropSoftDeletes(); // Remove soft delete column
            $table->dropColumn(['created_by', 'updated_by', 'deleted_by']);
        });

        Schema::table('permissions', function (Blueprint $table) {
            $table->dropSoftDeletes(); // Remove soft delete column
            $table->dropColumn(['created_by', 'updated_by', 'deleted_by']);
        });

        Schema::table('roles', function (Blueprint $table) {
            $table->dropSoftDeletes(); // Remove soft delete column
            $table->dropColumn(['created_by', 'updated_by', 'deleted_by']);
        });

        Schema::table('urusan_skpds', function (Blueprint $table) {
            $table->dropSoftDeletes(); // Remove soft delete column
            $table->dropColumn(['created_by', 'updated_by', 'deleted_by']);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['created_by', 'updated_by', 'deleted_by']);
        });
    }
};
