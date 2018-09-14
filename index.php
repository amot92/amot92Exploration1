<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    
<!--    https://getbootstrap.com/docs/4.1/getting-started/introduction/#responsive-meta-tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
</head>
    
<body>
    <h1 class="text-center">Exploration 1</h1>
    
<!--    https://getbootstrap.com/docs/4.0/components/jumbotron/-->
    <div class="jumbotron">
        
<!--        https://getbootstrap.com/docs/4.0/layout/overview/#containers-->
        <div class="container-fluid">
            
<!--            https://getbootstrap.com/docs/4.1/layout/grid/-->
            <div class="row">
                
<!--                left column-->
                <div class="col-lg">
                    <span><img src="bootstrap.png" class="img-responsive" alt="noimage" style="width:420px;height:420px;"/></span>
                </div>
                
<!--                right column-->
                <div class="col-lg">
                    <form action="login.php" method="POST">
                        <br>
                        <h2>Login</h2>
                        <br>
                        <?php
                        if ($error) print "<div>$error</div>\n";
                        ?>
                        <input type="hidden" name="action" value="do_login">
                        
                        
                        <div class="box">
<!--                            https://getbootstrap.com/docs/4.0/components/forms/#form-groups-->
                            <div class="form-group row">
                                <label for="loginUsername" class="col-lg-2 col-form-label">Username:</label>
                                
<!--                                create a column to set input width-->
                                <div class="col-lg-5">
                                    <input type="text" id="loginUsername" name="loginUsername" autofocus placeholder="Username" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="loginPassword" class="col-lg-2 col-form-label">Password:</label>
                                
<!--                                create a column to set input width-->
                                <div class="col-lg-5">
                                     <input type="password" id="loginPassword" name="loginPassword" placeholder="Password" class="form-control">
                                </div>
                            </div>
                            
                            <button class="btn btn-success full-width py-1 my-3"><span>Login</span></button>
                        </div>
                    </form>
                    <button class="btn-sm btn-secondary" data-toggle="modal" data-target="#createUserModal">Register</button>
                </div>
            </div>
        </div>
    </div>
    
<!--    include modal-->
    <?php include("templates/createUserModal.template"); ?>
<!--    jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<!--    Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</body>
</html>


