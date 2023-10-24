@extends('shared/layout')
@push('css')

    @endpush
@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
  <div class="container mt-5">
    <div class="row">
      <div class="col-lg-6">
        <img src="{{ asset('storage/'.$product->photo) }}" style="max-width:100%;">
      </div>
      <div class="col-lg-6">
        <div class="col-lg-12 fs-5 fw-bold ps-3 mt-2">
          {{ $product->name }}
        </div>
        <div class="col-lg-12 fs-5 ps-3 mt-2">
          @php 
            $categor = App\Models\Category::where('id',$product->category_id)->first();
          @endphp
          {{ $categor->name }}
        </div>
        <div class="col-lg-12 fs-5 ps-3 mt-2">
          {{ $product->price }} грн.
        </div>

        <div class="col-lg-12 mt-3 d-flex">
        @if(Auth::check())
          <form method="POST" action="{{ route('add-cart',['userid'=>Auth::user()->id, 'productid'=>$product->id]) }}">
            @csrf

            <div class="col-lg-5 ps-3 d-inline">
              <input id="quant" type="number" name="quantity" step="1" value="1" required> шт.
            </div>
            <div class="col-lg-3 ps-3 d-inline">
              <button class="p-2" type="submit"><i class="fa fa-shopping-cart"></i></a>
            </div>
            <div class="col-lg-3 ps-3 d-inline">
                @php 
                  $wishcheck = App\Models\Wish::where('user_id', Auth::user()->id)->where('product_id', $product->id)->first();
                @endphp 
                @if(!$wishcheck)
                  <a href="{{ route('add-wish', ['userid'=>Auth::user()->id, 'productid'=>$product->id]) }}"><i class="fa fa-heart" style="color:black;"></i></a>
                @else
                  <a href="{{ route('remove-wish', ['userid'=>Auth::user()->id, 'productid'=>$product->id]) }}"><i class="fa fa-heart" style="color:red;"></i></a>
                @endif
            </div>
            
          </form>
          @endif
          @if(Auth::user()->admin==1)
            <form method="POST" action = "{{ route('delete-product',$product->id) }}" >
                        @csrf
                        <button type="submit" class="my-auto me-4">
                        <i class="fa fa-trash-can"></i>
                      </button>
                      </form>
            @endif
        </div>
      </div>
    </div>
    <hr>
    <div class="row">
      <!-- YOUR COMMENT -->
      @if(Auth::check())
      <div class="card-body">
      <form method="POST" action="{{ route('add-comment', ['userid' => Auth::user()->id, 'productid' => $product->id]) }}" autocomplete="off">
        @csrf
        <div class="input-group align-items-center">
            <input name="description" type="text" class="form-control" placeholder="Ваш відгук" aria-label="Add a comment" aria-describedby="comment-button">
            <button class="btn btn-success" type="submit" id="comment-button">Додати відгук</button>
        </div>
    </form>

      </div>
      @endif
      <!-- END YOUR COMMENT -->
    </div>
    <div class="row">
      <div class="col-lg-12">
        <!-- comments -->
					@if(!$comms)
						<div class='mb-5 text-muted col-lg-12 text-center display-4'>
						    Немає відгуків
						</div>
					@else
						@foreach($comms as $comm) 
              @php 
                $user = App\Models\User::where('id', $comm->user_id)->first();
              @endphp
              @include("cards/comment")
						@endforeach
          @endif
      </div>
    </div>
  </div>
  @endsection

@push('js')
<script>
  const inputElement = document.getElementById('quant');

  inputElement.addEventListener('change', function () {
    let value = parseFloat(inputElement.value);

    if (value < 1) {
      inputElement.value = 1;
    }
  });
</script>
    @endpush