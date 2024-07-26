<?php
$title = "Mon portfolio - Modification d'une création";
?>

<h1>Modification d'une création</h1>
<?php
if (!empty($erreur)) {
?>
    <div class="alert alert-danger" role="alert">
        <?php echo $erreur; ?>
    </div>
<?php
}
?>
<section class="row">
    <div class="col-2 align-self-end"><img class="img-fluid" src="<?php echo $creation->picture; ?>" alt="titre de la création"></div>
    <div class="col-10"><?php include '../Views/includes/form.php'; ?></div>
</section>