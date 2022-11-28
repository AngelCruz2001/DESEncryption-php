<?php
$key = 'caca';

function my_encrypt($data, $key)
{
    $encryption_key = base64_decode($key);
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('DES-CBC'));
    $encrypted = openssl_encrypt($data, 'DES-CBC', $encryption_key, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
}

$target_dir = "files/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

$code = file_get_contents($target_file);
$encrypted_code = my_encrypt($code, $key);
file_put_contents('./encrypted/encrypted_code.txt', $encrypted_code);

$file_url = './encrypted/encrypted_code.txt';
header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary");
header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\"");
readfile($file_url);