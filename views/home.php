<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport"
	content="width = device-width, initiale-scale = 1.0" />
<title>Home</title>
<link href="css/gestschool.css" rel="stylesheet" />
<link href="bower_components/bootstrap/dist/css/bootstrap.min.css"
	rel="stylesheet" />
</head>
<body>
	<div class="container">
		<header>
			<h1>GestSchool Project</h1>
		</header>
		<div class="text-center well">
			<form action="" role="form" class="form-inline" method="post">
				<div class="form-group">
					<select id="classe" name="classe" class="form-control">
						<option value="">Choisissez votre classe</option>
                    	<?php foreach ($classes as $class) : ?>
                    	<?php $codeClasse = $class->getCode(); ?>
                        <?php if (isset($_POST['classe']) && $_POST['classe'] == $codeClasse): ?>
                        	<option value="<?= $codeClasse ?>" selected>
                        		<?= $codeClasse ?>
                        	</option>
                    	<?php else: ?>
                        	<option value="<?= $codeClasse ?>">
                        		<?= $codeClasse ?>
                        	</option>
                    	<?php endif ?>
                    	<?php endforeach ?>
                	</select>
				</div>
				<input type="submit" value="Afficher la liste"
					class="btn btn-primary" />
			</form>
		</div>
	<?php if (isset($_POST['classe'])) : ?>
	<div class="table-responsive">
			<table class="table table-hover">
				<caption>Liste des Élèves de la <?= $classe ?></caption>
				<thead>
					<tr>
						<th>Numéro</th>
						<th>Matricule</th>
						<th>Nom(s) et Prénom(s)</th>
						<th>Date de Naissance</th>
						<th>Sexe</th>
					</tr>
				</thead>
				<tbody>
				<?php if (count($students)): ?>
				<?php foreach ($students as $std) : ?>
					<tr>
						<td><?php echo $nbStudents++?></td>
						<td><?php echo $std->getMatricule() ?></td>
						<td><?php echo $std->getName() . " " . $std->getSurname() ?></td>
						<td><?php echo date_format($std->getBirthdate(), "d/m/Y") ?></td>
						<td><?php echo $std->getSexe() ?></td>
					</tr>
				<?php endforeach ?>
				<?php else: ?>
					<div class="alert alert-warning">No students yet:</div>
				<?php endif ?>
				</tbody>
			</table>
		</div>
    	<?php endif ?>
    	<hr />
		<footer id="footer"> GestSchool est un projet d'initiation pour la Tle
			TI </footer>
	</div>
</body>
</html>

