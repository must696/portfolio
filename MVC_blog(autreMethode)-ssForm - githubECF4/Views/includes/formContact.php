<!-- Formulaire de contact pour permettre aux utilisateurs d'envoyer un message -->

<form action="#" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" class="form-control" id="nom" name="nom">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">email</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="mb-3">
        <label for="message" class="form-label">votre message</label>
        <textarea type="date" class="form-control" id="message" name="message"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>