<script type="text/javascript">
    // alert('open Pagwe!');
    var url = "http://freelabel.net/drive/plus.php?uid="+ "<?php echo Session::get('user_name'); ?>";
    window.location.assign(url);
    $('body').hide('slow');
</script>