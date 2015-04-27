 <?php
include 'header.php';
include 'gridjs.php';
?>
<link rel="stylesheet" href="./cytoscape/font-awesome.min.css" />
    <link rel="stylesheet" href="./cytoscape/cytoscape.js-panzoom.css" />


    <!-- <script src='./cytoscape/build/jquery-2.1.1.min.js'></script> -->
    <script src="./cytoscape/build/cytoscape.js"></script>
    <script src="./cytoscape/lib/layout.cose.js"></script>

    <script src="./cytoscape/lib/layout.cose.js"></script>

    <script src="./cytoscape/cytoscape.js-panzoom.js"></script>


<div id='baseinfo'>
<?php
error_reporting(E_ALL ^ E_DEPRECATED);
#Include the connect.php file
include 'connect.php';
if (isset($_GET['drugid']) & !empty($_GET['drugid'])) {
	$drug_id = $_GET['drugid'];
	if (intval($drug_id) > 200) {
		include 'footer.php';
		die();
	}
} else {
	include 'footer.php';
	die();
}
$connect = mysql_connect($hostname, $username, $password)
or die('Could not connect: ' . mysql_error());
//Select The database
$bool = mysql_select_db($database, $connect);
if ($bool === False) {
	print "can't find $database";
}
$sql = 'select * from info_drug  where drug_id=' . $drug_id;
$result = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_assoc($result);
$value = $drug_id;
$colName = 'drug_id'; // 传入*_detail.php
echo '<h1 id="name">', $row['drug_name'], '</h2>';
echo '<table border=0><tr><th>Drug ID</th><td>', $row['id'], '</td></tr>';
if (!empty($row['synonyms'])) {
	echo '<tr><th>Synonyms</th><td>', $row['synonyms'], '</td>';
}
if (!empty($row['drugbank_id'])) {
	echo '<tr><th>DrugBank ID</th><td><a target="_blank" href="http://www.drugbank.ca/drugs/', $row['drugbank_id'], '"</a>', $row['drugbank_id'], '</td></tr>';

}
if (!empty($row['pubchem_id'])) {
	echo '<tr><th>PubChem ID</th><td><a target="_blank" href="https://pubchem.ncbi.nlm.nih.gov/compound/', $row['pubchem_id'], '"</a>', $row['pubchem_id'], '</td></tr>';
}
if (!empty($row['description'])) {
	echo '<tr><th>Description</th><td>', $row['description'], '</td>';
}
echo '</table></div>';
echo '<div id="kind"><ul id="tabs">';

if ($row['mut'] == 1) {
	echo '<li  factor="jqxgrid"><a href="javascript:;" >Pharmacological profile</a></li>';
	include './detail/mut_detail.php';

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

if ($row['msi'] == 1) {
	echo '<li  factor="ms"><a href="javascript:;">MSI</a></li></ul>';
	include './detail/ms_detail.php';
}
echo '<li id="li_cy"  factor="network" flag="0"><a href="javascript:;">Ne</a></li></ul>';

echo '</ul></div>';
mysql_close();

?>


</style>






<div>
  <div id="jqxgrid" class='factor'>

  </div>


  <div id="meth" class='factor'></div>
  <div id="mir" class='factor'></div>
  <div id="ms" class='factor'></div>
  <div id="lnc" class='factor'></div>

<?php
include './cy.php';
?>


<?php
// include('meth_detail.php');
include 'footer.php';
?>