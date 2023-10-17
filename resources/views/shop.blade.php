@extends('shared/layout')
@push('css')

    @endpush
@section('content')
    <!-- Start Hero Section -->
	<div class="hero">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-lg-5">
					<div class="intro-excerpt">
						<h1>Асортимент</h1>
					</div>
				</div>
				<div class="col-lg-7">

				</div>
			</div>
		</div>
	</div>
	<!-- End Hero Section -->

	<div class="untree_co-section product-section before-footer-section">
		<div class="container">
			<div class="row">
				<div class="mb-2 mt-5 col-lg-12 text-center display-5">
					Пошук
				</div>
				<div class="col-lg-8 col-md-10 col-sm-12 mx-auto align-items-center">
					<!-- Search bar -->
					<div class="row d-flex justify-content-center">
						<div class="col-lg-8 col-md-10 col-sm-12 text-center">
							<form method="post" action="{{ route('search-shop') }}">
							@csrf
								<div class="input-group">
									<input value="hi" name="search-input-key" type="search"
										class="px-3 form-control" placeholder="Пошук..." aria-label="Search"
										aria-describedby="search-addon" />
									<button type="submit" class="btn btn-outline-dark">Знайти</button>
								</div>
								<div class="d-flex justify-content-between mb-2 mt-2">
									<div class="col-lg-6">
										<select id="product-category-filter" name="product-category-filter"
											class="form-select" aria-label="Категорія" style="width:100%;">
											<option value="all">Всі
												категорії</option>
											@foreach($categories as $category)
												<option value="{{$category->name}}">{{ $category->name }}</option>
											@endforeach
										</select>
									</div>
									<div class="col-lg-6">
										<select id="product-sort" name="product-sort" class="form-select"
											aria-label="Категорія" style="width:100%;">
											<option value="price-desc"
												selected>По ціні (↓)
											</option>
											<option value="price-asc"
											>По ціні (↑)
											</option>
											<option value="feedback-desc"
												>По назві (↓)
											</option>
											<option value="feedback-asc"
											>По назві (↑)
											</option>
										</select>
									</div>
								</div>
						</div>
						</form>

					</div>
				</div>
				<div class="row">
@php
    $productsPerPage = 4;
    $totalPages = ceil($products->count() / $productsPerPage);
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
    $startIndex = ($currentPage - 1) * $productsPerPage;
    $productsArray = $products->toArray();
    $currentPageProducts = array_slice($productsArray, $startIndex, $productsPerPage);
@endphp

    @if (!$currentPageProducts)
        <div class='mb-5 text-muted col-lg-12 text-center display-4'>
        Не знайдено продуктів
        </div>
    @else 
        @foreach($currentPageProducts as $row) 
        @php
            $user_class = new User();
            $product_class = new Product();
            $row_user = $user_class->get_data($row['id']);
            $row_product = $product_class->get_data($row['id']);
            @endphp
            @include("shop-product.php");
        @endforeach
    @endif
					<nav aria-label="Page navigation example">
						<ul class="pagination justify-content-center">
@if($products)
	@for ($page = 1; $page <= $totalPages; $page++)
		<li class='page-item" . ($page == $currentPage ? " active" : "") . "'>
		<a class='page-link' href='?page=$page'>{{ $page }}</a>
		</li>
    @endfor
@endif
						</ul>
					</nav>


 
				</div>
				<div class="row">
				</div>

			</div>
		</div>
        @endsection

@push('js')
    @endpush