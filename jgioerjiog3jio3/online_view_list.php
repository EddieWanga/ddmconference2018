<?php
$user=$_COOKIE["ddm_xyz"];
if(strcmp($user,"ddm2018")){
    header("location:entrance.php");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>2018聖嚴思想後台管理介面</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body>
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
  <a class="navbar-brand" href="management.php">2018聖嚴思想後台管理介面</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="online_view_list.php">報名資料</a>
      </li>
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <a class='btn btn-outline-danger my-2 my-sm-0' href="logout.php">登出</a>
    </form>
    </div>
</nav>

<div class="container mt-4">


<h1>報名列表</h1>



<?php

require_once "../send/header.php";

$sql     = "SELECT * FROM `testdd` ORDER BY `no` asc";
$result  = $mysqli->query($sql) or die($mysqli->connect_error);


$i_for_array=0;
$online_array;

//筆數
$data_nums = mysqli_num_rows($result); 


  //內容
  while($goods = $result->fetch_assoc()){
    //$order_time=date("Y-m-d H:i:s", $goods[timestamp]);
    $online_array[$i_for_array][0]=$goods[no];
    $online_array[$i_for_array][1]=$goods[SignUpName];
    $online_array[$i_for_array][2]=$goods[SignUpSex];
    $online_array[$i_for_array][3]=$goods[SignUpTel];
    $online_array[$i_for_array][4]=$goods[SignUpEmail];
    $online_array[$i_for_array][5]=$goods[SignUpEdu];
    $online_array[$i_for_array][6]=$goods[SignUpOccu].' '.$goods[SignUpOccuOth];
    $online_array[$i_for_array][7]=$goods[AttendDate];
    $online_array[$i_for_array][8]=$goods[AttendDate2];
    $online_array[$i_for_array][9]=$goods[AttendDate3];
    $online_array[$i_for_array][10]=$goods[SignUpFood];
    $online_array[$i_for_array][11]=$goods[SignUpMemo];
    $online_array[$i_for_array][12]=$goods[time];
    
   

    $i_for_array+=1;
    
    
    
  }



$per = 50; //每頁顯示項目數量
$pages = ceil($data_nums/$per); //取得不小於值的下一個整數
if (!isset($_GET["page"])){ //假如$_GET["page"]未設置
    $page=1; //則在此設定起始頁數
} else {
    $page = intval($_GET["page"]); //確認頁數只能夠是數值資料
}





print <<<EOT
<table class="table table-bordered">
<thead>
  <tr>
    <th scope="col">報名編號</th>
    <th scope="col">姓名</th>
    <th scope="col">性別</th>
    <th scope="col">電話</th>
    <th scope="col">Email</th>
    <th scope="col">教育程度</th>
    <th scope="col">職業</th>
    <th scope="col">場次1</th>
    <th scope="col">場次2</th>
    <th scope="col">場次3</th>
    <th scope="col">是否用餐</th>
    <th scope="col">備註</th>
    <th scope="col">報名時間</th>
  </tr>
</thead>
<tbody>
EOT;


$i_for_show=($page-1)*$per;
if($page<$pages){
  $i_for_show_end=($page)*$per;
}else{
  $i_for_show_end=$data_nums;
}

//$i_for_show=0;
//$i_for_show_end=$data_nums;

while($i_for_show<$i_for_show_end){
$tmp_array=$online_array[$i_for_show];
echo "<tr>";
echo "<td>$tmp_array[0]</td>";
echo "<td>$tmp_array[1]</td>";
echo "<td>$tmp_array[2]</td>";
echo "<td>$tmp_array[3]</td>";
echo "<td>$tmp_array[4]</td>";
echo "<td>$tmp_array[5]</td>";
echo "<td>$tmp_array[6]</td>";
echo "<td>$tmp_array[7]</td>";
echo "<td>$tmp_array[8]</td>";
echo "<td>$tmp_array[9]</td>";
echo "<td>$tmp_array[10]</td>";
echo "<td>$tmp_array[11]</td>";
echo "<td>$tmp_array[12]</td>";
echo "</tr>";

$i_for_show+=1;
}


print <<<EOT
</tbody>
</table>
EOT;




if($page<$pages){
  echo '顯示第'.(($page-1)*$per+1).'至'.(($page)*$per).'項結果，共'.$data_nums.'項';
}else{
  echo '顯示第'.(($page-1)*$per+1).'至'.$data_nums.'項結果，共'.$data_nums.'項';
}
echo "<div class='d-flex justify-content-center mt-3'>";
echo "<nav>";
echo '<ul class="pagination">';
if($page>1){
    echo "<li class='page-item'><a class='page-link' href=?page=".($page-1).">上頁</a></li> ";
}else{
    echo "<li class='page-item disabled'><a class='page-link' href=''>上頁</a></li>";
}
for( $i=1 ; $i<=$pages ; $i++ ) {
    if ( $page-2 < $i && $i < $page+2 ) {
        if($page == $i){
            echo "<li class='page-item active'><a class='page-link' href='?page=$i'>$i</a></li>";
        }else{
            echo "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";
        }
        
    }
}
if($page<$pages){
    echo "<li class='page-item'><a class='page-link' href=?page=".($page+1).">下頁</a></li> ";
}else{
    echo "<li class='page-item disabled'><a class='page-link' href=''>下頁</a></li>";
}
echo '</ul>';
echo '</nav>';
echo '</div>';








?>

</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>
