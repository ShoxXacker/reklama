<?php
ob_start(); 
define('Bek_Koder','1249857046:AAGBHNmPcU1IoNt2f3SMon1XNeujH4fP2qc');
$admin = "1171894731"; //admin id
$bot = "@ValiAlijon_Bot"; //bot useri
$channel1 = "@Hacker_Bey"; //rek kanal
$Ch2 = "Hacker_Bey"; //join channel

/*

Muallif: @Bek_Koder
Kanalimiz: @UZ_PHP_COD 
—————————————
Mualliflik huquqi @Bek_Koder ga tegishli!
Kod @Bek_Koder tomonidan yozilgan!

*/

   function ty($ch){ 
    bot('sendChatAction', [
   'chat_id' => $ch,
   'action'=>'typing',
   ]);
} 
function SendMessage($id,$mrk,$text){
	 bot('SendMessage',[
	'chat_id'=>$id,
	'parse_mode'=>$mrk,
	'text'=>$text,
	]);
}
function DeleteMessage($channel1, $mes_idi){
    bot('deletemessage', [
        'chat_id' => $channel1,
        'message_id' => $mes_idi,
   ]);
}

function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".Bek_Koder."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$mid = $message->message_id;
$cid = $message->chat->id;

mkdir("coin");
mkdir("data");
mkdir("user");
mkdir("stat");
mkdir("bonus");
$step = file_get_contents("coin/$cid.step");

$name = $message->from->first_name;
$users = $message->from->username;
$tx = $message->text;
$idi = $message->from->id;
$type = $message->chat->type;

$lichka = file_get_contents("stat/lichka.db");
if($type=="private"){
if(strpos($lichka,"$cid") !==false){
}else{
file_put_contents("stat/lichka.db","$lichka\n$cid");
}
$azzo = file_get_contents("coin/$cid.soni");
if($azzo){
}else{
file_put_contents("coin/$cid.soni", "0");
}
$abb = file_get_contents("coin/$cid.dat");
if($abb){
}else{
file_put_contents("coin/$cid.dat","0");
}
}

$orqaga = "🔙 Orqaga";
$key = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"♻️ Ball To'plash ♻️"]],
[['text'=>"🎯 Reklama qilish"],['text'=>"👁‍🗨 Prasmotr"],],
[['text'=>"🎁 Bonus 🎁"],['text'=>"👤 Account 👤"]],
[['text'=>"📊 Statistika"],['text'=>"⁉️ Malumot"]],
]
]);

$key3 = json_encode([ 
'resize_keyboard'=>true, 
'keyboard'=>[ 
[['text'=>$orqaga],], 
] 
]); 

$keysa = json_encode([  
'resize_keyboard'=>true,  
'keyboard'=>[  
[['text'=>"🔗 Referal Orqali 🔗"],],
[['text'=>"👁‍🗨 Reklama Ko'rib 👁‍🗨"],],
[['text'=>"🔙 Orqaga"],],
]  
]);  


$sal = "*Salom aziz foydalanuvchi*😊

~ Bu bot orqali siz 
*👥 GURUH* yoki *📡 KANAL* reklama qiling!!

~ Kanalingizdagi *👁‍🗨 Prasmotrlar* sonini ko'paytiring!

_♻️ Reklamalarni_ [$channel1] _kanalida ko'rib boring!_

*💣 Kanalimiz:* [@Hacker_Bey]
*👨‍💻Dasturchi:* [@Shox_Xacker]";
///
	
if(mb_stripos($tx,"/start") !==false){
 bot('sendMessage',[
  'chat_id'=>$cid,
  'parse_mode'=>'markdown',
  'text'=>$sal,
  'reply_markup'=>$key,
  ]);
  }

