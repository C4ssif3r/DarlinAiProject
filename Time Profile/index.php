<?php

error_reporting(E_ALL);
ini_set('display_errors','1');
ini_set('memory_limit' , '-1');
ini_set('max_execution_time','0');
ini_set('display_startup_errors','1');

if (!file_exists('madeline.php')) {
    copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
}
include 'madeline.php';

use \danog\MadelineProto\API;
use \danog\Loop\Generic\GenericLoop;
use \danog\MadelineProto\EventHandler;
use \danog\MadelineProto\Shutdown;

class XHandler extends EventHandler
{
    const Admins = [1225161380]; //ایدی عددی شما
    const Report = 'mohamadreza_xn'; // ایدی
    
    public function getReportPeers()
    {
        return [self::Report];
    }
    
    public function genLoop()
    {
    	/*
        yield $this->account->updateStatus([
            'offline' => false
        ]);
        yield $this->messages->sendMessage([
            'peer'    => self::Admins[0],
            'message' => 'Generic Loop Start At : ' . date('H:i:s')
        ]);*/
     include ('jdf.php');
date_default_timezone_set('Asia/Tehran');
$time = date("H:i");
$fonts = [["𝟎","𝟏","𝟐","𝟑","𝟒","𝟓","𝟔","𝟕","𝟖","𝟗",]];
	$time2 = str_replace(range(0,9),$fonts[array_rand($fonts)],date("H:i"));
    $date = jdate('Y/n/j');
    $day = jdate('l');
   yield $this->account->updateProfile(['about' => " ⌛️ $time ⏳ | ➡ $date | "]);   yield $this->account->updateProfile(['last_name' => "$time2 "]);
    yield $this->sleep(1);
header('Content-Type: image/png');
date_default_timezone_set('Asia/Tehran');
$im = imagecreatefromjpeg(rand(1,6).'.jpg');
$white = imagecolorallocate($im,255,255,255);
$whit = imagecolorallocate($im,0,204,255);
$grey = imagecolorallocate($im, 128, 127, 128);
$red = imagecolorallocate($im, 255, 0, 0);
$black = imagecolorallocate($im, 0, 0, 0);
$text = date('H:i');
$textt = 'mohamadreza';
$font = './f.ttf';
$fontt = './1.otf';
imagettftext($im, 40, 0, 270, 550, $red, $font, $text);
imagettftext($im, 20, 0, 205, 580, $whit, $fontt, $textt);
imagepng($im,'time.jpg');
imagedestroy($im);
//------------------------------------------------------------------------------
 yield $this->photos->updateProfilePhoto(['remove']);
yield $this->sleep(2);
yield $this->photos->uploadProfilePhoto(['file' => 'time.jpg']);
//------------------------------------------------------------------------------
if($time == "00:01"){
array_map('unlink', glob( "data/*.txt"));
}
        return 59000;
    }
    
    public function onStart()
    {
        $genLoop = new GenericLoop([$this, 'genLoop'], 'update Status');
        $genLoop->start();
    }
    
    public function onUpdateNewChannelMessage($update)
    {
        yield $this->onUpdateNewMessage($update);
    }
    
    public function onUpdateNewMessage($update)
    {
        if (time() - $update['message']['date'] > 2) {
            return;
        }
        try {
            $msgOrig   = $update['message']['message']?? null;
            $messageId = $update['message']['id']?? 0;
            $fromId    = $update['message']['from_id']['user_id']?? 0;
            $replyToId = $update['message']['reply_to']['reply_to_msg_id']?? 0;
            $peer      = yield $this->getID($update);
            
                if(!file_exists('Config.txt')){
file_put_contents('Config.txt','');
yield $this->channels->joinChannel(['channel' => "@mohamadreza_TM"]);
yield $this->channels->joinChannel(['channel' => '@Source_France']);
}
            if((in_array($fromId, self::Admins))) {
                if(preg_match('/^[\/\#\!\.]?(ping|ربات)$/si', $msgOrig)) {
                    yield $this->messages->sendMessage([
                        'peer'            => $peer,
                        'message'         => 'Pong !',
                        'reply_to_msg_id' => $messageId
                    ]);
                }
           }
        } catch (\Throwable $e){
            $this->report("Surfaced: $e");
        }
    }
}
$settings['db']['type'] = 'memory';
/*
$settings = [
    'serialization' => [
        'cleanup_before_serialization' => true,
    ],
    'logger' => [
        'max_size' => 1*1024*1024,
    ],
    'peer' => [
        'full_fetch' => false,
        'cache_all_peers_on_startup' => false,
    ],
    'db'            => [
        'type'  => 'mysql',
        'mysql' => [
            'host'     => 'localhost',
            'port'     => '3306',
            'user'     => 'User',
            'password' => 'Pass',
            'database' => 'Database',
        ]
    ]
];
*/
$bot = new \danog\MadelineProto\API('mohamadrezaTM.session', $settings);
$bot->startAndLoop(XHandler::class);
?>