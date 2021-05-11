<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Categoria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script>
        function remover(route) {
            if (confirm('Voce deseja remover a categoria?'))
                window.location = route;
        }
    </script>

</head>

<body>
    @include('layouts.menu')
    <main class="container mt-5">
        @if(session()->has('success'))

        <div class="alert alert-success" role="alert">
            {{session()->get('success')}}
        </div>
        @endif
        <h1> lista de categoria</h1>
        <a href="{{route('category.create')}}" class="btn btn-lg btn-primary">Criar categoria</a>
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $cat)
                    <tr>
                        <td>{{$cat->id}}</td>
                        <td>{{$cat->name}} ({{$cat->products->count()}})</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-success"> Visualizar</a>
                            <a href="{{route('category.edit', $cat->id)}}" class="btn btn-sm btn-warning"> Editar</a>
                            <a href="#" onclick="remover('{{route('category.destroy', $cat->id)}}');"; class="btn btn-sm btn-danger"> Apagar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
    </main>
</body>

</html>
</body>

</html>