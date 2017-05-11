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
        <style type="text/css">
          .font{
            font-family: liSong PRO;
            font-size: 16px;
          }
          .fontheader{
            font-family: superclarendon;
          }
          .fix{
            position: fixed;
          }
          .bold{
            font-style: italic;
            font-weight: bold;
          }
          body {
              background-color: black;
          }
        </style>
	</head>

	<body>
    <?php
      if(isset($_POST['submithome'])||isset($_POST['submitchoice'])){
        $username=$_POST['username'];
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
            if(isset($_POST['submitchoice'])){
              $username=$_POST['username'];
              $usergender=$_POST['usergender'];
              $userage=$_POST['userage'];
              $userincome=$_POST['userincome'];
              $catname=$_POST['catname'];
              $itemkind=$_POST['itemkind'];
              $itemname=$_POST['itemname'];
              $itemat1=$_POST['itemat1'];
              $itemat2=$_POST['itemat2'];
              $itemat3=$_POST['itemat3'];
              $itemat4=$_POST['itemat4'];
              $itemprice=$_POST['itemprice'];

//inserting an item if it's liked and is not found in the Users_Choices table
              $result = "SELECT * FROM Users_Choices WHERE (name='$username') AND (itemname='$itemname')";
              $exist = mysql_query($result,$connection);
                if (!mysql_fetch_row($exist)){
                    $mysql_string_input_choices = "INSERT INTO Users_Choices (name,gender,age,income,catname,itemkind,itemname,
                                                                             itemat1,itemat2,itemat3,itemat4,itemprice)
                                                                      VALUES ('$username','$usergender','$userage','$userincome','$catname','$itemkind',
                                                                            '$itemname','$itemat1','$itemat2','$itemat3','$itemat4','$itemprice')";
                    mysql_query($mysql_string_input_choices, $connection);   
                }
              
//----------------------------------------------------------------------------
            }
            echo "<br><br><br>";
//--Start The Main Project Algorithm---------------------------------------------------------------------------------------------------------------------
            ?>
            <div class="jumbotron col-lg-2 col-md-2 col-sm-2 col-xs-2 fix">
              <?php
              $mysql_string_likes = "SELECT count(name),gender,age,income FROM Users_Choices WHERE name='$username'";
              $no_of_likes = mysql_query($mysql_string_likes, $connection);
              $no_of_likes_result = mysql_fetch_row($no_of_likes);
              if($no_of_likes_result[0]>2){
                $mysql_string_output_choices = "SELECT * FROM Users_Choices WHERE (name!='$username') AND
                                                                                  (gender='$no_of_likes_result[1]') AND
                                                                                  (age >= '$no_of_likes_result[2]'-5) AND 
                                                                                  (age <= '$no_of_likes_result[2]'+5) AND
                                                                                  (income<('$no_of_likes_result[3]'+'$no_of_likes_result[3]'))";
                $advicelist=mysql_query($mysql_string_output_choices, $connection);
                $string_catgs="SELECT Category_Name FROM Categories";
                $catgs=mysql_query($string_catgs, $connection);
                echo "<div class='fontheader'>"."Our Advisory!"."</div><br>";
                while($catg = mysql_fetch_row($catgs)){
                  if($catg[0]!=''){
                    $maxprice=0;
                    $advicelist=mysql_query($mysql_string_output_choices, $connection);
                    while ($advice=mysql_fetch_row($advicelist)) {
                      if($advice[0]!=$username && $advice[6]!=$itemname && $advice[4]==$catg[0]){
                        $pricevalue = ltrim ($advice[11], '$');
                        if($maxprice<$pricevalue){
                          $maxprice=$pricevalue;
                        }    
                      }
                    }
                    $advicelist=mysql_query($mysql_string_output_choices, $connection);
                    $_NO1='';
                    while ($advice=mysql_fetch_row($advicelist)){
                      if ($advice[0]!=$username && $advice[11]==('$'.$maxprice)){
                        if(strcmp($_NO1,$advice[4].$advice[5].$advice[6].$advice[11])!=0){
                          echo "<div class='bold'>".$advice[4].'</div><br>'.$advice[5].'<br>'.$advice[6].'<br>'.$advice[11].'<br><br>';
                          $_NO1=$advice[4].$advice[5].$advice[6].$advice[11];
                        }
                      }
                    }
                  }
                }
              }
              else{
                echo 'Hi '.$username. ', this is your first time in our system. Please, like at least three items to get advice!';
              }
              ?>
            </div>
            <div class="jumbotron col-lg-offset-10 col-md-offset-10 col-sm-offset-10 col-xs-offset-10 col-lg-2 col-md-2 col-sm-2 col-xs-2 fix">
              <?php
                echo "<div class='fontheader'>"."- Recently Added -"."</div><br>";
                $string_catges="SELECT Category_Name FROM Categories";
                $catges=mysql_query($string_catges, $connection);
                while($catge = mysql_fetch_row($catges)){
                  $pid=0;
                  $newname='';
                  $pickrows = "SELECT * FROM $catge[0]";
                  $pick = mysql_query($pickrows, $connection);
                  while($record = mysql_fetch_row($pick)){
                    if($pid<$record[8]){
                      $pid=$record[8];
                      $newname=$record[1];
                    }
                  }
                  $pic=$pid.$catge[0];
                  $image = glob("/Library/WebServer/Documents/APS/files/"."$pic.*");
                  $path = pathinfo($image[0]);
                  echo '<br><br>'.$newname;
                  echo '<img class="col-lg-12 col-md-12 col-sm-12 col-xs-12 img-circle" src="'."http://localhost/APS/files/".$path['basename'].'" alt="No Photo Available" width="160" height="120" >';
                }                 
              ?>
            </div>
            <?php
