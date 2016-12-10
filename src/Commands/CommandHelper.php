<?php


namespace Telegram\Bot\Commands;

use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram\Bot\Model\TelegramBotMessage;


Class CommandHelper
{
    /**
     * @var array
     */
    public $keyboard;

    /**
     * @var bool
     */
    public $resize_keyboard;

    /**
     * @var bool
     */
    public $one_time_keyboard;

    /**
     * @var int
     */
    public $chat_id;

    /**
     * @var string
     */
    public $text;

    /**
     * @var array
     */
    public $reply_markup;

    /**
     * @var string
     */
    public $parse_mode;

    /**
     * @var bool
     */
    public $force_reply;

    /**
     * @var bool
     */
    public $selective;

    /**
     * @var TelegramBotMessage
     */
    public $message_model;

    /**
     * CommandHelper constructor.
     */
    public function __construct()
    {
        $this->keyboard = '';

        $this->resize_keyboard = true;
        $this->one_time_keyboard = false;
        $this->selective = false;
        $this->parse_mode = 'HTML';
        $this->message_model = new TelegramBotMessage;
    }

    /**
     * @param $telegram
     * @param $keyboard
     */
    public function setReplyMarkup($keyboard)
    {
        $this->keyboard= $keyboard;
        $this->reply_markup = Telegram::replyKeyboardMarkup([
            'keyboard' => $keyboard,
            'resize_keyboard' => $this->resize_keyboard,
            'one_time_keyboard' => $this->one_time_keyboard,
        ]);
    }

    /**
     * @param $telegram
     * @param $selective
     */
    public function setForceReplyMarkup($telegram, $selective)
    {
        $this->selective = $selective;
        $this->reply_markup = $telegram->forceReply([
            'force_reply' => true,
            'selective' => $selective
        ]);
    }

    /**
     * @param $chatId
     * @param $text
     * @return array
     */
    public function setMessage($chatId, $text)
    {
        return [
            'chat_id' => $chatId,
            'text' => $text,
            'reply_markup' => $this->reply_markup,
            'parse_mode' => $this->parse_mode
        ];
    }
}