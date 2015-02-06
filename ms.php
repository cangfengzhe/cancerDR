 <?php
include 'header.php';
include 'gridjs.php';
?>

<div id='baseinfo'>
<?php
include 'connect.php';

if (isset($_GET['msid']) & !empty($_GET['msid'])) {
	$ms_id = $_GET['msid'];

} else {
	include 'footer.php';
	die();
}
$colName = 'ms_id'; //传入*_detail.php
$value = $ms_id;
$connect = mysql_connect($hostname, $username, $password)
or die('Could not connect: ' . mysql_error());
//Select The database
$bool = mysql_select_db($database, $connect);
if ($bool === False) {
	print "can't find $database";
}
$sql = 'select * from info_ms  where ms_id=' . $ms_id;
$result = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_assoc($result);

echo '<h1 id="name">', $row['ms_name'], '</h2>';
echo '<table border=0><tr><th>MicroSatellite ID</th><td>', $row['id'], '</td></tr>';
if (!empty($row['probe_id'])) {
	echo '<tr><th>Probe ID</th><td><a target="_blank" href="http://www.ncbi.nlm.nih.gov/probe/?term=', $row['probe_id'], '">', $row['probe_id'], '</a></td></tr>';
}
if (!empty($row['position'])) {
	echo '<tr><th>Position</th><td><a target="_blank" href="http://genome.ucsc.edu/cgi-bin/hgTracks?db=hg19&position=', $row['position'], '&hgsid=409208097_EVTYPIGBhL09UD6QUyUkWanTs2uj">', $row['position'], '</a></td></tr>';
}
echo '</table></div>';
echo '<div id="kind"><ul id="tabs">';

echo '<li  factor="ms"><a href="javascript:;">MSI</a></li>';
include './detail/ms_detail.php';
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