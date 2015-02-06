

<link rel="stylesheet" href="./cytoscape/font-awesome.min.css" />
    <link rel="stylesheet" href="./cytoscape/cytoscape.js-panzoom.css" />


    <!-- <script src='./cytoscape/build/jquery-2.1.1.min.js'></script> -->
    <script src="./cytoscape/build/cytoscape.js"></script>
    <script src="./cytoscape/lib/layout.cose.js"></script>

    <script src="./cytoscape/lib/layout.cose.js"></script>

    <script src="./cytoscape/cytoscape.js-panzoom.js"></script>
        <script >
    $(function() { // on dom ready

        // $('#cy').html('abcd');
        function network(){


        var url = './cytoscape/network.json';
        $.ajax(url, {
            async: false,
            success: function(data) {
                bb = data; // bb为全局变量


            },


        });


        var aa = bb;

        var cy = cytoscape({

            container: document.getElementById('cy'),

            elements: aa.elements,

            layout: {
                name: 'preset'
            },

            style: cytoscape.stylesheet()
                .selector('node[type = "gene"]')
                .css({
                    'background-color': '#7030A0'
                })
                .selector('node[type = "mir"]')
                .css({
                    'background-color': '#F48C37'
                })
                .selector('node[type = "lnc"]')
                .css({
                    'background-color': '#279706'
                })
                .selector('node[type = "dis"]')
                .css({
                    'background-color': '#F48C37',
                    'shape': 'roundrectangle',
                    'border-radius': 4
                })
                .selector('node[type = "drug"]')
                .css({
                    'background-color': '#279706',
                    "shape": "star",

                })
                .selector('node[type = "ms"]')
                .css({
                    'background-color': '#0070C0'
                })
                .selector('edge')
                .css({
                    'line-color': '#F6C28C'
                })
                .selector('node.show')
                .css({
                    'content': 'data(name)',
                    'font-size': 18,
                    'text-valign': 'center',
                    'color': 'white',
                    'width': 80,
                    'height': 80,
                    'text-outline-width': 1,
                    'text-outline-color': '#888',
                    'z-index': 10,
                    // 'line-color': 'black'
                })
                .selector('.faded')
                .css({
                    'opacity': 0.5,
                    'text-opacity': 0
                })
                .selector('node.single')
                .css({
                    // 'background-color': 'rgb(0,0,0)'
                    'border-width': 5,
                    'border-color': 'red',
                    'width': 100,
                    'height': 100,
                    'z-index': 20
                })
                .selector('.blackEdge')
                .css({
                    'line-color': 'black',
                    'z-index': 10,
                })
                .selector('node.faguang')
                .css({
                    'opacity': 0.5,
                }),
            ready: function() {
                console.log('ready')

                $('#png').html('<a href="' + cy.png() + '" >Save image</a>');

            },
        })



        cy.on('tap', 'node', function(evt) {
            cy.nodes().removeClass('show')
                .removeClass('single')
                .removeClass('faguang');
            eles = evt.cyTarget;
            cy.elements().removeClass('blackEdge');
            cy.elements().addClass('faded');

            $('#type').text(eles.data('type2'));
            function link(str){
                return '<a href="../'+eles.data('type')+'.php?'+eles.data('type')+'id='+ eles.data('type_id')+'">'+eles.data(str)+'</a>';
            }
            $('#id').html(link('ref_id'));
            $('#name').html(link('name'));
            $('#degree').text(eles.degree());
            $('#BetweennessCentrality').text(eles.data('BetweennessCentrality'));
            $('#ClosenessCentrality').text(eles.data('ClosenessCentrality'));
            $('#AverageShortestPathLength').text(eles.data('AverageShortestPathLength'));
            $('#BetweennessCentrality').text(eles.data('BetweennessCentrality'));
            eles.connectedEdges().addClass('blackEdge');
            var neighborhood = eles.neighborhood().add(eles);
            neighborhood.removeClass('faded');
            neighborhood.addClass('show');
            eles.addClass('single');




            if (eles.degree() < 10) {
                neighborhood.layout({
                    name: 'concentric',
                    fit: true,
                    padding: 10,

                });
                cy.center(neighborhood);
                cy.fit(neighborhood, 100);
            } else {
                neighborhood.layout({
                    name: 'cose',
                    fit: false,
                    padding: 10,
                    numIter: 100,

                    // Initial temperature (maximum node displacement)
                    initialTemp: 30,

                    // Cooling factor (how the temperature is reduced between consecutive iterations
                    coolingFactor: 0.95,

                    // Lower temperature threshold (below this point the layout will end)
                    minTemp: 10.0,
                    ready: function() {
                        // cy.fit(neighborhood);
                        cy.center(neighborhood);
                        cy.fit(neighborhood, 100);
                        cy.zoom({
                            level: 0.4,
                            renderedPosition: eles.renderedPosition()
                        });

                        // console.log(eles.renderedPosition());
                    }
                });

            }
            // cy.center(neighborhood);

            $('#png').html('<a href="' + cy.png() + '" >Save image</a>');
            setInterval('eles.flashClass(".faguang",2000);', 2000);

        })
        // var php = "<?php echo $row['id'];?>";
        // var id="node[ref_id='"+php+"']";

        // if(php !=''){
        //  cy.$(id).trigger('tap');
        // }


        $('#reset').click(function() {
            cy.load({
                    nodes: aa.elements.nodes,
                    edges: aa.elements.edges
                })
                // cy.fit();

        })
        cy.fit();

        // cy.panzoom();
}
    })

        </script>

    <style>
    #network {
        float: left;
        width: 1000px;
        height: 600px;

        border: 1px solid #295c85;
        border-right-width: 0;
        border-radius: 3px;
    }
    #cy {
        float: left;
        width: 790px;
        height: 600px;
    }
    #info {
        float: left;
        background-color: #69a6db;
        width: 200px;
        height: 600px;
        z-index: 5;
        color: white;
        font-size: 20px;
        border: 1px solid #295c85;
        border-radius: 3px;
    }
    #info table {
        margin-top: 30px;
        color: white;
        font-size: 20px;
    }
    #info table tr {
        height: 30px;
    }
    #png {
        border: black solid 1px;
        background-color: grey;
        margin: 10px 0px;
    }
    #reset {
        margin: 10px 0;
    }
    #info a {
        text-decoration: none;
    }
    </style>

    <!-- <div id="cy"></div> -->
<div class='acor' id="network">
        <div id='cy'></div>

    <div id="info">
        <h3>Node Information</h3>
        <table>
            <tbody>
                <tr>
                    <td>Type</td>
                    <td id='type'></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td id='name'></td>
                </tr>
                <tr>
                    <td>ID</td>
                    <td id='id'></td>
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

        <button id='png'>Save image</button>
    </div>

</div>
</div>