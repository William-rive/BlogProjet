<form method="post">
<div>
    <label for="title">Titre</label>
    <input type="text" id="title" name="title">
</div>
<div>
    <select name="categories[]" multiple>
        <?php foreach ($params["categories"] as $key => $category) { ?>
            <option value="<?php echo $category->getId(); ?>"><?php echo $category->getName(); ?></option>  
        <?php } ?>
    </select>
</div>
<div>
    <label for="image">Image</label>
    <input type="file" id="image" name="image">
</div>
<div>
    <label for="cpntent"></label>
    <textarea name="content" id="content" cols="30" rows="10"></textarea>
</div>
<div>
    <input type="submit" value="Créer">
</div>
</form>