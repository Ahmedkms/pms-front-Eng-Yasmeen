<?php
$title = "checkout" ;
if(session_status() == PHP_SESSION_NONE)session_start();
if(!isset($_SESSION['auth'])){
    header('location:../NavItem/login.php');
}
?>

<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Shop in style</h1>
            <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
        </div>
    </div>
</header>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-4">
                <div class="border p-2">
                    <div class="products">
                        <ul class="list-unstyled">
                            <li class="border p-2 my-1"> Product #1 -
                                <span class="text-success mx-2 mr-auto bold">2 x 25$</span>
                            </li>
                            <li class="border p-2 my-1"> Product #1 -
                                <span class="text-success mx-2 mr-auto bold">2 x 25$</span>
                            </li>
                            <li class="border p-2 my-1"> Product #1 -
                                <span class="text-success mx-2 mr-auto bold">2 x 25$</span>
                            </li>
                            <li class="border p-2 my-1"> Product #1 -
                                <span class="text-success mx-2 mr-auto bold">2 x 25$</span>
                            </li>
                            <li class="border p-2 my-1"> Product #1 -
                                <span class="text-success mx-2 mr-auto bold">2 x 25$</span>
                            </li>
                        </ul>
                    </div>
                    <h3>Total : 644 $</h3>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <form action="../handellers/handelchecked.php" method="POST" class="form border my-2 p-3">  
                        <div class="mb-3">
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="enter your name greater than 6 char">
                                </div>
                                <?php if(isset($_SESSION['name'])):?>
                              <h1 class="alert alert-danger" ><?=$_SESSION['name'] ; unset($_SESSION['name']);?></h1>
                              <?php endif;?>
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="enter your valid email">
                                </div>
                                <?php if(isset($_SESSION['email'])):?>
                                <h1 class="alert alert-danger" ><?=$_SESSION['email'];unset($_SESSION['email']);?></h1>
                                <?php endif;?>
                                <div class="mb-3">
                                    <label for="addr">Address</label>
                                    <input type="text" name="address" id="addr" class="form-control" placeholder="please enter right mail">
                                </div>
                                <?php if(isset($_SESSION['address'])):?>
                                <h1 class="alert alert-danger" ><?=$_SESSION['address']; unset($_SESSION['address']);?></h1>
                                <?php endif;?>
                                <div class="mb-3">
                                    <label for="tele">Phone</label>
                                    <input type="number" name="phone" id="tele" class="form-control" placeholder="enter correct number for contact you">
                                </div>
                                <?php if(isset($_SESSION['phone'])):?>
                                <h1 class="alert alert-danger" ><?=$_SESSION['phone']; unset($_SESSION['phone']);?></h1>
                                <?php endif;?>
                                <div class="mb-3">
                                    <label for="notes">Notes</label>
                                    <input type="text" name="note" id="notes" class="form-control" placeholder="optional">
                                </div>
                                <?php if(isset($_SESSION['note'])):?>
                                <h1 class="alert alert-danger" ><?=$_SESSION['note']; unset($_SESSION['note']); ?></h1>
                                <?php endif;?>
                               
                                
                                
                                <div class="mb-3">
                                    <input type="submit" value="Send" id="" class="btn btn-success">
                                </div>
                               
                            </div>
                          
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include('../inc/footer.php'); ?>