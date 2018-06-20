<?php
namespace App\Http\Controllers\CommunalData;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;


class CommunalController extends Controller
{
    public static function index($value='')
    {
    	/* $token = env('BOT_TOKEN');
		$bot = new \TelegramBot\Api\Client($token);
		// команда для start
		$bot->command('start', function ($message) use ($bot) {
		    $answer = 'Добро пожаловать!';
		    $bot->sendMessage($message->getChat()->getId(), $answer);
		});
		// команда для помощи
		$bot->command('help', function ($message) use ($bot) {
		    $answer = 'Команды:
		/help - вывод справки';
		    $bot->sendMessage($message->getChat()->getId(), $answer);
		});
		$bot->run(); */

		Log::warning($message);

		$token = env('BOT_TOKEN');
		$chatId = env('CHAT_ID');
		$messageText = 'Передайте показания';

		$bot = new \TelegramBot\Api\BotApi($token);

		$bot->sendMessage($chatId, $messageText);
		$bot->run();
    }
}