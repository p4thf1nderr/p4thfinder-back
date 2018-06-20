<?php
namespace App\Http\Controllers\CommunalData;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;


class CommunalController extends Controller
{
    public static function index($value='')
    {
		$token = env('BOT_TOKEN');
		
		Log::warning('ddd');

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
		$bot->run();

		/* $token = env('BOT_TOKEN');
		$chatId = env('CHAT_ID');
		$messageText = 'Передайте показания';

		$bot = new \TelegramBot\Api\BotApi($token);

		$bot->sendMessage($chatId, $messageText);
		$bot->run(); */

		

		// команда push получает текст вида газ#24,хол#10,гор#40

		// после этого раскладываем какая информация к какой службе относится
		// когда данные разбиты на переменные, отправляем их на почтовый сервис, где происходит подстановка и отправка

		/* $bot->command('push', function ($message) use ($bot, $chatId) {
			$text = $message->getText();
			$param = str_replace('/push ', '', $text);
			$answer = 'Неизвестная команда';
			if (!empty($param))
			{
				$answer = 'Привет, ' . $param;
			}
			$bot->sendMessage($chatId, $answer);
		});

		$bot->run(); */


    }
}