<h2>listes des articles</h2>

<?php if (Service::checkIfUserIsConnected()) { ?>
	<div class="create">
		<a href="/?page=article_add">Créer un article</a>
	</div>
<?php }  ?>
<table>
	<thead>
		<tr>
			<th scope="col">Titre</th>
			<th scope="col">Date de publication</th>
			<th scope="col">Plus</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($params["articles"] as $key => $article) { ?>
			<tr>
				<td class="article_list"><?php echo $article->getTitle() ?></td>
				<td class="article_list"><?php echo ($article->getDate_published())->format("d/m/Y") ?></td>
				<td class="article_list"><a href="/?page=article_show&article_id=<?php echo $article->getId(); ?>">Voir</a>
					<?php if (Service::checkIfUserIsConnected()) { ?>
						<button type="button" class="js_article_button_deleted" data-article_id="<?php echo $article->getId();?>">Supprimer</button>
						<a href="/?page=article_update&article_id=<?php echo $article->getId();?>">Modifier</a>
					<?php } ?>
				</td>		
			</tr>
		<?php } ?>
	</tbody>
</table>

<?php include_once dirname(__DIR__) . "/article/template_part/__deleted_modal.php"; ?>