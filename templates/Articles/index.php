<h1>Tous les articles du Blog</h1>

<?=
$this->html->link('Ajouter un article',
        ['controller' => 'articles', 'action' => 'add'],
        ['class' => 'button']);
?>

<table>
    <tr>
        <th>Id</th>
        <th>Titre</th>
        <th>Créé par</th>
        <th>Nb commentaires</th>
        <th>Nb tags</th>
        <th>Date de cr&eacute;ation</th>
        <th>Date de modification</th>
        <th>Actions</th>
    </tr>

    <!-- Ici se trouve l'itération sur l'objet query de notre $mesArticles, l'affichage des infos des articles -->
    <?php foreach ($mesArticles as $article): ?>
        <tr>
            <td><?= $article->id ?></td>
            <td>
                <?=
                $this->html->link($article->title, [
                    'controller' => 'articles',
                    'action' => 'detail',
                    $article->id]);
//l’url généré sera de la forme /articles/detail/…
                ?>
            </td>
            <td><?= $article->user->username ?></td>
            <td><?= count($article->comments) ?></td>
            <td><?= count($article->tags) ?></td>
            <td><?= $article->created->format(DATE_RFC850) ?></td>
            <td><?= $article->modified->format(DATE_RFC850) ?></td>
            <td><?php
                $identity = $this->request->getAttribute('identity');
                if ($identity && ($article->user_id == $identity->id)) {
                    echo $this->html->link('Modifier',
                            ['controller' => 'articles', 'action' => 'edit', $article->id],
                            [
                                'class' => 'button',
                                'style' => 'background-color: Orange']);

                    echo $this->Form->postLink(
                            __('Supprimer'),
                            ['action' => 'delete', $article->id],
                            [
                                'confirm' => __("Vraiment supprimer {0} dont l'id vaut {1} ", $article->title, $article->id),
                                'class' => 'button',
                                'style' => 'background-color: Black']);
                }
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php unset($mesArticles); ?>