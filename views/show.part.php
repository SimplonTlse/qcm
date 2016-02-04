

<h1>yatta</h1>

<?php foreach(checkAnswers() as $key => $p) : ?>

	<h1><?= $p['question'] ?></h1>
	<?php if($p['valid']) : ?>
		Bravo
	<?php else : ?>
		Bouuuuuh !
	<?php endif; ?>

<?php endforeach; ?>