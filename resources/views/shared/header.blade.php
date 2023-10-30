<header>
<nav class="navbar navbar-expand-sm navbar-light bg-success">
        <div class="container">
          <a class="navbar-brand fs-3 text-light" href="{{ route('welcome') }}">Фурні.</a>
  
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
  
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto fs-5">
              <li class="nav-item mx-lg-2 mx-md-1 mx-sm-0">
                <a class="nav-link text-light" href="{{ route('welcome') }}">Головна</a>
              </li>
              @php 
                  $page = 1;
                  $search = "null";
                  $cat = "all";
                  $sort = "price-desc";
              @endphp
              <li class="nav-item mx-lg-2 mx-md-1 mx-sm-0">
                <a class="nav-link text-light" href="{{ route('shop', ['page' => $page, 'searchKey'=>$search, 'category'=>$cat,'sort'=>$sort]) }}">Асортимент</a>
            </li>

                
                <li class="nav-item mx-lg-2 mx-md-1 mx-sm-0">
                  <a class="nav-link text-light" href="{{ route('add-product-page') }}">Додати аcортимент</a>
                </li>
                
                <li class="nav-item mx-lg-2 mx-md-1 mx-sm-0">
                  <a class="nav-link text-light" href="{{ route('all-orders') }}">Всі замовлення</a>
                </li>
               
              <li class="nav-item mx-lg-2 mx-md-1 mx-sm-0 dropdown">
              <a class="nav-link dropdown-toggle pe-auto text-light" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              @if($user)
                  {{ $user->username }}
              @else
                  Профіль
              @endif

              </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  @if($user)
                    <li><a class="dropdown-item" href="{{ route('profile', ['id'=>$user->id]) }}">Мій профіль</a></li>
                    <li><a class="dropdown-item" href="{{ route('cart', ['userid'=>$user->id]) }}">Моя корзина</a></li>
                    <li><a class="dropdown-item" href="{{ route('wishlist', ['userid'=>$user->id]) }}">Список побажань</a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}">Вихід з профілю</a></li>
                  @else
                    <li><a class="dropdown-item" href="{{ route('loginView') }}">Авторизація</a></li>
                    <li><a class="dropdown-item" href="{{ route('registrationView') }}">Реєстрація</a></li>
                  @endif              
                </ul>
              </li>
            </ul>        
          </div>
        </div>
      </nav>
</header>