<?php
$title = "Mon portfolio - Ajout d'une création";
?>
<h1>Ajout d'une création</h1>
<?php
if (!empty($erreur)) {
?>
    <div class="alert alert-danger" role="alert">
        <?php echo $erreur; ?>
    </div>
<?php
}

include '../Views/includes/form.php';
