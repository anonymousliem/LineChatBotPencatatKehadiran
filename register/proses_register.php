<?php
include "../koneksi.php";

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$gender = $_POST['gender'];
$institusi = $_POST['institusi'];
$email = $_POST['email'];


$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$token = generate_string($permitted_chars, 20);

function generate_string($input, $strength = 16) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
 
    return $random_string;
}


$datanim = mysqli_query($connect,"select * from kehadiran where nim='$nim' ");
$ceknim = mysqli_num_rows($datanim);
if ($ceknim > 0){
echo '<script language="javascript">alert("nim ini sudah pernah daftar sebelumnya")</script>';
   echo '<meta http-equiv="refresh" content="0; URL=../register/index.php">';
}else{
        $query = mysqli_query($connect, "INSERT INTO kehadiran 
        (nama, nim, gender, institusi, email, status, token)
        VALUES ('$nama','$nim','$gender', '$institusi','$email','belum konfirmasi','$token') ");
        if($query){
        echo '<script language="javascript">alert("Berhasil Registrasi")</script>';
       // echo '<meta http-equiv="refresh" content="0; URL=../register/token.php?token="$token" "> ';
    echo "<meta http-equiv='refresh' content='0; URL=../register/token.php?token=$token' >";
       // header("Location: token.php?token=$token");
            }   else{
                    echo mysqli_error($connect);
        }
    
    
}









?>
