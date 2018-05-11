<?php
namespace App\Table;

use Core\Table\Table;

class PostTable extends Table {
	public function last(){
		return $this->query("
			SELECT articles.id, articles.titre, articles.contenu, articles.date, categories.titre as categorie
			FROM articles
			LEFT JOIN categories ON categories_id = categories.id
			ORDER BY articles.date DESC");
	}
}