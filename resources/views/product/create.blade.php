@include('layouts.header')
<script>
    function remover(route) {
        if (confirm('Voce deseja apagar esse produto?'))
            window.location = route;
    }
</script>

<body class="">
    @include('layouts.menu')
    <main class="container mt-5">
        <h1>Cadastra produtos</h1>
        <form method="POST" action="{{ route('product.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <span class="form-label"> Nome</span>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="row">
                <span class="form-label"> Descrição</span>
                <textarea class="form-control" name="description"></textarea>
            </div>
            <div class="row">
                <span class="form-label">Preço</span>
                <input type="number" min="0.00" max="10000.00" name="price" step="0.01" class="form-control">
            </div>
            <div class="row">
                <span class="form-label">Categoria</span>
                <select class="form-select" name="category_id">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                <span class="form-label">Imagem</span>
                <input type="file" class="form-control" name="image">
            </div>
            <div class="row mt-4">
                <button type="submit" class="btn btn-success btn-lg">Salvar</button>
            </div>
        </form>
    </main>
</body>

</html>