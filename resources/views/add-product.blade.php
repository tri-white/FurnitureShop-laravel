@extends('shared/layout')
@push('css')

    @endpush
@section('content')



        <!-- Start Hero Section -->
        <div class="hero d-flex align-items-center">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-5">
				<div class="intro-excerpt">
					<h1 class="text-center">Додавання асортименту</h1>
				</div>
			</div>
		</div>
	</div>
</div>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

		<div class="container mt-5">
	<div class="row justify-content-center">
	  <div class="col-lg-4">
		<form method="post" action="{{ route('add-product') }}" enctype="multipart/form-data">
		@csrf
			<div class="mb-3">
			  <label for="product-name" class="form-label">Назва предмету</label>
			  <input type="text" class="form-control" id="furniture-name" name="name-prod" required>
			</div>
			<div class="mb-3">
			  <label for="product-price" class="form-label">Ціна предмету</label>
			  <input type="number" class="form-control" id="furniture-price" name="price" step="0.01" required>
			</div>
			<div class="mb-3">
			  <label for="product-image" class="form-label">Фотографія предмету</label>
			  <input type="file" class="form-control" id="furniture-image" name="image" required>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 mb-3">
                <select name="category" class="form-select" aria-label="Категорія" style="width:100%;" required>
                  @foreach($categories as $category)
                  <option value="{{$category->id}}">{{ $category->name }}</option>
                  @endforeach
                </select>
              </div>
			<div class="d-grid gap-2">
			  <button type="submit" class="btn btn-primary" id="add-button">Додати в асортимент</button>
			</div>
		  </form>
	  </div>
	</div>
  </div>
  @endsection

@push('js')
    @endpush