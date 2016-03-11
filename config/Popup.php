<script type="text/javascript">
var order = '<?php echo $_GET['i']; ?>';
	//alert(order);
    if(window.opener && !window.opener.closed) {
    	//alert (window.opener);
        document.write(window.opener.newpage[order]);
    	
    }
</script>