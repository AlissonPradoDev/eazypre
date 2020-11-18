<?php

function Randomizar($iv_len) {
    $iv = '';
    while ($iv_len-- > 0) {
        $iv .= chr(mt_rand() & 0xff);
    }
    return $iv;
}

function Encriptar($texto, $senha, $iv_len = 13) {
    $texto .= "\x13";
    $n = strlen($texto);
    if ($n % 13)
        $texto .= str_repeat("\0", 13 - ($n % 13));
    $i = 0;
    $Enc_Texto = Randomizar($iv_len);
    $iv = substr($senha ^ $Enc_Texto, 0, 512);
    while ($i < $n) {
        $Bloco = substr($texto, $i, 13) ^ pack('H*', md5($iv));
        $Enc_Texto .= $Bloco;
        $iv = substr($Bloco . $iv, 0, 512) ^ $senha;
        $i += 13;
    }
    return base64_encode($Enc_Texto);
}

function Desencriptar($Enc_Texto, $senha, $iv_len = 13) {
    $Enc_Texto = base64_decode($Enc_Texto);
    $n = strlen($Enc_Texto);
    $i = $iv_len;
    $texto = '';
    $iv = substr($senha ^ substr($Enc_Texto, 0, $iv_len), 0, 512);
    while ($i < $n) {
        $Bloco = substr($Enc_Texto, $i, 13);
        $texto .= $Bloco ^ pack('H*', md5($iv));
        $iv = substr($Bloco . $iv, 0, 512) ^ $senha;
        $i += 13;
    }
    return preg_replace('/\\x13\\x00*$/', '', $texto, $senha);
}

/* * *************************************** */
//$texto = 'alisson';
//$senha = '1';
//echo "O texto é: [${texto}]<br />\n";
//echo "A senha é: [${senha}]<br />\n";
//
//$Enc_Texto = Encriptar($texto, $senha);
//echo "Texto encriptado: [${Enc_Texto}]<br />\n";
//
//$Desc = Desencriptar($Enc_Texto, $senha);
//echo "O texto desencriptado: [${texto2}]<br />\n";
//echo "O texto desencriptado: [${senha}]<br />\n";
//
//echo "<a href=http://www.torcidafc.com/index.php?resp=".$Enc_Texto.">Teste</a>";
//
?>