if(strpos($tx,"/start")!==false){
$refid = explode(" ",$tx);
$refid = $refid[1];
if($refid){
if(strpos($lichka, "$refid") !==false ){
if(strpos($lichka, "$cid") !==false ){
SendMessage($cid,html,"❌ ERROR ❌");
}else{
file_put_contents("stat/lichka.db","$lichka\n$cid");
$ab = file_get_contents("soni/$refid.soni");
$ab = $ab + 1;
file_put_contents("soni/$refid.soni","$ab");
$usr = file_get_contents("coin/$refid.dat");
$usr = $usr + 5; 
file_put_contents("coin/$refid.dat", "$usr");
bot('sendMessage',[
'chat_id'=>$refid,
'parse_mode'=>'markdown',
'text'=>"*🎉Tabriklaymiz siz botimizga do'stingiz* [$name](tg://user?id=$cid) *ni taklif qildingiz!
⚡️Sizga 5 ball taqdim etildi ✔*
      
👤Hozirgi hisobingiz *$usr ball*
♻️Taklif qilgan odamlaringiz: *$ab*

_Yana do‘stlaringizni taklif qilishda davom eting 💪_", 
]);
}
}
}
}

 /*

Muallif: @Bek_Koder
Kanalimiz: @UZ_PHP_COD 
—————————————
Mualliflik huquqi @Bek_Koder ga tegishli!
Kod @Bek_Koder tomonidan yozilgan!

*/
if(isset($message)){
  $geett = bot('getChatMember',[
  'chat_id'=>"@".$Ch2,
  'user_id'=>$cid,
  ]);
  $ggett = $geett->result->status;
  if($ggett == "member" or $ggett == "creator" or $ggett == "administrator"){
if($tx=="♻️ Ball To'plash ♻️"){
	ty($cid);
	bot('sendmessage',[
	'chat_id'=>$cid,
	'parse_mode'=>'markdown',
	'text'=>"*Ball to'plashni 2 ta usuli bor 👇*",
	'reply_markup'=>$keysa,
	]);
	}
    if($tx=="🔗 Referal Orqali 🔗"){
    	ty($cid);
      $in = "*📣 Kanalingiz azolari kammi ❓
Uni ko'paytirishni istaysiz Lekin qanday qilib ko'paytirishni bilmayapsiz❗️
Bu juda oson, endi siz bizning botimiz orqali* [$channel1] *kanaliga reklama berishingiz mumkin ❗️
Va asosiysi kanalingiz prasmotirini juda tezlik bilan ko'paytiring.*

Botga kirish uchun Ssilka 👇

[https://t.me/$bot?start=$cid]
---------------------------------";
      bot('sendMessage',[
      'chat_id'=>$cid,
      'parse_mode'=>'markdown',
      'text'=>$in,
      ]);
         bot('sendmessage',[
      'chat_id'=>$cid,
      'parse_mode'=>'markdown',
      'text'=>"👆 Tepadagi xabarni xamma *guruh  kanallarga* va *do'stlarga* tarqating.

👤Har bitta taklif qilingan odam uchun *15 Ball* olasiz!",
      'reply_markup'=>$keysa,
      ]);
    }
  if($tx=="👁‍🗨 Reklama Ko'rib 👁‍🗨"){
  	ty($cid);
  bot('sendmessage',[
  'chat_id'=>$cid,
  'parse_mode'=>'markdown',
  'text'=>"Bu usulda ball tσplash juda oson❕
👉 [$channel1] kanalidagi reklamalar tagida *💰 Ball olish 💰* tugmasini bosasiz va xar bir reklamaga *5 ball* olasiz❗️",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"👁‍🗨 Reklama Ko'rib ball to'plash 👁‍🗨",'url'=>"https://t.me/Hacker_Bey"]],
]
])
]);
}

 /*

Muallif: @Bek_Koder
Kanalimiz: @UZ_PHP_COD 
—————————————
Mualliflik huquqi @Bek_Koder ga tegishli!
Kod @Bek_Koder tomonidan yozilgan!

*/

   if($tx=="👤 Account 👤"){  
ty($cid);	
if($users){
  $useri = "@$users";
  }else{
  	$useri = "🚫Kiritilmagan";
  }    	     
      $od = file_get_contents("coin/$cid.soni");
      $ball = file_get_contents("coin/$cid.dat");
      bot('sendMessage',[
      'chat_id'=>$cid,
      'parse_mode'=>'markdown',
      'text'=>"💎 Sizning jami balingiz: *$ball*
👤 Taklif qilgan odamlaringiz: *$od*

🔷️*Profilingiz haqida malumot.

🔸️Ism:* [$name]
🔹️*ID raqam:* `$idi`
🔸️*Username:* [$useri]",
'reply_markup'=>$key,
   ]);
    }
    


