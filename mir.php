 <?php
include 'header.php';
include 'gridjs.php';
?>

<div id='baseinfo'>
<?php

include 'connect.php';

// echo $_GET['mirid'];
if (isset($_GET['mirid']) & !empty($_GET['mirid'])) {
	$mir_id = $_GET['mirid'];

} else {
	include 'footer.php';
	// die();
}
$colName = 'mir_id'; //传入*_detail.php
$value = $mir_id;
$connect = mysql_connect($hostname, $username, $password)
or die('Could not connect: ' . mysql_error());
//Select The database
$bool = mysql_select_db($database, $connect);
if ($bool === False) {
	print "can't find $database";
}
$sql = 'select * from info_mir  where mir_id=' . $mir_id;
$result = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_assoc($result);

echo '<h1 id="name">', $row['mir_name'], '</h2>';
echo '<table border=0><tr><th>miRNA ID</th><td>', $row['id'], '</td></tr>';
if (!empty($row['miRbase_id'])) {
	echo '<tr><th>miRBase ID</th><td><a href="http://mirbase.org/cgi-bin/mirna_entry.pl?acc=', $row['miRbase_id'], '" target="_blank">', $row['miRbase_id'], '  </a></td>';
}
echo '</table></div>';
echo '<div id="kind"><ul id="tabs">';

echo '<li  factor="mir"><a href="javascript:;">miRNA</a></li>';
include './detail/mir_detail.php';
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
</div>

<?php
// include('meth_detail.php');
include 'footer.php';
?>