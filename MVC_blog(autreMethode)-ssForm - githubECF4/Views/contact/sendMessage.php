<?php
$title = "Mon portfolio - Contact";
?>
<h1>Contactez-nous</h1>
<?php
if (!empty($erreur)) {
?>
    <div class="alert alert-danger" role="alert">
        <?php echo $erreur; ?>
    </div>
<?php
}

include '../Views/includes/formContact.php';
