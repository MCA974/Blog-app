<h1><?= h($leArticle->title) ?></h1>
<p><?= nl2br(h($leArticle->content)) ?></p>
<p>
    <small>Created : <?= $leArticle->created->format(DATE_RFC850) ?></small><br/>
    <small>Created by : <?= $leArticle->user->username ?></small><br/>
    <small>Tags assoisés : , Il y a <?= count($leArticle->tags) ?> tag(s)</small><br/>
    <?php foreach ($leArticle->tags as $tag): ?>
        <?= $this->Html->link(h($tag->title), ['controller' => 'Tags', 'action' => 'view', $tag->id]) ?>
    <?php endforeach; ?>
</p>

<?php
echo $this->Html->script('jquery371min');
?>

<script>
    $(document).ready(function () {
        $("#showcom").click(function () {
            if ($("#display").is(":visible") == false)
            {
                $("#display").show();
            } else {
                $("#display").hide();
            }
        });
    });
</script>

<h3>Les commentaires</h3>   
<?php foreach ($leArticle->comments as $comm): ?>
    <table border="1">
        <tr>
            <td><?= $comm->title ?> créé par <?= $comm->user->username ?></td>

        </tr>
        <tr>
            <td><?= nl2br(h($comm->content)) ?></td>
        </tr>
        <tr>
            <td>id : <?= $comm->id ?>
                Cr&eacute;&eacute; le : <?= $comm->created->format(DATE_RFC850) ?>
            </td>
        </tr>
        <tr>
            <td><?php
                $identity = $this->request->getAttribute('identity');
                if ($identity && ($comm->user_id == $identity->id || $leArticle->user_id == $identity->id)) {
                    echo $this->Form->postLink(
                    __('Supprimer'),
                    ['controller' => 'comments', 'action' => 'delete', $comm->id],
                    [
                    'confirm' => __("Vraiment supprimer {0} dont l'id vaut {1} ", $comm->title, $comm->id),
                    'class' => 'button',
                    'style' => 'background-color: Black']);
                }
                ?> 
            </td>
        </tr>
    </table>
<?php endforeach; ?>


<?=
$this->Html->link(
        'Ajoutez un commentaire', '#', ['class' => 'button', 'id' => 'showcom']
);
?>

<div id="display" style="display: none">
    <?= $this->element('comments'); ?>
</div>



<?=
$this->html->link('Retour à la liste des articles', [
    'controller' => 'articles',
    'action' => 'index']);
?>