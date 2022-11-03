<?php
$key = 'caca';

function my_decrypt($data, $key)
{
    $encryption_key = base64_decode($key);
    list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);
    return openssl_decrypt($encrypted_data, '', $encryption_key, 0, $iv);
}


$target_dir = "encrypted/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

$encrypted_code = file_get_contents($target_file);
$decrypted_code = my_decrypt($encrypted_code, $key);

file_put_contents('./decrypted/codeDe.txt', $decrypted_code);

$file_url = './decrypted/codeDe.txt';
header('Content-|Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary");
header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\"");
readfile($file_url);
