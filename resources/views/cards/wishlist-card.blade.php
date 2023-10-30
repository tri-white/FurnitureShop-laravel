

<div class="col-lg-3 col-md-4 col-sm-6 mb-5 mt-5 text-center">
<a class="product-item" href="{{ route('product-details',$product->id) }}">
        <img src="{{ asset('storage/'.$product->photo) }}" class="img-fluid product-thumbnail" style="height:15rem">
        <h3 class="product-title">{{ $product->name }}</h3>
        <strong class="product-price"> {{ $product->price }} грн.</strong>
       
      </a>
      <a href="{{ route('remove-wish', ['userid'=>$user->id, 'productid'=>$product->id]) }}" class="ms-3">
      <i class="fa fa-close">
      </i>
    </a>
</div>