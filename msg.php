<?php 
//   include_once 'store.php';
  include 'lib/Telegram.php';
  include_once 'index.php';

///// send Msg
function sendMessages($chatID ,$text ,$key){
    global $telegram,$token;
    if($key)
        $content = array('chat_id' => $chatID, 'text' => $text,'reply_markup'=>$key);
    else
        $content = array('chat_id' => $chatID, 'text' => $text);
    file_put_contents('test.txt','messagesend');
    $telegram->sendMessage($content);
}
///// edite Msg
function edit($chatID ,$messageID ,$text ,$key){
            global $token;
     $url = 'https://api.telegram.org/bot'.$token.'/editMessageText?chat_id='.$chatID.'&message_id='.$messageID.'&text='.urlencode($text).'&reply_markup='.$key;
     file_get_contents($url);
}
///// delete Msg
function delete($messageID){
            global $token,$chatID;

     $url = 'https://api.telegram.org/bot'.$token.'/deleteMessage?chat_id='.$chatID.'&message_id='.$messageID;
     file_get_contents($url);
}
function offest($updateID){
            global $token;

    $updateID++;
    file_get_contents('https://api.telegram.org/bot'.$token.'/getUpdates?offset='.$updateID);
}
        // sendMessages('@aliarj98',"textlist",false);

?>