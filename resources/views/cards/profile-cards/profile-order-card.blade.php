
<div class="card mt-2">
                   
                  <div class="card-body">
                  <a href="{{ route('order', $order->id) }}" class="text-decoration-none link-dark">
                    <p class="card-text mt-2 comment-text fs-7 mb-0 text-wrap">Замовлення № {{ $order->id }}</p>
                    <p class="card-text mt-2 comment-text fs-7 mb-0 text-wrap">Дата замовлення <span> {{ $order->created_at }}</span> </p>
                    <div class="footer-comment align-items-center d-flex justify-content-end align-items-center">
                      @if($admin)
                      <form method="POST" action = "{{ route('delete-order',$order->id) }}" >
                        @csrf
                        <button type="submit" class="my-auto me-4">
                        <i class="fa fa-trash-can"></i>
                      </button>
                      </form>
                      @endif
                  </a> 

                    </div>      
                  </div>
                </div>