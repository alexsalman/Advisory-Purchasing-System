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
        <style>
            .sucess{
            color:#088A08;
            }
            .error{
            color:red;
            }
        </style>
    </head>
    <body>
      <?php
        if(isset($_POST['login'])){
          $admin=$_POST['admin'];
        }
      ?>
        <div class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="http://localhost/APS" class="navbar-brand">Advisory Purchasing System</a>
                </div>
                <div class="navbar-collapse collapse" id="navbar-main">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Welcome <?php echo $admin; ?></a></li>
                        <li><a href="http://localhost/APS/adminlogin.php">Log Out</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container">
        <div class="bs-docs-section">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="page-header">
                        <h4 id="forms"><br />Welcome to the Administrator Page</h4>
                    </div>
                </div>
            </div>
            
            <?php   
            //Adding a New Category
                if (isset($_POST['submitcategory'])){
                    $category=$_POST['category'];
                    $section=$_POST['section'];
                    $item=$_POST['item'];
                    $ia1=$_POST['ia1'];
                    $ia2=$_POST['ia2'];
                    $ia3=$_POST['ia3'];
                    $ia4=$_POST['ia4'];
                    $price=$_POST['price'];
                    $comments=$_POST['comments'];
                    if (!empty($category)&&!empty($section)&&!empty($item)&&!empty($ia1)&&!empty($ia2)&&
                        !empty($ia3)&&!empty($ia4)&&!empty($price)&&!empty($comments)){
                        //to connect to mysql
                        $connection = mysql_connect("localhost","root","root");
                        $error = mysql_error();
                        if ($error){
                            echo $error;
                        }
                        else{
                            mysql_select_db("aps_db", $connection);
                            $error = mysql_error();
                            if ($error){
                                echo $error;
                            }
                            else{
                                $sql = "CREATE TABLE $category 
                                (
                                $section VARCHAR(100),
                                $item VARCHAR(100),
                                $ia1 VARCHAR(100),
                                $ia2 VARCHAR(100),
                                $ia3 VARCHAR(100),
                                $ia4 VARCHAR(100),
                                $price VARCHAR(100),
                                $comments VARCHAR(100),
                                PID INT NOT NULL AUTO_INCREMENT, 
                                PRIMARY KEY(PID)
                                )";
                                mysql_query($sql, $connection);
                                $mysql_string = "INSERT INTO Categories (Category_Name) VALUES ('$category')";
                                mysql_query($mysql_string, $connection);
                                mysql_close($connection);
                            }
                        }
                    }
                    else{
        ?>
                        <div class="row">
                          <div class="col-lg-8 col-md-8 col-sm-8 col-md-8 col-sm-8 navbar-left">
                            <div class="well bs-component">
                                <!--reshow the form-->
                                <form class="form-horizontal" method="post" action="http://localhost/APS/administrator.php" enctype="multipart/form-data">
                                <fieldset>
                                  <legend>Add a New Category to Your Database</legend>
                                  <p>Sorry! You Have To Fill All The Fields!</p>
                                  <div class="form-group">
                                    <label for="catName" class="col-lg-2 col-md-2 col-sm-2 control-label">Category Name:</label>
                                    <div class="col-lg-10 col-md-10 col-sm-10">
                                      <input type="text" name="category" class="form-control" id="catName" placeholder="Enter Category Name" value="<?php echo $category; ?>">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="sectionName" class="col-lg-2 col-md-2 col-sm-2 control-label">Name of Section:</label>
                                    <div class="col-lg-10 col-md-10 col-sm-10">
                                      <input type="text" name="section" class="form-control" id="sectionName" placeholder="Enter Section Name" value="<?php echo $section; ?>">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="itemName" class="col-lg-2 col-md-2 col-sm-2 control-label">Name of Item:</label>
                                    <div class="col-lg-10 col-md-10 col-sm-10">
                                      <input type="text" name="item" class="form-control" id="sectionName" placeholder="Enter Item Name" value="<?php echo $item; ?>">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="at1Name" class="col-lg-2 col-md-2 col-sm-2 control-label">Item Attribute #1:</label>
                                    <div class="col-lg-10 col-md-10 col-sm-10">
                                      <input type="text" name="ia1" class="form-control" id="at1Name" placeholder="Enter Attribute 1 Name" value="<?php echo $ia1; ?>">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="at2Name" class="col-lg-2 col-md-2 col-sm-2 control-label">Item Attribute #2:</label>
                                    <div class="col-lg-10 col-md-10 col-sm-10">
                                      <input type="text" name="ia2" class="form-control" id="at2Name" placeholder="Enter Attribute 2 Name" value="<?php echo $ia2; ?>">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="at3Name" class="col-lg-2 col-md-2 col-sm-2 control-label">Item Attribute #3:</label>
                                    <div class="col-lg-10 col-md-10 col-sm-10">
                                      <input type="text" name="ia3" class="form-control" id="at3Name" placeholder="Enter Attribute 3 Name" value="<?php echo $ia3; ?>">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="at4Name" class="col-lg-2 col-md-2 col-sm-2 control-label">Item Attribute #4:</label>
                                    <div class="col-lg-10 col-md-10 col-sm-10">
                                      <input type="text" name="ia4" class="form-control" id="at4Name" placeholder="Enter Attribute 4 Name" value="<?php echo $ia4; ?>">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="itemPrice" class="col-lg-2 col-md-2 col-sm-2 control-label">Item Price:</label>
                                    <div class="col-lg-10 col-md-10 col-sm-10">
                                      <input type="text" name="price" class="form-control" id="itemPrice" placeholder="Enter Item Price" value="<?php echo $price; ?>">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="itemComments" class="col-lg-2 col-md-2 col-sm-2 control-label">Comments:</label>
                                    <div class="col-lg-10 col-md-10 col-sm-10">
                                      <input type="text" name="comments" class="form-control" id="itemComments" placeholder="Enter Comments" value="<?php echo $comments; ?>">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
                                      <button class="btn btn-default">Cancel</button>
                                      <button type="submit" name="submitcategory" class="btn btn-primary">Submit Your Category</button>
                                    </div>
                                  </div>
                                </fieldset>
                              </form>
                            </div>
                          </div>   
                        </div>
        <?php
                    }
                }
                else{
        ?> 
                    <!--show the form of creating a category table for the first time-->
                    <div class="row">
                      <div class="col-lg-8 col-md-8 col-sm-8 navbar-left">
                        <div class="well bs-component">
                            <!--show the form for the first time-->
                            <form class="form-horizontal" method="post" action="http://localhost/APS/administrator.php" enctype="multipart/form-data">
                            <fieldset>
                              <legend>Add a New Category to Your Database</legend>
                              <div class="form-group">
                                <label for="catName" class="col-lg-2 col-md-2 col-sm-2 control-label">Category Name:</label>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                  <input type="text" name="category" class="form-control" id="catName" placeholder="Enter Category Name">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="sectionName" class="col-lg-2 col-md-2 col-sm-2 control-label">Name of Section:</label>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                  <input type="text" name="section" class="form-control" id="sectionName" placeholder="Enter Section Name">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="itemName" class="col-lg-2 col-md-2 col-sm-2 control-label">Name of Item:</label>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                  <input type="text" name="item" class="form-control" id="sectionName" placeholder="Enter Item Name">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="at1Name" class="col-lg-2 col-md-2 col-sm-2 control-label">Item Attribute #1:</label>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                  <input type="text" name="ia1" class="form-control" id="at1Name" placeholder="Enter Attribute 1 Name">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="at2Name" class="col-lg-2 col-md-2 col-sm-2 control-label">Item Attribute #2:</label>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                  <input type="text" name="ia2" class="form-control" id="at2Name" placeholder="Enter Attribute 2 Name">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="at3Name" class="col-lg-2 col-md-2 col-sm-2 control-label">Item Attribute #3:</label>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                  <input type="text" name="ia3" class="form-control" id="at3Name" placeholder="Enter Attribute 3 Name">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="at4Name" class="col-lg-2 col-md-2 col-sm-2 control-label">Item Attribute #4:</label>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                  <input type="text" name="ia4" class="form-control" id="at4Name" placeholder="Enter Attribute 4 Name">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="itemPrice" class="col-lg-2 col-md-2 col-sm-2 control-label">Item Price:</label>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                  <input type="text" name="price" class="form-control" id="itemPrice" placeholder="Enter Item Price">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="itemComments" class="col-lg-2 col-md-2 col-sm-2 control-label">Comments:</label>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                  <input type="text" name="comments" class="form-control" id="itemComments" placeholder="Enter Comments">
                                </div>
                              </div>

                              <div class="form-group">
                                <div class="col-lg-10 col-md-10 col-sm-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
                                  <button class="btn btn-default">Cancel</button>
                                  <button type="submit" name="submitcategory" class="btn btn-primary">Submit Your Category</button>
                                </div>
                              </div>
                            </fieldset>
                          </form>
                        </div>
                      </div>   
                    </div>
        <?php
                }
