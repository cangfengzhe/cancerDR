<?php

include('connect.php');
echo "string";
$conn = mysql_connect("localhost","root","");
if (!$conn){
    die("连接数据库失败：" . mysql_error());
}
mysql_select_db("cancerdr", $conn);  
$sql = 'select * from info_mir';
$result = mysql_query($sql, $conn);
while($row = mysql_fetch_row($result)){
	echo $row[1];
}
mysql_close();
?>