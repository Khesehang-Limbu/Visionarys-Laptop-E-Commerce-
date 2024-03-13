<link href="css/home.css" rel="stylesheet" />
<style>
    .products-header {
        padding: 20px 0;
        text-align: center;
        font-size: 2.5rem;
    }

    .products-container {
        margin: 20px 0 60px 0;
    }

    .products-container .grid-container {
        grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
        padding: 5%;
        gap: 25px;
    }
</style>
<section id="products">
    <div class="products-container">
        <div class="products-header">
            <h1>Products</h1>
        </div>

        <div class="grid-container">
            <?php foreach ($products as $p) { ?>
                <div class="product">
                    <input type="hidden" name="id" value="<?php echo $p['id'] ?>" />
                    <div class="product-image">
                        <img src="<?php echo $p["feature_image"] ?>" alt="" />
                    </div>

                    <div class="product-specs">
                        <div class="product-title">
                            <h2><?php echo $p["title"] ?></h2>
                            <h2>Specs</h2>
                        </div>
                        <div class="product-text">
                            <p class="product-spec-description">
                                <span class="desc-title">Processor: <?php echo $p["processor"]  ?></span>
                                <span class="desc-title">OS: <?php echo $p["os"]  ?></span>
                                <span class="desc-title">Graphics: <?php echo $p["graphics"]  ?></span>
                                <span class="desc-title">Memory: <?php echo $p["memory"]  ?></span>
                                <span class="desc-title">Display: <?php echo $p["screen"]  ?></span>
                            </p>
                            <p class="product-price">
                                Price: Rs.<?php echo $p["price"] ?>
                            </p>
                        </div>
                    </div>
                    <div class="add-to-cart">
                        <h5>Add To Cart</h5>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<script src="js/cart.js"></script>
<script src="js/product.js"></script>
