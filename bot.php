<?php
require_once('./line_class.php');
require_once('./unirest-php-master/src/Unirest.php');

$con = mysqli_connect("localhost", "pusn8562_eventregister", "eventregister", "pusn8562_eventregister");

$query = mysqli_query($con,"SELECT * FROM anjay ORDER BY id"); //SESUAIKAN DENGAN NAMA TABLE KALIAN, ORDER BY ID ADALAH OPSIONAL KARENA DI DB GW MAKE ROW ID JUGA (OPSIONAL),

$channelAccessToken = '#####################'; 
$channelSecret = '###################'; 



$client = new LINEBotTiny($channelAccessToken, $channelSecret);
 
$userId     = $client->parseEvents()[0]['source']['userId'];
$groupId    = $client->parseEvents()[0]['source']['groupId'];
$replyToken = $client->parseEvents()[0]['replyToken'];
$timestamp  = $client->parseEvents()[0]['timestamp'];
$type       = $client->parseEvents()[0]['type'];
 
$message    = $client->parseEvents()[0]['message'];
$messageid  = $client->parseEvents()[0]['message']['id'];
$profil = $client->profil($userId);
$profileName    = $profil->displayName;
$profileURL     = $profil->pictureUrl;
$profielStatus  = $profil->statusMessage;
$profil = $client->profil($userId);
 
$pesan_datang = explode(" ", $message['text']);
$menarik=$pesan_datang[2];
$dorong=$pesan_datang[1];

$comcom = $pesan_datang[1];
if (count($pesan_datang) > 2) {
    for ($i = 2; $i < count($pesan_datang); $i++) {
        $comcom .= ' ';
        $comcom .= $pesan_datang[$i];
    }
}


$commandke1 = $pesan_datang[1];
$commandke0 = $pesan_datang[0];
$commandke2 = $pesan_datang[2];

$isitoken = $pesan_datang[1];;


$command = $pesan_datang[0];
$options = $pesan_datang[1];
if (count($pesan_datang) > 2) {
    for ($i = 2; $i < count($pesan_datang); $i++) {
        $options .= '+';
        $options .= $pesan_datang[$i];
    }
}
 
$wilson = $pesan_datang[1];
if (count($pesan_datang) > 2) {
    for ($i = 2; $i < count($pesan_datang); $i++) {
        $wilson .= ' ';
        $wilson .= $pesan_datang[$i];
    }
}

$untukTugas = $pesan_datang[2];
if (count($pesan_datang) > 3) {
    for ($i = 2; $i < count($pesan_datang); $i++) {
        $wilson .= ' ';
        $wilson .= $pesan_datang[$i];
    }
}

#-------------------------[Function]-------------------------# # 
function asdf($menarik, $comcom ){
    $result = $comcom + $menarik;
    return $result;
    
}


function short($lily, $alan) {    
    $uri = "https://link.bemundip.org/yourls-api.php?signature=ae1b035119&action=shorturl&keyword=" . $lily ."&format=json&url=". $alan;
    
     $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true); 
    $result = "Berhasil\nURL Asli: ";
    $result .= $json['url']['url'];
    $result .= "\nURL Custom: ";
    $result .= $json['shorturl'];
   
    return $result;  
}


function shalat($keyword) {
    $uri = "https://time.siswadi.com/pray/" . $keyword;
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $result = "「Jadwal shalat」";
    $result .= "\nLokasi : ";
    $result .= $json['location']['address'];
    $result .= "\nTanggal : ";
    $result .= $json['time']['date'];
    $result .= "\n\nShubuh : ";
    $result .= $json['data']['Fajr'];
    $result .= "\nDzuhur : ";
    $result .= $json['data']['Dhuhr'];
    $result .= "\nAshar : ";
    $result .= $json['data']['Asr'];
    $result .= "\nMaghrib : ";
    $result .= $json['data']['Maghrib'];
    $result .= "\nIsya : ";
    $result .= $json['data']['Isha'];
    $result .= "\n\n sumber : time.siswandi.com/pray";

    return $result;
}


function tts($keyword) {        
    $uri = "https://translate.google.com/translate_tts?ie=UTF-8&tl=id-ID&client=tw-ob&q=" . $keyword; 
    $result = $uri; 
    return $result; 
}
 
