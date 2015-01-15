<?php
// error_reporting(E_ALL ^ E_DEPRECATED);
// 	#Include the connect.php file
// 	include('connect.php');
// 	#Connect to the database
// 	//connection String
// 	// $tableName='tab1';
// 	$database = 'cancerdr';
// 	$connect = mysql_connect($hostname, $username, $password)
// 	or die('Could not connect: ' . mysql_error());
// 	//Select The database
// 	$bool = mysql_select_db($database, $connect);
// 	if ($bool === False){
// 	   print "can't find $database";
// 	}

//     $result = mysql_query("select * from ref_drug", $connect);

// $i=0;
// while($i<mysql_num_fields($result))       //得到列的数目
// {
//   $i++;
//   echo "第".$i."列的信息: <br/>n";

//   $meta=mysql_field_name($result);       //获取列的名称

//   if(!$meta)           //如果值不存在
//   {
//     echo "no information available<br/>n";     //输出无可用信息
//   }
//   print_r($meta);
// }

$arrayTest = array();

// $ii=0;
// while($ii<10){
// 	$arrayTest[]="$ii aa";
	
// 	$ii+=1;
// }

// var_dump($arrayTest);

// echo $arrayTest[0];

for ($ii=0; $ii<10; $ii++){

	${"table".$ii}=$ii;
}
echo $table1;

?>