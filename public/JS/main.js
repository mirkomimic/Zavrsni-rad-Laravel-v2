$("#addItemModal").on("hidden.bs.modal", function () {
  $(this).find("form").trigger("reset");
});
$("#editItemModal").on("hidden.bs.modal", function () {
  $(this).find("form").trigger("reset");
});

// $("#alert").hide();
$("#alert").delay(3000).fadeOut(800);

// selektuj item
$(document).on("click", ".card", function () {
  $(this).toggleClass("selectedItem").siblings().removeClass("selectedItem");
});

// add item
// $(document).on("submit", "#addItemForm", function (e) {
//   e.preventDefault();
//   let name = $("#floatingInputName").val();
//   let price = $("#floatingInputPrice").val();
//   let category = $("#itemCategory").val();

//   $.ajax({
//     headers: {
//       "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
//     },
//     url: "http://127.0.0.1:8000/restaurant/addItem",
//     type: "post",
//     data: {
//       name: name,
//       price: price,
//       category: category,
//     },
//     success: function (response) {
//       $("#addItemModal").modal("toggle");
//       $("#alert").show().find("strong").html("Item added!");
//     },
//   });
// });

// ucitaj item
$("#btn_edit_item").click(function (e) {
  e.preventDefault();

  var id = $(".selectedItem form > #item_id").val();

  request = $.ajax({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },

    url: "http://127.0.0.1:8000/restaurant/getItem",
    type: "post",
    data: { item_id: id },
  });

  request.done(function (response, textStatus, jqXHR) {
    $("#floatingInputId2").val(response.item.id);
    $("#floatingInputName2").val(response.item.name);
    $("#floatingInputPrice2").val(response.item.price);
    $("#floatingInputRestaurantId").val(response.item.restaurant_id);

    $("#editItemForm select option").each(function () {
      if ($(this).val() == response.item.category) {
        $(this).attr("selected", "selected");
      }
    });
  });

  request.fail(function (jqXHR, textStatus, error) {
    console.log("Desila se greska: " + textStatus, error);
  });
});

// edit item
// $(document).on("submit", "#editItemForm", function (e) {
//   e.preventDefault();
//   const form = $(this).serialize();
//   console.log(form);
//   request = $.ajax({
//     url: "controler/editItem.php",
//     type: "post",
//     data: form,
//   });
//   request.done(function (response, status, jqXHR) {
//     console.log(response);
//     if (response === "Success") {
//       // location.reload(true);
//       $("#editItemModal").modal("toggle");
//       getAllItems();
//       $("#alert").show().find("strong").html("Item edited!");
//       // alert("Item edited");
//     } else {
//       console.log("Error adding item" + response);
//     }
//   });
//   $("#alert").hide().delay(3000).fadeOut(800);
//   request.fail(function (jqXHR, textStatus, error) {
//     console.log("Error adding item " + textStatus, error);
//   });
// });

// select filter
// $(document).on("change", "#select_filter", function () {
//   const restaurant_id = $("#restaurant_id").val();

//   var selectedValue = $(this).find(":selected").val();

//   if (selectedValue == "priceDesc") {
//     request = $.ajax({
//       url: "controler/getItemsByPriceDesc.php",
//       type: "post",
//       data: { restaurant_id: restaurant_id },
//     });
//   } else if (selectedValue == "priceAsc") {
//     request = $.ajax({
//       url: "controler/getItemsByPriceAsc.php",
//       type: "post",
//       data: { restaurant_id: restaurant_id },
//     });
//   }
//   request.done(function (response, textStatus, jqXHR) {
//     var response = JSON.parse(response);

//     $("#gridItems").empty();

//     for (var i = 0; i < response.length; i++) {
//       card = `
//       <div class="card width-18 text-center bg-card">
//         <p>Name: ${response[i].name} </p>
//         <p>Price: ${response[i].price} </p>
//         <p>Category: ${response[i].category} </p>
//         <div class="m-2">
//           <form action="" class="deleteItemForm" name="deleteItemForm">
//             <input type="text" id="item_id" name="item_id" value="${response[i].id}" hidden>
//             <input type="text" name="restaurant_id" value="${restaurant_id}" hidden>
//             <input type="submit" class="btn btn-outline-danger btn-sm" value="Delete">
//           </form>
//         </div>
//       </div>`;

//       $("#gridItems").append(card);
//     }
//   });

