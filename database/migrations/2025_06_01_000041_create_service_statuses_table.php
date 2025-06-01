<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceStatusesTable extends Migration
{
    public function up()
    {
        Schema::create('service_statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('badge_class');
            $table->integer('ordering');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
