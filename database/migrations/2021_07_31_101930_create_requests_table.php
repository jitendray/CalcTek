<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_logs', function (Blueprint $table) {
            $table->id();
            $table->string('uri', 1024);
            $table->string('name')->nullable($value = true);
            $table->string('action')->nullable($value = true);
            $table->json("request")->nullable($value = true);
            $table->string("response")->nullable($value = true);
            $table->smallInteger('status_code');
            $table->index('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calculator_requests');
    }
}
