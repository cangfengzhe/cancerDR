    $(function() { // on dom ready

      

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
                name: 'preset',

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
                .selector('node[type = "disease"]')
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
                $('#load').remove();
                $('#png').html('<a target="_blank" href="' + cy.png({full:true,scale:100}) + '" >Save image</a>');

            },
        })

        cy.on('touchmove',function(){
            $('#png').html('<a target="_blank" href="' + cy.png({full:true,scale:100}) + '" >Save image</a>');
        })

        cy.on('tap', 'node', function(evt) {
            cy.nodes().removeClass('show')
                .removeClass('single')
                .removeClass('faguang');
            eles = evt.cyTarget;
            cy.elements().removeClass('blackEdge');
            cy.elements().addClass('faded');

            $('#type').text(eles.data('type2'));

            function link(str) {
                return '<a href="../' + eles.data('type') + '.php?' + eles.data('type') + 'id=' + eles.data('type_id') + '">' + eles.data(str) + '</a>';
            }
            $('#cy_id').html(link('ref_id'));
            $('#cy_name').html(link('name'));
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
                        cy.fit(neighborhood);
                        cy.zoom({
                            level: 0.5,
                            renderedPosition: eles.renderedPosition()
                        });
                        // $('#png').html('<a target="_blank" href="' + cy.png({full:true,scale:100}) + '" >Save image</a>');
                        // console.log(eles.renderedPosition());
                    }
                });

            }
            // cy.center(neighborhood);

             $('#png').html('<a target="_blank" href="' + cy.png({full:true,scale:100}) + '" >Save image</a>');
            setInterval('eles.flashClass(".faguang",2000);', 2000);

        })

        // idValue= $('#li_cy').attr('flag');

        if(typeof(idValue) != "undefined" ){
            var id = "node[ref_id='" + idValue + "']";
        
        // cy.$('node[ref_id="DRUG020"]').trigger('tap'); 
        cy.$(id).trigger('tap');
        }
        
        // cy.$(id).trigger('tap');  
        // cy.filter('node[ref_id="DRUG001"]').trigger('tap');




        $('#reset').click(function() {
            cy.load({
                    nodes: aa.elements.nodes,
                    edges: aa.elements.edges
                })
                // cy.fit();
    $('#png').html('<a target="_blank" href="' + cy.png({full:true,scale:100}) + '" >Save image</a>');
        })
        cy.fit();
       
        cy.panzoom();

    })
