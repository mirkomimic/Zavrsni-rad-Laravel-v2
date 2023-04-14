      <!-- items section -->
      <section id="items_section" class="d-flex flex-column">
        <h3 class="my-3 text-warning text-uppercase text-center">Your items</h3>
        
        <div id="gridItems" class="gridItems justify-content-center gap-3 mb-4">
          @foreach ($items as $item)          
            <div class="card width-18 text-center bg-card">
              <div id="itemImg" class="mx-auto mt-2 overflow-hidden">
                <img src="storage/items/{{$item->image}}" alt="">
              </div>
              <p>Name: {{ $item->name }}</p>
              <p>Price: {{ $item->price }}</p>
              <p>Category: {{ $item->category }}</p>
              <div class="m-2">
                <form action="{{ route('restaurant.delete.item') }}" method="POST" class="deleteItemForm" name="deleteItemForm">
                  @csrf
                  <input type="text" id="item_id" name="item_id" value="{{ $item->id }}" hidden>
                  <input type="text" name="restaurant_id" value="{{ $item->restaurant_id }}" hidden>
                  <input type="submit" onclick="confirm('Are you sure?')" class="btn btn-outline-danger btn-sm" value="Delete">
                </form>
              </div>
            </div>
          @endforeach
        </div>
        @if ($items->count() == 0)
          <p class="text-center">No Items!</p>
        @endif
    
        <!-- pagination -->
        <div id="pagination" class="mt-auto d-flex justify-content-center">
          {{ $items->links() }}
        </div>
      </section>
