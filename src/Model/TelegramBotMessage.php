<?php

namespace Telegram\Bot\Model;

use Illuminate\Database\Eloquent\Model;

class TelegramBotMessage extends Model
{
    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'mysql';

    protected $table = 'telegram_bot_messages';

    public function saveMessage($type, $command, $data)
    {
        $this->type = $type;
        $this->update_id = 0;
        $this->user_id = $data['from']['id'];
        $this->chat_id = $data['chat']['id'];
        $this->message_id = $data['message_id'];
        $this->command = $command;
        $this->text = $data['text'];
        $this->date = $data['date'];
        $this->save();
    }

}