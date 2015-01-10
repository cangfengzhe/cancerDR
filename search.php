<?php
include('header.php');
?>

<?php

if (!(empty($_GET['type']) and empty($_GET['name']))){
echo $_GET['type'] . ':' . $_GET['name'];
}

include('grid.php');

?>




<?php
include('footer.php');
?>