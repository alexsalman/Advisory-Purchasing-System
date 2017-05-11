<!--Ali Ayad Hamza--> 
<!--ITE 410 Capstone-->
<!--November 13th, 2014-->
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Advisory Purchasing System</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="stylesheet" href="css/bootstrap.css" media="screen">
        <link rel="stylesheet" href="css/bootswatch.min.css">
    </head>
    <body>
        <div class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <a href="http://localhost/APS" class="navbar-brand">Advisory Purchasing System</a>
            </div>
          </div>
        </div>

        <div class="container">
        <div class="bs-docs-section">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="page-header">
              <h4 id="forms"><br />Welcome Admin</h4>
            </div>
          </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 navbar-left">
                <div class="well bs-component">
        <?php
                //form handler
                if (isset($_POST['login'])){       
                    $admin=$_POST['admin'];
                    $password=$_POST['password'];
                    if (!empty($admin)&&!empty($password)){
                        //to connect to mysql
                        $connection = mysql_connect("localhost","root","root");
                        $error = mysql_error();
                        if ($error){
                            echo $error;
                        }
                        else{
                            //to connect to the database
                            mysql_select_db("aps_db", $connection);
                            $error = mysql_error();
                            if ($error){
                                echo $error;
                            }
                            else{
                                $mysql_string = "SELECT admin, password FROM Administrator";
                                $result = mysql_query($mysql_string, $connection);
                                $found=0;
                                while($show = mysql_fetch_array($result)){
                                    if((strcmp($admin, $show[0])==0)&&(strcmp($password, $show[1])==0))
                                        $found=1;
                                }
                                if($found==1){
                                    ?>
                                    <form class="form-horizontal" method="post" action="http://localhost/APS/administrator.php" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <div class="col-lg-10 col-md-10 col-sm-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
                                              <input type="hidden" name="admin" value="<?php echo $admin; ?>">
                                              <button type="submit" name="login" class="btn btn-primary">Welcome <?php echo $admin; ?>! Click to Proceed</button>
                                            </div>
                                        </div>
                                    </form>
                                    
                                    <?php
                                    mysql_close($connection);
                                }
                                else{
                                    ?>
                                    <form class="form-horizontal" method="post" action="http://localhost/APS/adminlogin.php" enctype="multipart/form-data">
                                    <fieldset>
                                      <legend>Sign In</legend>
                                      <p>Invalid Admin Name or Password! Try Again</p>
                                      <div class="form-group">
                                        <label for="inputAdmin" class="col-lg-2 col-md-2 col-sm-2 control-label">Admin:</label>
                                        <div class="col-lg-10 col-md-10 col-sm-10">
                                          <input type="text" name="admin" value="<?php echo $admin; ?>" class="form-control" id="inputAdmin" placeholder="Enter Your Admin Name">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label for="inputPassword" class="col-lg-2 col-md-2 col-sm-2 control-label">Password:</label>
                                        <div class="col-lg-10 col-md-10 col-sm-10">
                                          <input type="password" name="password"  value="<?php echo $password; ?>" class="form-control" id="inputPassword" placeholder="Enter Your Password">
                                        </div>
                                      </div>
                                      
                                      <div class="form-group">
                                        <div class="col-lg-10 col-md-10 col-sm-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
                                          <button class="btn btn-default">Cancel</button>
                                          <button type="submit" name="login" class="btn btn-primary">Log In</button>
                                        </div>
                                      </div>
                                    </fieldset>
                                  </form>
                                    <?php
                                }
                            }
                        }
                    }
                    else{
            ?>
                        <!--reshow the form-->
                        <form class="form-horizontal" method="post" action="http://localhost/APS/adminlogin.php" enctype="multipart/form-data">
                        <fieldset>
                          <legend>Sign In</legend>
                          <p>Sorry! You Have To Fill Both Of The Fields!</p>
                          <div class="form-group">
                            <label for="inputAdmin" class="col-lg-2 col-md-2 col-sm-2 control-label">Admin:</label>
                            <div class="col-lg-10 col-md-10 col-sm-10">
                              <input type="text" name="admin" value="<?php echo $admin; ?>" class="form-control" id="inputAdmin" placeholder="Enter Your Admin Name">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputPassword" class="col-lg-2 col-md-2 col-sm-2 control-label">Password:</label>
                            <div class="col-lg-10 col-md-10 col-sm-10">
                              <input type="password" name="password"  value="<?php echo $password; ?>" class="form-control" id="inputPassword" placeholder="Enter Your Password">
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <div class="col-lg-10 col-md-10 col-sm-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
                              <button class="btn btn-default">Cancel</button>
                              <button type="submit" name="login" class="btn btn-primary">Log In</button>
                            </div>
                          </div>
                        </fieldset>
                      </form>
            <?php
                    }
                }
                else{
            ?> 
                    <!--show the form for the first time-->
                    <form class="form-horizontal" method="post" action="http://localhost/APS/adminlogin.php" enctype="multipart/form-data">
                    <fieldset>
                      <legend>Sign In</legend>
                      <div class="form-group">
                        <label for="inputAdmin" class="col-lg-2 col-md-2 col-sm-2 control-label">Admin:</label>
                        <div class="col-lg-10 col-md-10 col-sm-10">
                          <input type="text" name="admin" class="form-control" id="inputAdmin" placeholder="Enter Your Admin Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputPassword" class="col-lg-2 col-md-2 col-sm-2 control-label">Password:</label>
                        <div class="col-lg-10 col-md-10 col-sm-10">
                          <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Enter Your Password">
                        </div>
                      </div>
                    
                      <div class="form-group">
                        <div class="col-lg-10 col-md-10 col-sm-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
                          <button class="btn btn-default">Cancel</button>
                          <button type="submit" name="login" class="btn btn-primary">Log In</button>
                        </div>
                      </div>
                    </fieldset>
                  </form>
            <?php
                }
            ?>
                </div>
              </div>
            </div>

    </body>
</html>