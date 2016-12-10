<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTelegramMessage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telegram_bot_messages', function(Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('type', 24);

            $table->integer('update_id');
            $table->integer('user_id');
            $table->integer('chat_id');
            $table->integer('message_id');
            $table->integer('reply_message_id')->nullable();
            $table->integer('reply_message_chat_id')->nullable();

            $table->string('command', 50);
            $table->text('text');
            $table->timestamp('date');

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
        Schema::dropIfExists('telegram_bot_messages');
    }
}
