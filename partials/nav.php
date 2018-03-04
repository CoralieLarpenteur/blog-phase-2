<?php
	$query = $db->query('SELECT * FROM category');
?>

<nav class="col-3 py-2 categories-nav">

	<!-- Si une session utilisateur existe (utilisateur connécté) on affiche son prénom et un boutton pour se déconnecter -->
	<?php if(isset($_SESSION['user'])): ?>
		<div class="row">
			<div class="col-3" style="background-image: url(img/user/ <?php echo $_SESSION['image']; ?>); background-size: cover;">
			</div>
			<div class="col-9">
				<p class="h2 text-center">Salut <?php echo $_SESSION['user']; ?> !</p>
			</div>
		</div>
	<!-- ici le boutton de déconnexion est un lien allant vers l'index qui envoie le paramètre "logout" via URL -->
	<p><a class="d-block btn btn-danger mb-4 mt-2" href="index.php?logout">Déconnexion</a></p>

	<?php else: ?>
	<!-- Sinon afficher un boutton de connexion -->
	<a class="d-block btn btn-primary mb-4 mt-2" href="login-register.php">Connexion / inscription</a>
	<?php endif; ?>

	<b>Catégories :</b>
	<ul>
		<li><a href="article_list.php">Tous les articles</a></li>
		<!-- liste des catégories -->
		<?php while($category = $query->fetch()): ?>
		<li><a href="article_list.php?category_id=<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a></li>
		<?php endwhile; ?>

		<?php $query->closeCursor(); ?>
	</ul>
</nav>
