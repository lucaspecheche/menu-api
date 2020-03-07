<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    public function up(): void
    {
        Schema::create('customers', static function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email');

            $table->timestamp('createdAt')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updatedAt')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->softDeletes('deletedAt');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
}
