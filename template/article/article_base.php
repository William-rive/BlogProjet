<div class="background">
	<h2>Listes des articles</h2>
	<?php if (Service::checkIfUserIsConnected()) { ?>
		<div class="create">
			<a href="/?page=article_add">Créer un article</a>
		</div>
	<?php }  ?>
	<div class="table_container">
	<table>
		<thead>
			<tr>
				<th scope="col" class="title">Titre</th>
				<th scope="col" class="date">Date de publication</th>
				<th scope="col" class="plus">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($params["articles"] as $key => $article) { ?>
				<tr>
					<td class="title"><?php echo $article->getTitle() ?></td>
					<td class="date"><?php echo ($article->getDate_published())->format("d/m/Y") ?></td>
					<td class="plus"><a href="/?page=article_show&article_id=<?php echo $article->getId(); ?>">Voir</a>
						<?php if (Service::checkIfUserIsConnected()) { ?>
							<a class="modify" href="/?page=article_update&article_id=<?php echo $article->getId();?>">Modifier</a>
							<button type="button" class="js_article_button_deleted" data-article_id="<?php echo $article->getId();?>" value="article_deleted">Supprimer</button>
						<?php } ?>
					</td>		
				</tr>
			<?php } ?>
		</tbody>
	</table>
	</div>
</div>
<button onclick="topFunction()" id="topBtn" title="Go to top"><i class="fa-solid fa-arrow-up"></i></button>

<?php include_once dirname(__DIR__) . "/article/template_part/__deleted_modal.php"; ?>