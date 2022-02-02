<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts - Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container p-4">
        <h3>Editar postagem</h3>
        <hr />
        <div class="card">
            <div class="card-body">
                <form action="<?php echo base_url("/update/" . $post["id"]) ?>" method="post">
                    <div class="mb-2">
                        <label for="title">Titulo:</label>
                        <input type="text" name="title" autocomplete="off" class="form-control" id="title" value="<?= $post["title"] ?>">
                    </div>
                    <div class="mb-4">
                        <label for="description">Descrição:</label>
                        <textarea style="resize: none;" autocomplete="off" class="form-control" id="description" name="description" rows="3"><?= $post["description"] ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>