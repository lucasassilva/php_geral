<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Posts</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
	<div class="container p-4">
		<h3>Lista de Postagens</h3>
		<a class="btn btn-success" href="/posts">Adicionar Post</a>
		<hr />
		<?php foreach ($post as $posts) : ?>
			<div class="card mb-4">
				<div class="card-title bg-primary">
					<h5 class="text-white p-3"><?= $posts["title"] ?></h5>
				</div>
				<div class="card-body">
					<p class="lead"><?= $posts["description"] ?></p>
					<hr />
					<form action="<?php echo base_url("/delete/" . $posts["id"]) ?>" method="post" onsubmit="return confirm('Você deseja excluir esse post ?')">
						<button class="btn btn-danger" type="submit">Deletar</button>
						<a class="btn btn-warning" type="button" href="<?php echo base_url("/update/" . $posts["id"]) ?>">
							Editar
						</a>
					</form>
				</div>
			</div>
		<?php endforeach; ?>
	</div>

</body>

</html>