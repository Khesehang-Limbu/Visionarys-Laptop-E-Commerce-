const open_modal = document.querySelector("[data-open-modal]");
const close_modal = document.querySelector("[data-close-modal]");
const modal = document.querySelector("[data-modal]");

open_modal.addEventListener("click", function() {
    modal.showModal();
});

modal.addEventListener("click", function(e) {
    const dialogDimensions = modal.getBoundingClientRect();

    if (e.clientX < dialogDimensions.left || e.clientX > dialogDimensions.right || e.clientY < dialogDimensions.top || e.clientY > dialogDimensions.bottom) {
        modal.close();
    }
});

const products = document.querySelectorAll(".product");

if (get_cookie("cart")) {
    const cart_items = JSON.parse(get_cookie("cart"));

    cart_items.forEach(function(item) {
        create_cart_item(item.product_image, item.product_title, item.product_price, item.product_quantity);
    });
};

products.forEach(product => {
    const add_to_cart = product.querySelector(".add-to-cart");
    add_to_cart.addEventListener("click", function(event) {
        const product_title = product.querySelector(".product-title h2:first-child").innerHTML;
        const product_image = product.querySelector(".product-image img").getAttribute("src");
        const product_price = product.querySelector(".product-price").innerHTML.match(/(\d+)/)[0];

        create_cart_item(product_image, product_title, product_price, 1);

        var cart = JSON.parse(get_cookie("cart"));
        let cart_item = {};
        let id = 1;

        if (!cart) {
            cart = [];
        } else {
            const last_cart_item = cart.slice(-1);

            if (last_cart_item[0].id) {
                id = Number(last_cart_item[0].id);
                id++;
            }
        }

        cart_item = {
            "id": id,
            "product_title": product_title,
            "product_image": product_image,
            "product_price": product_price,
            "product_quantity": 1,
        };

        cart.push(cart_item);

        set_cookie("cart", JSON.stringify(cart), 1); // Store cart for 1 day
    });
});

function create_cart_item(product_img, product_name, p_price, product_quantity) {
    const cart = document.querySelector("dialog.cart-modal form");
    const cart_content = document.createElement("div");
    const cart_title = document.createElement("h3");
    const cart_product_container = document.createElement("div");
    const image = document.createElement("img");
    const counter = document.createElement("div");
    const minus = document.createElement("i");
    const input = document.createElement("input");
    const plus = document.createElement("i");
    const price = document.createElement("p");
    const price_input = document.createElement("input");

    const product_title = product_name;
    const product_image = product_img;
    const product_price = p_price;

    cart_content.classList.add("cart-content");
    cart.prepend(cart_content);

    cart_title.classList.add("text-center");
    cart_title.innerHTML = product_title;
    cart_content.appendChild(cart_title);

    cart_product_container.classList.add("cart-product-container");
    cart_content.appendChild(cart_product_container);

    image.setAttribute("src", product_image);
    image.setAttribute("alt", product_title);

    minus.classList.add("fa-solid");
    minus.classList.add("fa-minus");

    input.setAttribute("type", "number");
    input.setAttribute("value", product_quantity);
    input.setAttribute("name", "product_quantity");
    input.setAttribute("disabled", "true");

    plus.classList.add("fa-solid");
    plus.classList.add("fa-plus");


    counter.appendChild(minus);
    counter.appendChild(input);
    counter.appendChild(plus);

    price.innerHTML = "Rs. " + (product_price*product_quantity);

    minus.addEventListener("click", function() {
        if (input.value > 1) {
            let p = price.innerHTML.match(/(\d+)/)[0];
            price.innerHTML = "Rs. " + (p - (p/Number(input.value)));
            price_input.setAttribute("value", price.innerHTML.match(/(\d+)/)[0]);
            input.setAttribute("value", --input.value);

            let cart_items = JSON.parse(get_cookie("cart"));

            cart_items.forEach(item => {
                if (item.product_title=== cart_title.innerHTML && Number(item.product_quantity) > 1) {
                    item.product_quantity = Number(item.product_quantity);
                    --item.product_quantity;
                    console.log(item.product_quantity);
                    update_item_property("cart", item.id, "product_quantity", item.product_quantity);
                }
            });
        }
    });

    plus.addEventListener("click", function() {
        let p = Number(price.innerHTML.match(/(\d+)/)[0]);
        price.innerHTML = `Rs. ${(p + (p/Number(input.value)))}`;
        price_input.setAttribute("value", price.innerHTML.match(/(\d+)/)[0]);
        input.setAttribute("value", input.value++);

        let cart_items = JSON.parse(get_cookie("cart"));

        cart_items.forEach(item => {
            if (item.product_title === cart_title.innerHTML) {
                ++item.product_quantity;
                update_item_property("cart", item.id, "product_quantity", item.product_quantity);
            }
        });
    });

    price_input.setAttribute("type", "hidden");
    price_input.setAttribute("value", price.innerHTML.match(/(\d+)/)[0]);

    cart_product_container.appendChild(image);
    cart_product_container.appendChild(counter);
    cart_product_container.appendChild(price);
    cart_product_container.appendChild(price_input);
}

function set_cookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

function get_cookie(name) {
    var nameEQ = name + "=";
    var cookies = document.cookie.split(';');
    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        while (cookie.charAt(0) === ' ') {
            cookie = cookie.substring(1, cookie.length);
        }
        if (cookie.indexOf(nameEQ) === 0) {
            return cookie.substring(nameEQ.length, cookie.length);
        }
    }
    return null;
}

function delete_cookie(name) {
    document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
}

function update_item_property(cookieName, itemId, propertyName, newValue) {
    var cookieValue = get_cookie(cookieName);

    var arrayValue;
    try {
        arrayValue = JSON.parse(cookieValue);
    } catch (error) {
        console.error("Error parsing cookie value as array:", error);
        return;
    }

    var foundItemIndex = arrayValue.findIndex(function(item) {
        return item.id === itemId;
    });

    if (foundItemIndex !== -1) {
        arrayValue[foundItemIndex][propertyName] = newValue;

        var updatedValue = JSON.stringify(arrayValue);

        document.cookie = cookieName + "=" + updatedValue + "; path=/";
    } else {
        console.error("Item with ID " + itemId + " not found in the array.");
    }
}

