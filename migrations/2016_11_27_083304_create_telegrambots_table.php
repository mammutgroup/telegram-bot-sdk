<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTelegrambotsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('telegram_bot_users', function(Blueprint $table) {
            $table->bigIncrements('id');
			
            $table->integer('user_id');
            $table->integer('update_id');
			
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
			
            $table->integer('status');

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
		Schema::dropIfExists('telegrambots');
	}

}
