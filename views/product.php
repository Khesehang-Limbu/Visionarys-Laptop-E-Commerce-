<style>
    #product {
        padding: 3% 10%;
    }

    #product .grid-container:first-child {
        grid-template-columns: 1fr 1fr;
    }

    #product .product-desc-table {
        justify-content: unset;
    }

    .active {
        border-bottom: 3px solid blue;
    }

    #product .table-nav {
        margin-bottom: 15px;
    }

    #product .table-nav a {
        color: var(--primary-color);
        margin-right: 15px;
        font-size: 1.5rem;
        font-weight: 600;
        padding-bottom: 5px;
        line-height: 2;
    }

    #specs {
        border-collapse: collapse;
    }

    #specs tr {
        border-bottom: 1px solid rgba(0, 0, 0, 0.3);
    }

    #specs tr td {
        padding-bottom: 5px;
        line-height: 1.5;
        font-size: 1.25rem;
    }

    #specs tr td:first-child {
        font-weight: 600;
    }

    #desc p {
        font-size: 1.5rem;
        text-align: justify;
    }
</style>
<section id="product">
    <div class="product-container">
        <div class="grid-container row">
            <div class="col">
                <img src="<?php echo $product->feature_image; ?>" alt="product_image" />
            </div>
            <div class="col">
                <h1><?php echo $product->title; ?></h1>
                <p>Price: Rs. <?php echo $product->price; ?></p>
                <div class="product_quantity">
                    <i class="fa-solid fa-minus"></i>
                    <input type="number" name="product_quantity" value="1" />
                    <i class="fa-solid fa-plus"></i>
                </div>
                <button class="btn btn-primary">Add to Cart</button>
            </div>
        </div>

        <div class="product-desc-table grid-container">
            <div class="table-nav">
                <a href="#spec" class="active">Specs</a>
                <a href="#desc">Description</a>
            </div>

            <table id="specs">
                <tbody>
                    <?php
                    $not_specs = array('id', 'title', 'description', 'category', 'vendor', 'feature_image', 'is_featured', 'errors');

                    foreach ($product as $key => $value) {
                        if (!in_array($key, $not_specs)) {
                    ?>
                            <tr>
                            <td style="text-transform: capitalize;"><?php echo $key; ?></td>
                            <td><?php echo $value; ?></td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>

            <div id="desc">
            <p><?php echo $product->description; ?></p>
            </div>
        </div>
    </div>
</section>

<script type="javascript">
    const specs_table = document.querySelector(".product-desc-table");
    const table_navs = specs_table.querySelector(".table-nav a");

    table_nav.forEach();
</script>
