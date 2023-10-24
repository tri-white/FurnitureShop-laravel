
<p class="m-0"> <a href="{{ route('product-details',$product->id) }}">Товар: {{ $product->name }}</a>
</p>
<p class="mb-3">
Кількість {{ $item->quantity }} *
{{ $product->price }} грн.
</p>