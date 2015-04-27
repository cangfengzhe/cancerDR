 <?php
include 'header.php';
include 'gridjs.php';
?>

<div id='baseinfo'>
<?php
error_reporting(E_ALL ^ E_DEPRECATED);
#Include the connect.php file
include 'connect.php';

if (isset($_GET['diseaseid']) & !empty($_GET['diseaseid'])) {
	$disease_id = $_GET['diseaseid'];

} else {
	include 'footer.php';
	die();
}
$colName = 'disease_id'; //传入*_detail.php
$value = $disease_id;
$connect = mysql_connect($hostname, $username, $password)
or die('Could not connect: ' . mysql_error());
//Select The database
$bool = mysql_select_db($database, $connect);
if ($bool === False) {
	print "can't find $database";
}
$sql = 'select * from disease_view  where disease_id=' . $disease_id;
$result = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_assoc($result);

echo '<h1 id="name">', $row['disease_name'], '</h1>';
echo '<table border=0><tr><th>Disease ID</th><td>', $row['id'], '</td></tr>';
if (!empty($row['mesh_id'])) {
	echo '<tr><th>Mesh ID</th><td>', $row['mesh_id'], '</td>';
}
echo '<tr><th>Discription</th><td>', $row['desc'], '</td>';

echo '</table></div>';
echo '<div id="kind"><ul id="tabs">';

if ($row['mut'] >= 1) {
	echo '<li  factor="mut"><a href="javascript:;">Mutation</a></li>';

	include './detail/mut_detail.php';
}

if ($row['meth'] >= 1) {
	echo '<li  factor="meth"><a href="javascript:;">Methylation</a></li>';

	include './detail/meth_detail.php';
}

if ($row['mir'] >= 1) {
	echo '<li  factor="mir"><a href="javascript:;">miRNA</a></li>';
	include './detail/mir_detail.php';
}

if ($row['lnc'] >= 1) {
	echo '<li  factor="lnc"><a href="javascript:;">lncRNA</a></li>';
	include './detail/lnc_detail.php';
}

if ($row['ms'] >= 1) {
	echo '<li  factor="ms"><a href="javascript:;">MSI</a></li>';
	include './detail/ms_detail.php';
}
echo '<li  factor="network" flag="0"><a href="javascript:;">Network</a></li>';
echo '</ul></div>';
mysql_close();

?>



<div>
<div id="mut" class='factor'></div>
  <div id="jqxgrid" class='facor'></div>


  <div id="meth" class='factor'></div>
  <div id="mir" class='factor'></div>
  <div id="ms" class='factor'></div>
  <div id="lnc" class='factor'></div>
<?php
include './cy.php';
?>
<div id="note">Note:</div>

</div>


<?php
// include('meth_detail.php');
include 'footer.php';
?>