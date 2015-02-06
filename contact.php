<?php
include 'header.php';
?>
<div class='foreword'><h1>Contact</h1>
<p>If you have any questions or find any errors in our database, all the comments and suggestions will be welcome at any time. Please contact us in the ways below. </p>
<p><a href="mailto:lipid@nwafu.edu.cn">E-mail: lipid@nwafu.edu.cn</a></p>
</div>

<div class='foreword'><h1>Comment</h1>
<div id="disqus_thread"></div>
</div>

<script>
	var disqus_shortname = 'cangfengzhe'; // required: replace example with your forum shortname

    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {

	$('#left').css('visibility','visible');
        var dsq = document.createElement('script');
        dsq.type = 'text/javascript';
        dsq.async = true;
        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);

    })();
</script>


<?php
include 'footer.php';
?>