 <?php
include 'header.php';
include 'gridjs.php';
?>

<div id='baseinfo'>
<?php

include 'connect.php';

if (isset($_GET['lncid']) & !empty($_GET['lncid'])) {
	$lnc_id = $_GET['lncid'];

} else {

	include 'footer.php';
	die();
}
$colName = 'lnc_id'; //传入*_detail.php
$value = $lnc_id;
$connect = mysql_connect($hostname, $username, $password)
or die('Could not connect: ' . mysql_error());
//Select The database
$bool = mysql_select_db($database, $connect);
if ($bool === False) {
	print "can't find $database";
}
$sql = 'select * from info_lnc  where lnc_id=' . $lnc_id;
$result = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_assoc($result);

echo '<h1 id="name">', $row['lnc_name'], '</h2>';
echo '<table border=0><tr><th>lncRNA ID</th><td>', $row['id'], '</td></tr>';
if (!empty($row['other_name'])) {
	echo '<tr><th>Synonyms</th><td>', $row['other_name'], '</td>';
}
if (!empty($row['position'])) {
	echo '<tr><th>Position</th><td><a target="_blank" href="', $row['website'], '">', $row['position'], '</a></td>';

}
// echo '<tr><th>DrugBank ID</th><td>', $row['drugbank_id'], '</td><th>      PubChem ID</th><td>', $row['pubchem_id'],'</td></tr>';
echo '</table></div>';
echo '<div id="kind"><ul id="tabs">';

echo '<li  factor="lnc"><a href="javascript:;">lncRNA</a></li>';
include './detail/lnc_detail.php';
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