
    <link rel="stylesheet" href="./css/jqxcustom.css" type="text/css" />
    <!-- <link rel="stylesheet" href="../../jqwidgets/styles/jqxcustom.css" type="text/css" /> -->
    <script type="text/javascript" src="/js/jquery-1.10.2.min.js"></script>  
	<script type="text/javascript" src="/js/jqxcore.js"></script>
    <script type="text/javascript" src="/js/jqxbuttons.js"></script>
    <script type="text/javascript" src="/js/jqxscrollbar.js"></script>
    <script type="text/javascript" src="/js/jqxmenu.js"></script>
    <script type="text/javascript" src="/js/jqxgrid.js"></script>
    <script type="text/javascript" src="/js/jqxgrid.selection.js"></script>	
	<script type="text/javascript" src="/js/jqxgrid.filter.js"></script>	
	<script type="text/javascript" src="/js/jqxgrid.sort.js"></script>		
    <script type="text/javascript" src="/js/jqxdata.js"></script>	
	<script type="text/javascript" src="/js/jqxlistbox.js"></script>	
	<script type="text/javascript" src="/js/jqxgrid.pager.js"></script>		
	<script type="text/javascript" src="/js/jqxdropdownlist.js"></script>
	<style type="text/css">
     #mut, #meth, #mir, #lnc, #ms{
     	width:5px;
     	height:5px;
     	background-color: red;
     	border-radius: 50%;
     }

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
					 { name: 'drug_id', type: 'string'},
					 { name: 'drug_name', type: 'string'},
					 { name: 'drugbank_id', type: 'string'},
					 { name: 'pubchem_id', type: 'string'},
					 { name: 'mut', type: 'string'},
					 { name: 'meth', type: 'string'},
					 { name: 'mir', type: 'string'},
					 { name: 'lnc', type: 'string'},
					 { name: 'msi', type: 'string'},
					 { name: 'type', type: 'string'}
                ],
			    url: 'data.php?table=info_drug' + '&value=' + "" +
			     '&colName=drug_name',
				
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
	

// # lpd 添加 链接




var crossRef =  function (row, columnfield, value, defaulthtml, columnproperties, rowdata) {
   return '<a href="./drug.php?drugid=' + rowdata.drug_id + '">' + value + '</a>';
                
}

var factorType =  function (row, columnfield, value, defaulthtml, columnproperties, rowdata) {
   return '<span id="mut"> &nbsp; </span><span id="meth"> &nbsp; </span><span id="mir">  &nbsp;  </span><span id="lnc"></span>';
                
}

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
				width: 800,
				rendergridrows: function(obj)
				{
					 return obj.data;    
				},
			    columns: [
                      // { text: 'Drug ID' , datafield:'<a href="./drug.php?drugID=afd'">drugID</a>', width: 200 , cellsrenderer:cellsrenderer},
                       { text: 'Drug ID', datafield: 'id', width: 130 , cellsrenderer:crossRef},
                      { text: 'Drug Name', datafield: 'drug_name', width: 200 , cellsrenderer:crossRef},
                      { text: 'Drugbank ID', datafield: 'drugbank_id', width: 130 },
                      { text: 'Pubchem ID', datafield: 'pubchem_id', width: 150 },
                      { text: 'type', datafield: 'type', width: 190, cellsrenderer:factorType }
                  ]
            });
        });
    </script>

    <div id='jqxWidget'>	
        <div id="jqxgrid"></div>
    </div>

