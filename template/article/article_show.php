<div class="container">
    <div class="article_container">
    <h2><?php echo $params["article"]->getTitle(); ?></h2>
    <div>
        <div class="user_container">
            <p>
                Créé par <?php echo $params["user"]->getLastname() . " " . $params["user"]->getFirstname() ?>
                le <?php echo $params["article"]->getDate_published()->format("d/m/Y"); ?>
            </p>
        </div>
        <div class="category">
                <?php foreach ($params["categories"] as $key => $category) { ?>
                    <span> #<?php echo $category->getName(); ?></span>
                <?php } ?>
        </div>
        <div class="content_container">
            <p><?php echo $params["article"]->getContent(); ?></p>
        </div>

        <div class="image_container">
            <img src="<?php echo $params["article"]->getFile_path_image(); ?>" alt="">
        </div>
    </div>
</div>