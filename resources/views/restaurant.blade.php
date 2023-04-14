@extends('layouts.app')

@section('content')
@include('partials.header')
<div class="cont">
  <main class="min-vh-100">
    <!-- buttons and filters -->
    <section id="btns_and_filters" class="container pt-5">
      <!-- Buttons for modals -->
      <div class="row">      
        <div class="col">
          <div class="border border-success rounded-pill py-2 text-center max-w-300">
            <button type="button" class="btn btn-success btn-sm my-1" data-bs-toggle="modal" data-bs-target="#addItemModal">Add Item</button>
            <button type="button" id="btn_edit_item" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editItemModal">Edit Item</button>
          </div>
        </div>
        <!-- text filter -->
        <div class="col d-flex align-items-center justify-content-center ">
          <div class="form-floating">
            <input type="text" name="itemSearch" class="form-control border-success border-2 bg-black text-light" id="search_input" placeholder="Search">
            <label for="search_input">Search</label>
          </div>
        </div>
        <!-- select filter -->
        <div id="price_sort" class="col my-auto">
          <select class="form-select form-select-lg border-success border-2 bg-black text-light ms-auto" id="select_filter" required>
              <option disabled hidden selected>Price &darr;&uarr;</option>
              <option name="priceDesc" value="priceDesc">Price &darr;</option>
              <option name="priceAsc" value="priceAsc">Price &uarr;</option>
          </select>
        </div>
      </div>
    </section>
    <!-- alert div -->  
    
    @if ($errors->any())
      <div class="alert alert-danger mt-5">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif

    <section id="alert_section" class="position-relative p-3">
      @if(session()->has('msg'))
        <div class="alert alert-success col-md-3 m-auto position-absolute top-50 start-50 translate-middle" id="alert" role="alert">
          <strong>
              {{ session()->get('msg') }}
          </strong>
        </div>
      @endif      
    </section> 
    

    {{-- @include('partials.items') --}}
    @include('partials.items', ['items' => $items])
    @include('partials.orders')

    <!-- Add Item Modal -->
    <div class="modal fade bg-blur" id="addItemModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content bg-modal">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <!-- add-item form -->
              <form action="{{ route('restaurant.add.item') }}" method="post" id="addItemForm" name="addItemForm" enctype="multipart/form-data">
                @csrf
              <div class="mb-3 form-floating">
                  <input type="text" name="name" class="form-control text-light @error('name') is-invalid @enderror" placeholder="Item Name" id="floatingInputName" value="" required>
                  <label class="text-light" for="floatingInputName">Name</label>
              </div>
              <div class="mb-3 form-floating">
                  <input type="text" name="price" class="form-control text-light @error('price') is-invalid @enderror" id="floatingInputPrice" placeholder="Price" required>
                  <label class="text-light" for="floatingInputPrice">Price</label>
              </div>
              @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              <div class="mb-3 ">
                  <select id="itemCategory" class="form-select form-select-lg text-light @error('cateogory') is-invalid @enderror" name="category" required>
                  <option selected disabled hidden>Select category</option>
                  <option value="Food">Food</option>
                  <option value="Drink">Drink</option>
                  </select>
              </div>
              <div class="mb-3">
                <input class="form-control" name="file" type="file" id="formFile">
              </div>
              {{-- <div class="mb-3 form-floating">
                  <input type="text" name="restaurant_id" class="form-control" id="restaurant_id" placeholder="Price" value="" required hidden>
              </div> --}}
              </form>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" form="addItemForm" name="add_item">Add Item</button>
          </div>
          </div>
      </div>
    </div>
    
    <!-- Edit Item Modal -->
    <div class="modal fade bg-blur" id="editItemModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-modal">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Item</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- edit-item form -->
            <form action="{{ route('restaurant.edit.item') }}" method="post" id="editItemForm" name="editItemForm" enctype="multipart/form-data">
              @csrf
              <div class="mb-3 form-floating">
                <input type="text" name="item_id" class="form-control " placeholder="Item ID" id="floatingInputId2" required hidden>
              </div>
              <div class="mb-3 form-floating">
                <input type="text" name="name" class="form-control text-light" placeholder="Item Name" id="floatingInputName2" required>
                <label class="text-light" for="floatingInputName2">Name</label>
              </div>
              <div class="mb-3 form-floating">
                <input type="text" name="price" class="form-control text-light" id="floatingInputPrice2" placeholder="Price" required>
                <label class="text-light" for="floatingInputPrice2">Price</label>
              </div>
              <div class="mb-3 ">
                <select class="form-select form-select-lg text-light" name="category" required>
                  <option selected disabled hidden>Select category</option>
                  <option value="Food">Food</option>
                  <option value="Drink">Drink</option>
                </select>
              </div>
              <div class="mb-3">
                <input class="form-control" name="file" type="file" id="formFile">
              </div>
              <div class="mb-3 form-floating">
                <input type="text" name="restaurant_id" class="form-control" id="floatingInputRestaurantId" placeholder="Price" required hidden>
              </div>
            </form>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" form="editItemForm" name="edit_item">Edit Item</button>
          </div>
        </div>
      </div>
    </div>
  </main>
</div>
    

@include('partials.footer')
@endsection
