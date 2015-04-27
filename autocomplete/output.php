<?php
include '../connect.php';
$type = $_GET['type'];
$connect = mysql_connect($hostname, $username, $password)
or die('Could not connect: ' . mysql_error());
//Select The database
$bool = mysql_select_db($database, $connect);
if ($bool === False) {
	print "can't find $database";
}
$sql = 'select id,' . $type . '_name as name from info_' . $type;
$result = mysql_query($sql) or die(mysql_error());

while ($row = mysql_fetch_assoc($result)) {

	$data[$row['id']] = $row['name'];
}
mysql_close();
// echo $data[0][1];
//
// echo json_encode($data2);
?>