//-----------------------------------------------------------------------------------------------------------------------------------------           
                //Categories 
                if (isset($_POST['cat'])){
                    //to connect to mysql
                    $connection = mysql_connect("localhost","root","root");
                    $error = mysql_error();
                    if ($error){
                        echo $error;
                    }
                    else{
                        mysql_select_db("aps_db", $connection);
                        $error = mysql_error();
                        if ($error){
                            echo $error;
                        }
                        else{
                            $queries = "SELECT Category_Name from Categories";
                            $result = mysql_query($queries, $connection);
                            $numrows = mysql_num_rows($result);
        ?>
                            <div class="row">
                              <div class="col-lg-8 col-md-8 col-sm-8 navbar-left">
                                <div class="well bs-component">
                                    <!--show the form for the first time-->
                                    <form method="post" action="<?php echo $_isset['submitchoice']?>" enctype="multipart/form-data">
                                    <fieldset>
                                      <legend>These are the categories in your databade: Click to add items.</legend>
        <?php
                                        for ( $i = 0; $i < $numrows; $i++ ) { 
                                            $row = mysql_fetch_row($result);
        ?>
                                          <div class="form-group">
                                            <div class="col-lg-10 col-md-10 col-sm-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
                                              <button type="submit" name="submitchoice" class="btn btn-primary" value="<?php echo $row[0] ; ?>"><?php echo $row[0]; ?></button><br><br>
                                            </div>
                                          </div>
        <?php
                                        }
        ?>
                                    </fieldset>
                                  </form>
                                </div>
                              </div>   
                            </div>
                            
        <?php
                        }       
                    }                       
                }
                else{
        ?>
                    <div class="row">
                      <div class="col-lg-8 col-md-8 col-sm-8 navbar-left">
                        <div class="well bs-component">
                            <!--show the form for the first time-->
                            <form class="form-horizontal" method="post" action="http://localhost/APS/administrator.php" enctype="multipart/form-data">
                            <fieldset>
                              <legend>Show Availiable Categories</legend>
                              <div class="form-group">
                                <div class="col-lg-10 col-md-10 col-sm-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
                                  <button class="btn btn-default">Cancel</button>
                                  <button type="submit" name="cat" class="btn btn-primary">Show Categories</button>
                                </div>
                              </div>
                            </fieldset>
                          </form>
                        </div>
                      </div>   
                    </div>
           
        <?php
                } 
                //clicking on a specific category
                if (isset($_POST['submitchoice'])){
                    $choice=$_POST['submitchoice'];
                    //to connect to mysql
                    $connection = mysql_connect("localhost","root","root");
                    $error = mysql_error();
                    if ($error){
                        echo $error;
                    }
                    else{
                        mysql_select_db("aps_db", $connection);
                        $error = mysql_error();
                        if ($error){
                            echo $error;
                        }
                        else{
                            $que = "SELECT * from $choice";
                            $res = mysql_query($que, $connection);
                            $numfields = mysql_num_fields($res);
                            $Array = array();
                            for ( $i = 0; $i < $numfields; $i++ ) { 
                                $name = mysql_field_name($res, $i);
                                $Array[$i]=$name;
                            }
                        }
                    }
                }
