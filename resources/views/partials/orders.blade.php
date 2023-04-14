      <!-- Orders -->
      <section id="orders_section" class="p-2 my-3">
        <h3 class="text-warning text-uppercase text-center my-3">Orders</h3>    
        <br>
        <div class="flex flex-column gap-3 mx-4">
          @if(count($orders) > 0) 
            @foreach ($orders as $order)
              <div class="orders-card bg-card p-2">
                <div class="flex justify-content-between">
                  <p>Order ID: {{ $order->id }}</p>
                  <p>|</p>
                  <p>Order Date: {{ $order->created_at }}</p>
                  <p>|</p>
                  <p>Customer: {{ $order->user->first_name }}</p>
                </div>
                <br>
                <div>
                  <table class="margin-auto">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($order->orderItems as $orderItems)
                        <tr>
                          <td>
                            <img src="storage/items/{{ $orderItems->items->image }}" alt="">
                          </td>
                          <td>{{ $orderItems->items->name }}</td>
                          <td>{{ $orderItems->quantity }}</td>
                          <td>{{ $orderItems->items->price }}</td>
                          <td>{{ $orderItems->total }}</td>
                        </tr>             
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Grand Total</td>
                        <td>{{ $order->grand_total }}</td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <div class="flex justify-content-between margin-top">
                  <p class="">{{ $order->user->address }}</p>
                  <p>|</p>
                  <p class="">Order status: {{ $order->status }}</p>
                  <p>|</p>
                  <p class="">Restaurant: {{ $order->restaurant->name }}</p>
                </div>
              </div>                  
            @endforeach
          @else
            <p>No orders!</p>
          @endif
          <div id="pagination" class="mt-auto d-flex justify-content-center">
            {{ $orders->links() }}
          </div>  
        </div>
      </section>
