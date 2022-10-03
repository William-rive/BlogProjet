<h2>listes des articles</h2>

<?php if (Service::checkIfUserIsConnected()) { ?>
	<div>
		<a href="/?page=article_add">Créer un article</a>
	</div>
	<?php } ?>

<table>
	<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">id</th>
			<th scope="col">Titre</th>
			<th scope="col">date de publication</th>
			<th scope="col">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($params["articles"] as $key => $article) { ?>
			<tr>
				<th></th>
				<td><?php echo $article->getId() ?></td>
				<td><?php echo $article->getTitle() ?></td>
				<td><?php echo ($article->getDate_published())->format("d/m/Y") ?></td>
				<td><a href="/?page=article_show&article_id=<?php echo $article->getId() ?>">Voir</a></td>
			</tr>
		<?php } ?>
	</tbody>
</table>