@include('layouts.header')
@include('layouts.menu')

<body>
    <h1>Edita produtos</h1>
    <main class="container mt-5">
        <form method="POST" action="{{ route('product.update', $product->id)}}" enctype="multipart/form-data">>
            @method('PATCH')
            @csrf
            <div class="row">
                <span class="form-label"> Nome</span>
                <input type="text" name="name" class="form-control" value="{{$product->name}}">
            </div>
            <div class="row">
                <span class="form-label"> Descrição</span>
                <textarea class="form-control" name="description">{{$product->description}}</textarea>
            </div>
            <div class="row">
                <span class="form-label">Preço</span>
                <input type="number" min="0.00" max="10000.00" name="price" value="{{$product->price}}" step="0.01" class="form-control">
            </div>
            <div class="row">
                <span class="form-label">Categoria</span>
                <select class="form-select" name="category_id">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" @if($category->id == $product->category_id) selected @endif>
                        {{$category->name}}
                    </option>
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
<script>
</script>

</html>