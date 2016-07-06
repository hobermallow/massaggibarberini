<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php foreach ($pazienti as $paziente): ?>
      <?php echo $paziente->nome." ".array_pop($punti)."<br\>" ?>
    <?php endforeach; ?>
  </body>
</html>
