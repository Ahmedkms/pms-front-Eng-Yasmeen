<?php
$title ="login_page" ;
include ('../inc/header.php');
include ('../inc/navbar.php');
?>
         <div class="container">
                <div class="row">
                <div class="col-8 mx-auto">
                        
                        <h2 class="bold">login</h2>
                        
                       
                        <form action="../handellers/handel_login.php" method="POST" class="form border my-2 p-3">  
                        <div class="mb-3">
                                <div class="mb-3">
                                    <label for="email">EMAIL</label>
                                    <input type="text" name="email" id="email" class="form-control" placeholder="enter your valid email">
                                </div>
                           
                                <div class="mb-3">
                                    <label for="pass">Email</label>
                                    <input type="password" name="password" id="pass" class="form-control" placeholder="enter your valid password">
                                </div>
                               
                                
                                <div class="mb-3">
                                    <input type="submit" value="login"  class="btn btn-success">
                                    <p>if you have not account >> <a href="register.php">register </a></p>
                                </div>
                               
                            </div>
                          
                            
                        </form>
                    </div>
                </div>
            </div>
</section>

<?php include '../inc/footer.php' ?>