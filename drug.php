 <?php
include('header.php');

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
<div id='baseinfo'>
<?php
error_reporting(E_ALL ^ E_DEPRECATED);
  #Include the connect.php file
  include('connect.php');
  #Connect to the database
  //connection String
  // $tableName='tab1';
  // $tableName=$_GET['table'];
  // $keyword = $_GET['value'];
 // $colName = $_GET['colName'];
  
 if (isset($_GET['drugid']) & !empty($_GET['drugid'])){
    $drug_id = $_GET['drugid'];
    if(intval($drug_id)>200){
      include('footer.php');
      die();
    }
 }
  else{
    include('footer.php');
    die();
 }
  $connect = mysql_connect($hostname, $username, $password)
  or die('Could not connect: ' . mysql_error());
  //Select The database
  $bool = mysql_select_db($database, $connect);
  if ($bool === False){
     print "can't find $database";
  }
 $sql = 'select * from info_drug  where drug_id=' . $drug_id;
 $result = mysql_query($sql) or die(mysql_error());
 $row = mysql_fetch_assoc($result);
 $drug_id=$row['drug_id'];
 echo '<h1 id="name">', $row['drug_name'], '</h2>';
 echo '<table border=0><tr><th>Drug ID</th><td>', $row['id'], '</td></tr>';
 
 echo '<tr><th>Synonyms</th><td>' , 'temp', '</td>';
 echo '<tr><th>DrugBank ID</th><td>', $row['drugbank_id'], '</td><th>      PubChem ID</th><td>', $row['pubchem_id'],'</td></tr>';
 echo '</table>';
 mysql_close();

?>
</div>
<style>
#baseinfo{
  position: relative;
margin:20px 0;
}
table{
 
  margin-top:10px;
  text-align: left;
}


th, td{

padding: 5px;
}
#jqxWidget{
  margin: 20px 0px 0px 0px;
}
.factor{
  display:none;
}
</style>
<div id='kind'>
  <ul id="tabs">
<li  factor='jqxgrid'><a href="#" >Mutation</a></li>
<li  factor='meth'><a href="#">Methylation</a></li>
<li  factor=''><a href="#">miRNA</a></li>
<li  factor=''><a href="#">lncRNA</a></li>
<li  factor=''><a href="#">MSI</a></li></ul>
  
  
</ul>
</div>

<div>
  <div id="jqxgrid" class='facor'></div>
  <div id="meth" class='factor'></div>
</div>
  


  


<?php
include('meth_detail.php');
include('mut_detail.php');
?>
<script type="text/javascript">
  $(document).ready(function(){
    $("#tabs li:first").attr("id","current");
    $('#tabs li').click(function(){
      $(this).attr("id","current");
      $('#'+$(this).attr('factor')).css('display','block');
      $('#'+$(this).attr('factor')).siblings().css('display','none');
      $(this).siblings().attr("id","");
    })


  })

</script>

<?php
// include('meth_detail.php');
include('footer.php');
?>