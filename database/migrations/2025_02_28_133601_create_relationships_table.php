<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relationships', function (Blueprint $table) {
            $table->id(); // bigint(20) unsigned NOT NULL AUTO_INCREMENT
            $table->unsignedBigInteger('created_by'); // bigint(20) unsigned NOT NULL
            $table->unsignedBigInteger('parent_id'); // bigint(20) unsigned NOT NULL
            $table->unsignedBigInteger('child_id'); // bigint(20) unsigned NOT NULL
            $table->timestamps(); // created_at & updated_at
            
            // Indexes
            $table->index('created_by');
            $table->index('parent_id');
            $table->index('child_id');

            // Clés étrangères 
            $table->foreign('parent_id')->references('id')->on('people')->onDelete('cascade');
            $table->foreign('child_id')->references('id')->on('people')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('relationships', function (Blueprint $table) {
            //
        });
    }
}
