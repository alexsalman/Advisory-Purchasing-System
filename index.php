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
              <h4 id="forms"><br />It does not take time. It does not require you to write reviews.<br /><br />
                                Just like the things you like, and get the advice you wish to have.</h4>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 navbar-right">
            <div class="well bs-component">
    <?php
            //form handler
            if (isset($_POST['submit'])){       
                $name=$_POST['name'];
                $password=$_POST['password'];
                $gender=$_POST['gender'];
                $age=$_POST['age'];
                $income=$_POST['income'];
                if (!empty($name)&&!empty($password)&&!empty($gender)&&!empty($age)&&!empty($income)){
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
//---------------checking and inserting--------------------
                        else{
                            $mysql_string = "SELECT name FROM Users";
                            $result = mysql_query($mysql_string, $connection);
                            $found=0;
                            while($show = mysql_fetch_array($result)){
                                if((strcmp($name, $show[0])==0))
                                    $found=1;
                            }
                            if($found==0){
                                $mysql_string = "INSERT INTO Users (name,password,gender,age,income) VALUES ('$name','$password','$gender','$age','$income')";
                                $result = mysql_query($mysql_string, $connection);
                                echo "Thank you for registration. Re-Enter your user and password to login.<br/>";                               
                                mysql_close($connection);
                            }
                            else{
                                echo "The Username is Already Exist! Try Again";
                                ?>
                                <form class="form-horizontal" method="post" action="http://localhost/APS/index.php" enctype="multipart/form-data">
                                <fieldset>
                                  <legend>Sign Up</legend>
                                  <div class="form-group">
                                    <label for="inputUser" class="col-lg-2 col-md-2 col-sm-2 control-label">User Name</label>
                                    <div class="col-lg-10 col-md-10 col-sm-10">
                                      <input type="text" name="name" class="form-control" id="inputUser" placeholder="Enter Your Username">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="inputPassword" class="col-lg-2 col-md-2 col-sm-2 control-label">Password</label>
                                    <div class="col-lg-10 col-md-10 col-sm-10">
                                      <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Enter Password">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-lg-2 col-md-2 col-sm-2 control-label">Gender</label>
                                    <div class="col-lg-10 col-md-10 col-sm-10">
                                      <div class="radio">
                                        <label>
                                          <input type="radio" name="gender" id="optionsRadios1" value="male">
                                          Male
                                        </label>
                                      </div>
                                      <div class="radio">
                                        <label>
                                          <input type="radio" name="gender" id="optionsRadios2" value="female">
                                          Female
                                        </label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="select" class="col-lg-2 col-md-2 col-sm-2 control-label">Age</label>
                                    <div class="col-lg-10 col-md-10 col-sm-10">
                                      <select class="form-control" id="select" name="age">
                                        <option value="">-Select Your Age-</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                        <option value="31">31</option>
                                        <option value="32">32</option>
                                        <option value="33">33</option>
                                        <option value="34">34</option>
                                        <option value="35">35</option>
                                        <option value="36">36</option>
                                        <option value="37">37</option>
                                        <option value="38">38</option>
                                        <option value="39">39</option>
                                        <option value="40">40</option>
                                        <option value="41">41</option>
                                        <option value="42">42</option>
                                        <option value="43">43</option>
                                        <option value="44">44</option>
                                        <option value="45">45</option>
                                        <option value="46">46</option>
                                        <option value="47">47</option>
                                        <option value="48">48</option>
                                        <option value="49">49</option>
                                        <option value="50">50</option>
                                        <option value="51">51</option>
                                        <option value="52">52</option>
                                        <option value="53">53</option>
                                        <option value="54">54</option>
                                        <option value="55">55</option>
                                        <option value="56">56</option>
                                        <option value="57">57</option>
                                        <option value="58">58</option>
                                        <option value="59">59</option>
                                        <option value="60">60</option>
                                        <option value="61">61</option>
                                        <option value="62">62</option>
                                        <option value="63">63</option>
                                        <option value="64">64</option>
                                        <option value="65">65</option>
                                        <option value="66">66</option>
                                        <option value="67">67</option>
                                        <option value="68">68</option>
                                        <option value="69">69</option>
                                        <option value="70">70</option>
                                        <option value="71">72</option>
                                        <option value="73">73</option>
                                        <option value="74">74</option>
                                        <option value="75">75</option>
                                        <option value="76">76</option>
                                        <option value="77">77</option>
                                        <option value="78">78</option>
                                        <option value="79">79</option>
                                        <option value="80">80</option>
                                        <option value="81">81</option>
                                        <option value="82">82</option>
                                        <option value="83">83</option>
                                        <option value="84">84</option>
                                        <option value="85">85</option>
                                        <option value="86">86</option>
                                        <option value="87">87</option>
                                        <option value="88">88</option>
                                        <option value="89">89</option>
                                        <option value="90">90</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="select" class="col-lg-2 col-md-2 col-sm-2 control-label">Income</label>
                                    <div class="col-lg-10 col-md-10 col-sm-10">
                                      <select class="form-control" id="select" name="income">
                                        <option value="">-Select Your Income Range-</option>
                                        <option value="199">$199 or Less</option>
                                        <option value="499">$200-$499</option>
                                        <option value="799">$500-$799</option>
                                        <option value="1099">$800-$1099</option>
                                        <option value="1399">$1100-$1399</option>
                                        <option value="1699">$1400-$1699</option>
                                        <option value="1999">$1700-$1999</option>
                                        <option value="2499">$2000-$2499</option>
                                        <option value="2999">$2500-$2999</option>
                                        <option value="3000">$3000 or More</option>
                                      </select>
                                      <br>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
                                      <button class="btn btn-default">Cancel</button>
                                      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                  </div>
                                </fieldset>
                              </form>
                                <?php
                            }
                        }
//-----------end checking and inserting--------------------
                    }
                }
                else{
        ?>
                    <!--reshow the form-->
                    <form class="form-horizontal" method="post" action="http://localhost/APS/index.php" enctype="multipart/form-data">
                    <fieldset>
                      <legend>Sign Up</legend>
                      <p>Sorry! You Have To Fill All The Fields!</p>
                      <div class="form-group">
                        <label for="inputUser" class="col-lg-2 col-md-2 col-sm-2 control-label">User Name</label>
                        <div class="col-lg-10 col-md-10 col-sm-10">
                          <input type="text" name="name" value="<?php echo $name; ?>" class="form-control" id="inputUser" placeholder="Enter Your Username">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputPassword" class="col-lg-2 col-md-2 col-sm-2 control-label">Password</label>
                        <div class="col-lg-10 col-md-10 col-sm-10">
                          <input type="password" name="password"  value="<?php echo $password; ?>" class="form-control" id="inputPassword" placeholder="Enter Password">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 col-md-2 col-sm-2 control-label">Gender</label>
                        <div class="col-lg-10 col-md-10 col-sm-10">
                          <div class="radio">
                            <label>
                              <input type="radio" name="gender" id="optionsRadios1" value="male">
                              Male
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" name="gender" id="optionsRadios2" value="female">
                              Female
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="select" class="col-lg-2 col-md-2 col-sm-2 control-label">Age</label>
                        <div class="col-lg-10 col-md-10 col-sm-10">
                          <select class="form-control" id="select" name="age">
                            <option value="">-Select Your Age-</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                            <option value="32">32</option>
                            <option value="33">33</option>
                            <option value="34">34</option>
                            <option value="35">35</option>
                            <option value="36">36</option>
                            <option value="37">37</option>
                            <option value="38">38</option>
                            <option value="39">39</option>
                            <option value="40">40</option>
                            <option value="41">41</option>
                            <option value="42">42</option>
                            <option value="43">43</option>
                            <option value="44">44</option>
                            <option value="45">45</option>
                            <option value="46">46</option>
                            <option value="47">47</option>
                            <option value="48">48</option>
                            <option value="49">49</option>
                            <option value="50">50</option>
                            <option value="51">51</option>
                            <option value="52">52</option>
                            <option value="53">53</option>
                            <option value="54">54</option>
                            <option value="55">55</option>
                            <option value="56">56</option>
                            <option value="57">57</option>
                            <option value="58">58</option>
                            <option value="59">59</option>
                            <option value="60">60</option>
                            <option value="61">61</option>
                            <option value="62">62</option>
                            <option value="63">63</option>
                            <option value="64">64</option>
                            <option value="65">65</option>
                            <option value="66">66</option>
                            <option value="67">67</option>
                            <option value="68">68</option>
                            <option value="69">69</option>
                            <option value="70">70</option>
                            <option value="71">72</option>
                            <option value="73">73</option>
                            <option value="74">74</option>
                            <option value="75">75</option>
                            <option value="76">76</option>
                            <option value="77">77</option>
                            <option value="78">78</option>
                            <option value="79">79</option>
                            <option value="80">80</option>
                            <option value="81">81</option>
                            <option value="82">82</option>
                            <option value="83">83</option>
                            <option value="84">84</option>
                            <option value="85">85</option>
                            <option value="86">86</option>
                            <option value="87">87</option>
                            <option value="88">88</option>
                            <option value="89">89</option>
                            <option value="90">90</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="select" class="col-lg-2 col-md-2 col-sm-2 control-label">Income</label>
                        <div class="col-lg-10 col-md-10 col-sm-10">
                          <select class="form-control" id="select" name="income">
                            <option value="">-Select Your Income Range-</option>
                            <option value="199">$199 or Less</option>
                            <option value="499">$200-$499</option>
                            <option value="799">$500-$799</option>
                            <option value="1099">$800-$1099</option>
                            <option value="1399">$1100-$1399</option>
                            <option value="1699">$1400-$1699</option>
                            <option value="1999">$1700-$1999</option>
                            <option value="2499">$2000-$2499</option>
                            <option value="2999">$2500-$2999</option>
                            <option value="3000">$3000 or More</option>
                          </select>
                          <br>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-lg-10 col-md-10 col-sm-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
                          <button class="btn btn-default">Cancel</button>
                          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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
                <form class="form-horizontal" method="post" action="http://localhost/APS/index.php" enctype="multipart/form-data">
                <fieldset>
                  <legend>Sign Up</legend>
                  <div class="form-group">
                    <label for="inputUser" class="col-lg-2 col-md-2 col-sm-2 control-label">User Name</label>
                    <div class="col-lg-10 col-md-10 col-sm-10">
                      <input type="text" name="name" class="form-control" id="inputUser" placeholder="Enter Your Username">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword" class="col-lg-2 col-md-2 col-sm-2 control-label">Password</label>
                    <div class="col-lg-10 col-md-10 col-sm-10">
                      <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Enter Password">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 col-md-2 col-sm-2 control-label">Gender</label>
                    <div class="col-lg-10 col-md-10 col-sm-10">
                      <div class="radio">
                        <label>
                          <input type="radio" name="gender" id="optionsRadios1" value="male">
                          Male
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="gender" id="optionsRadios2" value="female">
                          Female
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="select" class="col-lg-2 col-md-2 col-sm-2 control-label">Age</label>
                    <div class="col-lg-10 col-md-10 col-sm-10">
                      <select class="form-control" id="select" name="age">
                        <option value="">-Select Your Age-</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                        <option value="32">32</option>
                        <option value="33">33</option>
                        <option value="34">34</option>
                        <option value="35">35</option>
                        <option value="36">36</option>
                        <option value="37">37</option>
                        <option value="38">38</option>
                        <option value="39">39</option>
                        <option value="40">40</option>
                        <option value="41">41</option>
                        <option value="42">42</option>
                        <option value="43">43</option>
                        <option value="44">44</option>
                        <option value="45">45</option>
                        <option value="46">46</option>
                        <option value="47">47</option>
                        <option value="48">48</option>
                        <option value="49">49</option>
                        <option value="50">50</option>
                        <option value="51">51</option>
                        <option value="52">52</option>
                        <option value="53">53</option>
                        <option value="54">54</option>
                        <option value="55">55</option>
                        <option value="56">56</option>
                        <option value="57">57</option>
                        <option value="58">58</option>
                        <option value="59">59</option>
                        <option value="60">60</option>
                        <option value="61">61</option>
                        <option value="62">62</option>
                        <option value="63">63</option>
                        <option value="64">64</option>
                        <option value="65">65</option>
                        <option value="66">66</option>
                        <option value="67">67</option>
                        <option value="68">68</option>
                        <option value="69">69</option>
                        <option value="70">70</option>
                        <option value="71">72</option>
                        <option value="73">73</option>
                        <option value="74">74</option>
                        <option value="75">75</option>
                        <option value="76">76</option>
                        <option value="77">77</option>
                        <option value="78">78</option>
                        <option value="79">79</option>
                        <option value="80">80</option>
                        <option value="81">81</option>
                        <option value="82">82</option>
                        <option value="83">83</option>
                        <option value="84">84</option>
                        <option value="85">85</option>
                        <option value="86">86</option>
                        <option value="87">87</option>
                        <option value="88">88</option>
                        <option value="89">89</option>
                        <option value="90">90</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="select" class="col-lg-2 col-md-2 col-sm-2 control-label">Income</label>
                    <div class="col-lg-10 col-md-10 col-sm-10">
                      <select class="form-control" id="select" name="income">
                        <option value="">-Select Your Income Range-</option>
                        <option value="199">$199 or Less</option>
                        <option value="499">$200-$499</option>
                        <option value="799">$500-$799</option>
                        <option value="1099">$800-$1099</option>
                        <option value="1399">$1100-$1399</option>
                        <option value="1699">$1400-$1699</option>
                        <option value="1999">$1700-$1999</option>
                        <option value="2499">$2000-$2499</option>
                        <option value="2999">$2500-$2999</option>
                        <option value="3000">$3000 or More</option>
                      </select>
                      <br>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
                      <button class="btn btn-default">Cancel</button>
                      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </div>
                </fieldset>
              </form>
        <?php
            }
        ?>
            </div>
          </div>
          <!-- start of sign in -->
          <div class="col-lg-6 col-md-6 col-sm-6 navbar-left">
            <div class="well bs-component">
    <?php
            //form handler
            if (isset($_POST['submitin'])){       
                $name=$_POST['name'];
                $password=$_POST['password'];
                if (!empty($name)&&!empty($password)){
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
                            $mysql_string = "SELECT name, password FROM Users";
                            $result = mysql_query($mysql_string, $connection);
                            $found=0;
                            while($show = mysql_fetch_array($result)){
                                if((strcmp($name, $show[0])==0)&&(strcmp($password, $show[1])==0))
                                    $found=1;
                            }
                            if($found==1){
                                ?>
                                <form class="form-horizontal" method="post" action="http://localhost/APS/home.php" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <div class="col-lg-10 col-md-10 col-sm-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
                                          <input type="hidden" name="username" value="<?php echo $name; ?>">
                                          <button type="submit" name="submithome" class="btn btn-primary">Welcome <?php echo $name; ?>! Click to Proceed</button>
                                        </div>
                                    </div>
                                </form>
                                
                                <?php
                                mysql_close($connection);
                            }
                            else{
                                echo "Invalid Username or Password! Try Again";
                                ?>
                                <form class="form-horizontal" method="post" action="http://localhost/APS/index.php" enctype="multipart/form-data">
                                <fieldset>
                                  <legend>Sign In</legend>
                                  <div class="form-group">
                                    <label for="inputUser" class="col-lg-2 col-md-2 col-sm-2 control-label">User Name</label>
                                    <div class="col-lg-10 col-md-10 col-sm-10">
                                      <input type="text" name="name" value="<?php echo $name; ?>" class="form-control" id="inputUser" placeholder="Enter Your Username">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="inputPassword" class="col-lg-2 col-md-2 col-sm-2 control-label">Password</label>
                                    <div class="col-lg-10 col-md-10 col-sm-10">
                                      <input type="password" name="password"  value="<?php echo $password; ?>" class="form-control" id="inputPassword" placeholder="Enter Password">
                                    </div>
                                  </div>
                                  
                                  <div class="form-group">
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
                                      <button class="btn btn-default">Cancel</button>
                                      <button type="submit" name="submitin" class="btn btn-primary">Log In</button>
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
                    <form class="form-horizontal" method="post" action="http://localhost/APS/index.php" enctype="multipart/form-data">
                    <fieldset>
                      <legend>Sign In</legend>
                      <p>Sorry! You Have To Fill Both Of The Fields!</p>
                      <div class="form-group">
                        <label for="inputUser" class="col-lg-2 col-md-2 col-sm-2 control-label">User Name</label>
                        <div class="col-lg-10 col-md-10 col-sm-10">
                          <input type="text" name="name" value="<?php echo $name; ?>" class="form-control" id="inputUser" placeholder="Enter Your Username">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputPassword" class="col-lg-2 col-md-2 col-sm-2 control-label">Password</label>
                        <div class="col-lg-10 col-md-10 col-sm-10">
                          <input type="password" name="password"  value="<?php echo $password; ?>" class="form-control" id="inputPassword" placeholder="Enter Password">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <div class="col-lg-10 col-md-10 col-sm-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
                          <button class="btn btn-default">Cancel</button>
                          <button type="submit" name="submitin" class="btn btn-primary">Log In</button>
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
                <form class="form-horizontal" method="post" action="http://localhost/APS/index.php" enctype="multipart/form-data">
                <fieldset>
                  <legend>Sign In</legend>
                  <div class="form-group">
                    <label for="inputUser" class="col-lg-2 col-md-2 col-sm-2 control-label">User Name</label>
                    <div class="col-lg-10 col-md-10 col-sm-10">
                      <input type="text" name="name" class="form-control" id="inputUser" placeholder="Enter Your Username">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword" class="col-lg-2 col-md-2 col-sm-2 control-label">Password</label>
                    <div class="col-lg-10 col-md-10 col-sm-10">
                      <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Enter Password">
                    </div>
                  </div>
                
                  <div class="form-group">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
                      <button class="btn btn-default">Cancel</button>
                      <button type="submit" name="submitin" class="btn btn-primary">Log In</button>
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