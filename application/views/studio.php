<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Domini</title>
  </head>
  <body>
     <?php foreach ($result as $persona): ?>
       <?php echo "<p>"; echo $persona['nome']; echo "</p>";  ?>
     <?php endforeach; ?>
     <?php
        var_dump($id_studio);
      ?>
  </body>
</html>
