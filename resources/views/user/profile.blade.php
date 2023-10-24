@extends('shared/layout')

@section('content')
  <main>
    <div class="container mt-5">

      <div class="row">
        <div class="col-lg-12">
          <div class="profile-info text-center mt-2">
            <div class="profile-image mx-auto" style="height:150px; width:150px;">
              <img src="{{ asset('images/user_male.jpg') }}" style="width:100%; height:100%; object-fit: contain;"
                class="rounded-circle border border-1 border-dark" alt="Profile Picture">
            </div>
            <h5>{{ $user->username }} </h5>
            @if(Auth::check())
              @if((Auth::user()->admin === 1 && Auth::user()->id !==$user->id) || Auth::user()->id === $user->id)
              <form method="POST" action = "{{ route('delete-user',$user->id) }}" >
                        @csrf
                        <button type="submit" class="my-auto me-4">
                        <i class="fa fa-trash-can"></i>
                      </button>
                      </form>
              @endif
            @endif
          </div>
        </div>

      </div>
      <!-- username end -->
      <div class="row mt-5">
        <div class="col-6">
          <div class="text-center fs-5 fw-bold">
            Відгуки
          </div>
            @if(!$comms)
              <div class='mb-5 text-muted col-lg-12 text-center display-4'>
              Немає відгуків
              </div>
            @else
              @foreach ($comms as $comm)
              @include("cards/profile-cards/profile-comment-card")
              @endforeach
              @endif  
        </div>
        <div class="col-6">
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
  </main>
  @endsection
