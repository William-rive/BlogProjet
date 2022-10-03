<form method="post">
<div>
    <label for="lastname">Nom</label>
    <input type="text" id="lastname" name="lastname">
</div>
<div>
    <label for="firstname">Prénom</label>
    <input type="text" id="firstname" name="firstname">
</div>
<div>
    <label for="username">Nom d'utilisateur</label>
    <input type="text" id="username" name="username">
</div>
<div>
    <label for="password">Mot de passe</label>
    <input type="password" id="password" name="password">
</div>

    <input type="submit" value="Créér">
</form>

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
