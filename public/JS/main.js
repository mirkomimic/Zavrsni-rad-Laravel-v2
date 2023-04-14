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
$(document).on("keyup", "#search_input", function () {
  const restaurant_id = $("#restaurant_id").val();

  var searchValue = $(this).val();

  request = $.ajax({
    url: "controler/getItemsByName.php",
    type: "post",
    data: { restaurant_id: restaurant_id, searchValue: searchValue },
  });
  request.done(function (response, textStatus, jqXHR) {
    var response = JSON.parse(response);

    $("#gridItems").empty();

    for (var i = 0; i < response.length; i++) {
      card = `
      <div class="card width-18 text-center bg-card">
        <p>Name: ${response[i].name} </p>
        <p>Price: ${response[i].price} </p>
        <p>Category: ${response[i].category} </p>
        <div class="m-2">
          <form action="" class="deleteItemForm" name="deleteItemForm">
            <input type="text" id="item_id" name="item_id" value="${response[i].id}" hidden>
            <input type="text" name="restaurant_id" value="${response[i].restaurant_id}" hidden>
            <input type="submit" class="btn btn-outline-danger btn-sm" value="Delete">
          </form>
        </div>
      </div>`;

      $("#gridItems").append(card);
    }
  });

  request.fail(function (jqXHR, textStatus, error) {
    console.log("Desila se greska: " + textStatus, error);
  });
});

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
function getAllItems() {
  const restaurant_id = $("#restaurant_id").val();

  request = $.ajax({
    url: "controler/getAllItems.php",
    type: "post",
    data: { restaurant_id: restaurant_id },
  });

  request.done(function (response, textStatus, jqXHR) {
    var response = JSON.parse(response);

    $("#gridItems").empty();

    for (var i = 0; i < response.length; i++) {
      card = `
        <div class="card width-18 text-center bg-card">
          <p>Name: ${response[i].name} </p>
          <p>Price: ${response[i].price} </p>
          <p>Category: ${response[i].category} </p>
          <div class="m-2">
            <form action="" class="deleteItemForm" name="deleteItemForm">
              <input type="text" id="item_id" name="item_id" value="${response[i].id}" hidden>
              <input type="text" name="restaurant_id" value="${restaurant_id}" hidden>
              <input type="submit" class="btn btn-outline-danger btn-sm" value="Delete">
            </form>
          </div>
        </div>`;

      $("#gridItems").append(card);
    }
  });

  request.fail(function (jqXHR, textStatus, error) {
    console.log("Desila se greska: " + textStatus, error);
  });
}

function getAllItemsFromCart() {
  // const restaurant_id = $("#restaurant_id").val();

  request = $.ajax({
    url: "controler/getAllItemsFromCart.php",
    type: "post",
    data: "",
  });

  request.done(function (response, textStatus, jqXHR) {
    var response = JSON.parse(response);
    // console.log(response);
    // console.log(response.length);

    $("#cart table tbody").empty();

    let grandTotal = 0;
    let qtyInCart = 0;
    for (var i = 0; i < response.length; i++) {
      card = `
        <tr>
          <td>${response[i].name}</td>
          <td>${response[i].price}</td>
          <td>${response[i].qty}</td>
          <td>${response[i].price * response[i].qty}</td>
        </tr>
      `;
      grandTotal += response[i].price * response[i].qty;
      $("#cart table tbody").append(card);
      qtyInCart += response[i].qty;
    }
    console.log(grandTotal);
    if (grandTotal == 0) {
      $("#cart table tbody").append('<td colspan="4">Empty Cart</td>');
    }
    $("#grand_total").html(grandTotal);
    $("#qtyInCart").html(qtyInCart);
    if (qtyInCart > 0) {
      $("#cartIcon").addClass("bx-tada");
    } else {
      $("#cartIcon").removeClass("bx-tada");
    }
  });

  request.fail(function (jqXHR, textStatus, error) {
    console.log("Desila se greska: " + textStatus, error);
  });
}
