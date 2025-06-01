<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBeneficiaryOrderFollowupsTable extends Migration
{
    public function up()
    {
        Schema::table('beneficiary_order_followups', function (Blueprint $table) {
            $table->unsignedBigInteger('beneficiary_followup_id')->nullable();
            $table->foreign('beneficiary_followup_id', 'beneficiary_followup_fk_10595415')->references('id')->on('beneficiary_orders');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_10595418')->references('id')->on('users');
        });
    }
}
