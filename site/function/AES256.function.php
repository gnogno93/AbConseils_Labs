<?php 

function encryptAesFunction($data)
{
    $key = hash('sha1',hash('md5','openssl_encrypt'));
    $res['vector'] = hash("md5",date('Y-m-d H:i:s'),true);
    $res['data'] = openssl_encrypt($data, 'AES-128-CBC',$key,$options=0, $res['vector'] );
    return $res;
}

function decryptAesFunction($data,$vector)
{
    $key = hash('sha1',hash('md5','openssl_encrypt'));
    return openssl_decrypt($data, 'AES-128-CBC',$key,$options=0,$vector);
}

