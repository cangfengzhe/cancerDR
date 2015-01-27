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
    <script type="text/javascript" src="/js/link.js"></script>
<div id='baseinfo'>
<?php

error_reporting(E_ALL ^ E_DEPRECATED);
  #Include the connect.php file
  include('connect.php');

  
 if (isset($_GET['lncid']) & !empty($_GET['lncid'])){
    $lnc_id = $_GET['lncid'];
 
 }
  else{
    
    include('footer.php');
    die();
 }
 $colName ='lnc_id'; //传入*_detail.php
 $value =$lnc_id;
$connect = mysql_connect($hostname, $username, $password)
  or die('Could not connect: ' . mysql_error());
  //Select The database
  $bool = mysql_select_db($database, $connect);
  if ($bool === False){
     print "can't find $database";
  }
 $sql = 'select * from info_lnc  where lnc_id=' . $lnc_id;
 $result = mysql_query($sql) or die(mysql_error());
 $row = mysql_fetch_assoc($result);

 
 echo '<h1 id="name">', $row['lnc_name'], '</h2>';
 echo '<table border=0><tr><th>Drug ID</th><td>', $row['id'], '</td></tr>';
 
 echo '<tr><th>Synonyms</th><td>' , 'temp', '</td>';
 // echo '<tr><th>DrugBank ID</th><td>', $row['drugbank_id'], '</td><th>      PubChem ID</th><td>', $row['pubchem_id'],'</td></tr>';
 echo '</table></div>';
 echo '<div id="kind"><ul id="tabs">';



  echo '<li  factor="lnc"><a href="#">lncRNA</a></li>';
  include('lnc_detail.php');



echo '</ul></div>';
 mysql_close();

?>

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



  
  

<div>
<div id="mut" class='factor'></div>
  <div id="jqxgrid" class='facor'></div>
    
  
  <div id="meth" class='factor'></div>
  <div id="mir" class='factor'></div>
  <div id="ms" class='factor'></div>
  <div id="lnc" class='factor'></div>
</div>
  


  





<script type="text/javascript">
  $(document).ready(function(){
    $("#tabs li:first").attr("id","current");

    $('#'+$('#tabs li:first').attr('factor')).css('display','block');
    
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