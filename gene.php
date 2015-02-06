 <?php
include 'header.php';
include 'gridjs.php';
?>
<style>
#baseinfo th {
width: 110px;
}</style>
<div id='baseinfo'>
<?php
error_reporting(E_ALL^E_DEPRECATED);
#Include the connect.php file
include 'connect.php';

if (isset($_GET['geneid']) & !empty($_GET['geneid'])) {
	$gene_id = $_GET['geneid'];

} else {
	include 'footer.php';
	die();
}
$colName = 'gene_id'; //传入*_detail.php
$value = $gene_id;
$connect = mysql_connect($hostname, $username, $password)
or die('Could not connect: ' . mysql_error());
//Select The database
$bool = mysql_select_db($database, $connect);
if ($bool === False) {
	print "can't find $database";
}
$sql = 'select * from info_gene  where gene_id=' . $gene_id;
$result = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_assoc($result);

echo '<h1 id="name">', $row['gene_name'], '</h2>';
echo '<table border=0><tr><th>Gene ID</th><td>', $row['id'], '</td></tr>';

// echo '<tr><th>Synonyms</th><td>' , 'temp', '</td>';
echo '<tr><th>EntrezGene ID</th><td><a target= "_blank" href="http://www.ncbi.nlm.nih.gov/gene/?term=', $row['entrez_id'], '"</a>', $row['entrez_id'], '</td></tr>';
echo '<tr><th>Description</th><td>', $row['description'], '</td>';
echo '</table></div>';
echo '<div id="kind"><ul id="tabs">';

if ($row['mut'] == 1) {
	echo '<li  factor="mut"><a href="javascript:;" >Mutation</a></li>';
	include './detail/mut2_detail.php';

}

if ($row['meth'] == 1) {
	echo '<li  factor="meth"><a href="javascript:;">Methylation</a></li>';

	include './detail/meth_detail.php';
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
</div>


<?php
// include('meth_detail.php');
include 'footer.php';
?>