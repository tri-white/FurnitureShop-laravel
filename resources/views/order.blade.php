@extends('shared/layout')

@push('css')
@endpush

@section('content')
  <main>
    
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-5">
          <div class="text-center fs-5 fw-bold">
            Замовлення № {{ $order->id }}
          </div>
          <div class="ms-3 fs-2 mb-3">
            Дані покупця
          </div>
          <a  class="d-block " href="{{ route('profile', $userp->id) }}">Покупець: {{ $userp->username }}</a>
          <a class="d-block text-decoration-none link-dark" >Дата створення: {{ $order->created_at }}</a>
          <a class="d-block text-decoration-none link-dark" >Адреса доставки: {{ $order->address }}</a>
            <a class="d-block text-decoration-none link-dark" >Телефон: {{ $order->phone }}</a>
            <div class="ms-3 fs-2 mb-3 mt-3">
            Товари
          </div>
                      @foreach($order_items as $item) 
                      @php 
                        $product = App\Models\Product::where('id',$item->product_id)->first();
                      @endphp 
                            @include("cards/order-item")
                     @endforeach
                     @php 
                     $sum = App\Models\Order::getSum($order->id);
                     @endphp
            <p class="m-0">Загальна вартість:  {{ $sum }}  </p>
            </div>
        </div>
    </div>
  </main>
  @endsection

@push('js')
@endpush