if($tx == "⁉️ Malumot"){ 
	ty($cid);
      bot('sendMessage',[ 
     'chat_id'=>$cid, 
     'parse_mode'=>'markdown', 
 'text'=>"_🤖 Botdan foydalanish tartibi bunday siz o'z Referal silkangizni do'stlarga ulashish orqali ball to'plab ularga kanal yoki gruppa reklama qilasiz yoki Prasmotr ko'paytirishingiz mumkin _😌

*ℹ️ Agar sizda reklama qilish uchun ball yetmayotgan bo'lsa bemalol sotib olishingiz mumkin❗️

🔅 300 ball - 10.000 so'm

✴ To'lovlar  Paynet | QiWi orqali amalga oshiriladi*

*🤠 Yana biron bir xizmatlar bo'lsa yoki reklama bo'yicha bemalol adminga murojat qilishingiz mumkin*",
 'reply_markup'=>$key,
 'reply_markup'=>json_encode([
   'inline_keyboard'=>[ 
[['text'=>'🎓 ADMIN 🎓','url'=>'https://telegram.me/Shox_Xacker']],
[['text'=>'👨‍💻Bot Dasturchisi','url'=>'https://telegram.me/Shox_Xacker']],
] 
    ]) 
      ]); 
} 
    else if($step == "reklama"){
if($tx == $orqaga or $tx == "/start"){ 
unlink("coin/$cid.step"); 
}else{
if(stripos($tx,"@")!==false){
        $usera = bot('getchat',[
	'chat_id'=>$tx,
	]);
$types = $usera->result->type;
$id = $usera->result->id;
$ch_des = $usera->result->description;
$ch_name = $usera->result->title;
$ch_user = $usera->result->username;

$usc = bot('getChatMembersCount',[
	'chat_id'=>$tx,
	]);
	$count = $usc->result;
		if($types=="channel"){
			$kan = '📣 YANGI KANAL 📣';
			}else{
        $kan = '👥 YANGI GURUH 👥';
}
	if($types=="channel" or $types=="supergroup"){
$msg_id = bot('sendmessage',[
'chat_id'=>$channel1,
'parse_mode'=>'markdown',
'text'=>"*$kan*

*~ Nomi:* [$ch_name]
*~ Useri:* [@$ch_user]
*~ A'zolari:* $count",
'reply_markup' => json_encode([
       'inline_keyboard' => [
[['text' => "➕ Azo Bo'lish ➕",'url'=>"https://t.me/$ch_user"]],
[['text'=>"💰Ball olish💰",'callback_data'=>"rball"],],
]
])
])->result->message_id;
$ab=file_get_contents("stat/reklar.soni");
      $ab=$ab+1;
      file_put_contents("stat/reklar.soni","$ab");
$ball = file_get_contents("coin/$cid.dat");
$ball -= 100; 
file_put_contents("coin/$cid.dat","$ball"); 
      unlink("coin/$cid.step");
        bot('sendMessage',[
        'chat_id'=>$cid,
        'parse_mode'=>'markdown',
'text'=>"*📃  Kanalingiz Reklama qilindi * [$channel1] *ga qarang\n\nAgar qandaydir muammo bo'lsa  👨‍💻 Adminga murojat qilishingiz mumkin.*", 
'reply_markup'=>$key, 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"✅ Reklamani ko'rish",'url'=>"http://t.me/Hacker_Bey/$msg_id"],],
[['text'=>"👨‍💻 ADMIN 👨‍💻",'url'=>"http://t.me/Shox_Xacker"],],
]
])
 ]);
 }else{
   SendMessage($cid,markdown,"🔄 Bunday username mavjud emas ! \n*Yaxshilab tekshirib yuboring.*");
 }
 }else{
 	bot('sendMessage',[
        'chat_id'=>$cid,
        'parse_mode'=>'markdown', 
        'text'=>"*☝ Iltimos kanalingiz yoki guruhingiz usernamesini namuna bo'yicha jo'nating ✅*\n*⭐ Namuna:* [@Hacker_Bey]",
'reply_markup'=>$key3, 
]); 
  }
}
}
        
/*

Muallif: @Bek_Koder
Kanalimiz: @UZ_PHP_COD 
—————————————
Mualliflik huquqi @Bek_Koder ga tegishli!
Kod @Bek_Koder tomonidan yozilgan!

*/

if($tx == $orqaga or $tx=="❌ Yo'q"){ 
      ty($cid);
      bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>"🔥 Siz orqaga qaytdingiz.",
      'reply_markup'=>$key,
      ]);
  }
  
  

