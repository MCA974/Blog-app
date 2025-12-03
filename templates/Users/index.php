<?php
echo $this->Html->script('jquery371min');
?>

<script>
    $(document).ready(function () {
        $("#showusers").click(function () {
            if ($("#displayUsers").is(":visible") == false)
            {
                $("#displayUsers").show();
                $("#showusers").html('Cacher les utilisateurs');
            } else {
                $("#displayUsers").hide();
                $("#showusers").html('Afficher les utilisateurs');
            }
        });
    });
</script>

<h1>Tous les utilisateurs du Blog</h1>

<?=
$this->Html->link(
        'Afficher les utilisateurs', '#', ['class' => 'button', 'id' => 'showusers']
);
?>
<?=
$this->html->link('Ajouter un utilisateur',
        ['controller' => 'users', 'action' => 'add'],
        ['class' => 'button']);
?>

<div id="displayUsers" style="display: none">
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>LastName</th>
            <th>Age</th>
            <th>Email</th>
            <th>Username</th>
            <th>Nb articles</th>
            <th>Date cr&eacute;a</th>
            <th>Date modif</th>
            <th>Actions</th>
        </tr>

        <!-- Ici se trouve l'itération sur l'objet query de notre $mesArticles, l'affichage des infos des articles -->
        <?php foreach ($mesUsers as $user): ?>
            <tr>
                <td><?= $user->id ?></td>
                <td><?= $user->name ?></td>
                <td><?= $user->lastname ?></td>
                <td><?= $user->age ?></td>
                <td><?= $user->email ?></td>
                <td><?= $user->username ?></td>
                <td><?= count($user->articles) ?></td>
                <td><?= $user->created->format(DATE_RFC850) ?></td>
                <td><?= $user->modified->format(DATE_RFC850) ?></td>
                <td>
                    <?=
                    $this->html->link(
                            $this->Html->image('edit.png', ['width' => 25, 'heigt' => 25,'alt' => 'edit']),
                            ['controller' => 'users', 'action' => 'edit', $user->id],
                            ['escape' => false]);
                    ?>
               
                    <?=
                    $this->Form->postLink(
                            $this->Html->image('supp.png', ['width' => 25, 'heigt' => 25,'alt' => 'supp']),
                            ['action' => 'delete', $user->id],
                            [
                                'confirm' => __("Vraiment supprimer l'utilisateur {0} dont l'id vaut {1} ", $user->username, $user->id),
                                'escape' => false
                            ])
                    ?> 
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
