
      <?php if(isset($extra)) { // EXTRA WORDS in Theme?>
      <div>
        <?php echo $extra; ?>
      </div>
      <?php }?>
 
        <?php if(!isset($pre)) {?>
      <pre>
        <?php print_r($content); ?>
      </pre>
      <?php }else{ ?>
       <?php print_r($content); ?>
      <?php } ?>
     
    

  </body>
</html>
