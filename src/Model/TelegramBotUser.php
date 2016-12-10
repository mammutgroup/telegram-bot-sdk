<?php

namespace Telegram\Bot\Model;

use Illuminate\Database\Eloquent\Model;

class TelegramBotUser extends Model
{
    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'mysql';

    protected $table = 'telegram_bot_users';

}