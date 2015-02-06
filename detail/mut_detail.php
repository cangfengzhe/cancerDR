





   <script type="text/javascript">
        $(document).ready(function () {
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [

                    {name: 'cell_id', type: 'string'},
                    { name: 'cell_name', type: 'string'},
                   { name: 'IC25', type: 'float'},
                    { name: 'IC50', type: 'float'},
                   { name: 'IC75', type: 'float'},
                   { name: 'IC90', type: 'float'},
                    { name: 'Z_Score', type: 'float'},
                   	{ name : 'type', type: 'float'}
                ],
				id: 'cell_id',
                url: 'mut_data.php?drug_id='+'<?php echo $value;?>',

				root: 'Rows',
				cache: true,
                beforeprocessing: function (data) {
                    source.totalrecords = data[0].TotalRows;
                },
                filter: function()
				{
					// update the grid and send a request to the server.
					$("#jqxgrid").jqxGrid('updatebounddata', 'filter');
				},
				sort: function()
				{
					$("#jqxgrid").jqxGrid('updatebounddata', 'sort');
				}
            };

            var dataAdapter = new $.jqx.dataAdapter(source);

			// sub grid
			var initrowdetails = function (index, parentElement, gridElement) {
				var row = index;
				var id = $("#jqxgrid").jqxGrid('getrowdata', row)['cell_id'];
			    var grid = $($(parentElement).children()[0]);

				var source =
				{
					url: 'mut_data.php?drug_id=1',
					dataType: 'json',
					data: {cell_id: id}, // lpd
					datatype: "json",
					cache: true,
					datafields: [

						 { name: 'gene_id' },
						 { name: 'gene_name' },
						 { name: 'cn' },
						 { name: 'mut_aa' },
						 { name: 'mut_cds' },
						 { name: 'mut_desc' },
						 { name: 'mut_pos' }

					],
					root: 'Rows',
					beforeprocessing: function (data) {
						source.totalrecords = data[0].TotalRows;
					},
					 filter: function()
				{
					// update the grid and send a request to the server.
					grid.jqxGrid('updatebounddata', 'filter');
				},
					sort: function()
					{
						grid.jqxGrid('updatebounddata', 'sort');
					}
 				};
				var adapter = new $.jqx.dataAdapter(source);
					// {loadComplete: function () {
     //        		var records = adapter.records;
     //                var length = records.length;

     //                if (records[0].gene_id==null){
     //                	// alert('null');
     //                	 $("#jqxgrid").jqxGrid('hiderowdetails', 1);
     //                }

     //        }});

			var empty = function (row, columnfield, value, defaulthtml, columnproperties, rowdata) {
              if(value==''){
              return 'No Gene';

            }
            else{
            			return '<div style="margin:10px  10px;"><a href="/gene.php?geneid=' + rowdata.gene_id + '">' + value + '</a></div>';

            }
        }

		// init Orders Grid
				grid.jqxGrid(
				{
					virtualmode: true,
					height: 190,
					width: 880,
					// pagesize: 3,
					// pagesizeoptions: ['3', '5', '10'],
					sortable: true,
					pageable: true,
					pagesize: 5,
					source: adapter,
					theme: 'energyblue',
					filterable: true,
					// autoheight: true,
					showemptyrow: false,
					selectionmode: 'none',

				enablehover: false,
				enablebrowserselection:'enable', //是否可以选中字体
				sortable: true,
					rendergridrows: function (obj) {
						return obj.data;
					},
					columns: [


						  { text: 'Gene Name', datafield: 'gene_name', width: 120, cellsrenderer:empty ,renderer:columnsrenderer,renderer:columnsrenderer},
						  { text: 'Copy Numer', datafield: 'cn', width: 100 ,renderer:columnsrenderer,renderer:columnsrenderer},
						  { text: 'AA Mutation', datafield: 'mut_aa', width: 180 ,renderer:columnsrenderer,renderer:columnsrenderer},
						  // { text: 'mut_cds', datafield: 'mut_cds', width: 200 },
						  { text: 'Description', datafield: 'mut_desc', width: 240 ,renderer:columnsrenderer,renderer:columnsrenderer},
						  { text: 'Position', datafield: 'mut_pos', width: 240,renderer:columnsrenderer,renderer:columnsrenderer },

					  ]
				});
			};

			// set rows details.
            $("#jqxgrid").bind('bindingcomplete', function (event) {
                if (event.target.id == "jqxgrid") {
                    $("#jqxgrid").jqxGrid('beginupdate');
                    var datainformation = $("#jqxgrid").jqxGrid('getdatainformation');
                    for (i = 0; i < datainformation.rowscount; i++) {
                        $("#jqxgrid").jqxGrid('setrowdetails', i, "<div id='grid" + i + "' style='margin: 10px;'></div>", 220, true);
                    }
                    $("#jqxgrid").jqxGrid('resumeupdate');

                }

            });
			    // $("#jqxGrid").on("cellclick", function (event){

       //        	alert(event.args.rowindex);
       //        	 // $("#jqxgrid").jqxGrid('showrowdetails', event.args.rowindex);

       //        } );




var crossLink =  function (row, columnfield, value, defaulthtml, columnproperties, rowdata) {
   return '<div style="margin-top:5px;"><a href="./drug.php?value=' + rowdata.cell_id + '">' + value + '</a></div>';
   }
			$("#jqxgrid").jqxGrid(
            {
                source: dataAdapter,
                width:1000,
                theme: 'energyblue',
				pageable: true,
				sortable: true,
				autoheight: true,
				rowsheight: 30,
				columnsheight: 40,
				// height:40px;
                virtualmode: true,
                rowdetails: true,
                filterable: true,
				sortable: true,
				selectionmode: 'none',
				altrows: true,//交替颜色
				autoshowfiltericon: false,

				// showrowdetailscolumn:false,

				pagesize: 10,
				enablehover: false,
				enablebrowserselection:'enable', //是否可以选中字体
                initrowdetails: initrowdetails,

                rendergridrows: function () {
                    return dataAdapter.records;
                },
                columns: [

                // { text: 'cell_id', datafield: 'cell_id', width: 150},
                 { text: 'Cell Line', datafield: 'cell_name', width: 170, cellsrenderer:cell_link,renderer:columnsrenderer},
               { text: 'Log(ic25)/mM', datafield: 'IC25', width: 150,renderer:columnsrenderer},
                { text: 'Log(ic50)/mM', datafield: 'IC50', width: 150,renderer:columnsrenderer},
               { text: 'Log(ic75)/mM', datafield: 'IC75', width: 150,renderer:columnsrenderer},
               { text: 'Log(ic90)/mM', datafield: 'IC90', width: 150,renderer:columnsrenderer},
                  { text: 'Z-Score', datafield: 'Z_Score', width: 120,renderer:columnsrenderer },
                  { text: 'type', datafield: 'type', width:80, cellsrenderer:crossRef,renderer:columnsrenderer}
              ]
            });

 // $('#jqxgrid').on('cellclick', function (event) {
 //    // alert(event.args.rowindex);
 //    if(event.args.columnindex==3){
 //    	alert(event.args.value);
 // 		if (event.args.value=='detail'){


 //    	 $("#jqxgrid").jqxGrid('showrowdetails', event.args.rowindex);
 //    	  $("#jqxGrid").jqxGrid('setcellvalue',event.args.rowindex , "detail", "closed");
 //    	}
 //    	else if(event.args.value=='closed')
 //    	{
 //    	$("#jqxgrid").jqxGrid('hiderowdetails', event.args.rowindex);
 //    	}
 //   // alert(event.args.value);

 //    }
 //     // $("#log").html("A cell has been clicked:" + event.args.rowindex + ":" + event.args.datafield);
 // });


        });

    </script>

 <!-- <div id="jqxgrid" class='factor'></div> -->


