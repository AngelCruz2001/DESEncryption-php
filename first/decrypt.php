<?php
function my_decrypt($text)
{

    // Remove the base64 encoding from our key
    $key = base64_decode('caca');

    // To decrypt, split the encrypted data from our IV - our unique separator used was "::"
    list($encrypted_data, $iv) = explode('::', base64_decode($text), 2);

    return openssl_decrypt($encrypted_data, 'DES-CBC', $key, 0, $iv);
}

$word = $_GET["encrypted_word"];
$decrypted_image = my_decrypt($word);
echo $decrypted_image;