function tts2($keyword) {        
    $uri = "https://translate.google.com/translate_tts?ie=UTF-8&tl=en-ID&client=tw-ob&q=" . $keyword; 
    $result = $uri; 
    return $result; 
} 
 


function tolong($keyword) {
    $result = "/help";
    return $result;
}


function atta($keyword) {
    $result = "Fitur Lain :\n";
    $result .= "1. /say [keyword]\n";
    $result .= "2. /sayen [keyword]\n";
    $result .= "3. /bitly [linkpanjang]\n";
    $result .= "4. /apakah [keyword]\n";
    $result .= "5. /shalat [nama daerah]\n";
    $result .= "6. /cuaca [nama daerah]\n";
    $result .= "7. /translate [keyword]\n";
    $result .= "8. /short [keyword] [url]\n\n";
    $result .= "Contoh :\n";
    $result .= "1. /say Terima kasih\n";
    $result .= "2. /sayen thank you\n";
    $result .= "3. /bitly www.google.com\n";
    $result .= "4. /apakah saya kerang ajaib?\n";
    $result .= "5. /shalat semarang\n";
    $result .= "6. /cuaca semarang\n";
    $result .= "7. /translate aku cinta kamu\n";
    $result .= "8. /short surveiblabla www.google.com\n";
    return $result;
}


function apakah($keyword){	
    $list_jwb = array(	
		'Ya',
		'Tidak',
		);
    $jaws = array_rand($list_jwb);
    $jawab = $list_jwb[$jaws];
    return($jawab);
}


function lokasi($keyword) {
    $uri = "https://time.siswadi.com/geozone/?address=" . $keyword; 
    $response = Unirest\Request::get("$uri"); 
    $json = json_decode($response->raw_body, true); 
    $parsed = array(); 
    $parsed['lat'] = $json['data']['latitude']; 
    $parsed['long'] = $json['data']['longitude']; 
	$parsed['loct1'] = $json['data']['address'];
    return $parsed; 


}

function translate($keyword) {        
    $uri="https://translate.yandex.net/api/v1.5/tr.json/translate?key=trnsl.1.1.20181228T200704Z.7fb9eff9dbf5a160.a422eb8ba04807d17ca2427bc8ed1d2bdf6e4d57&text=".$keyword."&lang=id-en";
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true); 
    $result = $json['text']['0'];
    return $result;
}


function bitly($keyword) {    
    $uri = "https://api-ssl.bitly.com/v3/shorten?access_token=e75a7dfcb1ed94f5a19149ed120482e8f6367dc6&longUrl=" . $keyword;  
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true); 
    $result = "Berhasil\nURL Asli: ";
    $result .= $json['data']['long_url'];
    $result .= "\nURL Pendek: ";
    $result .= $json['data']['url'];
    return $result;
}

#-------------------------[Function]-------------------------#
function cuaca($keyword) {
    $uri = "http://api.openweathermap.org/data/2.5/weather?q=" . $keyword . ",ID&units=metric&appid=e172c2f3a3c620591582ab5242e0e6c4";
    $response = Unirest\Request::get("$uri");
    $json = json_decode($response->raw_body, true);
    $result = "Ini ada Ramalan Cuaca Untuk Daerah ";
    $result .= $json['name'];
    $result .= " Dan Sekitarnya";
    $result .= "\n\nCuaca : ";
    $result .= $json['weather']['0']['main'];
    $result .= "\nDeskripsi : ";
    $result .= $json['weather']['0']['description'];
    $result .= " \n\n Sumber : openweathermap.org";
    return $result;
}

//show menu, saat join dan command /menu
/* if ($type == 'join') {
    $text = "Terima kasih sudah mengundang saya di grup ini";
    $balas = array(
        'replyToken' => $replyToken,
        'messages' => array(
            array(
                'type' => 'text',
                'text' => $text
            )
        )
    );
}

*/


if ($type == 'join') {  //$type join itu adalah aksi saat bot join group, jadi dimana bot melakukan aksi tersebut maka dia akan melakukan yang dibawah
    
    mysqli_query($con, "INSERT INTO anjay (groupId,userId) VALUES ('$groupId','$userId')");   //Ini bisa kalian sesuain aja sama table kalian, yang penting ada row buat nyimpen group Id nya
    $responses['replyToken']= $replyToken;
    $responses['messages']['0']['type'] = "text";
     $responses['messages']['0']['text'] = "Terima kasih telah mengundang saya ke grup ini :V";
 $result = json_encode($responses);
 $result_json = json_decode($result, TRUE);
 $client->replyMessage($result_json);
 
}



    if ($command == '/fitur' || $command == '/fiturlain' || $command == 'fitur') {
         
        $result = atta($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result,
                )
            )
        );
    }
    
    

 
