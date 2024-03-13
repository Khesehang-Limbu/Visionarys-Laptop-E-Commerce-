<?php $this->title = "Home"; ?>

<link href="css/home.css" rel="stylesheet" />
<div class="carousel">
    <div class="carousel-body">
        <div class="carousel-text">
            <h2>Purchase The Best Gaming Laptops At Reasonable Prices</h2>
        </div>

        <div class="carousel-image">
            <img src="images/carousel.png" alt="Carousel-Img" />
        </div>
    </div>

    <div class="dot-container">
        <div class="dot active"></div>
        <div class="dot"></div>
        <div class="dot"></div>
    </div>
</div>

<div class="best-deals">
    <div class="best-deal-header">
        <h2>Deals of the Month</h2>
    </div>

    <div class="grid-container">
        <?php foreach ($featured_products as $f) { ?>
            <div class="product">
                <input type="hidden" name="id" value="<?php echo $f['id'] ?>" />
                <div class="product-image">
                    <img src="<?php echo $f["feature_image"] ?>" alt="" />
                </div>

                <div class="product-specs">
                    <div class="product-title">
                        <h2><?php echo $f["title"] ?></h2>
                        <h2>Specs</h2>
                    </div>
                    <div class="product-text">
                        <p class="product-spec-description">
                            <span class="desc-title">Processor: <?php echo $f["processor"]  ?></span>
                            <span class="desc-title">OS: <?php echo $f["os"]  ?></span>
                            <span class="desc-title">Graphics: <?php echo $f["graphics"]  ?></span>
                            <span class="desc-title">Memory: <?php echo $f["memory"]  ?></span>
                            <span class="desc-title">Display: <?php echo $f["screen"]  ?></span>
                        </p>
                        <p class="product-price">
                            Price: Rs.<?php echo $f["price"] ?>
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

<!-- <script src="js/carousel.js"></script> -->
<script src="js/cart.js">
</script>
<script src="js/product.js">
</script>
