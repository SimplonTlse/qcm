<h1>Let's get it started !</h1>


<form action="index.php" method="post">

	<?php foreach(listQuestions() as $index => $question) : ?>
		<div>
			<label for=""><?= $question['question'] ?></label>
			<input type="radio" name="q<?= $index ?>" value="yep" required>
			<input type="radio" name="q<?= $index ?>" value="nope">
		</div>
	<?php endforeach; ?>

	<button>Check this out !</button>
</form>