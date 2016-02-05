<?php
/* 
    on detect s'il y a un get ou un post et on redirige
    vers l'action qui nous interesse
*/
function router (){
	// la page à charger par défaut
	$view = BASE . 'views/home.part.php';

	if(isset($_GET['go'])) {
		$view = BASE . 'views/edit.part.php';
	}
	
	//s'il y a un post, c'est que l'utilisateur à valider le formulaire
	if(!empty($_POST)) {
		checkAnswers();
		$view = BASE . 'views/show.part.php';
	}

	require $view;
}

/*
   une fonctions qui retourne un tableau 
   qui contient nos questions et la bonne réponse
*/
function listQuestions() {
	$q = [
		['question'=> 'pates ?', 'answer'=>true],
		['question'=> 'riz ?', 'answer'=>false],
		['question'=> 'chocolat ?', 'answer'=>true],
	];

	return $q;
}

/*
   on boucle sur les réponses fournies par l'utilisateur via $_POST
   et on les passe compareAnswer
*/
function checkAnswers(){
	$answers = $_POST;
	// on recupere le tableau des questions 
	// et on l'augmente avec la validité de la réponse fournie par l'utilisateur
	$questions = listQuestions();
	foreach($answers as $key=>$a) {
		//la clé est sous la forme p1 et on veut récupérer juste la partie numérique
		// qui correspond à la position de notre question dans le tableau
		$idchar = substr($key, 1);
		// on le transforme en integer
		$id = intval($idchar, 10); 
		$question = $questions[$id];
		//pis on check
		$questions[$id]['valid'] = compareAnswer($question, $a);
	}
	return $questions;
}

/*
    on compare la réponse de l'utilsiateur avec la solution
*/
function compareAnswer($currentQuestion, $answered) {
	// ternaire pour passer d'une chaine caractere qui represente la reponse a un booléen
	$answer2bool = ($answered === 'nope')?false:true;
	//on stock dans cette variable la comparaison entre la réponse fournie et la solution
	$isRight = $currentQuestion['answer'] === $answer2bool;
	//puis on la retourne
	return $isRight;
}

//fonction pour debugger plus facilement
function dd($var){
	var_dump($var);
	//cette fonction standard arrête l'execution du script
	die();
}
