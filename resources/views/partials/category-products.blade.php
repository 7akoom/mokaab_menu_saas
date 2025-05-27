@foreach($products as $product)
    <div class="tab-pane fade show active" role="tabpanel">
        <div class="content-box">
            <div class="row g-4">
                <div class="col-lg-6">
                    <h3>{{ $product->name }}</h3>
                    <p>{{ $product->description }}</p>
                    <p class="highlight">{{ $product->highlight }}</p>
                    <ul class="features-list">
                        <li>
                            <i class="bi bi-check2-circle"></i>
                            <span>{{ $product->feature }}</span>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-6">
                    <div class="image-box">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
