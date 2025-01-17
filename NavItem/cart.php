<?php 
$title = "Home" ;
if(session_status() == PHP_SESSION_NONE) session_start();
if(!isset($_SESSION['auth'])){
    header('location:../NavItem/login.php');
    exit;
}

$total_price = 0;

include('../inc/header.php'); 
include('../inc/navbar.php');
?>

<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Shop in style</h1>
            <p class="lead fw-normal text-white-50 mb-0">With this shop homepage template</p>
        </div>
    </div>
</header>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($_SESSION['cartdata']) && !empty($_SESSION['cartdata'])): ?>
                            <?php foreach($_SESSION['cartdata'] as $index => $product): 
                                $product_total = $product['product_price'] * $product['product_quantity'];
                                $total_price += $product_total;
                            ?>
                            <tr>
                                <th scope="row"><?= $index + 1 ?></th>
                                <td><?= htmlspecialchars($product['product_name']); ?></td>
                                <td><?= number_format($product['product_price'], 2); ?> $</td>
                                <td>
                                    <input type="number" value="<?= $product['product_quantity']; ?>" class="form-control" min="1">
                                </td>
                                <td><?= number_format($product_total, 2); ?> $</td>
                                <td>
                                    <a href="delete_product.php?product_id=<?= $product['product_id'] ;?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="4" class="text-end">Total Price</td>
                                <td colspan="1">
                                    <h3><?= number_format($total_price, 2); ?> $</h3>
                                </td>
                                <td>
                                    <a href="checkout.php" class="btn btn-primary">Checkout</a>
                                </td>
                            </tr>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">Your cart is empty!</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php include('../inc/footer.php'); ?>