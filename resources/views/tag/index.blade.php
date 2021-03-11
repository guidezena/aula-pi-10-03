<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Tags</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script>
        function remover(route){
            return(confirm('Voce deseja remover a tag?'))
        }
    </script>

</head>
<body class ="container mt-5">
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{session()->get('success')}}
    </div>
    @endif
        <h1> lista de tags</h1>
    <a href = "{{route('tag.create')}}" class = "btn btn-lg btn-primary">Criar tag</a>
    <div class = "row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td>{{$tag->id}}</td>
                        <td>{{$tag->name}}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-success"> Visualizar</a>
                                <a href="{{route('tag.edit', $tag->id)}}" class="btn btn-sm btn-warning"> Editar</a>
                                <form class="d-inline" method="POST" action="{{route('tag.destroy', $tag->id)}}" onsubmit="return remover();">
                                @csrf
                                @method('DELETE')
                                    <button href="#" class="btn btn-sm btn-danger"> Apagar</button>
                                </form>
                            </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    <div>
</body> 
</html>
</body>
</html>