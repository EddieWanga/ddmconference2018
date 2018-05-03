<?php

require_once "header.php";

$SignUpName=$_POST["SignUpName"];
$SignUpSex=$_POST["SignUpSex"];
$SignUpTel=$_POST["SignUpTel"];
$SignUpEmail=$_POST["SignUpEmail"];
$SignUpEdu=$_POST["SignUpEdu"];

$SignUpOccu=$_POST["SignUpOccu"];
$SignUpOccuOth=$_POST["SignUpOccuOth"];
$AttendDate=$_POST["AttendDate"];
$SignUpFood=$_POST["SignUpFood"];

$date = date('Y-m-d H:i:s');

$SignUpMemo = $_POST["SignUpMemo"];


$AttendDate1 = "";
$AttendDate2 = "";
$AttendDate3 = "";


$FindKey1='1';
$FindKey2='2';
$FindKey3='3';

$TryStrpos1=strpos($AttendDate,$FindKey1);
if($TryStrpos1 === false){
  //echo 'no find';
}else{
  //echo '關鍵字符1在原始字串的第'.$TryStrpos1.'位置';
  $AttendDate1 = 'Day1';
}
$TryStrpos2=strpos($AttendDate,$FindKey2);
if($TryStrpos2 === false){
  //echo 'no find';
}else{
  //echo '關鍵字符2在原始字串的第'.$TryStrpos2.'位置';
  $AttendDate2 = 'Day2';
}

$TryStrpos3=strpos($AttendDate,$FindKey3);
if($TryStrpos3 === false){
  //echo 'no find';
}else{
  //echo '關鍵字符2在原始字串的第'.$TryStrpos3.'位置';
  $AttendDate3 = 'Day3';
}






$sql = "INSERT INTO `testdd` (`SignUpName`,`SignUpSex`,`SignUpTel`, `SignUpEmail`, `SignUpEdu`, `SignUpOccu`, `SignUpOccuOth`, `AttendDate`, `AttendDate2`, `AttendDate3`, `SignUpFood`,`SignUpMemo`, `time`) 
    VALUES ('{$SignUpName}','{$SignUpSex}','{$SignUpTel}', '{$SignUpEmail}', '{$SignUpEdu}', '{$SignUpOccu}', '{$SignUpOccuOth}', '{$AttendDate1}', '{$AttendDate2}', '{$AttendDate3}', '{$SignUpFood}', '{$SignUpMemo}', '{$date}')";


$mysqli->query($sql) or die($mysqli->connect_error);




$to = $SignUpEmail;
$subject = "第七屆漢傳佛教與聖嚴思想國際研討會 注意事項及確認報名";
$message = "
<html>
<body>

<p>$SignUpName 菩薩 阿彌陀佛</p>
<p>&nbsp;</p>
<p>感謝您報名參加由聖嚴教育基金會舉辦之「2018第七屆漢傳佛教與聖嚴思想國際學術研討會」。會議資訊如下：</p>
<p>時間：2018/06/28(四)至30(六)</p>
<p>地點：集思臺大會議中心</p>
<p>&nbsp;</p>
<p>為落實法鼓山「心靈環保」理念，研討會議程及會議手冊將以電子版方式呈現，請於會議前至聖基會網頁下載。<a href='http://www.shengyen.org.tw/DetailOrdinary.aspx?LCODE=TW&amp;MMID=028&amp;SMID=MN201804091332470617&amp;PID=A201804091333210435'>會議手冊電子版請按此下載</a>，將於會議前三天（6/25日）提供下載。</p>
<p>&nbsp;</p>
<p>注意事項：</p>
<p>1.為了您的健康及落實環保理念，會議期間請自備環保筷及水杯。</p>
<p>2.會議期間如需翻譯設備，請自備證件於會場租借。</p>
<p>3.若您未報名參加，敬請立即與本會聯繫。</p>
<p>&nbsp;</p>
<p>此封信件為系統自動回覆，請勿回覆本信件。</p>
<p>如有任何疑問歡迎隨時與我們聯絡，再次感恩您！</p>
<p>&nbsp;</p>
<p>敬祝 平安無事</p>
<p>&nbsp;</p>
<p>聖嚴思想研討會籌備團隊 敬上</p>
<p>&nbsp;</p>
<p>------</p>
<p>聖嚴教育基金會</p>
<p>地址：臺北市中正區仁愛路二段48-6號2樓</p>
<p>網站：<a href='http://www.shengyen.org.tw/'>http://www.shengyen.org.tw/</a></p>
<p>E-mail：syf@shengyen.org.tw</p>
<p>電話：02-2397-9300</p>
";

$message=$message."</table></body></html>";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
$headers .= 'From: <syf@shengyen.org.tw>' . "\r\n";
$headers .= 'Bcc: syf@shengyen.org.tw' . "\r\n";
//$headers .= 'Bcc: jyo.huang@gmail.com' . "\r\n";
mail($to,$subject,$message,$headers);





header("location:../indexl.html");
//print "ok";

