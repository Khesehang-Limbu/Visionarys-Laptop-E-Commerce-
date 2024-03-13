<section id="payment">
    <div class="">
        <h1 class="text-center">Payment</h1>

        <form method="POST" action="" enctype="multipart/form-data">
            <div class="payment-form-row">
                <div class="row">
                </div>

                <div class="col">
                    <div class="form-field">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" disabled value="<?php echo $user['email']; ?>"/>
                    </div>

                    <div class="form-field">
                        <label for="shupping-address">Shipping Address</label>
                        <input type="text" id="shipping-address" name="shipping_address" />
                    </div>

                    <button class="btn btn-primary-outlne" type="submit">Cash on Delivery</button>
                    <a href="initiate-khalti" class="btn btn-primary">Pay via Khalti</a>
                </div>
            </div>
        </form>
    </div>
</section>

<script src="js/cart.js">
</script>

<script type="text/javascript">
    window.onload = function() {
        let cart_items = JSON.parse(get_cookie("cart"));
        let total = 0;

        const left_colum = document.querySelector("#payment .payment-form-row .row");

        cart_items.forEach(item => {
            create_cart_item(item);
            total += Number(item.product_quantity) * Number(item.product_price);
        });

        const total_div = document.createElement("div");
        const total_text = document.createElement("h3");
        const separator = document.createElement("div");
        const total_sum = document.createElement("h3");

        total_div.classList.add("sub-total");
        total_text.innerHTML = "Sub Total";
        separator.classList.add("vertical-separator");
        total_sum.innerHTML = `Rs. ${total.toLocaleString("en-IN")}`;

        total_div.appendChild(total_text);
        total_div.appendChild(separator);
        total_div.appendChild(total_sum);
        left_colum.appendChild(total_div);
    };

    function create_cart_item(item) {
        const left_colum = document.querySelector("#payment .payment-form-row .row");

        const col_1 = document.createElement("div");
        const img = document.createElement("img");
        const div_1 = document.createElement("div");
        const h3_title = document.createElement("h3");
        const p_quantity = document.createElement("p");
        const p_price = document.createElement("p");

        col_1.classList.add("col");
        img.setAttribute("src", item.product_image);
        img.setAttribute("alt", "");

        h3_title.innerHTML = item.product_title;
        p_quantity.innerHTML = `Qty : ${item.product_quantity}`;

        div_1.appendChild(h3_title);
        div_1.appendChild(p_quantity);

        p_price.classList.add("product-price");
        p_price.innerHTML = "Rs ." + (Number(item.product_price) * Number(item.product_quantity)).toLocaleString("en-IN");

        col_1.appendChild(img);
        col_1.appendChild(div_1);
        col_1.appendChild(p_price);

        left_colum.prepend(col_1);
    }
</script>