//--End The Main Project Algorithm-----------------------------------------------------------------------------------------------------------------------

            //user
            $mysql_string = "SELECT gender,age,income FROM Users WHERE name='$username'";
            $userresult = mysql_query($mysql_string, $connection);
            $userinfo = mysql_fetch_row($userresult);
            //cats
            $mysql_string_cats = "SELECT Category_Name FROM Categories";
            $resultcats = mysql_query($mysql_string_cats, $connection);
            //cat
            while($catsinfo = mysql_fetch_row($resultcats)){
              $mysql_string_cat = "SELECT * FROM $catsinfo[0]";
              $resultcat = mysql_query($mysql_string_cat, $connection);
              while($catinfo = mysql_fetch_row($resultcat)){
                ?>

                  <div class="jumbotron col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-3 col-lg-6 col-md-6 col-sm-6 col-xs-6 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-3 well well-sm">
                    <h4><?php echo "<div class='fontheader'>".$catsinfo[0]." - ".$catinfo[0]."</div>"; ?></h4>
                    <h5 class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><?php echo "<div class='font'>".$catinfo[1]." - "."<span class='label label-primary'>$catinfo[6]</span></div>"."<br><br> - ".$catinfo[2]."<br> - ".$catinfo[3]."<br> - "
                                                          .$catinfo[4]."<br> - ".$catinfo[5]."<br><br>".$catinfo[7]?></h5>
                <?php
                    $imagename=$catinfo[8].$catsinfo[0]; 
                    $image = glob("/Library/WebServer/Documents/APS/files/"."$imagename.*");
                    $path = pathinfo($image[0]);
                    echo '<img class="col-lg-6 col-md-6 col-sm-6 col-xs-6 img-circle" src="'."http://localhost/APS/files/".$path['basename'].'" alt="No Photo Available" width="200" height="200" >';
                ?>  <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       <form method="post" action="http://localhost/APS/home.php" enctype="multipart/form-data">
                        <input type="hidden" name="username" value="<?php echo $username; ?>">
                        <input type="hidden" name="usergender" value="<?php echo $userinfo[0]; ?>">
                        <input type="hidden" name="userage" value="<?php echo $userinfo[1]; ?>">
                        <input type="hidden" name="userincome" value="<?php echo $userinfo[2]; ?>">
                        <input type="hidden" name="catname" value="<?php echo $catsinfo[0]; ?>">
                        <input type="hidden" name="itemkind" value="<?php echo $catinfo[0]; ?>">
                        <input type="hidden" name="itemname" value="<?php echo $catinfo[1]; ?>">
                        <input type="hidden" name="itemat1" value="<?php echo $catinfo[2]; ?>">
                        <input type="hidden" name="itemat2" value="<?php echo $catinfo[3]; ?>">
                        <input type="hidden" name="itemat3" value="<?php echo $catinfo[4]; ?>">
                        <input type="hidden" name="itemat4" value="<?php echo $catinfo[5]; ?>">
                        <input type="hidden" name="itemprice" value="<?php echo $catinfo[6]; ?>">
                        <br>
                        <input type="submit" name="submitchoice" class="btn btn-primary btn-lg-1" value="Like"/>
                       </form>
                    </div>
                  </div>
                <?php
              }
            }
          }
        }
      }
      
    ?>
        <div class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <a href="http://localhost/APS/home.php" class="navbar-brand">Advisory Purchasing System</a>
            </div>
            <div class="navbar-collapse collapse" id="navbar-main">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Welcome <?php echo $username; ?></a></li>
                <li><a href="http://localhost/APS/">Log Out</a></li>
              </ul>
            </div>
          </div>
        </div>
    
	</body>
</html>