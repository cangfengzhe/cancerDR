<?php
include 'header.php';
$disease = $_POST['disease'];
$cell = $_POST['cell'];
$drug = $_POST['drug'];
$gene = $_POST['gene'];
$detail = $_POST['detail'];
$journal = $_POST['journal'];
$author = $_POST['author'];
$affiliation = $_POST['affiliation'];
$email = $_POST['email'];
echo '<h1>submit successful</h1>';
?>
<script>

	document.getElementById('left').style.visibility='visible';
</script>
<?php
include 'footer.php';
?>

