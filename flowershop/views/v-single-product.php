<main class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <img src="<?php echo htmlspecialchars($product->img); ?>" class="card-img-top" alt="...">
            </div>
            <div class="col-5">
                <h1 class="card-title mb-2 mt-1"><?php echo htmlspecialchars($product->title); ?></h1><hr>
                <p class="mb-5 mt-4"><?php echo htmlspecialchars($product->description); ?></p>
                <div>
                    <div class="input-group mb-2 mt-5">
                        <h4>PRICE: <?php echo htmlspecialchars($product->price); ?> $</h4>
                    </div>
                </div>
                <form method="post" class="d-flex col-7 mt-3">
                <h5 class="me-2">QUANTITY: </h5>
                    <div class="input-group mb-3">
                    <input type="number" class="form-control me-2" aria-label="Amount (to the nearest dollar)" name="quantity" value="1">
                    <input hidden name="product_id" value="<?php echo htmlspecialchars($product->id); ?>">
                    <button type="submit" class="btn btn-outline-success">Add to Cart</button>
                    <?php if(!empty($systemErrors['quantity'])) { ?>
                    <div class="error-msg text-danger">
                        <?php echo htmlspecialchars($systemErrors['quantity']) ?>
                    </div>
                    <?php } ?>
                    </div>
                </form>
                <div class="d-flex col-10 mt-5">
                    <a class="btn btn-outline-secondary me-2" href="./single-product-page.php?product=<?php echo htmlspecialchars($product->getPrevProductId()); ?>">Previous</a>
                    <a type="button" class="btn btn-outline-dark me-2" href="all-products-page.php">Back</a>
                    <a class="btn btn-outline-secondary me-2" href="./single-product-page.php?product=<?php echo htmlspecialchars($product->getNextProductId()); ?>">Next</a>
                </div>
            </div>
        </div>
        <div class="mt-5 mb-5">
        
        </div>
        <div class="row mt-5">
            <?php
            foreach ($relatedProducts as $singleRelated) { ?>
                <article class="single-product col-4 row mr-5 mt-5 ml-5 text-center">
                    <div class='col-7'>
                        <img src="<?php echo htmlspecialchars($singleRelated->img); ?>" alt="" width="200">
                    </div>
                    <div class='col-5'>
                        <h5><?php echo htmlspecialchars($singleRelated->title); ?></h5>
                        <p>PRICE: <?php echo htmlspecialchars($singleRelated->price); ?> $</p>
                        <a class="btn btn-outline-success" href="./single-product-page.php?product=<?php echo htmlspecialchars($singleRelated->id); ?>">Show Product</a>
                    </div>
                </article>
            <?php } ?>
        </div>
    </div>
</main>