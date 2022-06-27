<main class="mt-5">
    <div class="container">
        <form action="shopping-cart-page.php" method="post" class="m-4">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; ?>
                    <?php foreach ($items as $item) { ?>
                        <?php
                            $subtotal = $item->getSubtotal();
                            $total += $subtotal;
                            ?>
                        <tr>
                            <td><input type="checkbox" name="remove[]" value="<?php echo htmlspecialchars($item->getProduct()->id); ?>"></td>
                            <td><?php echo htmlspecialchars($item->getProduct()->title); ?></td>
                            <td><?php echo htmlspecialchars($item->getProduct()->price); ?></td>
                            <td><?php echo htmlspecialchars($item->getQuantity()); ?></td>
                            <td><?php echo htmlspecialchars($subtotal); ?></td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td class="tg-0lax" colspan="3"></td>
                        <td class="tg-0lax">TOTAL</td>
                        <td class="tg-0lax"><?php echo htmlspecialchars($total); ?></td>
                    </tr>
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                <button class="btn btn-danger m-2" type="submit">Remove Selected</button>
                <a href="./checkout-page.php" class="btn btn-success m-2">Checkout</a>
            </div>
        </form>
    </div>
</main>