if($tx == "🎯 Reklama qilish"){ 
	ty($cid);
$ball = file_get_contents("coin/$cid.dat");
$da = "➖ Bitta reklama uchun 100 ball kerak.
Sizda hozirda $ball  ball mavjud."; 
if($ball>=100) $da .= "\n\nReklama qilasizmi ❓"; 
if($ball>=100) $key2 = json_encode([ 
'resize_keyboard'=>true, 
      'keyboard'=>[
[['text'=>"✅ Ha"],['text'=>"❌ Yo'q"],], 
      ]
      ]);
      bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>$da,
      'reply_markup'=>$key2,
      ]);
    }  
      $gett = bot('getChatMember',[
  'chat_id'=>$channel1,
  'user_id'=> $cid,
  ]);
  $gget = $gett->result->status;
  
  if($tx == "✅ Ha" or $tx=="✅ Tasdiqlash"){
  if($gget == "member" or $gget == "creator" or $gget == "administrator"){
    	$ka = "*☝ Reklama qilish uchun kanalingiz yoki guruhingiz usernamesini namuna bo'yicha jo'nating ✅\n\n⭐ Namuna:* [@Hacker_Bey]";
          	file_put_contents("coin/$cid.step","reklama");
          $keyb = $key3;
    }else{
    	$ka = "*Hurmatli Foydalanuvchi ! *\nReklama berish uchun Siz Bizning [$channel1] kanalimizga azo bo'lishingiz kerak 😊\n\nAzo bo'lib *✅ Tasdiqlash* tugmasini bosing!";
$keyb = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"✅ Tasdiqlash"]],
[['text'=>$orqaga]],
]
]);
    }
      $ball = file_get_contents("coin/$cid.dat");      
      if($ball > 99){
        bot('sendMessage',[
        'chat_id'=>$cid,
        'parse_mode'=>'markdown', 
        'text'=>$ka,
'reply_markup'=>$keyb, 
]);
      }else{
       SendMessage($cid,markdown,"😡 Aqllilik qilganingiz uchun *15 ball* shtraf tabriklayman ✔");    
$ball -= 15; 
file_put_contents("coin/$cid.dat","$ball"); 
      }
    }
  
