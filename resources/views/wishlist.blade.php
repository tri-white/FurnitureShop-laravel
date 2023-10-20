@extends('shared/layout')
@push('css')

    @endpush
@section('content')
              <main>
                  <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center display-3 mt-5 text-dark">
                            Ваші побажання
                        </div>
                        <div class="col-lg-12">
                            <hr>
                        </div>
                    </div>
                    <div class="row d-flex">
					@if($wishes->count() === 0)
                        <div class='mb-5 text-muted col-lg-12 text-center display-4'>
                            Немає предметів
                        </div>
                    @else
                        @foreach ($wishes as $wish)
                            @php 
                                $product = App\Models\Product::where('id', $wish->product_id)->first();
                            @endphp
                            @include("cards/wishlist-card")
                        @endforeach
                    @endif

                    </div>
                  </div>
              </main>
              @endsection

@push('js')
    @endpush