<div class="col-sm-6 col-lg-6">
    <div class="single_food_item media">
        <img src="{{ $product->images->first() ? asset('storage/' . $product->images->first()->path) : asset("themes/$theme/img/placeholder.png") }}"
             class="mr-3" alt="{{ $product->name }}" style="width: 100px; height: 100px; object-fit: cover;">
        <div class="media-body align-self-center">
            <h3>{{ $product->name }}</h3>
            <p>{{ Str::limit($product->description, 100) }}</p>
            <h5>{{ $product->price }} {{ $product->currency ?? 'ل.س' }}</h5>
        </div>
    </div>
</div>
