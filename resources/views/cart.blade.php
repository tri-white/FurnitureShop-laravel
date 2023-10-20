@extends('shared/layout')
@push('css')

    @endpush
@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center display-3 mt-5 text-dark">
                    Ваша корзина
                </div>
                <div class="col-lg-12">
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7 col-md-12 px-5 d-flex order-2 order-lg-1">
                @php 
                            $sum = 0;
                        @endphp
					@if($items->count() === 0 )
						<div class='mb-5 text-muted col-lg-12 text-center display-4'>
						    Немає предметів
						</div>
					@else
                        
						@foreach ($items as $item)
                            @php 
                                $prod = App\Models\Product::where('id', $item->product_id)->first();
                                $sum += $item->quantity*$prod->price;
                            @endphp
                            @include("cards/cart-card")
						@endforeach
					@endif
                </div>
                <div class="col-lg-5 col-md-12 order-1 order-lg-2">
                    <div class="col-12 fs-5 fw-bold">           
                        Загальна вартість: {{ $sum }} грн.
                    </div>
                    @if($sum>0)
                    <form action="" method="POST" class="mt-3">
                        <div class="form-group">
                            <label for="address">Адреса доставки</label>
                            <input type="text" class="form-control" id="address" name="address"
                                placeholder="Ваша адреса" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone">Тел.</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                    placeholder="Ваш телефон" required pattern="[0-9]+" title="Please enter only digits">
                            </div>

                        <div class="col-12 button mx-auto px-auto mt-3">
                        <button type="submit" class="btn btn-primary mx-auto align-self-center text-center" style="width:100%;">Оформити замовлення</button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </main>
    @endsection

@push('js')
    @endpush