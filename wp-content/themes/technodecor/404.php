<?php include 'head.php'; ?>

<div class="div_404">
	<h2>404</h2>
    <p><?= $arrayLang['page-not-found']; ?></p>
	<a href="<?= get_home_url(); ?>"><?= $arrayLang['to-main-page']; ?></a>
</div>

<?php include 'footer.php'; ?>