if($command == '/help' || $command == '/about' )
    {   
                             $balas = array(
                            'replyToken' => $replyToken,                                                        
                            'messages' => array(
                                array(
                                        'type' => 'text',                                   
                        'text' => 'Halo kak, saya adalah bot bem undip yang akan membantu kakak dalam berbagai hal'                                       
                                    
                                    )
                            )
                        );
                        
    }


if($message['type']=='text') {
        if ($command == '/shalat') {
        $result = shalat($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}


   if($command == '/kw' || $command == '/keyword' ){
        $balas = array(
                    'replyToken' => $replyToken,
                    'messages' => array(


array (
  'type' => 'template',
  'altText' => 'this is a carousel template',
  'template' => 
  array (
    'type' => 'carousel',
    'actions' => 
    array (
    ),
    'columns' => 
    array (
      0 => 
      array (
        'thumbnailImageUrl' => 'https://bemundip.org/wp-content/uploads/2019/06/ssssssssssssssssssss.png',
        'title' => 'Pilih Keyword',
        'text' => 'Silahkan Pilih',
        'actions' => 
        array (
          0 => 
          array (
            'type' => 'message',
            'label' => 'Jadwal Admin',
            'text' => '/admin',
          ),
          1 => 
          array (
            'type' => 'message',
            'label' => 'Booking Jadwal',
            'text' => '/jadwal',
          ),
          2 => 
          array (
            'type' => 'message',
            'label' => 'SOP Desain',
            'text' => '/sop',
          ),
        ),
      ),
      1 => 
      array (
        'thumbnailImageUrl' => 'https://bemundip.org/wp-content/uploads/2019/06/ssssssssssssssssssss.png',
        'title' => 'Pilih Keyword',
        'text' => 'Silahkan Pilih',
        'actions' => 
        array (
          0 => 
          array (
            'type' => 'message',
            'label' => 'Cara Birukan Foto',
            'text' => '/biru',
          ),
          1 => 
          array (
            'type' => 'message',
            'label' => 'LOGO BEM Undip',
            'text' => '/logo',
          ),
          2 => 
          array (
            'type' => 'message',
            'label' => 'Intro Video',
            'text' => '/intro',
          ),
        ),
      ),
      2 => 
      array (
        'thumbnailImageUrl' => 'https://bemundip.org/wp-content/uploads/2019/06/ssssssssssssssssssss.png',
        'title' => 'Pilih Keyword',
        'text' => 'Silahkan Pilih',
        'actions' => 
        array (
          0 => 
          array (
            'type' => 'message',
            'label' => 'Peraturan Grup FLM',
            'text' => '/peraturan',
          ),
          1 => 
          array (
            'type' => 'message',
            'label' => 'Aturan Live Report',
            'text' => '/tatacara',
          ),
          2 => 
          array (
            'type' => 'message',
            'label' => 'Peminjaman Sekre',
            'text' => '/sekre',
          ),
        ),
      ),
    ),
  ),
)
            
            
            )
        );
    }
    
       if($command == '/jadwal' || $command == '/booking' ){
        $balas = array(
                    'replyToken' => $replyToken,
                    'messages' => array(
array (
  'type' => 'template',
  'altText' => 'this is a carousel template',
  'template' => 
  array (
    'type' => 'carousel',
    'actions' => 
    array (
    ),
    'columns' => 
    array (
      0 => 
      array (
        'thumbnailImageUrl' => 'https://bemundip.org/wp-content/uploads/2019/06/ssssssssssssssssssss.png',
        'title' => 'Jadwal Booking',
        'text' => 'Halo kak '.$profileName .' ini jadwal bookingnya yaa',
        'actions' => 
        array (
          0 => 
          array (
            'type' => 'uri',
            'label' => 'Klik Di Sini',
            'uri' => 'http://bit.ly/jadwalbookingjarkoman',
          ),
        ),
      ),
    ),
  ),
)

            )
        );
    }
    
           if($command == '/sop' || $command == 'sop' || $command == 'Sop' ){
        $balas = array(
                    'replyToken' => $replyToken,
                    'messages' => array(
	

array (
  'type' => 'template',
  'altText' => 'this is a carousel template',
  'template' => 
  array (
    'type' => 'carousel',
    'actions' => 
    array (
    ),
    'columns' => 
    array (
      0 => 
      array (
        'thumbnailImageUrl' => 'https://bemundip.org/wp-content/uploads/2019/06/ssssssssssssssssssss.png',
        'title' => 'SOP DESAIN',
        'text' => 'Halo kak '.$profileName .' ini link SOP desainnya',
        'actions' => 
        array (
          0 => 
          array (
            'type' => 'uri',
            'label' => 'Click Here',
            'uri' => 'http://bit.ly/sopbarubemundip2019',
          ),
        ),
      ),
    ),
  ),
)

            )
        );
    }
    
       if($command == '/akumaubolos' && $userId=="Ue6644c17f1f53e3d63da9c7b41ab656b"){
        $balas = array(
                    'replyToken' => $replyToken,
                    'messages' => array(

array (
  'type' => 'template',
  'altText' => 'this is a carousel template',
  'template' => 
  array (
    'type' => 'carousel',
    'actions' => 
    array (
    ),
    'columns' => 
    array (
      0 => 
      array (
        'thumbnailImageUrl' => 'https://www.ilmuwebsite.com/wp-content/uploads/2017/01/164774_3a3b_4-e1485054907865.jpg',
        'title' => 'MENU LOGIN',
        'text' => 'Apakah Anda Sudah Punya Akun??',
        'actions' => 
        array (
          0 => 
          array (
            'type' => 'message',
            'label' => 'LOGIN',
            'text' => 'Silahkan ketik /login [username] [password] untuk login. Jika belum punya akun silahkan klik tombol register',
          ),
          1 => 
          array (
            'type' => 'message',
            'label' => 'REGISTER',
            'text' => 'Silahkan Ketik /register [username] [password] untuk mendaftar',
          ),
        ),
      ),

    ),
  ),
)
            )
        );
    }

    if($command == '/mbolos' && $userId=="Ue6644c17f1f53e3d63da9c7b41ab656b"){
        $balas = array(
                    'replyToken' => $replyToken,
                    'messages' => array(

array (
  'type' => 'template',
  'altText' => 'this is a carousel template',
  'template' => 
  array (
    'type' => 'carousel',
    'actions' => 
    array (
    ),
    'columns' => 
    array (
      0 => 
      array (
        'thumbnailImageUrl' => 'https://www.robicomp.com/wp-content/uploads/2019/01/Jaringan-Komputer.jpg\'',
        'title' => 'Pilih Matkul',
        'text' => 'Jaringan Komputer',
        'actions' => 
        array (
          0 => 
          array (
            'type' => 'message',
            'label' => 'BOLOS',
            'text' => '/bolosss Jarkom ',
          ),
          1 => 
          array (
            'type' => 'message',
            'label' => 'CEK JUMLAH BOLOS',
            'text' => '/jumlahbolosss Jarkom',
          ),
        ),
      ),
      1 => 
      array (
        'thumbnailImageUrl' => 'https://i1.wp.com/salamadian.com/wp-content/uploads/2018/09/pengertian-basis-data.jpg?w=633&ssl=1',
        'title' => 'Pilih Matkul',
        'text' => 'Sistem Basis Data',
        'actions' => 
        array (
          0 => 
          array (
            'type' => 'message',
            'label' => 'BOLOS',
            'text' => '/bolosss SBD',
          ),
          1 => 
          array (
            'type' => 'message',
            'label' => 'CEK JUMLAH BOLOS',
            'text' => '/jumlahbolosss SBD',
          ),
        ),
      ),
      2 => 
      array (
        'thumbnailImageUrl' => 'https://indobot.co.id/wp-content/uploads/2018/09/arduino.png',
        'title' => 'Pilih Matkul',
        'text' => 'Teknik Mikroprosesor',
        'actions' => 
        array (
          0 => 
          array (
            'type' => 'message',
            'label' => 'BOLOS',
            'text' => '/bolosss TM',
          ),
          1 => 
          array (
            'type' => 'message',
            'label' => 'CEK JUMLAH BOLOS',
            'text' => '/jumlahbolosss TM',
          ),
        ),
      ),
    ),
  ),
)
            )
        );
    }


if ($command == '/register') { 
    
 
if($commandke1==true && $commandke2==true){
        mysqli_query($con, "INSERT INTO register (username, password) VALUES ('$commandke1', '$commandke2')");
      $responses['replyToken']= "$replyToken";
      $responses['messages'][0]['type'] = "text";
      $responses['messages'][0]['text'] = "username = $commandke1 dan password = $commandke2 berhasil ditambahkan ke databases";
      $result = json_encode($responses);
      $result_json=json_decode($result,TRUE);
      $client->replyMessage($result_json);
}
    else{
      $responses['replyToken']= "$replyToken";
      $responses['messages'][0]['type'] = "text";
      $responses['messages'][0]['text'] = "Pendaftaran Gagal. Silahkan Cek Kembali Command anda";
      $result = json_encode($responses);
      $result_json=json_decode($result,TRUE);
      $client->replyMessage($result_json);
    }
}



    
if($command == '/login'){
    
    
    
       $cekuser1 = mysqli_query($con, "SELECT * FROM register WHERE username='$commandke1' AND password='$commandke2' ");
       
         if (mysqli_num_rows($cekuser1)==0) {
             
         $responses['replyToken']= "$replyToken";
         $responses['messages'][0]['type'] = "text";
         $responses['messages'][0]['text'] = "Username atau Password salah.\nJika anda belum mempunyai akun silahkan daftar terlebih dahulu";
         $result = json_encode($responses);
         $result_json=json_decode($result,TRUE);
         $client->replyMessage($result_json); 
       
    } 
    
     
     else{
         $responses['replyToken']= "$replyToken";
         $responses['messages'][0]['type'] = "text";
         $responses['messages'][0]['text'] = "Login berhasil";
         $result = json_encode($responses);
         $result_json=json_decode($result,TRUE);
         $client->replyMessage($result_json); 
     }
}



if ($command == '/addnote') { 
    
 mysqli_query($con, "INSERT INTO reminder (matkul, isi) VALUES ('$dorong', '$wilson')");

 $responses['messages']['0']['type'] = "text";
 $responses['messages'][0]['text'] = "berhasil ditambahkan ke databases";
 $result = json_encode($responses);
 $result_json = json_decode($result, TRUE);
 $client->replyMessage($result_json);
 
 $responses['replyToken']= "$replyToken";
      $responses['messages'][0]['type'] = "text";
      $responses['messages'][0]['text'] = "note $dorong berhasil ditambahkan ke databases";
      $result = json_encode($responses);
      $result_json=json_decode($result,TRUE);
      $client->replyMessage($result_json);
}




 if(strtolower($command) == "/viewnote"){
        $tampildata = mysqli_query($con, "SELECT isi FROM reminder WHERE matkul='$options'");
        $hasil = array();
        while($row=mysqli_fetch_row($tampildata)){
            array_push($hasil,$row[0]);
        }
       $hasil = implode ("\n ", $hasil);
        
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $hasil
                    
                    
                )
            )
        ); 
    }


