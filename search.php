

<?php
include 'header.php';
include 'security.php';
include 'gridjs.php';
$type = $_GET['type'];
$value = $_GET['value'];
if (!empty($value)) {

	echo '<div><h4>Search returned following results by ', $type, ' : ', $value, '</h4></div>';
}
?>
<script>


$('span.cir').mouseover(function(e) {
	/* Act on the event */
	alert('xaufds');
	$(this).append('<div id="show_note">red,orange, green</div>');
	var xx = e.originalEvent.x || e.originalEvent.layerX || 0;
    var yy = e.originalEvent.y || e.originalEvent.layerY || 0;
    $('#show_note').show()
    $('#show_note').css({'top':yy, 'left':xx})

});

	$('.cir').mouseout(function(event) {
		$('#show_note').hide();
	});
</script>

<?php
# 判断type

switch ($type) {
	case 'cellLine':
		include 'cellBrowser.php';
		break;
	case 'disease':
		include 'diseaseBrowser.php';
		break;
	case 'drug':
		include 'drugBrowser.php';
		break;
	case 'gene':
		include 'geneBrowser.php';
		break;

	default:
		echo "No data";
}

?>




<?php
include 'footer.php';
?>