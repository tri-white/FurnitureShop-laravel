<div class="col-lg-3 col-md-4 col-sm-6 m-5 text-center align-items-center px-auto">
    <a class="product-item mx-auto" href="{{ route('product-details', $item->product_id) }}">
        <img src="{{ asset('storage/'.$prod->photo) }}" class="img-fluid product-thumbnail mx-auto" style="height:10rem">
        <h3 class="product-title">{{ $prod->name }}</h3>
        <strong class="product-price">{{ $prod->price }} грн.</strong>
    </a>
    <form action="{{ route('update-cart', ['userid' => Auth::user()->id, 'productid' => $prod->id]) }}" method="POST">
        @csrf
        <div class="d-flex align-items-center d-inline-block">
            <input class="amounter" type="number" value="{{ $item->quantity }}" name="quantity" step="1" required min="1">

            <div class="button-column">
              <button type="submit">
                  <i class="fa fa-check"></i>
              </button>
              <a href="{{ route('remove-cart', ['userid' => Auth::user()->id, 'productid' => $prod->id]) }}">
                  <i class="fa fa-close border border-2 border-dark border px-2"></i>
              </a>
          </div>

        </div>
    </form>
</div>
