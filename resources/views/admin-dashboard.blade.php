@extends('layouts.app')
@section('content')
  @include('partials.header')
  <div class="cont">
    <main class="min-vh-100">
      <section id="admin_main" class="text-white ">

        <section id="temp" class="widget mt-5 text-white text-center d-flex flex-row align-items-center justify-content-center"></section>
        
        <div id="users_table_card" class="myCard flex-column">
          <div class="">
            <h3 class="my-3 text-warning text-uppercase text-center">Manage Users</h3>
              <div id="email_validator" class="widget mx-auto text-center d-flex flex-row align-items-center justify-content-center">Disposable email: <b></b></div>
          </div>
          <br>
          <div id="users" class="p-4">
              <table class="min-w-600 mx-auto">
                  <thead>
                      <th>ID</th>
                      <th>First name</th>
                      <th>Last name</th>
                      <th>Email</th>
                  </thead>
                  <tbody>
                      {{-- append --}}
                  </tbody>
              </table>
              <br>
          </div>
          <div class="mt-auto">
              <ul id="users_pagination" class="d-flex gap-5 justify-content-center"></ul>
          </div>
        </div>
        <br>
        <div class="myCard bg-green p-3 mb-3">
          <div class="color-red" id="edit_user_msg"></div><br>
          <form id="edit_user_form" action="" method="post" class="w-600 mb-3 mx-auto">
              {{-- @csrf --}}
              {{-- @method('PATCH') --}}
              <div class="mb-6">
                  <label for="first_name_edit" class="">First name:</label>
                  <input name="first_name" type="text" id="first_name_edit" class="form-control bg-black text-white" required>
              </div>
              <div class="mb-6">
                  <label for="last_name_edit" class="">Last name:</label>
                  <input name="last_name" type="text" id="last_name_edit" class="form-control bg-black text-white" required>
              </div>
              <div class="mb-6">
                  <label for="addressEdit" class="">Address</label>
                  <input name="address" type="text" id="addressEdit" class="form-control bg-black text-white"  required>
              </div>
              <div class="mb-6">
                  <label for="emailEdit" class="">Email</label>
                  <input name="email" type="email" id="emailEdit" class="form-control bg-black text-white" placeholder="" required>
              </div>
              <div class="mb-3">
                  <label for="type" class="">Type:</label>
                  <input name="type" type="text" id="type" class="form-control bg-black text-white" required>
              </div>
              {{-- <div>
                  <input type="hidden" name="_method" value="PATCH">
              </div> --}}
                <button type="submit" class="btn btn-primary me-3">Edit user</button>
                <a id="delete_user" class="text-danger" href="">Delete</a>
          </form>
        </div>
      </section> 
    </main>
  </div>
  @include('partials.footer')
@endsection