if($tx=="👁‍🗨 Prasmotr" or $tx=="✅Tasdiqlash"){
	if($gget == "member" or $gget == "creator" or $gget == "administrator"){
		$pras = "Prasmotr ko'paytirish uchun!\nPostingizni ommaviy kanaldan *Forward* qilib yuboring ✅";
		file_put_contents("coin/$cid.step","fwd");
		$keyw = $key3;
		}else{
$pras = "*Hurmatli Foydalanuvchi ! *\nPrasmotr buyurtma uchun Siz Bizning [$channel1] kanalimizga azo bo'lishingiz kerak 😊\n\nAzo bo'lib *✅ Tasdiqlash* tugmasini bosing!";
$keyw = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"✅Tasdiqlash"]],
[['text'=>$orqaga]],
]
]);
			}
	$balp=file_get_contents("coin/$cid.dat");
	$pb = 80;
	$jv = $pb - $balp;
	$j = $jv;
	if($balp > 79){
		bot('sendmessage',[
		'parse_mode'=>'markdown',
		'chat_id'=>$cid,
		'text'=>$pras,
		'reply_markup'=>$keyw,
		]);
		}else{
		 SendMessage($cid,markdown,"❗️ Bu ishni amalga oshirish uchun 80 ball kerak, Sizda *$balp* ta ball bor !\n*$j* ball yetmayapti 💢");
		unlink("coin/$cid.step");
        }       
        }
        else if($step == "fwd"){
if($tx == "$orqaga" or $tx=="/start"){ 
unlink("coin/$cid.step"); 
}else{
      $for_chat_msg_id = $update->message->forward_from_message_id;
      if($for_chat_msg_id != null){
$fwd_id = bot('ForwardMessage',[ 
  'chat_id'=>$channel1, 
  'from_chat_id'=>$cid,
'message_id'=>$mid,
])->result->message_id;
bot('sendMessage', [
       'chat_id' => $channel1,
       'text' => "‌👆👆👆👁‍🗨👇👇👇",
       'reply_to_message_id' => $fwd_id,
       'reply_markup' => json_encode([
       'inline_keyboard' => [
[['text'=>"💰Ball olish💰",'callback_data'=>"ball"]],
]
])
]);
$ab=file_get_contents("stat/forlar.soni");
      $ab=$ab+1;
      file_put_contents("stat/forlar.soni","$ab");
$balp=file_get_contents("coin/$cid.dat");
  $balp -= 80; 
file_put_contents("coin/$cid.dat","$balp"); 
   unlink("coin/$cid.step");
bot('sendmessage',[
'chat_id'=>$cid,
'parse_mode'=>'markdown',
 'text'=>"Yaxshi, Postingiz bizning [$channel1] kanalimizga muvaffaqiyatli joylandi !\n\nKanalimizdagi xabaringizni ko'rish uchun *✅ Postni ko'rish* tugmasini bosing 👇", 
 'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"✅ Postni Ko'rish",'url'=>"https://t.me/Hacker_Bey/$fwd_id"]],
]
])
   ]);
}else{
	SendMessage($cid,markdown,"Iltimos, xabarni *Forward* qilib jo'nating ❗");
	}
	}
	}
	

    if($tx=="🎁 Bonus 🎁"){     
    	ty($cid);
    	 $datas = date('Y-m-d');
$gettime = file_get_contents("bonus/$cid.txt");
if($gettime == $datas) {
    bot('SendMessage', [
'chat_id' => $cid,
'text' => "💢 Siz kunlik bonusni olgansiz, ertaga qadar kuting ♻️",
'reply_markup' =>$key,
]);
}else{
file_put_contents("bonus/$cid.txt",$datas);
$sho = file_get_contents("coin/$cid.dat");
$ran = rand(10,50);
$getsho = $sho + $ran;
file_put_contents("coin/$cid.dat",$getsho);
$ab=file_get_contents("stat/bons.soni");
      $ab = $ab + $ran;
      file_put_contents("stat/bons.soni","$ab");
      bot('SendMessage', [
'chat_id' => $cid,
'parse_mode'=>'markdown', 
'text' =>"🎉 Tabriklaymiz sizga *$ran ball* bonus berildi\n🎊Hozirgi balingiz: *$getsho*",
'reply_markup' => $key,
]);
}
}

        if($tx == "📊 Statistika" or $tx=="/stat") {   
ty($cid);     	
      $new = substr_count($lichka,"\n");
  $bon=file_get_contents("stat/bons.soni");
  $rekl=file_get_contents("stat/reklar.soni");
  $fr=file_get_contents("stat/forlar.soni");
      bot('sendMessage',[ 
'chat_id'=>$cid, 
'parse_mode'=>'markdown', 
'text'=>"*Botimiz statistikasi *🔹

👤 _Bot azolar:_ *$new*
✅ _Qilingan reklamalar:_ *$rekl*
👁‍🗨 _Postlar:_ *$fr*
🎁 _Berilgan bonuslar:_ *$bon*

💣*Hamkor* [@Hacker_Bey]
*👨‍💻Dasturchi:* [@Shox_Xacker]",
'reply_markup'=>$key, 
      ]); 
    }  
}else{
 bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"*😊┇Kechirasiz do'stim Botdan foydalanish uchun kanalimizga obuna bo'lishingiz kerak!

📣┇Kanalimiz👇*

 [@$Ch2]

*✅┇Shu kanalga Obuna Bo'lgandan so'ng qayta* /start *buyrug'ini bosing!*",
'parse_mode'=>'markdown',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"Obuna bo'lish ✅",'url'=>"https://t.me/$Ch2"],],
]
])
]);
}
}

