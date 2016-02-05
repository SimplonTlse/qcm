<?php require BASE . 'views/header.part.php'; ?>

<h1>yatta</h1>

<!-- on fait une boucle sur les reponses traitées, 
la version de foreach qui finit par deux points est plus commode dans le contexte d'une page html -->

<?php foreach(checkAnswers() as $key => $p) : ?>
	<div>
		<h2><i class="icon <?= ($p['valid']) ? 'green checkmark' : 'red close'; ?>"></i> <?= $p['question'] ?></h2>
		
		<?php if($p['valid']) : ?>
			Bravo
		<?php else : ?>
			Bouuuuuh !
		<?php endif; ?>
	</div>
<?php endforeach; ?>

<p><?= rightAnswersCount() ?> sur <?= count(listQuestions()) ?></p>
<?php require BASE . 'views/footer.part.php'; ?>
