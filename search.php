<?php
include('header.php');

$type = $_GET['type'];
$value = $_GET['value'];
if (!(empty($type) and empty($value))){
echo $type . ':' . $value;
}

# 判断type

switch ($type)
{
case 'cellLine':
  include('cellLineSearch.php');
  break;
case 'cellType':
  include('cellTypeSearch.php');
  break;
case 'drug':
  include('drugSearch.php');
  break;
case 'gene':
	include('geneSearch.php');
	break;

default:
  echo "No number between 1 and 3";
}

?>




<?php
include('footer.php');
?>