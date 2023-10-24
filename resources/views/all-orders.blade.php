@extends('shared/layout')
@push('css')

    @endpush
@section('content')


  <main>
    
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-5">
          <div class="text-center fs-5 fw-bold">
            Замовлення
          </div>
                        @if(!$orders)
                          <div class='mb-5 text-muted col-lg-12 text-center display-4'>
                          Немає замовлень
                          </div>
                       @else
                          @foreach ($orders as $order) 
                            @include("cards/profile-cards/profile-order-card")
                          @endforeach
                       @endif

            </div>
        </div>
    </div>
  </main>

  @endsection

@push('js')
    @endpush