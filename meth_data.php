<?php

#Include the connect.php file
include 'connect.php';

$tableName = $_GET['table'];
$keyword = $_GET['value'];
$colName = $_GET['colName'];
$connect = mysql_connect($hostname, $username, $password)
or die('Could not connect: ' . mysql_error());
//Select The database
$bool = mysql_select_db($database, $connect);
if ($bool === False) {
	print "can't find $database";
}

$pagenum = $_GET['pagenum'];
$pagesize = $_GET['pagesize'];
$start = $pagenum * $pagesize;
$where = ' WHERE ' . $colName . " like '%" . $keyword . "%' ";
$query = "SELECT SQL_CALC_FOUND_ROWS * FROM " . $tableName . $where . " LIMIT $start, $pagesize";

$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
$sql = "SELECT FOUND_ROWS() AS `found_rows`;";
$rows = mysql_query($sql);
$rows = mysql_fetch_assoc($rows);
$total_rows = $rows['found_rows'];
$filterquery = "";

// filter data.
if (isset($_GET['filterscount'])) {
	$filterscount = $_GET['filterscount'];

	if ($filterscount > 0) {
		$where .= " AND (  ";
		$tmpdatafield = "";
		$tmpfilteroperator = "";
		for ($i = 0; $i < $filterscount; $i++) {
			// get the filter's value.
			$filtervalue = $_GET["filtervalue" . $i];
			// get the filter's condition.
			$filtercondition = $_GET["filtercondition" . $i];
			// get the filter's column.
			$filterdatafield = $_GET["filterdatafield" . $i];
			// get the filter's operator.
			$filteroperator = $_GET["filteroperator" . $i];

			if ($tmpdatafield == "") {
				$tmpdatafield = $filterdatafield;
			} else if ($tmpdatafield != $filterdatafield) {
				$where .= ")AND(";
			} else if ($tmpdatafield == $filterdatafield) {
				if ($tmpfilteroperator == 0) {
					$where .= " AND ";
				} else {
					$where .= " OR ";
				}

			}

			// build the "WHERE" clause depending on the filter's condition, value and datafield.
			switch ($filtercondition) {
				case "CONTAINS":
					$where .= " " . $filterdatafield . " LIKE '%" . $filtervalue . "%'";
					break;
				case "DOES_NOT_CONTAIN":
					$where .= " " . $filterdatafield . " NOT LIKE '%" . $filtervalue . "%'";
					break;
				case "EQUAL":
					$where .= " " . $filterdatafield . " = '" . $filtervalue . "'";
					break;
				case "NOT_EQUAL":
					$where .= " " . $filterdatafield . " <> '" . $filtervalue . "'";
					break;
				case "GREATER_THAN":
					$where .= " " . $filterdatafield . " > '" . $filtervalue . "'";
					break;
				case "LESS_THAN":
					$where .= " " . $filterdatafield . " < '" . $filtervalue . "'";
					break;
				case "GREATER_THAN_OR_EQUAL":
					$where .= " " . $filterdatafield . " >= '" . $filtervalue . "'";
					break;
				case "LESS_THAN_OR_EQUAL":
					$where .= " " . $filterdatafield . " <= '" . $filtervalue . "'";
					break;
				case "STARTS_WITH":
					$where .= " " . $filterdatafield . " LIKE '" . $filtervalue . "%'";
					break;
				case "ENDS_WITH":
					$where .= " " . $filterdatafield . " LIKE '%" . $filtervalue . "'";
					break;
			}

			if ($i == $filterscount - 1) {
				$where .= ")";
			}

			$tmpfilteroperator = $filteroperator;
			$tmpdatafield = $filterdatafield;
		}
		// build the query.
		$query = "SELECT * FROM " . $tableName . " " . $where;
		$filterquery = $query;
		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		$sql = "SELECT FOUND_ROWS() AS `found_rows`;";
		$rows = mysql_query($sql);
		$rows = mysql_fetch_assoc($rows);
		$new_total_rows = $rows['found_rows'];
		$query = "SELECT * FROM " . $tableName . " " . $where . " LIMIT $start, $pagesize";
		$total_rows = $new_total_rows;
	}
}

if (isset($_GET['sortdatafield'])) {

	$sortfield = $_GET['sortdatafield'];
	$sortorder = $_GET['sortorder'];

	if ($sortorder != '') {
		if ($_GET['filterscount'] == 0) {
			if ($sortorder == "desc") {
				$query = "SELECT * FROM " . $tableName . $where . " ORDER BY" . " " . $sortfield . " DESC LIMIT $start, $pagesize";
			} else if ($sortorder == "asc") {
				$query = "SELECT * FROM " . $tableName . $where . " ORDER BY" . " " . $sortfield . " ASC LIMIT $start, $pagesize";
			}
		} else {
			if ($sortorder == "desc") {
				$filterquery .= " ORDER BY" . " " . $sortfield . " DESC LIMIT $start, $pagesize";
			} else if ($sortorder == "asc") {
				$filterquery .= " ORDER BY" . " " . $sortfield . " ASC LIMIT $start, $pagesize";
			}
			$query = $filterquery;
		}
	}
}

$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());

$orders = null;
// get data and store in a json array
switch ($tableName) {
	case 'ref_drug':

		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {

			$orders[] = array(
				# lpd
				"drugID" => $row['drugID'],
				'drugName' => $row['drugName'],
				'drugBankID' => $row['drugBankID'],
				'pubchemID' => $row['pubchemID'],
			);

		}

		break;

	default:
		echo 'error';
		break;
}

$data[] = array(
	'TotalRows' => $total_rows,
	'Rows' => $orders,
);

echo json_encode($data);
?>