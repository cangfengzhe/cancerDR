	<!-- php调用javacript -->
    <script type="text/javascript">

        $(document).ready(function () {
            // prepare the data
            var theme = 'energyblue';
      		var colName = '<?php echo $colName;?>';
            var source =
            {
                 datatype: "json",
                 datafields: [
					 { name: 'drug_id', type: 'string'},
					 { name: 'drug_name', type: 'string'},
                      { name: 'disease_id', type: 'string'},
                      { name: 'disease_name', type: 'string'},
                      { name: 'cell_id', type: 'string'},
                      { name: 'cell_name', type: 'string'},
                      { name: 'ms_id', type: 'string'},
                      { name: 'ms_name', type: 'string'},
                      { name: 'pmid', type: 'string'},
                      { name: 'detail', type: 'string'},
                ],
			     url: 'data.php?table='+ "ms_view" +'&colName='+ colName + '&value=' + '<?php echo $value;?>',

				cache: false,
				filter: function()
				{
					// update the grid and send a request to the server.
					$("#ms").jqxGrid('updatebounddata', 'filter');
				},
				sort: function()
				{
					// update the grid and send a request to the server.
					$("#ms").jqxGrid('updatebounddata', 'sort');
				},
				root: 'Rows',

				beforeprocessing: function(data)
				{
					if (data != null)
					{
						source.totalrecords = data[0].TotalRows;
					}

				}


            };


		    var dataadapter = new $.jqx.dataAdapter(source, {
					loadError: function(xhr, status, error)
					{
						alert(error);
					}
				}
			);


            // initialize jqxGrid
            if(colName == 'drug_id'){
            	$("#ms").jqxGrid(
            {
                source: dataadapter,
                width:1000,
                theme: 'energyblue',
				pageable: true,
				sortable: true,
				autoheight: true,
				rowsheight: 30,
				columnsheight: 40,
				// height:40px;
                virtualmode: true,

                filterable: true,
				sortable: true,
				selectionmode: 'none',
				altrows: true,//交替颜色
				autoshowfiltericon: false,
				showpinnedcolumnbackground: false,
				// showrowdetailscolumn:false,
				autorowheight: true,
				pagesize: 10,
				enablehover: false,
				enablebrowserselection:'enable', //是否可以选中字体
				rendergridrows: function(obj)
				{
					 return obj.data;
				},
			    columns: [
                    { text: 'Disease', datafield: 'disease_name', width: 200, cellsrenderer:disease_link, renderer:columnsrenderer},
               		{ text: 'Cell Line', datafield: 'cell_name', width: 150, cellsrenderer:cell_link, renderer:columnsrenderer},
                	{ text: 'Microsatelite', datafield: 'ms_name', width:150, cellsrenderer:ms_link, renderer:columnsrenderer},
               		{ text: 'Pubmed ID', datafield: 'pmid', width: 100, cellsrenderer: pub_link},
               		{ text: 'Detail', datafield: 'detail', width: 400, renderer:columnsrenderer},
                  ]
            });
            }

            if(colName == 'cell_id'){
            	 $("#ms").jqxGrid(
            {
                source: dataadapter,
                width:1000,
                theme: 'energyblue',
				pageable: true,
				sortable: true,
				autoheight: true,
				rowsheight: 30,
				columnsheight: 40,
				// height:40px;
                virtualmode: true,

                filterable: true,
				sortable: true,
				selectionmode: 'none',
				altrows: true,//交替颜色
				autoshowfiltericon: false,
				showpinnedcolumnbackground: false,
				// showrowdetailscolumn:false,
				autorowheight: true,
				pagesize: 10,
				enablehover: false,
				enablebrowserselection:'enable', //是否可以选中字体
				rendergridrows: function(obj)
				{
					 return obj.data;
				},
			    columns: [

               		{ text: 'Drug Name', datafield: 'drug_name', width: 200, cellsrenderer:drug_link, renderer:columnsrenderer},
                	{ text: 'Microsatelite', datafield: 'ms_name', width:200, cellsrenderer:ms_link, renderer:columnsrenderer},
               		{ text: 'Pubmed ID', datafield: 'pmid', width: 100, cellsrenderer: pub_link},
               		{ text: 'Detail', datafield: 'detail', width: 500, renderer:columnsrenderer},
                  ]
            });
            }


                  if(colName == 'ms_id'){
            	 $("#ms").jqxGrid(
            {
                source: dataadapter,
                width:1000,
                theme: 'energyblue',
				pageable: true,
				sortable: true,
				autoheight: true,
				rowsheight: 30,
				columnsheight: 40,
				// height:40px;
                virtualmode: true,

                filterable: true,
				sortable: true,
				selectionmode: 'none',
				altrows: true,//交替颜色
				autoshowfiltericon: false,
				showpinnedcolumnbackground: false,
				// showrowdetailscolumn:false,
				autorowheight: true,
				pagesize: 10,
				enablehover: false,
				enablebrowserselection:'enable', //是否可以选中字体
				rendergridrows: function(obj)
				{
					 return obj.data;
				},
			    columns: [
                   // { text: 'Disease Name', datafield: 'disease_name', width: 120},
                   { text: 'Disease', datafield: 'disease_name', width: 200, cellsrenderer:disease_link, renderer:columnsrenderer},
                   { text: 'Cell Line', datafield: 'cell_name', width: 150, cellsrenderer:cell_link, renderer:columnsrenderer},
               		{ text: 'Drug', datafield: 'drug_name', width: 150, cellsrenderer:drug_link, renderer:columnsrenderer},

               		{ text: 'Pubmed ID', datafield: 'pmid', width: 100, cellsrenderer: pub_link},
               		{ text: 'Detail', datafield: 'detail', width: 400, renderer:columnsrenderer},
                  ]
            });
            }

              if(colName == 'disease_id'){
            	$("#ms").jqxGrid(
            {
                source: dataadapter,
                width:1000,
                theme: 'energyblue',
				pageable: true,
				sortable: true,
				autoheight: true,
				rowsheight: 30,
				columnsheight: 40,
				// height:40px;
                virtualmode: true,

                filterable: true,
				sortable: true,
				selectionmode: 'none',
				altrows: true,//交替颜色
				autoshowfiltericon: false,
				showpinnedcolumnbackground: false,
				// showrowdetailscolumn:false,
				autorowheight: true,
				pagesize: 10,
				enablehover: false,
				enablebrowserselection:'enable', //是否可以选中字体
				rendergridrows: function(obj)
				{
					 return obj.data;
				},
			    columns: [

               		{ text: 'Cell Line', datafield: 'cell_name', width: 150, cellsrenderer:cell_link, renderer:columnsrenderer},
                	 { text: 'Drug', datafield: 'drug_name', width: 200, cellsrenderer:drug_link, renderer:columnsrenderer},
                	{ text: 'Microsatelite', datafield: 'ms_name', width:150, cellsrenderer:ms_link, renderer:columnsrenderer},
               		{ text: 'Pubmed ID', datafield: 'pmid', width: 100, cellsrenderer: pub_link},
               		{ text: 'Detail', datafield: 'detail', width: 400, renderer:columnsrenderer},
                  ]
            });
            }
        });
    </script>


        <!-- <div id="meth" class='factor'></div> -->