//-----------------------------------------------------------------------------------------------------------------------------------------
                //insert item
                if(isset($_POST['insertitem'])){
                    $h=0;
                    $handlers=array();
                    $note=array();       
                    foreach ($_POST as $key => $value) { 
                        $handlers[$h] = $value; 
                        $note[$h] = $key;
                        $h++;
                    }    
                        array_pop($handlers);//to get rid of the submit value
                        $number=end($handlers);
                        array_pop($handlers);
                        $choice=end($handlers);
                        if(!in_array("", $handlers)){
                            $connection = mysql_connect("localhost","root","root");
                            $error = mysql_error();
                            if ($error){
                                echo $error;
                            }
                            else{
                                mysql_select_db("aps_db", $connection);
                                $error = mysql_error();
                                if ($error){
                                    echo $error;
                                }
                                else{
                                    $addfield = "INSERT INTO $choice ($note[0],$note[1],$note[2],$note[3],$note[4],$note[5],$note[6],$note[7]) 
                                        VALUES ('$handlers[0]','$handlers[1]','$handlers[2]','$handlers[3]','$handlers[4]','$handlers[5]','$handlers[6]','$handlers[7]')";
                                    $result = mysql_query($addfield, $connection);
                                    $pid = "SELECT PID FROM $choice WHERE ($note[0]='$handlers[0]') AND ($note[1]='$handlers[1]') AND
                                                                            ($note[2]='$handlers[2]') AND ($note[3]='$handlers[3]') AND
                                                                            ($note[4]='$handlers[4]') AND ($note[5]='$handlers[5]') AND
                                                                            ($note[6]='$handlers[6]') AND ($note[7]='$handlers[7]')";
                                    $pidresult = mysql_query($pid, $connection);
                                    $showpidresult = mysql_fetch_row($pidresult);
                                }
                            }
                        }
                        else{
                        ?>
                          <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8 navbar-left">
                              <div class="well bs-component">
                                  <!--show the form again-->
                                  <form class="form-horizontal" method="post" action="http://localhost/APS/administrator.php" enctype="multipart/form-data">
                                  <fieldset>
                                    <legend><?php echo $choice; ?></legend>
                                    <p class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2">Sorry! Fill all the attributes, please.</p>
                                    <div class="form-group">
              <?php
                                    for ( $c = 0; $c < $number-1; $c++ ) {  
              ?>
                                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-lg-10 col-md-10 col-sm-10">
                                          <input type="text" name="<?php echo $note[$c]; ?>" class="form-control" id="catName" value="<?php echo $handlers[$c]; ?>" placeholder="<?php echo $note[$c] ?>">
                                        </div><br><br><br>
                                    <?php
                                    }
                                    ?>
                                          <input type="hidden" name="numfields" value="<?php echo $number; ?>"/>
                                          <button class="btn btn-default col-lg-offset-2 col-md-offset-2 col-sm-offset-2">Cancel</button>
                                          <input type="submit" name="insertitem" class="btn btn-primary" value="submit your new item"/>
                                        </div>
                                  </fieldset>
                                </form>
                              </div>
                            </div>   
                          </div>
        <?php
                        }
                }   

                else{
        ?>
                    <div class="row">
                      <div class="col-lg-8 col-md-8 col-sm-8 navbar-left">
                        <div class="well bs-component">
                            <!--show the form for the first time-->
                            <form class="form-horizontal" method="post" action="http://localhost/APS/administrator.php" enctype="multipart/form-data">
                            <fieldset>
                              <legend><?php echo $choice; ?></legend>

                              <div class="form-group">
        <?php
                              for ( $j = 0; $j < $numfields-1; $j++ ) {
        ?>
                                  <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-lg-10 col-md-10 col-sm-10">
                                    <input type="text" name="<?php echo $Array[$j] ?>" class="form-control" id="catName" placeholder="<?php echo $Array[$j] ?>">
                                  </div><br><br><br>
                              <?php
                              }
                              ?>
                                
                                    <input type="hidden" name="choice" value="<?php echo $choice; ?>" />
                                    <input type="hidden" name="numfields" value="<?php echo $numfields; ?>"/>
                                    <button class="btn btn-default col-lg-offset-2 col-md-offset-2 col-sm-offset-2">Cancel</button>
                                    <input type="submit" name="insertitem" class="btn btn-primary" value="submit your new item"/>
                                  </div>
                            </fieldset>
                          </form>
                        </div>
                      </div>   
                    </div>
        <?php
                }