//   request.fail(function (jqXHR, textStatus, error) {
//     console.log("Desila se greska: " + textStatus, error);
//   });
// });

// text filter
// $(document).on("keyup", "#search_input", function () {
//   const restaurant_id = $("#restaurant_id").val();

//   var searchValue = $(this).val();

//   request = $.ajax({
//     url: "controler/getItemsByName.php",
//     type: "post",
//     data: { restaurant_id: restaurant_id, searchValue: searchValue },
//   });
//   request.done(function (response, textStatus, jqXHR) {
//     var response = JSON.parse(response);

//     $("#gridItems").empty();

//     for (var i = 0; i < response.length; i++) {
//       card = `
//       <div class="card width-18 text-center bg-card">
//         <p>Name: ${response[i].name} </p>
//         <p>Price: ${response[i].price} </p>
//         <p>Category: ${response[i].category} </p>
//         <div class="m-2">
//           <form action="" class="deleteItemForm" name="deleteItemForm">
//             <input type="text" id="item_id" name="item_id" value="${response[i].id}" hidden>
//             <input type="text" name="restaurant_id" value="${response[i].restaurant_id}" hidden>
//             <input type="submit" class="btn btn-outline-danger btn-sm" value="Delete">
//           </form>
//         </div>
//       </div>`;

//       $("#gridItems").append(card);
//     }
//   });

//   request.fail(function (jqXHR, textStatus, error) {
//     console.log("Desila se greska: " + textStatus, error);
//   });
// });

// add to cart
// $(document).on("submit", "#addToCartForm", function (e) {
//   e.preventDefault();
//   const form = $(this).serialize();
//   console.log(form);
//   request = $.ajax({
//     url: "controler/addToCart.php",
//     type: "post",
//     data: form,
//   });
//   request.done(function (response, status, jqXHR) {
//     // console.log(response);
//     if (response === "Success") {
//       // location.reload(true);
//       // getAllItems();
//       // $("#alert").show().find("strong").html("Item edited!");
//       getAllItemsFromCart();
//       // alert("Item added to cart");
//     } else {
//       console.log("Error adding item to cart" + response);
//     }
//   });
//   // $("#alert").hide().delay(3000).fadeOut(800);
//   request.fail(function (jqXHR, textStatus, error) {
//     console.log("Error adding item " + textStatus, error);
//   });
// });
// remove from cart
// $(document).on("submit", "#removeFromCartForm", function (e) {
//   e.preventDefault();
//   const form = $(this).serialize();
//   console.log(form);
//   request = $.ajax({
//     url: "controler/removeFromCart.php",
//     type: "post",
//     data: form,
//   });
//   request.done(function (response, status, jqXHR) {
//     console.log(response);
//     if (response === "Success") {
//       // location.reload(true);
//       // getAllItems();
//       // $("#alert").show().find("strong").html("Item edited!");
//       getAllItemsFromCart();
//       // alert("Item removed from cart");
//     } else {
//       console.log("Error removing item form cart" + response);
//     }
//   });
//   // $("#alert").hide().delay(3000).fadeOut(800);
//   request.fail(function (jqXHR, textStatus, error) {
//     console.log("Error adding item " + textStatus, error);
//   });
// });

$(document).on("click", "#cartIcon", function () {
  if ($("#cart").hasClass("visible1")) {
    $("#cart").removeClass("visible1");
    $("#cart").addClass("hidden1");
  } else {
    $("#cart").addClass("visible1");
    $("#cart").removeClass("hidden1");
  }
  // $("#cart").addClass("visible1");
});

// funkcije
// function getAllItems() {
//   const restaurant_id = $("#restaurant_id").val();

//   request = $.ajax({
//     url: "controler/getAllItems.php",
//     type: "post",
//     data: { restaurant_id: restaurant_id },
//   });

//   request.done(function (response, textStatus, jqXHR) {
//     var response = JSON.parse(response);

//     $("#gridItems").empty();

//     for (var i = 0; i < response.length; i++) {
//       card = `
//         <div class="card width-18 text-center bg-card">
//           <p>Name: ${response[i].name} </p>
//           <p>Price: ${response[i].price} </p>
//           <p>Category: ${response[i].category} </p>
//           <div class="m-2">
//             <form action="" class="deleteItemForm" name="deleteItemForm">
//               <input type="text" id="item_id" name="item_id" value="${response[i].id}" hidden>
//               <input type="text" name="restaurant_id" value="${restaurant_id}" hidden>
//               <input type="submit" class="btn btn-outline-danger btn-sm" value="Delete">
//             </form>
//           </div>
//         </div>`;

