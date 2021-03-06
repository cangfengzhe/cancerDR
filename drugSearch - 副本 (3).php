
    <link rel="stylesheet" href="./css/jqxcustom.css" type="text/css" />
    <!-- <link rel="stylesheet" href="../../jqwidgets/styles/jqxcustom.css" type="text/css" /> -->
    <script type="text/javascript" src="./js/jquery-1.10.2.min.js"></script>  
	<script type="text/javascript" src="./js/jqxcore.js"></script>
    <script type="text/javascript" src="./js/jqxbuttons.js"></script>
    <script type="text/javascript" src="./js/jqxscrollbar.js"></script>
    <script type="text/javascript" src="./js/jqxmenu.js"></script>
    <script type="text/javascript" src="./js/jqxgrid.js"></script>
    <script type="text/javascript" src="./js/jqxgrid.selection.js"></script>	
	<script type="text/javascript" src="./js/jqxgrid.filter.js"></script>	
	<script type="text/javascript" src="./js/jqxgrid.sort.js"></script>		
    <script type="text/javascript" src="./js/jqxdata.js"></script>	
	<script type="text/javascript" src="./js/jqxlistbox.js"></script>	
	<script type="text/javascript" src="./js/jqxgrid.pager.js"></script>		
	<script type="text/javascript" src="./js/jqxdropdownlist.js"></script>
	<!-- php调用javacript -->
    <script type="text/javascript">
    <?php 

    ?>
        $(document).ready(function () {
            // prepare the data
            var theme = 'darkblue';
      
            var source =
            {
                 datatype: "json",
                 datafields: [
					 
					 { name: 'var1', type: 'double'},
					 { name: 'var2', type: 'string'},
					 { name: 'var3', type: 'string'},
					 { name: 'var4', type: 'string'}
                ],
			    url: 'data.php?table=drug' + '&q=' + "<?php echo $_GET['name']; ?>" 
			    		+'&sql=',
				
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
                theme: theme,
				filterable: true,
				sortable: true,
				// autoheight: false,
				pagermode: "simple",
				pageable: true,
				virtualmode: true,
				// height:300,
				columnsheight: 40,
				rowsheight: 30,
				selectionmode: 'none',
				pagerbuttonscount: 6,
				pagesize: 20,
				enablehover: false,
				enablebrowserselection:'enable', //是否可以选中字体
				autoheight: true,
				width: 700,
				rendergridrows: function(obj)
				{
					 return obj.data;    
				},
			    columns: [
                      { text: 'lie1', datafield: 'var1' , width: 200 },
                      { text: 'lie2', datafield: 'var2', width: 200 },
                      { text: 'Address', datafield: 'var3', width: 200 },
                      { text: 'City', datafield: 'var4', width: 100 }
                  ]
            });
        });
    </script>

    <div id='jqxWidget'>
        <div id="jqxgrid"></div>
    </div>

