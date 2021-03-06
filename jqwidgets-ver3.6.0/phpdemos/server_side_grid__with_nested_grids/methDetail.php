<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="../../jqwidgets/styles/jqx.base.css" type="text/css" />
    <link rel="stylesheet" href="/css/jqxcustom.css" type="text/css" />
    <!-- <link rel="stylesheet" href="../../jqwidgets/styles/jqx.classic.css" type="text/css" /> -->
    <script type="text/javascript" src="../../scripts/jquery-1.10.2.min.js"></script>  
	<script type="text/javascript" src="../../jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqxlistbox.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqxdropdownlist.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqxmenu.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqxdata.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqxgrid.js"></script>
	<script type="text/javascript" src="../../jqwidgets/jqxgrid.sort.js"></script>	
	<script type="text/javascript" src="../../jqwidgets/jqxgrid.selection.js"></script>
  	<script type="text/javascript" src="../../jqwidgets/jqxgrid.pager.js"></script>
	<script type="text/javascript" src="../../jqwidgets/jqxgrid.filter.js"></script>
	<script type="text/javascript" src="../../jqwidgets/jqxgrid.edit.js"></script>	
   <!-- add -->

   
	
  
		

   <script type="text/javascript">
        $(document).ready(function () {
            // prepare the data
            var source =
            {
                datatype: "json",
                datafields: [
                	
                    {name: 'pub_id', type: 'string'},
                    { name: 'disease_id', type: 'string'},
                   { name: 'disease_name', type: 'string'},
                    { name: 'cell_id', type: 'string'},
                   { name: 'cell_name', type: 'string'},
                   { name: 'gene_id', type: 'string'},
                    { name: 'gene_name', type: 'string'},
                     { name: 'pmid', type: 'string'},
                      { name: 'detail', type: 'string'},
                   	
                ],
				id: 'pub_id1',
                url: 'methdata.php?drug_id=13',
                
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
				var id = $("#jqxgrid").jqxGrid('getrowdata', row)['pub_id'];
			    var grid = $($(parentElement).children()[0]);
            
				var source =
				{
					url: 'methdata.php?drug_id=1',
					dataType: 'json',
					data: {pub_id: id}, // lpd
					datatype: "json",
					cache: true,
					datafields: [
						
						 { name: 'pmid' },
						 { name: 'detail' }
						
						 
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
        }
      
		// init Orders Grid
				grid.jqxGrid(
				{
					virtualmode: true,
					height: 190,
					width: 820,
					// pagesize: 3,
					// pagesizeoptions: ['3', '5', '10'],
					sortable: true,
					pageable: true,
					// pagesize: 5,
					source: adapter,
					theme: 'classic',
					filterable: true,
					autoheight: true,
					autorowheight:true,
					showemptyrow: false,
					selectionmode: 'none',
				
				enablehover: false,
				enablebrowserselection:'enable', //是否可以选中字体
				sortable: true,
					rendergridrows: function (obj) {
						return obj.data;
					},
					columns: [
						 
						 
						  { text: 'pmid', datafield: 'pmid', width: 120, cellsrenderer:empty },
						  { text: 'detail', datafield: 'detail', width: 540 },
						  // { text: 'mut_aa', datafield: 'mut_aa', width: 180 },
						  // // { text: 'mut_cds', datafield: 'mut_cds', width: 200 },
						  // { text: 'mut_desc', datafield: 'mut_desc', width: 240 },
						  // { text: 'mut_pos', datafield: 'mut_pos', width: 240 },
						 
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
	var crossRef=function(row, columnfield, value, defaulthtml, columnproperties, rowdata) {
   if(value==-1){
   	return '<div style="background-color:blue">'+value+'</div>';
   }
   else if(value == 1){
   	return '<div style="background-color:red">'+value+'</div>';
   }
   
                
}
var crossLink =  function (row, columnfield, value, defaulthtml, columnproperties, rowdata) {
   return '<div style="margin-top:5px;"><a href="./drug.php?value=' + rowdata.pub_id + '">' + value + '</a></div>';
    // alert(defaulthtml);      
    // return defaulthtml;  
    // return  "<div style='margin:" +columnproperties.cellsmargin + ";'>"+ value +'</div>';    
}
			$("#jqxgrid").jqxGrid(
            {
                source: dataAdapter,
                width:1200,
                theme: 'classic',
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
				showpinnedcolumnbackground: false,
				// showrowdetailscolumn:false,
				autorowheight: true,
				pagesize: 10,
				enablehover: false,
				enablebrowserselection:'enable', //是否可以选中字体
                initrowdetails: initrowdetails,
               
                rendergridrows: function () {
                    return dataAdapter.records;
                },				
                columns: [
               
                // { text: 'pub_id', datafield: 'pub_id', width: 150},
                { text: 'disease_name', datafield: 'disease_name', width: 200},
               { text: 'cell_name', datafield: 'cell_name', width: 150},
                { text: 'gene_name', datafield: 'gene_name', width:150},
               { text: 'pmid', datafield: 'pmid', width: 150},
               { text: 'detail', datafield: 'detail', width: 400},
              //     { text: 'Z-Score', datafield: 'Z_Score', width: 150 },
              //     { text: 'type', datafield: 'type', width:50, cellsrenderer:crossRef}
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
    <style type="text/css">


    </style>
</head>
<body class='default'>
 <div class="log">qw	</div>
   <div id="jqxgrid"></div>
</body>
</html>