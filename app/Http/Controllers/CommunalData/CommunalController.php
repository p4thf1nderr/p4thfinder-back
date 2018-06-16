<?php
namespace App\Http\Controllers\CommunalData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class CommunalController extends Controller
{
    public function index($value='')
    {
    	$token = env('BOT_TOKEN');
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
    }
}