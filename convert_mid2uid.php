<?php
$mid = $_GET['mid'];
echo "チェックしたいMIDは→ " . $mid . "<br />";

// アクセストークンを取得する
$url = "https://api.line.me/v2/oauth/accessToken";
// POSTデータ
$data = array(
    "grant_type"    => "client_credentials",
    "client_id"     => YOUR_CLIENT_ID,
    "client_secret" => YOUR_CLIENT_SECRET,
);
$data = http_build_query($data, "", "&");
$header = array(
    "Content-Type: application/x-www-form-urlencoded",
    "Content-Length: " . strlen($data),
);
$context = array(
    "http" => array(
        "method"  => "POST",
        "header"  => implode("\r\n", $header),
        "content" => $data,
    ),
);
$res = file_get_contents($url, false, stream_context_create($context));

$token = json_decode($res, true);
if (isset($token['error'])) {
    echo 'ログインエラーが発生しました。';
    echo "error" . $token['error'];
    echo $token['error_description'];
    exit;
}

// LINEから取得したレスポンスの表示
//foreach ($token as $key => $value) {
//    echo $key . ' -> ' . $value . '<br />';
//}

$access_token = $token['access_token'];


// MIDをユーザーIDに変換する
$base_url = "https://api.line.me/v2/bot/dedisco/migration/userId";

$data = http_build_query(
    array(
        'mid'   => $mid,
    )
);
$header = Array(
    "Content-Type: application/x-www-form-urlencoded",
    "User-Agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)",
    "Authorization: Bearer " . $access_token,
);
$options = array(
    'http' =>
        array(
            'method' => 'GET',
            'header' => implode("\r\n", $header),
        ),
);
$contents = file_get_contents($base_url . '?' . $data, false, stream_context_create($options));
echo "変換後のUIDは→ " . $contents . "<br />";
