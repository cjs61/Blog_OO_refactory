<?php
$postTable = App::getInstance()->getTable('Post');
if(!empty($_POST)){
	$result = $postTable->create([
		'titre' => $_POST['titre'],
		'contenu' => $_POST['contenu'],
		'categories_id' => $_POST['categories_id']

]);
	if($result){
		header('Location: admin.php?p=posts.edit&id=' . App::getInstance()->getDb()->lastInsertId());
	}

}

$categories = App::getInstance()->getTable('Category')->extract('id', 'titre');

$form = new \Core\HTML\BootstrapForm($_POST);
?>

<form method="post">
<?= $form->input('titre', 'Titre de l\'article'); ?>
<?= $form->input('contenu', 'Contenu', ['type' => 'textarea']); ?>
<?= $form->select('categories_id', 'Categorie', $categories); ?>
<button class="btn btn-primary">Sauvegarder</button>


</form>