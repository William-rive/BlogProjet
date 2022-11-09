<?php 
$title = null;
$content = null;
$file_path_image = null;
$article_categories = [];

if (isset($params["article"]))
{
    $title = $params["article"]->getTitle();
    $content = $params["article"]->getContent();
    $file_path_image = $params["article"]->getFile_path_image();
    foreach ($params["article_category"] as $key => $category) {
        $article_categories[] = $category->getId();
    }
}
?>
<div class="container">
    <div class="add_form_container">
        <h2>Création d'article</h2>
        <form method="post" enctype="multipart/form-data" class="card">
        <div class="title_container">
            <label for="title">Titre :</label>
            <input type="text" id="title" name="title" value="<?php if(!empty($title)) echo $title; ?>">
        </div>
        <div class="category_select">
            <label for="category">Catégories :</label>
            <select multiple name="categories[]">
                <?php foreach ($params["categories"] as $key => $category) { ?>
                    <option
                        value="<?php echo $category->getId(); ?>"
                        <?php if (in_array($category->getId(), $article_categories)) {?>
                            selected
                        <?php } ?>
                        >
                        <?php echo $category->getName(); ?>
                    </option>  
                <?php } ?>
            </select>
        </div>
        <div class="file_container">
            <label for="image"><i class="fa-solid fa-upload"></i>Choisir un fichier...</label>
            <input type="file" id="image" name="image" class="inputfile">
        </div>
        <div>
            <?php if(!empty($file_path_image)) {?>
                <div class="image_container">
                    <img src="<?php echo $file_path_image; ?>" alt="">
                </div>
            <?php } ?>
            <div class="textarea_container">
                <label for="content">Contenu :</label>
                <textarea name="content" id="content" cols="30" rows="10">
                    <?php if(!empty($content)) echo $content;?>
                </textarea>
            </div>
        </div>
        <div>
            <input type="submit" value="Créer">
        </div>
        </form>
    </div>
</div>