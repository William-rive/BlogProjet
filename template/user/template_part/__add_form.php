<div class="container">
    <div class="form_container">
    <h2>Création d'utilisateur</h2>
        <form method="post" class="card">
        <div class="label_container">
            <label for="lastname">Nom :</label>
            <input type="text" id="lastname" name="lastname">
        </div>
        <div class="label_container">
            <label for="firstname">Prénom :</label>
            <input type="text" id="firstname" name="firstname">
        </div>
        <div class="label_container">
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" id="username" name="username">
        </div>
        <div class="label_container">
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password">
        </div class="label_container">

            <input type="submit" value="Créér">
        </form>
    </div>
</div>

<div>
    <?php if (isset($params["error"]) && !empty($params)) { ?>
        <?php if (!$params["error"]) { ?>
            <div>
                <?php echo $params["message"] ?>
            </div>
        <?php } ?>
        <?php if ($params["error"]) { ?>
            <div>
                <?php echo $params["message"] ?>
            </div>
        <?php } ?>
    <?php } ?>
</div>
