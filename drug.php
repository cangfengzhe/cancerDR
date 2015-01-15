<?php
// include('header.php');

include('connect.php');
// $drugID = $_GET['value'];
error_reporting(E_ALL ^ E_DEPRECATED);
$con = mysql_connect($hostname, $username, $password);

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  // 选择数据库
$bool = mysql_select_db($database, $con);
 if ($bool === False){
    print "can't find $database";
 }

$result = mysql_query('SELECT distinct
    ref_drug.*,
    info_cell_lines.ID,
    info_cell_lines.cellLineName,
    info_cell_lines.Histology,
    info_cell_lines.SitePrimary,
    ref_gene.geneID,
    ref_gene.geneName,
    info_pubmed_methylation.pmid,
    info_pubmed_methylation.detail
FROM
    ref_drug
        LEFT JOIN
    methylation ON ref_drug.drugID = methylation.drugID
        LEFT JOIN
    info_cell_lines ON methylation.cellID = info_cell_lines.ID
        LEFT JOIN
    ref_gene ON methylation.geneID = ref_gene.geneID
    left join 
    info_pubmed_methylation on methylation.pmid = info_pubmed_methylation.pmid
WHERE
    ref_drug.drugID ="D001";', $con) or die(mysql_error());

 while ($row = mysql_fetch_array($result)) {

    $orders[] = array(
      # lpd
      "drugID" => $row['drugID'] ,
      'drugName' => $row['drugName'],
      'drugBankID' => $row['drugBankID'],
      'pubchemID' => $row['pubchemID'],
      
      );


  }
// echo var_dump($orders);
// print_r($orders[0][1]);

foreach ($orders[1] as $key => $value) {
  echo $key ,'   ' , $value , '  ' ;
  # code...
}





// print_r(mysql_fetch_array($result));



?>


