@include('layouts.header')
<script>
    function remover(route) {
        if (confirm('Voce deseja apagar esse produto?'))
            window.location = route;
    }
</script>

<body>
    @include('layouts.menu')
    <main class="container mt-5">
        @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{session()->get('success')}}
        </div>
        @endif

        <a href="{{ Route('product.create')}}" class="btn btn-lg btn-primary">Criar produto</a>
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Descrição</th>
                        <th>Categoria</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $prod)
                    <tr>
                        <td>{{$prod->id}}</td>
                        <td>{{$prod->name}}</td>
                        <td>{{$prod->price}}</td>
                        <td>{{$prod->description}}</td>
                        <td>{{$prod->category->name}}</td>
                        <td>
                        <form action="{{route('product.restore'), $prod->id }}" method="POST" onsubmit="return restore()" class="d-inline"></form>
                            @method('PATCH')
                            @csrf
                            <button type="submit" class="btn btn-sm btn-primary">Restaurar</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
</body>

</html>