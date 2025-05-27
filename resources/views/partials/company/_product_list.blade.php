@foreach($products as $product)
    @include('partials.company._product_card', ['product' => $product])
@endforeach
