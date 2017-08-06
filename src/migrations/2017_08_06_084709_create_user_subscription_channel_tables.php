<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSubscriptionChannelTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_channels', function($table) {
            $table->char('id', 10);
            $table->primary('id');
        });

        Schema::create('user_subscription_channels', function($table) {
            $table->increments('id')->unsigned();
            $table->integer('user_id', false, true);
            $table->char('subscription_channel_id', 10);
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('subscription_channel_id')
                ->references('id')
                ->on('subscription_channels')
                ->onDelete('cascade');
        });

        for ($i = 1; $i <= 5; $i++) {
            DB::table('subscription_channels')->insert([
                'id' => 'channel_' . $i
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscription_channels');
        Schema::dropIfExists('user_subscription_channels');
    }
}