//       $("#gridItems").append(card);
//     }
//   });

//   request.fail(function (jqXHR, textStatus, error) {
//     console.log("Desila se greska: " + textStatus, error);
//   });
// }

// function getAllItemsFromCart() {
//   // const restaurant_id = $("#restaurant_id").val();

//   request = $.ajax({
//     url: "controler/getAllItemsFromCart.php",
//     type: "post",
//     data: "",
//   });

//   request.done(function (response, textStatus, jqXHR) {
//     var response = JSON.parse(response);
//     // console.log(response);
//     // console.log(response.length);

//     $("#cart table tbody").empty();

//     let grandTotal = 0;
//     let qtyInCart = 0;
//     for (var i = 0; i < response.length; i++) {
//       card = `
//         <tr>
//           <td>${response[i].name}</td>
//           <td>${response[i].price}</td>
//           <td>${response[i].qty}</td>
//           <td>${response[i].price * response[i].qty}</td>
//         </tr>
//       `;
//       grandTotal += response[i].price * response[i].qty;
//       $("#cart table tbody").append(card);
//       qtyInCart += response[i].qty;
//     }
//     console.log(grandTotal);
//     if (grandTotal == 0) {
//       $("#cart table tbody").append('<td colspan="4">Empty Cart</td>');
//     }
//     $("#grand_total").html(grandTotal);
//     $("#qtyInCart").html(qtyInCart);
//     if (qtyInCart > 0) {
//       $("#cartIcon").addClass("bx-tada");
//     } else {
//       $("#cartIcon").removeClass("bx-tada");
//     }
//   });

//   request.fail(function (jqXHR, textStatus, error) {
//     console.log("Desila se greska: " + textStatus, error);
//   });
// }

// api ajax

$(document).ready(function () {
  // getRestaurants();
  getApiTemp();
  getUsers();
});

// function getRestaurants() {
//   $.ajax({
//     type: "get",
//     url: "http://127.0.0.1:8000/api/restaurants",
//     success: function (data) {
//       for (restaurant of data.data) {
//         var links = `
//           <a class="restaurant_link" href="${restaurant.id}">${restaurant.name}</a><br>
//         `;
//         $("#restaurants").append(links);
//       }

//       var page_link = `
//           <li class="page-item"><a class="page-link" href="${data.links.prev}">&larr; Prev</a></li>
//           <li class="page-item"><a class="page-link" href="${data.links.next}">Next &rarr;</a></li>
//         `;
//       $("#pagination").append(page_link);
//     },
//   });
// }

// restaurants pagination
// $(document).on("click", ".page-link", function (e) {
//   e.preventDefault();
//   $("#items").empty();
//   url = $(this).attr("href");
//   $.ajax({
//     type: "get",
//     url: url,
//     // data: "_token = <?php echo csrf_token() ?>",
//     success: function (data) {
//       $("#restaurants").empty();
//       // lista restorana
//       for (restaurant of data.data) {
//         var links = `
//           <a href="${restaurant.id}" class="restaurant_link">${restaurant.name}</a><br>
//         `;
//         $("#restaurants").append(links);
//       }
//       // paginacija

//       var page_link = `
//           <li class="page-item"><a class="page-link" href="${data.links.prev}">&larr; Prev</a></li>
//           <li class="page-item"><a class="page-link" href="${data.links.next}">Next &rarr;</a></li>
//         `;
//       $("#pagination").empty().append(page_link);
//     },
//   });
// });

// show restaurant items
// $(document).on("click", ".restaurant_link", function (e) {
//   e.preventDefault();
//   $("#items").empty();
//   $(this).addClass("color-red").siblings().removeClass("color-red");
//   var id = $(this).attr("href");
//   $.ajax({
//     type: "get",
//     url: "http://127.0.0.1:8000/api/restaurants/" + id + "/items",

//     success: function (data) {
//       for (item of data.data) {
//         var items = `
//           <div>
//             <p>id: ${item.id}</p>
//             <p>Name: ${item.name}</p>
//             <p>Price: ${item.price}</p>
//           </div>
//           <br>
//         `;
//         $("#items").append(items);
//       }
//     },
//   });
// });

