

<?php
include 'header.php';
include 'security.php';
include 'gridjs.php';
$type = $_GET['type'];
$value = $_GET['value'];
if (!empty($value)) {

	echo '<div><h4>Search returned following results by ', $type, ' : ', $value, '</h4></div>';
} else {
	echo '<div><h4>Browser by ', $type, '</h4></div>';
}
?>


<?php
# 判断type

switch ($type) {
	case 'cellLine':
		include 'celllineBrowser.php';
		break;
	case 'disease':
		include 'diseaseSearch.php';
		break;
	case 'drug':
		include 'drugBrowser.php';
		break;
	case 'gene':
		include 'geneSearch.php';
		break;

	default:
		echo "No data";
}

?>




<?php
include 'footer.php';
?>