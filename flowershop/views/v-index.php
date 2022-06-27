<main>
    <div class="container">
        <section class="mb-5">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="./public/theme/img/wallpapers/wp2.jpg" class="d-block w-100" alt="WALL">
                    </div>
                    <div class="carousel-item">
                        <img src="./public/theme/img/wallpapers/wp1.jpg" class="d-block w-100" alt="WALL">
                    </div>
                    <div class="carousel-item">
                        <img src="./public/theme/img/wallpapers/wp3.jpg" class="d-block w-100" alt="WALL">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
        <section class="mt-5">
            <div class="mb-5">
                <h1 class="pt-3">Best Sellers</h1>
            </div>
            <div class="row">
                <?php foreach ($mostProducts as $product) { ?>
                    <div class="col-3 p-2">
                        <a href="./single-product-page.php?product=<?php echo htmlspecialchars($product->id); ?>" class="text-decoration-none link-dark">
                            <div class="row">
                                <img src="<?php echo htmlspecialchars($product->img); ?>" class="col-12" alt="<?php echo htmlspecialchars($product->title); ?>">
                                <div class="col-12 mt-4">
                                    <h5><?php echo htmlspecialchars($product->title); ?></h5>
                                    <p><?php echo htmlspecialchars($product->price); ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </section>
    </div>

</main>