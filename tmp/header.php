<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml"><HEAD>
<META http-equiv=Content-Type content="text/html; ">
<title></title>
<link href="css/layout.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
	
	var timeout         = 500;
var closetimer		= 0;
var ddmenuitem      = 0;

// open hidden layer
// function mopen(id)
// {	
// 	// cancel close timer
// 	mcancelclosetime();

// 	// close old layer
// 	if(ddmenuitem) ddmenuitem.style.display = 'none';

// 	// get new layer and show it
// 	ddmenuitem = document.getElementById(id);

// 	ddmenuitem.style.display = 'inline';


// }
// // close showed layer
// function mclose()
// {
// 	if(ddmenuitem) ddmenuitem.style.display = 'none';
// }

// // go close timer
// function mclosetime()
// {
// 	closetimer = window.setTimeout(mclose, timeout);
// }

// // cancel close timer
// function mcancelclosetime()
// {
// 	if(closetimer)
// 	{
// 		window.clearTimeout(closetimer); //可取消由 setTimeout() 方法设置的 timeout
// 		closetimer = null;
// 	}
// }

// // close layer when click-out
// document.onclick = mclose; 
// -->

</script>
<!-- <SCRIPT src="js/jquery.js" type=text/javascript></SCRIPT>
<SCRIPT src="js/common.js" type=text/javascript></SCRIPT> -->




</head>

<body>
<div class="header">
<div class="wrap">
<a href="/" class="logo">logo</a>
<ul class="nav">
<li class="nav-select"><a href="/">Home</a></li>

<li id='menu'><a href="#" onmouseover="mopen('m1')" onmouseout="mclosetime()">Mutation</a>
    <ul id='m1' onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
                        <li><a href="">Mutation</a></li>
                        <li><a href="">Methylation</a></li>
                        <li><a href="">miRNA</a></li>
                        <li><a href="">lncRNA</a></li>
    </ul>
</li>

<li><a href='/down/' >Methylation</a></li>

<li><a href='/help/' >miRNA</a></li>

<li><a href='/new/' >lncRNA</a></li>

</ul>
</div>
</div>


<div class="wrap">




<div class="main-left">
<div class="main-panel main-news">
<h2>left</h2>
<ul>
<li>ceshi</li>
<li>ceshi</li>
<li>ceshi</li>
<li>ceshi</li>
</ul>
</div>

<div class="main-panel main-news main-news2">
<h2>left_bottom</h2>
<ul>
<li>ceshi</li>
<li>ceshi</li>
<li>ceshi</li>
<li>ceshi</li>
</ul>
</div>
</div>


<!-- <div class="main-panel main-flink"> -->



<!-- <div class="clearfix"></div> -->
