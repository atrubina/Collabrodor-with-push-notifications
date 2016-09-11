$msg = array
(
 'message'  => 'Clean Up after your dog.',
 'title'  => 'This is a title',
 'subtitle' => 'This is a subtitle'
);

$jwt = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJqdGkiOiJjNmJjNzk0Yi1hNGRiLTQ1MjgtOTUyYy1jZDMxN2VlMGZhOGMifQ.d0r5o4p5Lo0wF7iR2cTu_e4yurqwA0quI6R0Uc4Ua3Q';

//$device_token="f8Ai_wR_Xn4:APA91bGIfzzbG__Wp8G7nW1H7MwMOBoy_PSEjGw4Qql42pldlcw4reWH7tTl3Nnzzq0wjUOX49qdea-ynRYmeeKwV7I8KNgDWEWVtPhmyrEw2S1o9AtHlnHX4vvLHeXjugY1q2MNii4t";
$device_token="962ddd290154a64711fb431ca7b369910435048c2e1b5e8fa7b9e21455e66a38";


$url = 'https://api.ionic.io/push/notifications';

$data = array(
                  'tokens' => array($device_token), 
                  'notification' => $msg,
                  'profile' => 'test',
                  );
      
$content = json_encode($data);

$headers = array(
    'Authorization : Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJqdGkiOiJjNmJjNzk0Yi1hNGRiLTQ1MjgtOTUyYy1jZDMxN2VlMGZhOGMifQ.d0r5o4p5Lo0wF7iR2cTu_e4yurqwA0quI6R0Uc4Ua3Q',
    'Content-Type :application/json'
 );
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$CurlResponse = curl_exec($ch);

$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  $PushError= curl_errno($ch);
  if ($http_status==503)
    echo "HTTP Status == 503 <br/>";
  echo "Curl Errno returned $PushError <br/>";
  
curl_close($ch);

return $CurlResponse;