if ($command == '/bolosss') { 
    
 mysqli_query($con, "INSERT INTO tipsen (maktul, nilai) VALUES ('$dorong', '1')");

 $responses['messages']['0']['type'] = "text";
 $responses['messages'][0]['text'] = "berhasil ditambahkan ke databases";
 $result = json_encode($responses);
 $result_json = json_decode($result, TRUE);
 $client->replyMessage($result_json);
 
 $responses['replyToken']= "$replyToken";
      $responses['messages'][0]['type'] = "text";
      $responses['messages'][0]['text'] = "berhasil ditambahkan ke databases";
      $result = json_encode($responses);
      $result_json=json_decode($result,TRUE);
      $client->replyMessage($result_json);
}



if ($command == '/hadir') { 
 $cektoken = mysqli_query($con, "SELECT * FROM kehadiran WHERE token='$isitoken' ");

    if(mysqli_num_rows($cektoken) <> 0){
        $cekpakaitoken = mysqli_query($con, "select * from kehadiran where token='$isitoken' and status='Hadir' ");
        if(mysqli_num_rows($cekpakaitoken) <> 0){
         $responses['replyToken']= "$replyToken";
         $responses['messages'][0]['type'] = "text";
         $responses['messages'][0]['text'] = "Anda sudah pernah input token ini sebelumnya";
         $result = json_encode($responses);
         $result_json=json_decode($result,TRUE);
         $client->replyMessage($result_json); 
        }else{
      mysqli_query($con, "UPDATE kehadiran SET status='Hadir' where token='$isitoken' ");
         $responses['replyToken']= "$replyToken";
         $responses['messages'][0]['type'] = "text";
         $responses['messages'][0]['text'] = "Berhasil. Anda Hadir Pada Event Ini";
         $result = json_encode($responses);
         $result_json=json_decode($result,TRUE);
         $client->replyMessage($result_json); 
        }
        
    
    }else{
         $responses['replyToken']= "$replyToken";
         $responses['messages'][0]['type'] = "text";
         $responses['messages'][0]['text'] = "Token Tidak Valid";
         $result = json_encode($responses);
         $result_json=json_decode($result,TRUE);
         $client->replyMessage($result_json); 
    }

  
}


 if(strtolower($command) == "/jumlahbolosss"){
        $tampildata = mysqli_query($con, "SELECT COUNT(nilai) FROM tipsen WHERE maktul='$options'");
        $hasil = array();
        while($row=mysqli_fetch_row($tampildata)){
            array_push($hasil,$row[0]);
        }
       $hasil = implode ("\n ", $hasil);
        
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => 'kamu telah bolos pelajaran ' .$options .' sebanyak ' . $hasil
                    
                    
                )
            )
        ); 
    }


     if ($command == 'apakah' || $command == 'Apakah' || $command == '/apakah') {
         
        $result = apakah($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result,
                )
            )
        );
    }
    
    
    $cekuser = mysqli_query($con, "SELECT * FROM user WHERE userId = '$userId'");
    
