<!DOCTYPE html>
<html>

<head>
    <title> Midterm Practice </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <style type="text/css">
        table,
        tr,
        td {
            border: 1px solid;
        }

        td {
            padding: 10px;
            /*text-align: left;*/
        }

        table {
            width: 30%;
            border-spacing: 0;
            margin: 0 auto;
        }

        #quant,
        #quant1 {
            width: 100%;
            height: 100%;
            margin: -4px;
        }

        h1 {
            text-align: center;
        }

        .promo {
            text-align: center;
        }

        input {
            height: 30px;
        }

        input[type="text"] {
            font-size: 18px;
            font-family: "Times New Roman", Times, serif;
        }

        #shiftLeft {
            text-align: right;
        }

        #selctCat {
            width: 200px;
            padding-right: 0px;
        }

        #promoMessage {
            text-align: center;
            padding: 20px;
            font-size: 20px;
        }
    </style>
</head>

<body>

    <h1> Midterm Practice </h1>

    <table>
        <tr>
            <th>Product</th>
            <th>Unit <br> Price</th>
            <th> Quantity </th>
            <th>Total</th>
        </tr>
        <tr>
            <td><span id="product"></span></td>
            <td><span id="price"></span></td>
            <td><input id="quant" type="text" size="5"><span></span></td>
            <td> <span id="totalFirstRow"></span> </td>
        </tr>
        <tr>
            <td>
                <select id="selctCat" name="category">
                    <option value=""> - Select One -</option>
                </select>
            </td>
            <td id="dropdownPrice"></td>
            <td><input id="quant1" type="text" size="5"></td>
            <td id="totalSecondRow"></td>
        </tr>
        <tr>
            <td id="shiftLeft">Discount</td>
            <td></td>
            <td id="discount"></td>
            <td id="discountAmount"></td>
        </tr>
        <tr>
            <td id="shiftLeft">Subtotal</td>
            <td></td>
            <td></td>
            <td id="subtotal"><span id="subtotalInfo"></span></td>
        </tr>
        <tr>
            <td id="shiftLeft">Tax (10%)</td>
            <td></td>
            <td></td>
            <td id="tax"><span id="taxCost"></span></td>
        </tr>
        <tr>
            <td id="shiftLeft">Total</td>
            <td></td>
            <td></td>
            <td id="total"><span id="finalTotal"></span></td>
        </tr>

    </table>

    <br> <br>
    <div class="promo">
        <b>Promo Code:</b> <input type="text" name="promo" id="promoCode" />
    </div>
    <div id="promoMessage"> </div>

    <div class="modal" id="purchaseHistoryModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Product History </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="history"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> Close</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        /*global $*/
        $(document).ready(function() {

            // var priceProduct;
            var discountAmount;
            var products = {};
            // Function call to fill up the dropdown menu 
            $.ajax({
                type: "GET",
                url: "getProduct.php",
                dataType: "json",
                success: function(data, status) {
                    data.forEach(function(prod) {
                        products[prod["productId"]] = prod;
                        $("[name=category]").append("<option value=" + prod["productId"] + ">" + prod["productName"] + "</option");
                    });
                    $('#selctCat').on('change', function() {
                        var id = $("#selctCat option:selected").val();
                        $("#dropdownPrice").html(products[id].productPrice);
                    });

                }
            });

            $.ajax({
                type: "GET",
                url: "getRandomProduct.php",
                dataType: "json",
                success: function(data) {

                    $("#product").html(data.productName);
                    $("#price").html(data.productPrice);
                    $("#product").click(function() {
                        $('#purchaseHistoryModal').modal("show");
                        if (data.length != 0) {
                            $("#history").html("");
                            $("#history").append("<img src='" + data.productImage + "' width='auto' /> <br />");
                            $("#history").append(data.productDescription + "<br />");
                        }
                        else {
                            $("#history").append("Product not found!");
                        }
                    });
                }
            });

            $.ajax({
                type: "GET",
                url: "getPromoCode.php",
                dataType: "json",
                success: function(data) {
                    $("#discount").html(data.discount + "%");
                    $("#promoCode").val(data.promoCode);
                    $("#promoMessage").html("This Promo Code expires on " + data.expirationDate + "!").css("color", "red");
                    discountAmount = data.discount;
                }
            });


            function calculateTotal() {
                // 0. define your total variables
                var subtotal = 0; // total before tax
                var totalDiscount = 0;
                var totalPrice = 0;
                var totalTax = 0;
                var firstRowTotal = $("#price").text() * $("#quant").val();
       
                var secondRowTotal = $("#dropdownPrice").text() * $("#quant1").val();
                // add 1 and two and do calculations

                totalDiscount = (firstRowTotal + secondRowTotal) * discountAmount / 100;
                subtotal = (firstRowTotal + secondRowTotal) - totalDiscount;
                totalTax =  subtotal * 10 / 100;
                totalPrice = subtotal + totalTax;
                
                $("#totalFirstRow").html(firstRowTotal);
                $("#totalSecondRow").html(secondRowTotal);
                $("#discountAmount").html("$" + totalDiscount);
                $("#subtotal").html("$" + Math.floor(subtotal));
                $("#tax").html("$" + Math.floor(totalTax));
                $("#finalTotal").html("$" + Math.round(totalPrice));

            }
            
            $('#quant').focusout(function() {
                calculateTotal();
            });


            $('#quant1').focusout(function() {
                calculateTotal();
            });


        });
    </script>

</body>

</html>