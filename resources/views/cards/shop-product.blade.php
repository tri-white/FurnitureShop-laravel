

<div class="col-lg-3 col-md-4 col-sm-6 mb-5 mt-5 text-center">
<a class="product-item" href="{{ route('product-details', $currentPageProduct['id']) }}">
        <img src="{{ asset('storage/'.$currentPageProduct['photo']) }}" class="img-fluid product-thumbnail" style="height:15rem">
        <h3 class="product-title">{{ $currentPageProduct['name'] }}</h3>
        <strong class="product-price">{{ $currentPageProduct['price'] }} грн.</strong>
     
      </a>
</div>