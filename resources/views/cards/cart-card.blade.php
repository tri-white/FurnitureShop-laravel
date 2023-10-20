<div class="col-lg-3 col-md-4 col-sm-6 m-5 text-center align-items-center px-auto">
  <a class="product-item mx-auto" href="{{ route('product-details', $item->product_id) }}">
    <img src="{{ asset('storage/'.$prod->photo) }}" class="img-fluid product-thumbnail mx-auto" style="height:10rem">
    <h3 class="product-title">{{ $prod->name }}</h3>
    <strong class="product-price">{{ $prod->price }} грн.</strong>
  </a>
  <div class="d-flex align-items-center">
    <input class="amounter" type="number" value="{{ $item->quantity }}" name="quantity" step="1" required>
    <a href="{{ route('remove-cart', ['userid'=>Auth::user()->id, 'productid'=>$prod->id]) }}">
      <i class="fa fa-close ms-1">
      </i>
  </div>
  </a>
</div>