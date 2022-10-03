<h3"><?php echo $params["article"]->getTitle(); ?></h3>
<div>
    <div>
        <p>
            Créé par <?php echo $params["user"]->getLastname() . " " . $params["user"]->getFirstname() ?>
            le <?php echo $params["article"]->getDate_published()->format("d/m/Y"); ?>
        </p>
    </div>
    <div>
        <p>
            <?php foreach ($params["categories"] as $key => $category) { ?>
                <span> #<?php echo $category->getName(); ?></span>
            <?php } ?>
        </p>
    </div>
    <div>
        <p><?php echo $params["article"]->getContent(); ?></p>
    </div>