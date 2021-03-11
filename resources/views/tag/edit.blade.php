<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Editar tag</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body class="container mt-5 bg-ligth">
    <h1>Editar tags</h1>
    <form method = "POST" action="{{ route('tag.update', $tag->id)}}">
    @method('PATCH')
    @csrf
        <div class= "row">
            <span class = "form-label"> Nome</span>
            <input type = "text" name="name" class="form-control" value="{{$tag->name}}">
        </div>
        <div class = "row mt-4">
            <button type ="submit" class="btn btn-success btn-lg">Salvar</button>
        </div>
    </form>
</body>
<script>
</script>
</html>