<header>
<nav class="navbar navbar-expand-sm navbar-light bg-success">
        <div class="container">
          <a class="navbar-brand fs-3 text-light" href="index.php">Фурні.</a>
  
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
  
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto fs-5">
              <li class="nav-item mx-lg-2 mx-md-1 mx-sm-0">
                <a class="nav-link text-light" href="index.php">Головна</a>
              </li>
              <li class="nav-item mx-lg-2 mx-md-1 mx-sm-0">
                <a class="nav-link text-light" href="shop.php">Асортимент</a>
              </li>
              @if(Auth::check())
              <li class="nav-item mx-lg-2 mx-md-1 mx-sm-0">
                <a class="nav-link text-light" href="product_add.php">Додати аcортимент</a>
              </li>
              
              <li class="nav-item mx-lg-2 mx-md-1 mx-sm-0">
                <a class="nav-link text-light" href="all-orders.php">Всі замовлення</a>
              </li>
              @endif
              <li class="nav-item mx-lg-2 mx-md-1 mx-sm-0 dropdown">
                <a class="nav-link dropdown-toggle pe-auto text-light" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                    @if(Auth::check())
                      {{ Auth::user()->username }}
                    @else
                    Профіль
                    @endif
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  @if(Auth::check())
                    <li><a class="dropdown-item" href="{{ route('profile', ['id'=>Auth::user()->id]) }}">Мій профіль</a></li>
                    <li><a class="dropdown-item" href="{{ route('cart', ['id'=>Auth::user()->id]) }}">Моя корзина</a></li>
                    <li><a class="dropdown-item" href="{{ route('wishlist', ['id'=>Auth::user()->id]) }}">Список побажань</a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}">Вихід з профілю</a></li>
                  @else
                    <li><a class="dropdown-item" href="{{ route('login') }}">Авторизація</a></li>
                    <li><a class="dropdown-item" href="{{ route('registration') }}">Реєстрація</a></li>
                  @endif              
                </ul>
              </li>
            </ul>        
          </div>
        </div>
      </nav>
</header>