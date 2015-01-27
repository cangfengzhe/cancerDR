<?php
// include('header.php');
// include('connect.php');
// error_reporting(E_ALL ^ E_DEPRECATED);
// $con = mysql_connect($hostname, $username, $password);

// if (!$con)
//   {
//   die('Could not connect: ' . mysql_error());
//   }
//   // 选择数据库
// $bool = mysql_select_db($database, $con);
// 	if ($bool === False){
// 	   print "can't find $database";
// 	}


// $result = mysql_query("SELECT * FROM tab1", $con);

// echo '<style>
// 	table
//   {
//   border-collapse:collapse;
//   }

// table,th, td
//   {
//   border: 1px solid #ddd;
//   }
//   th, td{
//   	width:200px;
//   	height: 50px;
//   	text-align: left;
//   }
// 	th{
// 		background-color: rgb(214, 224, 238);
// 	}

// </style>';
// // echo '<table border="0">
// // <thead>
	
// // </thead>
// 	<tbody>
// 	';

// while($row = mysql_fetch_array($result))
//   {
//   echo '<tr><th>' . $row['var1'] . "</th><td>" . $row['var2'] .'</td></tr>';

//   }

//  echo '</tbody>
// </table>';

// // get the info of field in database
// while ($property = mysql_fetch_field($result))
//   {
//   echo "Field name: " . $property->name . "<br />";
//   echo "Table name: " . $property->table . "<br />";
//   echo "Default value: " . $property->def . "<br />";
//   echo "Max length: " . $property->max_length . "<br />";
//   echo "Not NULL: " . $property->not_null . "<br />"; 
//   echo "Primary Key: " . $property->primary_key . "<br />";
//   echo "Unique Key: " . $property->unique_key . "<br />"; 
//   echo "Mutliple Key: " . $property->multiple_key . "<br />";
//   echo "Numeric Field: " . $property->numeric . "<br />";
//   echo "BLOB: " . $property->blob . "<br />";
//   echo "Field Type: " . $property->type . "<br />";
//   echo "Unsigned: " . $property->unsigned . "<br />";
//   echo "Zero-filled: " . $property->zerofill . "<br /><br />"; 
//   }

$other_name="docetaxel, Taxotere, Docetaxel anhydrous, 114977-28-5, EmDOC, Taxotere(R), Taxotere (TN), CHEBI:4672, Docetaxel, Trihydrate, AC1L3WHJ, CHEMBL92, N-debenzoyl-N-Boc-10-deacetyl taxol, TXL, NSC-628503, RP-56976, docetaxel 114977-28-5, 01885_FLUKA, XRP-6976L, ZDZOTLJHXYCWBA-VCVYQWHSSA-, ANX-514, SDP-014, HMS2089K08, AC-383, NSC628503, DB01248, C11231, D07866, DSSTox_CID_20464, DSSTox_RID_79497, DSSTox_GSID_40464, N-debenzoyl-N-(tert-butoxycarbonyl)-10-deacetyltaxol, N-debenzoyl-N-(tert-butoxycarbonyl)-10-deacetylpaclitaxel, (2alpha,5beta,7beta,10beta,13alpha)-4-(acetyloxy)-13-({(2R,3S)-3-[(tert-butoxycarbonyl)amino]-2-hydroxy-3-phenylpropanoyl}oxy)-1,7,10-trihydroxy-9-oxo-5,20-epoxytax-11-en-2-yl benzoate, (2aR,4S,4aS,6R,9S,11S,12S,12aR,12bS)-12b-(acetyloxy)-12-(benzoyloxy)-2a,3,4,4a,5,6,9,10,11,12,12a,12b-dodecahydro-4,6,11-trihydroxy-4a,8,13,13-tetramethyl-5-oxo-7,11-methano-1H-cyclodeca[3,4]benz[1,2-b]oxet-9-yl (aR,bS)-b-[[(1,1-dimethylethoxy)carbonyl]amino]-a-hydroxybenzenepropanoate, 4-(acetyloxy)-13alpha-({(2R,3S)-3-[(tert-butoxycarbonyl)amino]-2-hydroxy-3-phenylpropanoyl}oxy)-1,7beta,10beta-trihydroxy-9-oxo-5beta,20-epoxytax-11-en-2alpha-yl benzoate, InChI=1/C43H53NO14/c1-22-26(55-37(51)32(48)30(24-15-11-9-12-16-24)44-38(52)58-39(3,4)5)20-43(53)35(56-36(50)25-17-13-10-14-18-25)33-41(8,34(49)31(47)29(22)40(43,6)7)27(46)19-28-42(33,21-54-28)57-23(2)45/h9-18,26-28,30-33,35,46-48,53H,19-21H2,1-8H3,(H,44,5, CAS-114977-28-5, UNII-699121PHCA, Docecadreg, Taxoterereg, Docefrez, Taxotere&reg;, Docetaxel (TN), Docetaxel (INN), NCGC00181306-01, NCGC00181306-02, Taxotere (Aventis), CID148124, nchembio853-comp8, Docetaxel - Taxotere, nchembio.188-comp8, Docetaxel (JAN/INN), nchembio.573-comp11, SureCN4419, N-debenzoyl-N-tert-butoxycarbonyl-10-deacetyltaxol, nchembio.2007.34-comp7, GTPL6809, SYP-0704A, MolPort-003-847-005, 699121PHCA, HY-B0011, Tox21_112781, Tox21_113088, CD0182, DAP000590, AKOS015960718, Tox21_112781_1, BD17634, CS-1144, MCULE-1930158681, RL00579, NCGC00181306-04, NCGC00242509-01, BC204088, AB0072965, D4102, FT-0625558, W-1428, AB01273941-01, AB01273941-02, W-60384, N-debenzoyl-N-tert-butoxycarbonyl-10-deacetyl taxol; Taxotere, [acetoxy-[(2R,3S)-3-(tert-butoxycarbonylamino)-2-hydroxy-3-phenyl-propanoyl]oxy-trihydroxy-tetramethyl-oxo-[?]yl] benzoate, Benzenepropanoic acid,1-dimethylethoxy)carbonyl]amino]-.alpha.-hydroxy-, (2aR,4S,4aS,6R,9S,11S,12S,12aR,12bS)-12b-(acetyloxy)-12-(benzyloxy)-2a,3,4,4a,5,6,9,10,11,12,12a,12b-dodecahydro-4,6,11-trihydroxy-4a,8,13,13-tetramethyl-5-oxo-7,11-methano-1H-cyclodeca[3,4]benz[1,2-b]oxet-9-yl ester, (.alpha.R,.beta.S)";
$keyword = 'flu';
// echo substr($str, 4,-1);
	// $other_name = $row['other_name'];
			$str_pos = strpos($other_name,$keyword);
			echo $str_pos;
			// echo "aaaa";
			// echo strlen($other_name);
			$offset = 50;
			if ($str_pos< $offset){
				if( (strlen($other_name)-$str_pos)<$offset){
					// $str_show = substr(string,$str_pos,strlen($keyword)+20);
					$str_show = $other_name;
				}else{
					$str_show = substr($other_name,0,strlen($keyword)+$offset*2);
				}				

			}else{
				if( (strlen($other_name)-$str_pos)<$offset){
					$str_show = substr($other_name,$str_pos-$offset);
					// $str_show = $other_name;
				}else{
					$str_show = substr($other_name,$str_pos-$offset,strlen($keyword)+$offset*2);
				}	
			}
		    $str_show =  preg_replace("/$keyword/i",'<span style="background-color:yellow">' . $keyword . '</span>', $str_show);
		

// echo $str_show;
//   mysql_close($con);
?>