if($command == '/cekuserid'){
     if(mysqli_num_rows($cekuser) <> 0){
         $responses['replyToken']= "$replyToken";
         $responses['messages'][0]['type'] = "text";
         $responses['messages'][0]['text'] = "data sudah ada";
         $result = json_encode($responses);
         $result_json=json_decode($result,TRUE);
         $client->replyMessage($result_json); 
    }
     else{
            $simpandata = mysqli_query($con, "INSERT INTO user (userId,data,status)VALUES('$userId','','sukses')");
        if($simpandata){
            $responses['replyToken']= "$replyToken";
            $responses['messages'][0]['type'] = "text";
            $responses['messages'][0]['text'] = "data berhasil disimpan";
            $result = json_encode($responses);
            $result_json=json_decode($result,TRUE);
            $client->replyMessage($result_json);    
     }
        else{
           $responses['replyToken']= "$replyToken";
           $responses['messages'][0]['type'] = "text";
           $responses['messages'][0]['text'] = "data gagal di simpan";
           $result = json_encode($responses);
           $result_json=json_decode($result,TRUE);
           $client->replyMessage($result_json); 
      }
    }
}

     if($command == "/siaranku" && $userId=="Ue6644c17f1f53e3d63da9c7b41ab656b"){
         $i=0;
          while($row = mysqli_fetch_array($query)) {  //ROW NYA SESUAIKAN DENGAN ROW TABLE DI DB KALIAN,
        
                  $responses['to'] = $row['groupId']; //$row['groupId'] adalah row yg berisi groupId yg sudah disimpan, sila atur sesuai table kalian
                  $responses['messages'][0]['type'] = "text";
                  $responses['messages'][0]['text'] = $wilson;
                  $result = json_encode($responses);
                  $result_json = json_decode($result, TRUE);
              $respon = json_decode($client->pushMessage($result_json),TRUE);
              if(!$respon['messages']){
                  $i++;
              }
            }
      $responses['replyToken']= "$replyToken";
      $responses['messages'][0]['type'] = "text";
      $responses['messages'][0]['text'] = "berhasil mengirim ke $i group";
      $result = json_encode($responses);
      $result_json=json_decode($result,TRUE);
      $client->replyMessage($result_json);
     }
     
       if(strtolower($command) == "cek1"){
        
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $userId
                )
            )
        ); 
    }   

     if ($command == 'bitly' || $command == '/bitly' || $command == 'Bitly') {
         
        $result = bitly($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result,
                )
            )
        );
    }
    

    
     if ($command == 'short' || $command == '/short' || $command == 'Short') {
         
        $result = short($dorong,$menarik);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result,
                )
            )
        );
    }



     
    if ($command == 'say' || $command == 'Say' || $command == '/say' || $command == '/Say') {
        $result = tts($options);
        $balas = array(
                    'replyToken' => $replyToken,
                    'messages' => array(
                                    array (
  'type' => 'audio',
  'originalContentUrl' => $result,
  'duration' => 60000,
)
            )
        );
    }


