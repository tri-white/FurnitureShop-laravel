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
          <?php 
                        if(is_bool($orders)){
                          echo "<div class='mb-5 text-muted col-lg-12 text-center display-4'>";
                          echo   "Немає замовлень";
                          echo "</div>";
                        }
                        else{
                          $i=0;
                          foreach ($orders as $row) {
                          $row_order = $orders[$i];
                          include("profile-order-card-all.php");
                          $i=$i+1;
                          }
                        }     
                      
                      ?>

            </div>
        </div>
    </div>
  </main>

  @endsection

@push('js')
    @endpush