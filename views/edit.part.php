<?php require BASE . 'views/header.part.php'; ?>
<h1>Let's get it started !</h1>


<form action="index.php" method="post" class="ui form">

	<?php foreach(listQuestions() as $index => $question) : ?>
		<div class="field">
			<label for="">Aimes-tu <?= $question['question'] ?></label>
			<input type="radio" name="q<?= $index ?>" value="yep" required> Oui<br>
			<input type="radio" name="q<?= $index ?>" value="nope"> Non
		</div>
	<?php endforeach; ?>

	<button class="ui button">Check this out !</button>
</form>

<?php require BASE . 'views/footer.part.php'; ?>
