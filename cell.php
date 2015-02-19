 <?php
include 'header.php';
include 'gridjs.php';
?>

<div id='baseinfo'>
<?php

#Include the connect.php file
include 'connect.php';

if (isset($_GET['cellid']) & !empty($_GET['cellid'])) {
	$cell_id = $_GET['cellid'];
	if (intval($cell_id) > 1000) {
		include 'footer.php';
		die();
	}
} else {
	include 'footer.php';
	die();
}
$colName = 'cell_id'; //传入*_detail.php
$value = $cell_id;
$connect = mysql_connect($hostname, $username, $password)
or die('Could not connect: ' . mysql_error());
//Select The database
$bool = mysql_select_db($database, $connect);
if ($bool === False) {
	print "can't find $database";
}
$sql = 'select * from info_cell  where cell_id=' . $cell_id;
$result = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_assoc($result);

echo '<h1 id="name">', $row['cell_name'], '</h2>';
echo '<table border=0><tr><th>Cell Line ID</th><td>', $row['id'], '</td></tr>';

echo '<tr><th>Tissue</th><td>', $row['tissue'], '</td>';
// echo '<tr><th>DrugBank ID</th><td>', $row['drugbank_id'], '</td><th>      PubChem ID</th><td>', $row['pubchem_id'],'</td></tr>';
echo '</table></div>';
echo '<div id="kind"><ul id="tabs">';

if ($row['ic50'] == 1) {
	echo '<li  factor="ic50"><a href="javascript:;" >Pharmacological profile</a></li>';
	include './detail/ic50_detail.php';

}
if ($row['mut'] == 1) {
	echo '<li  factor="mut"><a href="javascript:;" >Mutation</a></li>';
	include './detail/mut2_detail.php';

}

if ($row['meth'] == 1) {
	echo '<li  factor="meth"><a href="javascript:;">Methylation</a></li>';

	include './detail/meth_detail.php';
}

if ($row['mir'] == 1) {
	echo '<li  factor="mir"><a href="javascript:;">miRNA</a></li>';
	include './detail/mir_detail.php';
}

if ($row['lnc'] == 1) {
	echo '<li  factor="lnc"><a href="javascript:;">lncRNA</a></li>';
	include './detail/lnc_detail.php';
}

if ($row['ms'] == 1) {
	echo '<li  factor="ms"><a href="javascript:;">MSI</a></li>';
	include './detail/ms_detail.php';
}
echo '</ul></div>';
mysql_close();

?>








<div>
<div id="mut" class='factor'></div>
  <!-- <div id="jqxgrid" class='facor'></div> -->

  <div id="ic50" class='factor'></div>
  <div id="meth" class='factor'></div>
  <div id="mir" class='factor'></div>
  <div id="ms" class='factor'></div>
  <div id="lnc" class='factor'></div>
</div>
<div id="note" >note:lipidong</div>
<style>


</style>

<?php

include 'footer.php';
?>