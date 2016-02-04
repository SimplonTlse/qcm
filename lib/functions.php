<?php

function router (){
	$view = BASE . 'views/home.part.php';

	if(isset($_GET['go'])) {
		$view = BASE . 'views/edit.part.php';
	}

	if(!empty($_POST)) {
		checkAnswers();
		$view = BASE . 'views/show.part.php';
	}

	require $view;
}

function listQuestions() {
	$q = [
		['question'=> 'pates ?', 'answer'=>true],
		['question'=> 'riz ?', 'answer'=>false],
		['question'=> 'chocolat ?', 'answer'=>true],
	];

	return $q;
}

function checkAnswers(){
	$answers = $_POST;
	$questions = listQuestions();
	foreach($answers as $key=>$a) {
		$idchar = substr($key, 1);
		// on le transforme en integer
		$id = intval($idchar, 10); 
		$question = $questions[$id];
		//pis on check
		$questions[$id]['valid'] = compareAnswer($question, $a);
	}
	return $questions;
}

function compareAnswer($currentQuestion, $answered) {
	$answer2bool = ($answered === 'nope')?false:true;
	$isRight = $currentQuestion['answer'] === $answer2bool;
	return $isRight;
}

//fonction pour debugger plus facilement
function dd($var){
	var_dump($var);
	die();
}