<main class="mt-5">
    <div class="container">
        <form class="row" action="./all-products-page.php" method="get">
            <div class="col-2">
                <select name="sort" class="form-select">
                    <option <?php
                            if ($sort == "") {
                                echo htmlspecialchars("Selected");
                            } ?> value="">None</option>
                    <option <?php if ($sort == \Models\Product\Product::ORDER_BY_PRICE_ASC) {
                                echo htmlspecialchars("Selected");
                            } ?> value="<?php echo htmlspecialchars(\Models\Product\Product::ORDER_BY_PRICE_ASC); ?>">By price asc</option>
                    <option <?php if ($sort == \Models\Product\Product::ORDER_BY_PRICE_DESC) {
                                echo htmlspecialchars("Selected");
                            } ?> value="<?php echo htmlspecialchars(\Models\Product\Product::ORDER_BY_PRICE_DESC); ?>">By price desc</option>
                </select>
            </div>
            <div class="col-5"></div>
            <input class="col-3 me-2" type="text" name="term" value="<?php echo htmlspecialchars($term); ?>">
            <button type="submit" class="btn btn-outline-primary col-1">Search</button>
            <hr class="mt-3">
        </form>
        <div class="row">
            <?php foreach ($products as $product) { ?>
                <article class="single-product col-4 row mb-5 mt-5">
                    <div class='col-12 text-center'>
                        <a href="./single-product-page.php?product=<?php echo htmlspecialchars($product->id) ?>">
                            <img src="<?php echo htmlspecialchars($product->img); ?>" alt="" width="260">
                        </a>
                    </div>
                    <div class='col-12 text-center mt-2'>
                        <a href="./single-product-page.php?product=<?php echo htmlspecialchars($product->id) ?>" class="text-decoration-none link-dark">
                            <h4><?php echo htmlspecialchars($product->title); ?></h4>
                        <p>PRICE: <?php echo htmlspecialchars($product->price); ?> $</p>
                        </a>
                        <button form="add-to-cart-<?php echo htmlspecialchars($product->id); ?>" class="btn btn-outline-success">Add to Cart</button>
                        <form id="add-to-cart-<?php echo htmlspecialchars($product->id); ?>" action="./all-products-page.php" method="post">
                            <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product->id); ?>">
                        </form>
                    </div>
                </article>
            <?php } ?>
        </div>
        <div class="text-center">
            <nav aria-label="Page navigation example">
                <form action="./all-products-page.php" method="get">
                <ul class="pagination d-flex justify-content-center">
                    <?php for($i=1; $i<=$numberOfPages; $i++) {
                        echo "<li class=\"page-item\"><button class=\"page-link ";
                        if ($pagPage == $i) echo "active";
                        echo "\" name=\"page\" value=\"$i\">$i</button></li>";
                    } ?>
                </ul>
                <?php if ($term != "") { ?>
                <input type="hidden" name="term" value="<?php echo $term; ?>">
                <?php } ?>
                <?php if ($sort != "") { ?>
                <input type="hidden" name="sort" value="<?php echo $sort; ?>">
                <?php } ?>
                </form>
            </nav>
        </div>
    </div>
</main>