function getApiTemp() {
  $.ajax({
    url: "https://api.open-meteo.com/v1/forecast?latitude=44.80&longitude=20.47&hourly=temperature_2m,rain&current_weather=true",
    type: "get",

    success: function (data) {
      temp = data.current_weather.temperature;
      $("#temp").append("<p>Current temperature: " + temp + " &#x2103");
    },
  });
}

function getUsers() {
  $.ajax({
    url: "http://127.0.0.1:8000/api/users",
    type: "get",
    success: function (data) {
      console.log(data);
      for (user of data.data) {
        row = `
        <tr>
          <td>${user.id}</td>
          <td>${user.first_name}</td>
          <td>${user.last_name}</td>
          <td>${user.email}</td>
        </tr>
        `;
        $("#admin_main table tbody").append(row);
      }

      var page_link = `
        <li class="page-item"><a class="page-link2" href="${data.links.prev}">&larr; Prev</a></li>
        <li class="page-item"><a class="page-link2" href="${data.links.next}">Next &rarr;</a></li>
      `;
      $("#users_pagination").append(page_link);
    },
  });
}

// users pagination
$(document).on("click", ".page-link2", function (e) {
  e.preventDefault();
  // $("#users tbody").empty();

  url = $(this).attr("href");

  $.ajax({
    type: "get",
    url: url,
    success: function (data) {
      $("#users tbody").empty();
      for (user of data.data) {
        row = `
        <tr>
          <td>${user.id}</td>
          <td>${user.first_name}</td>
          <td>${user.last_name}</td>
          <td>${user.email}</td>
        </tr>
        `;
        $("#admin_main table tbody").append(row);
      }
      // paginacija

      var page_link = `
          <li class="page-item"><a class="page-link2" href="${data.links.prev}">&larr; Prev</a></li>
          <li class="page-item"><a class="page-link2" href="${data.links.next}">Next &rarr;</a></li>
        `;
      $("#users_pagination").empty().append(page_link);
    },
    error: function (jqXhr, textStatus, errorMessage) {
      console.log("Error: " + errorMessage);
    },
  });
});

// select row
$(document).on("click", "#users tbody tr", function () {
  $(this).addClass("selected_row").siblings().removeClass("selected_row");
  email = $(this).children().last().text();
  id = $(this).children().first().text();

  validateEmail(email);
  getUser(id);
});

function validateEmail(email) {
  $.ajax({
    url: "https://open.kickbox.com/v1/disposable/" + email,
    type: "get",
    success: function (data) {
      text = `
        ${data.disposable}
      `;
      $("#email_validator b").empty().append(text);
    },
  });
}

function getUser(id) {
  $.ajax({
    url: "http://127.0.0.1:8000/api/users/" + id,
    type: "get",
    success: function (data) {
      $("#first_name_edit").val(data.data.first_name);
      $("#last_name_edit").val(data.data.last_name);
      $("#addressEdit").val(data.data.address);
      $("#emailEdit").val(data.data.email);
      $("#type").val(data.data.type);
    },
  });
}

// submit edit form
$(document).on("submit", "#edit_user_form", function (e) {
  e.preventDefault();

  var first_name = $("#first_name_edit").val();
  var last_name = $("#last_name_edit").val();
  var address = $("#addressEdit").val();
  var email = $("#emailEdit").val();
  var type = $("#type").val();

  id = $(".selected_row").children().first().text();
  $.ajax({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    url: "http://127.0.0.1:8000/api/users/" + id,
    type: "patch",

    data: {
      first_name: first_name,
      last_name: last_name,
      address: address,
      email: email,
      type: type,
    },
    success: function (data) {
      console.log(data);
      $("#edit_user_msg").show().html("User edited");
      $("#users tbody").empty();
      $("#users_pagination").empty();
      getUsers();
      $("#edit_user_form")[0].reset();
    },
  });
  $("#edit_user_msg").hide().delay(3000).fadeOut(800);
});

// delete user
$(document).on("click", "#delete_user", function (e) {
  e.preventDefault();

  id = $(".selected_row").children().first().text();

  if (confirm("Are you sure?") == false) {
    return;
  }

  $.ajax({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    url: "http://127.0.0.1:8000/api/users/" + id,
    type: "DELETE",
    success: function (data) {
      $("#edit_user_msg").show().html("User deleted");
      $("#users tbody").empty();
      $("#users_pagination").empty();
      getUsers();
      $("#edit_user_form")[0].reset();
    },
  });
  $("#edit_user_msg").hide().delay(3000).fadeOut(800);
});
