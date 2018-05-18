<?php
$postTable = App::getInstance()->getTable('Post');
if(!empty($_POST)){
	$result = $postTable->update($_GET['id'], [
		'titre' => $_POST['titre'],
		'contenu' => $_POST['contenu'],
		'categories_id' => $_POST['categories_id']

]);
	if($result){
		?>
		<div class="alert alert-success">L'article à bien été ajouté</div>
		<?php
	}

}
$post = $postTable->find($_GET['id']);
$categories = App::getInstance()->getTable('Category')->extract('id', 'titre');

$form = new \Core\HTML\BootstrapForm($post);
?>

<form method="post">
<?= $form->input('titre', 'Titre de l\'article'); ?>
<?= $form->input('contenu', 'Contenu', ['type' => 'textarea']); ?>
<?= $form->select('categories_id', 'Categorie', $categories); ?>
<button class="btn btn-primary">Sauvegarder</button>


</form>