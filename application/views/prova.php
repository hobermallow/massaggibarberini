<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      $ciao ="iao";
      $ciao = $this->db->escape($ciao);
      echo $ciao."\n";
      echo str_replace("'", "", $ciao);
     ?>
  </body>
</html>
