<h1>Liste des articles</h1>
<?php
foreach ($article as $article): ?>

    <h2><a href="/article/lire/<?$article['slug']?>"><?=$article['titre']?></a></h2>
    <p><?=$article['contenu']?></p>
<?php endforeach; ?>