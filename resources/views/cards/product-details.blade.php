@extends('shared/layout')
@push('css')

    @endpush
@section('content')
  <div class="container mt-5">
    <div class="row">
      <div class="col-lg-6">
        <img src="{{ asset('images/cross.svg') }}" style="max-width:100%;">
      </div>
      <div class="col-lg-6">
        <div class="col-lg-12 fs-5 fw-bold ps-3 mt-2">
          {{ $product->name }}
        </div>
        <div class="col-lg-12 fs-5 ps-3 mt-2">
          {{ $product->price }} грн.
        </div>

        <div class="col-lg-12 mt-3 d-flex">
          <form method="POST">
            <div class="col-lg-5 ps-3 d-inline">
              <input id="quant" type="number" name="quantity" step="1" value="0" required> шт.
            </div>
            <div class="col-lg-3 ps-3 d-inline">
              <button class="p-2" type="submit"><i class="fa fa-shopping-cart"></i></a>
            </div>
            <div class="col-lg-3 ps-3 d-inline">
              @if(Auth::check() && !Auth::check())
              <a href=""><i class="fa fa-heart" style="color:black;"></i></a>
              @else
              <a href=""><i class="fa fa-heart" style="color:red;"></i></a>
              @endif
            </div>
            @if(Auth::check())
            @if(Auth::user()->admin==1)
          <a href="">
            <i class="fa fa-trash-can ms-3"></i>
          </a>
          @endif
            @endif
          </form>
          

        </div>
      </div>
    </div>
    <hr>
    <div class="row">
      <!-- YOUR COMMENT -->
      @if(Auth::check())
      <div class="card-body">
        <form method="POST" action="" autocomplete="off">
            @csrf
          <div class="input-group align-items-center">
            <input name="description" type="text" class="form-control" placeholder="Ваш відгук"
              aria-label="Add a comment" aria-describedby="comment-button">
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
						@foreach($comms as $row) 
                            $row_user = $user_class->get_data($row['user_id']);
                            $row_comment = $comment_class->get_data($row['id']);
                            include("comment")
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

    if (value < 0) {
      inputElement.value = 0;
    }
  });
</script>
    @endpush