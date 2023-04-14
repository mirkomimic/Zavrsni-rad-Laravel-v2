<div class="mt-4">
  <a href="/home"><< Go Back</a>
</div>
<section id="items_section" class="my-4 d-flex flex-column">
  <h4 class="my-4 text-warning text-center text-uppercase">{{ $restaurant->name }}</h4>
  <h3 class="my-4 text-warning text-center text-uppercase">Items</h3>
  
  <div id="gridItems" class="gridItems justify-content-center gap-3 mb-4">
    @foreach ($items as $item)
      <div class="card2 rounded-2 width-18 text-center bg-card">
        <div id="itemImg" class="mx-auto mt-2 overflow-hidden">
          <img src="/storage/items/{{$item->image}}" alt="">
        </div>
        <p>Name: {{ $item->name }}</p>
        <p>Price: {{ $item->price }}</p>
        <p>Category: {{ $item->category }}</p>
        <!-- add/remove btns -->
        <div class="m-2 d-flex justify-content-center gap-3">
          <form action="{{ route('remove.from.cart', $item->id) }}" id="removeFromCartForm" name="removeFromCartForm">
            @csrf
            <input type="text" id="item_id" name="id" value="{{$item->id}}" hidden>
            <input type="text" name="restaurant_id" value="" hidden>
            <input type="submit" name="remove_from_cart" class="btn btn-outline-danger btn-sm add-remove-btns" value="-">
          </form>
          <form action="{{route('add.to.cart', $item->id)}}" id="addToCartForm" name="addToCartForm">
            @csrf
            <input type="text" id="item_id" name="id" value="{{$item->id}}" hidden>
            <input type="text" name="restaurant_id" value="" hidden>
            <input type="submit" name="add_to_cart" class="btn btn-outline-success btn-sm add-remove-btns" value="+">
          </form>
        </div>
      </div>  
    @endforeach
  </div>
  @if ($items->count() == 0)
    <p class="text-center">No Items!</p>
  @endif
  <div id="pagination" class="mt-auto d-flex justify-content-center">
    {{ $items->links() }}
  </div>
</section>