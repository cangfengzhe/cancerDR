<?php
include '../connect.php';
$type = $_GET['type'];
$drug = $_GET['drug'];
$disease = $_GET['disease'];
$gene = $_GET['gene'];
$mir = $_GET['mir'];
$both = $_GET['both'];

$connect = mysql_connect($hostname, $username, $password)
or die('Could not connect: ' . mysql_error());
//Select The database
$bool = mysql_select_db($database, $connect);
if ($bool === False) {
	print "can't find $database";
}

$sql = 'select distinct drug_name from info_drug;';
$result = mysql_query($sql) or die(mysql_error());

while ($row = mysql_fetch_assoc($result)) {

	// $data[$row['id']] = $row['name'];
	$out[] = $row['drug_name'];
}
mysql_close();
// var_dump($out);
// echo $data[0][
echo json_encode($out);

?>