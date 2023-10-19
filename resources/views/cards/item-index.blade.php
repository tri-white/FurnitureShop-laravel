
<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0 mx-3">
		  <a class="product-item" href="{{ route('product-details', $product->id) }}">
			<img src="{{asset('images/cross.svg')}}" class="img-fluid product-thumbnail"  style="height:15rem">
			<h3 class="product-title">{{$product->name}}</h3>
			<strong class="product-price">{{ $product->price }} грн.</strong>
		  </a>
		</div> 