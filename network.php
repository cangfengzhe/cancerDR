<?php
include 'header.php';
include 'gridjs.php';
?>

<script>

		$(function(){
		$('#left').css('visibility','visible');
        $('#cy').html('');
        $('#cy').prepend('<div id="load">Loading......</div>');

		});

</script>
<script src="./cy.js"></script>
<div class='foreword'><h1>Network</h1>

</div>

<div style='margin-left: 40px' id="network" >
        <div id='cy'></div>

    <div id="info">
        <h3>Node Information</h3>
        <table>
            <tbody>
                <tr>
                    <td>Type</td>
                    <td id='type'>Null</td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td id='cy_name'>Null</td>
                </tr>
                <tr>
                    <td>ID</td>
                    <td id='cy_id'>Null</td>
                </tr>
                <tr>
                    <td>Degree</td>
                    <td id='degree'></td>
                </tr>
                <tr>
                    <td>Betweenness Centrality</td>
                    <td id='BetweennessCentrality'></td>
                </tr>
                <tr>
                    <td>Closeness Centrality</td>
                    <td id='ClosenessCentrality'></td>
                </tr>
                <tr>
                    <td>Average Shortest Path Length</td>
                    <td id='AverageShortestPathLength'></td>
                </tr>
            </tbody>
        </table>


        <button id='reset'>Full Nodes</button>

        <button id='png'>Save Image</button>
    </div>

</div>
</div>

<script>

</script>
<?php

include 'footer.php';
?>