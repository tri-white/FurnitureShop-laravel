@extends('shared/layout')

@push('css')
@endpush

@section('content')
  <main>
    
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-5">
          <div class="text-center fs-5 fw-bold">
            Замовлення №<?php echo $order_data['id']; ?>
          </div>
          <div class="ms-3 fs-2 mb-3">
            Дані покупця
          </div>
          <a  class="d-block " href="profile.php?id=<?php echo $user_data['id']; ?>">Покупець: <?php echo $user_data['username'];?></a>
          <a class="d-block text-decoration-none link-dark" >Дата створення: <?php echo $order_data['date'];?></a>
          <a class="d-block text-decoration-none link-dark" >Адреса доставки: <?php echo $order_data['address'];?></a>
            <a class="d-block text-decoration-none link-dark" >Телефон: <?php echo $order_data['phone'];?></a>
            <div class="ms-3 fs-2 mb-3 mt-3">
            Товари
          </div>
          <?php 
                          $i=0;
                          foreach ($order_info as $row) {
                            $prod = new Product();
                            $row_product = $prod->get_data($order_info[$i]['product_id']);
                            $row_order = $row;
                            include("order-item.php");
                            $i=$i+1;
                          }   
                      
                      ?>
            <p class="m-0">Загальна вартість: <?php echo $order->get_sum($order_data['id']); ?>   </p>
            </div>
        </div>
    </div>
  </main>
  @endsection

@push('js')
@endpush