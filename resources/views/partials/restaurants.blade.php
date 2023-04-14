<div id="restaurants_section" class="mt-5">
  <h3 class="my-3 text-warning text-uppercase text-center">Restaurants</h3>
  <div class="gridItems justify-content-center gap-3 mb-4 text-center">
    @foreach ($restaurants as $restaurant)
      <p class="margin-bottom fs-4"><a class="text-decoration-none" href="/restaurant/{{ $restaurant->id }}/items">{{ $restaurant->name }}</a></p>    
    @endforeach
  </div>
  <div id="pagination" class="mt-auto d-flex justify-content-center">
    {{ $restaurants->links() }}
  </div>
</div>
