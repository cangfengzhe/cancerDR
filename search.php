

<?php
include('header.php');

$type = $_GET['type'];
$value = $_GET['value'];
if (!empty($value)){
echo $type . ':' . $value;
}
else{
  echo 'the search word should not be empty';
  include('footer.php');
  die();
}
?>

<link rel="stylesheet" href="/css/jqx.base.css" type="text/css" />
    <link rel="stylesheet" href="/css/jqx.energyblue.css" type="text/css" />
    <!-- <link rel="stylesheet" href="../../jqwidgets/styles/jqx.classic.css" type="text/css" /> -->
    <script type="text/javascript" src="/js/jquery-1.10.2.min.js"></script>  
  <script type="text/javascript" src="/js/jqxcore.js"></script>
    <script type="text/javascript" src="/js/jqxbuttons.js"></script>
    <script type="text/javascript" src="/js/jqxscrollbar.js"></script>
    <script type="text/javascript" src="/js/jqxlistbox.js"></script>
    <script type="text/javascript" src="/js/jqxdropdownlist.js"></script>
    <script type="text/javascript" src="/js/jqxmenu.js"></script>
    <script type="text/javascript" src="/js/jqxdata.js"></script>
    <script type="text/javascript" src="/js/jqxgrid.js"></script>
  <script type="text/javascript" src="/js/jqxgrid.sort.js"></script>  
  <script type="text/javascript" src="/js/jqxgrid.selection.js"></script>
    <script type="text/javascript" src="/js/jqxgrid.pager.js"></script>
  <script type="text/javascript" src="/js/jqxgrid.filter.js"></script>
   <script type="text/javascript" src="/js/link.js"></script>
<?php
# 判断type

switch ($type)
{
case 'cellLine':
  include('celllineBrowser.php');
  break;
case 'disease':
  include('diseaseSearch.php');
  break;
case 'drug':
  include('drugBrowser.php');
  break;
case 'gene':
	include('geneSearch.php');
	break;

default:
  echo "No data";
}

?>




<?php
include('footer.php');
?>