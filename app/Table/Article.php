<?php
namespace App\Table;

use App\App;

class Article extends Table {

    protected static $table = 'articles';

	public static function getLast(){ 
    	return self::query("
    		SELECT articles.id, articles.titre, articles.contenu, categories.titre as categorie 
    		FROM articles 
    		LEFT JOIN categories 
    		ON categories_id = categories.id
    		"); 
    }

    public static function lastByCategory($categories_id){
    	return self::query("
    		SELECT articles.id, articles.titre, articles.contenu, categories.titre as categorie 
    		FROM articles 
    		LEFT JOIN categories 
    		ON categories_id = categories.id
    		WHERE categories_id = ?
    		", [$categories_id]);
	}

	public function getUrl(){
		return 'index.php?p=article&id=' . $this->id;
	}

	public function getExtrait (){
		$html = '<p>' . substr($this->contenu, 0, 200) . '...</p>';
		$html .= '<p><a href="' . $this->getURL() . '">Voir la suite</a></p>';
		return $html;
	}


}