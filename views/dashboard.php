<?php

use evil\phpmvc\form\Form;

$this->title = "Admin Dashboard";
?>

<section class="section-dashboard">
    <div class="left-sidebar">
        <div class="logo">
            <img src="images/Logo.png" alt="Logo" />
        </div>

        <ul class="menu">
            <li><a href="#vendor_list">Vendor List</a></li>
            <li><a href="#vendor_create">Vendor Create</a></li>
            <li><a href="#category_list">Category List</a></li>
            <li><a href="#category_create">Category Create</a></li>
            <li><a href="#list">Product List</a></li>
            <li><a href="#create">Product Create</a></li>
            <li>
                <a href="logout">Logout</a>
            </li>
        </ul>
    </div>

    <div class="menu-content" id="vendor_list">
        <h2 class="title-list">Vendor List</h2>

        <table>
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Vendor Name</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($vendors as $v) {
                ?>
                    <tr>
                        <td> <?php echo $i++; ?></td>
                        <td><?php echo $v["name"] ?></td>
                        <td>
                            <a href="">Edit</a>
                        </td>
                        <td>
                            <a href="">Delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="menu-content" id="vendor_create">
        <h2 class="title-list">Vendor Create</h2>
        <div class="form-container">
            <?php $form = Form::begin("post", "", "multipart-form-data"); ?>
            <input type="hidden" name="form_name" value="vendor_create" />
            <?php echo $form->field($vendor, "name") ?>
            <button class="btn btn-primary-outline" type="submit">Create</button>
            <?php Form::end(); ?>
        </div>
    </div>

    <div class="menu-content" id="category_list">
        <h2 class="title-list">Category List</h2>

        <table>
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Category Name</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($categories as $c) {
                ?>
                    <tr>
                        <td>1</td>
                        <td><?php echo $c["name"] ?></td>
                        <td>
                            <a href="">Edit</a>
                        </td>
                        <td>
                            <a href="">Delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="menu-content" id="category_create">
        <h2 class="title-list">Category Create</h2>
        <div class="form-container">
            <?php $form = Form::begin("post", "", "multipart-form-data"); ?>
            <input type="hidden" name="form_name" value="category_create" />
            <?php echo $form->field($category, "name") ?>
            <?php echo $form->field($category, "description") ?>
            <button class="btn btn-primary-outline" type="submit">Create</button>
            <?php Form::end(); ?>
        </div>
    </div>

    <div class="menu-content" id="list">
        <h2 class="title-list">Product List</h2>

        <table>
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Vendor</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $p) { ?>
                    <tr>
                        <td><?php echo $p["id"] ?></td>
                        <td><?php echo $p["title"] ?></td>
                        <td><?php echo $p["price"] ?></td>
                        <td><?php echo $p["name"] ?></td>
                        <td>
                            <a href="">Edit</a>
                        </td>
                        <td>
                            <a href="">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="menu-content" id="create">
        <h2 class="title-list">Product Create</h2>
        <div class="form-container">
            <?php $form = Form::begin("post", "", "multipart/form-data"); ?>
            <input type="hidden" name="form_name" value="product_create" />
            <?php echo $form->selectField($product, "category", $categories) ?>
            <?php echo $form->selectField($product, "vendor", $vendors) ?>
            <?php echo $form->field($product, "title"); ?>
            <?php echo $form->field($product, "feature_image")->imageField() ?>
            <?php echo $form->field($product, "price")->numberField(); ?>
            <?php echo $form->field($product, "processor"); ?>
            <?php echo $form->field($product, "graphics"); ?>
            <?php echo $form->field($product, "memory"); ?>
            <?php echo $form->field($product, "storage"); ?>
            <?php echo $form->field($product, "os"); ?>
            <?php echo $form->field($product, "screen"); ?>
            <?php echo $form->textArea($product, "description"); ?>
            <?php echo $form->field($product, "is_featured")->checkBoxField(); ?>
            <button class="btn btn-primary-outline" type="submit">Create</button>
            <?php Form::end(); ?>
        </div>
    </div>
</section>


<script>
    const menu_items = document.querySelectorAll(".menu li a");
    const menu_contents = document.querySelectorAll(".menu-content");

    menu_contents.forEach(content => {
        content.classList.add("hide");
    });

    current_url = window.location.pathname + window.location.hash;;

    if (current_url.includes("#")) {
        menu_contents.forEach(item => {
            if (current_url.includes("category_list")) {
                if (item.getAttribute("id") === "category_list") {
                    item.classList.remove("hide");
                }
            } else if (current_url.includes("category_create")) {
                if (item.getAttribute("id") === "category_create") {
                    item.classList.remove("hide");
                }
            } else if (current_url.includes("list")) {
                if (item.getAttribute("id") === "list") {
                    item.classList.remove("hide");
                }
            } else if (current_url.includes("create")) {
                if (item.getAttribute("id") === "create") {
                    item.classList.remove("hide");
                }
            }
        });
    }

    menu_items.forEach(item => {
        item.addEventListener("click", function() {
            menu_contents.forEach(content => {
                if (item.innerHTML === content.querySelector("h2.title-list").innerHTML && content.classList.contains("hide")) {
                    content.classList.remove("hide");
                } else {
                    content.classList.add("hide");
                }
            });
        });
    });

    const product_form_last_field = document.querySelector("#create div.form-field input[type=checkbox]").parentElement;
    product_form_last_field.querySelector("label").setAttribute("style", "width : fit-content;");
    product_form_last_field.querySelector("input").setAttribute("style", "width : fit-content;");


    /*
    const category_form = document.querySelector("#category_create form");
    category_form.addEventListener("submit", function(event) {
        event.preventDefault();

        const form_data = new FormData(this);

        const loadingDiv = category_form.querySelector(".loading");
        loadingDiv.style.display = 'block';

        const xhttp = new XMLHttpRequest();

        xhttp.open("POST", "/create_category");

        xhttp.onload = function() {
            if (xhttp.status === 200) {
                var resultDiv = document.getElementById('result');
                resultDiv.innerHTML = xhttp.responseText;
            } else {
                console.error('Error:', xhttp.statusText);
                var resultDiv = document.getElementById('result');
                resultDiv.innerHTML = 'An error occurred while submitting the form.';
            }
            loadingDiv.style.display = 'none';
        };

        xhttp.onerror = function() {
            console.error('Request failed');
            var resultDiv = document.getElementById('result');
            resultDiv.innerHTML = 'An error occurred while submitting the form.';
            loadingDiv.style.display = 'none';
        };

        xhttp.send(form_data);
    });
    */
</script>
