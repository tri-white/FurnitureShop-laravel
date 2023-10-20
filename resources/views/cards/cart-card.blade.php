

<div class="col-lg-3 col-md-4 col-sm-6 m-5 text-center align-items-center px-auto">
<a class="product-item mx-auto" href="{{ route('product-details', $item->product_id) }}">
        <img src="{{ asset('storage/'.$prod->id) }}" class="img-fluid product-thumbnail mx-auto" style="height:10rem">
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
<!--
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function() {
    $('.amounter').on('change', function() {
      var newQuantity = $(this).val(); // Get the new quantity value
      var redirectUrl = 'update-cart.php?product=idPRODUCT&quantity=' + newQuantity; // Build the redirect URL with the new quantity
      
      window.location.href = redirectUrl; // Redirect to the update-cart.php with the updated quantity
    });
  });
</script>
