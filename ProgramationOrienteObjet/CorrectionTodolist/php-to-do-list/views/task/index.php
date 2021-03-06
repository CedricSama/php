<?php require_once 'partials/header.php'?>
<div class="container">
<h1>Hello, <?= $prenom ?>!</h1>
    <a class="btn btn-default btn-xs" href="?action=Task/create">Ajouter une tâche à votre ToDoList</a>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Resume</th>
            <th>Date de création</th>
            <th>Statut</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($tasks as $task) :?>
        <tr>
            <td>
                <a href="?action=task/show&id=<?= $task->getIdTask() ?>">
                    <?= $task->getTitre() ?>
                </a>
            </td>
            <td><?= $task->getResume() ?></td>
            <td><?= $task->getCreatedAt(true) ?></td>
            <td><?= $task->getLibelle() ?></td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>

</div>
<?php require_once 'partials/footer.php'?>