//-----------------------------------------------------------------------------------------------------------------------------------------
                //Upload Photo
        ?>

                <div class="row">
                  <div class="col-lg-8 col-md-8 col-sm-8 navbar-left">
                    <div class="well bs-component">
                        <!--show the form for the first time-->
                        <form class="form-horizontal" method="post" action="http://localhost/APS/administrator.php" enctype="multipart/form-data">
                        <fieldset>
                          <legend>Upload a Photo</legend>
                          <div class="form-group">
                            <div class="col-lg-10 col-md-10 col-sm-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
                              <label for="file"></label><br>
                              <input type="file" name="file" id="file" class="form-control"><br>
                              <input type="hidden" name="pidname" value="<?php echo $showpidresult[0].$choice; ?>" class="form-control" >
                              <input type="submit" name="submitphoto" value="Submit" class="btn btn-primary" class="form-control" >
                            </div>
                          </div>
                        </fieldset>
                      </form>
                    </div>
                  </div>   
                </div>

        <?php
                if(isset($_POST['submitphoto'])){
                    $newname=$_POST['pidname'];
                    $file_exts = array("jpg", "bmp", "jpeg", "gif", "png");
                    $upload_exts = end(explode(".", $_FILES["file"]["name"]));
                    if ((($_FILES["file"]["type"] == "image/gif")
                        || ($_FILES["file"]["type"] == "image/jpeg")
                        || ($_FILES["file"]["type"] == "image/png")
                        || ($_FILES["file"]["type"] == "image/pjpeg"))
                        && ($_FILES["file"]["size"] < 2000000)
                        && in_array($upload_exts, $file_exts)){
                        if ($_FILES["file"]["error"] > 0){
                            echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                        }
                        else{
                            $path=pathinfo($_FILES["file"]["name"]);
                            $extension=$path['extension'];
                            $photoname=$newname.".".$extension;
                 
                            if (file_exists("/Library/WebServer/Documents/APS/files/".$photoname)){
                                echo "<div class='error'>"."(".$_FILES["file"]["name"].")"." already exists. "."</div>";
                            }
                            else{
                                move_uploaded_file($_FILES["file"]["tmp_name"],"/Library/WebServer/Documents/APS/files/".$photoname);
                            }
                        }
                    }
                    else{
                        echo "<div class='error'>Invalid file</div>";
                    }
                }
        ?>
    </body>
</html>