if ($command == 'translate' || $command == '/translate' || $command == '/terjemahan' ) {
        $result = translate($options);
        $balas = array(
                    'replyToken' => $replyToken,
                    'messages' => array(
                                    array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }

	
    if ($command == 'say en' || $command == '/sayen' || $command == '/say en' || $command == '/Say en' || $command == 'Say en') {
        $result = tts2($options);
        $balas = array(
                    'replyToken' => $replyToken,
                    'messages' => array(
                                    array (
  'type' => 'audio',
  'originalContentUrl' => $result,
  'duration' => 60000,
)
            )
        );
    }
	
	  if ($command == 'lokasi' || $command == 'Lokasi' || $command == '/lokasi' || $command == '/Lokasi') {
        $result = lokasi($options);
        $balas = array(
                    'replyToken' => $replyToken,
                    'messages' => array(
                                   	 array (
						'id' => '325708',
						'type' => 'location',
						'title' => $options,
						'address' => $result['loct1'],
						'latitude' => $result['lat'],
						'longitude' => $result['long'],
					)
            )
        );
    }


    if ($command == 'creator' || $command == 'Creator' || $command == '/creator' || $command == '/Creator') {
        $balas = array(
                    'replyToken' => $replyToken,
                    'messages' => array(
                     array (
  'type' => 'template',
  'altText' => 'This is a buttons template',
  'template' => 
  array (
    'type' => 'buttons',
    'thumbnailImageUrl' => 'https://hobbydb-production.s3.amazonaws.com/processed_uploads/subject_photo/subject_photo/image/14935/1469053350-30688-5549/Creator.png',
    'imageAspectRatio' => 'rectangle',
    'imageSize' => 'cover',
    'imageBackgroundColor' => '#FFFFFF',
    'title' => 'MENU CREATOR',
    'text' => 'creator by anonymousliem',
    'defaultAction' => 
    array (
      'type' => 'uri',
      'label' => 'View detail',
      'uri' => 'http://instagram.com/anonymousliem',
    ),
    'actions' => 
    array (

      0 => 
      array (
        'type' => 'uri',
        'label' => 'View detail',
        'uri' => 'http://instagram.com/anonymousliem',
      ),
    ),
  ),
)
            )
        );
    }
 
	  
 
if($message['type']=='text') {
        if ($command == '/cuaca') {
        $result = cuaca($options);
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => $result
                )
            )
        );
    }
}
    
    
#keyword untuk lokasi
       /* if ($command == 'sigawe' || $command == '/Sigawe' || $command == 'Sigawe' || $command == '/sigawe'){
         
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array (
          'type' => 'location',
          'title' => 'my location',
          'address' => '〒150-0002 東京都渋谷区渋谷２丁目２１−１',
          'latitude' => 35.65910807942214688637250219471752643585205078125,
          'longitude' => 139.70372892916202545166015625,
                        )
                )
            );
        }
*/

/* untuk yang udah add aja
if (isset($balas)) {
    $result = json_encode($balas);
    file_put_contents('./balasan.json', $result);
    if ($profileName) {
        $client->replyMessage($balas);
	} elseif($type == 'join') {
	    $client->replyMessage($balas);
	} else {
	$balas_gagal = array(
        'replyToken' => $replyToken,
        'messages' => array(
            array(
                'type' => 'text',
                'text' => 'Maaf, bot tidak dapat mendeteksi pesan dari kamu, silahkan ADD bot terlebih dahulu'
            )
        )
    ); }
	$client->replyMessage($balas_gagal);
} 

*/

if (isset($balas)) {
    $result = json_encode($balas);
    file_put_contents('./balasan.json', $result);
    $client->replyMessage($balas);
}
?>
