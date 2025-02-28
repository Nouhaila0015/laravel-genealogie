<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id(); // bigint(20) unsigned NOT NULL AUTO_INCREMENT
            $table->unsignedBigInteger('created_by'); // bigint(20) unsigned NOT NULL
            $table->string('first_name', 255)->collation('utf8mb4_unicode_ci'); // NOT NULL
            $table->string('last_name', 255)->collation('utf8mb4_unicode_ci'); // NOT NULL
            $table->string('birth_name', 255)->nullable()->collation('utf8mb4_unicode_ci'); // DEFAULT NULL
            $table->string('middle_names', 255)->nullable()->collation('utf8mb4_unicode_ci'); // DEFAULT NULL
            $table->date('date_of_birth')->nullable(); // DEFAULT NULL
            $table->timestamps(); // created_at & updated_at
            
            // Indexes
            $table->index('created_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('people', function (Blueprint $table) {
            //
        });
    }
}
