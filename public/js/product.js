const all_products = document.querySelectorAll(".product");

all_products.forEach(product => {
    const product_image = product.querySelector(".product-image");
    product_image.addEventListener("click", e => {
        const id = product.querySelector("input").value;
        window.location.href = `/product?id=${id}`;
    });
});
