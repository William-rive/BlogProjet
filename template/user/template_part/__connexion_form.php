<div class="container">
    <div class="form_container">
    <h2>Connexion</h2>
        <form method="POST" class="card">
            <div class="label_container">
                <label for="username">Nom d'utilisateur :</label>
                <input type="text" id="username" name="username">
            </div>
            <div class="label_container">
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password">
            </div>
            <input type="submit" value="Connexion">
        </form>
        <a href="/?page=user_add" class="add_user">Inscription.</a>
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