/*

Muallif: @Bek_Koder
Kanalimiz: @UZ_PHP_COD 
—————————————
Mualliflik huquqi @Bek_Koder ga tegishli!
Kod @Bek_Koder tomonidan yozilgan!

*/

  if((stripos($tx,"+ball")!==false) and ($cid==$admin)){
      $ex=explode("_",$tx);
      $refid = $ex[1];
      $usr = file_get_contents("coin/$refid.dat");
      $usr += $ex[2];
      file_put_contents("coin/$refid.dat", "$usr");
     SendMessage($admin,markdown,"[👤👤👤](tg://user?id=$refid) shunga $ex[2] ball qo'shildi.\nJami bali: *$usr*");
    }
    if((stripos($tx,"-ball")!==false) and ($cid==$admin)){
      $ex=explode("_",$tx);
      $refid = $ex[1];
      $usr = file_get_contents("coin/$refid.dat");
      $usr -= $ex[2];
      file_put_contents("coin/$refid.dat", "$usr");
    SendMessage($admin,markdown,"[👤👤👤](tg://user?id=$refid) shundan $ex[2] ball ayrildi.\nJami bali: *$usr*");
    }

    if((stripos($tx,"/soni")!==false) and ($cid==$admin)){
      $ex=explode("_",$tx);
      file_put_contents("user/son.txt","$ex[1]");
      SendMessage($admin,markdown,"Yangi ko'rish soni o'rnatildi ✅\nSoni: $ex[1]");
      }
  //////
        if($update->callback_query->data == "ball"){     	
        $mes_idi = $update->callback_query->message->message_id;  
        $fromm_id = $update->callback_query->from->id;
        $ue = file_get_contents("user/$mes_idi.txt");
        if (strpos($ue, "$fromm_id") !== false) {
            bot('answercallbackquery', [
                'callback_query_id'=>$update->callback_query->id,
                'text'=>"😔 Siz bu postdan ball olgansiz ❗️",
                'show_alert'=>false
            ]);
        }else{
            file_put_contents("user/$mes_idi.txt","$ue\n$fromm_id");
            $sho = file_get_contents("coin/$fromm_id.dat");
            $getsho = $sho + 2;
            file_put_contents("coin/$fromm_id.dat", $getsho);
            bot('answercallbackquery', [
                'callback_query_id'=>$update->callback_query->id,
                'text'=>"💰 Siz 2 ball oldingiz! Jami $getsho",
                'show_alert'=>false
            ]);     
        }
          $user = file_get_contents("user/$mes_idi.txt");
$suser = substr_count($user,"\n");
$son = file_get_contents("user/son.txt");
        if ($suser > $son) {
            $de = $mes_idi - 1;
            DeleteMessage($channel1, $mes_idi);
            DeleteMessage($channel1, $de);      
            unlink("user/$mes_idi.txt");
        }
        }
   

             if($update->callback_query->data == "rball"){     	
        $mes_idi = $update->callback_query->message->message_id;  
        $fromm_id = $update->callback_query->from->id;
        $ue = file_get_contents("user/$mes_idi.txt");
        if (strpos($ue, "$fromm_id") !== false) {
           bot('answercallbackquery', [
                'callback_query_id'=>$update->callback_query->id,
                'text'=>"😔 Siz bu reklamadan ball olgansiz ❗️",
                'show_alert'=>false
            ]);
        }else{
            file_put_contents("user/$mes_idi.txt","$ue\n$fromm_id");    
            $sho = file_get_contents("coin/$fromm_id.dat");
            $getsho = $sho + 2;
            file_put_contents("coin/$fromm_id.dat", $getsho);
            bot('answercallbackquery', [
                'callback_query_id'=>$update->callback_query->id,
                'text'=>"💰 Siz 2 ball oldingiz! Jami $getsho",
                'show_alert'=>false
            ]);     
        }
  $user = file_get_contents("user/$mes_idi.txt");
$suser = substr_count($user,"\n");
$son = file_get_contents("user/son.txt");
        if ($suser > $son) {
            DeleteMessage($channel1, $mes_idi);         
            unlink("user/$mes_idi.txt");
        }
        }
            
    if($tx == "/send" and $cid == $admin){
      bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>"Yuboriladigon xabarni kiriting. Xabar turi markdown",
      'reply_markup'=>$key3,
      ]);
      file_put_contents("coin/$cid.step","send");
    }

    if($step=="send" and $cid == $admin){
      if($tx == "$orqaga"){
      unlink("coin/$cid.step");
      }else{
      $idl=file_get_contents("stat/lichka.db");
      $idla=explode("\n",$idl);
      foreach($idla as $idlar){
      $yuborildi=bot('sendMessage',[
      'chat_id'=>$idlar,
      'text'=>$tx,
      ]);
      unlink("coin/$cid.step");
      }
    if($yuborildi){
    	bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"Hamma userlarga  xabaringiz yuborildi !",
'reply_markup'=>$key,
]);
      }
      }
      }
 


/*

Muallif: @Bek_Koder
Kanalimiz: @UZ_PHP_COD 
—————————————
Mualliflik huquqi @Bek_Koder ga tegishli!
Kod @Bek_Koder tomonidan yozilgan!

*/
?>