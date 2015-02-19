
	<style type="text/css">


</style>

	<!-- php调用javacript -->
    <script type="text/javascript">

        $(document).ready(function () {
            // prepare the data
            var theme = 'energyblue';

            var source =
            {
                 datatype: "json",
                 datafields: [
					 { name: 'id', type: 'string'},
					 { name: 'disease_id', type: 'string'},
					 { name: 'disease_name', type: 'string'},
					 { name: 'mesh_id', type: 'string'},
					 { name: 'meth', type: 'string'},
					 { name: 'mir', type: 'string'},
					 { name: 'lnc', type: 'string'},
					 { name: 'msi', type: 'string'},

                ],
			    url: 'data.php?table=info_disease' + '&value=' + "<?php echo $_GET['value'];?>" +
			     '&colName=disease_name',

				cache: false,
				filter: function()
				{
					// update the grid and send a request to the server.
					$("#jqxgrid").jqxGrid('updatebounddata', 'filter');
				},
				sort: function()
				{
					// update the grid and send a request to the server.
					$("#jqxgrid").jqxGrid('updatebounddata', 'sort');
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
            $("#jqxgrid").jqxGrid(
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
				pagesize: 20,
				enablehover: false,
				enablebrowserselection:'enable', //是否可以选中字体
				rendergridrows: function(obj)
				{
					 return obj.data;
				},
			    columns: [
                      // { text: 'Drug ID' , datafield:'<a href="./drug.php?drugID=afd'">drugID</a>', width: 200 , cellsrenderer:cellsrenderer},
                       { text: 'Disease ID', datafield: 'id', width: 150 , cellsrenderer:disease_link, renderer:columnsrenderer},
                      { text: 'Disease', datafield: 'disease_name', width: 500 , cellsrenderer:disease_link,renderer:columnsrenderer},
                      // { text: 'Tissue', datafield: 'tissue', width: 130 ,renderer:columnsrenderer},
                      { text: 'Mesh ID', datafield: 'mesh_id', width: 150 ,renderer:columnsrenderer},
                      { text: 'type', datafield: 'sum', width: 200, cellsrenderer:factorType }
                  ]
            });
        });
    </script>

    <div id='jqxWidget'>
        <div id="jqxgrid"></div>
    </div>
  <div id="note">Note:
    <span class="cir_note cir_meth"></span><span>&nbsp;Methylation&nbsp;&nbsp;&nbsp;</span>
    <span class="cir_note cir_mir"></span><span>&nbsp;miRNA&nbsp;&nbsp;&nbsp;</span>
    <span class="cir_note cir_lnc"></span><span>&nbsp;lncRNA&nbsp;&nbsp;&nbsp;</span>
    <span class="cir_note cir_msi"></span><span>&nbsp;MicroSatellite</span>
    </div>

