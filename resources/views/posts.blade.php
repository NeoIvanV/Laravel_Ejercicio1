<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Segic Blog</title>
    <link rel="stylesheet" href="app.css">
</head>
<body>
   <?php foreach ($posts as $post): ?>
       <article>
      
          <h1>
          <a href="/post/<?= $post->slug?>">
           <?= $post->title ?>
            </a>
          </h1>
          <p><?= $post->resumen ?></p>
       </article>
     <?php endforeach; ?>
</body>
</html>