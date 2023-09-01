<?php require_once('../include/students/header.php'); ?>
<?php require_once('../include/students/sidenav.php'); ?>
    <nav class="brown darken-4">
        <a href="" class="brand-logo center">My school</a>
        <!-- sidenav trigger code, means picture showing in right sight header sidenav, for account info and logout -->
        <a href="" class="sidenav-trigger" data-target="slide-out"><i class="material-icons">menu</i></a>
        <a href=""><img src="../img/<?php
                                    if (isset($image) && !empty($image)){
                                     echo $image;
                                    }
                                    else
                                    {
                                      echo "user.png";
                                    }
                                      ?>" class=" dropdown-trigger right responsive-img circle brand-logo " data-target="dropdown" alt="" style=" width: 40px; margin-top: 8px;margin-right: 8px;"></a>
    </nav>
    <div class="row mufazmi">
        <div class="col s12 m12 l3">
            <div class="card-panel z-depth-0" style="padding: 15px">
                <div class="card-image center">
                <img src="../img/<?php
                                    if (isset($image) && !empty($image)){
                                     echo $image;
                                    }
                                    else
                                    {
                                      echo "teacher.png";
                                    }
                                      ?>" alt="" class="responsive-img circle" style="width: 120px; border: 3px solid gray;" alt="">
                    <h5 class="center"><?php echo $name ?></h5>
                    <div class="divider"></div>
                    <table >
                        <thead>
                            <tr>
                                <th>Addmission</th>
                                <td class="blue-text">18001</td>
                            </tr>
                            <tr>
                                <th>Roll Number</th>
                                <td class="blue-text"><?php echo $rollno ?></td>
                            </tr>
                            <tr>
                                <th>class</th>
                                <td class="blue-text"><?php echo $standerd; ?></td>
                            </tr>
                            <tr>
                                <th>Section</th>
                                <td class="blue-text">A</td>
                            </tr>

                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="col s12 m12 l9">
            <div class="card z-depth-0">
                <ul class="tabs">
                    <li class="tab"><a href="#profile" class="">Profile</a></li>
                    <li class="tab"><a href="#fees" class="">Edit</a></li>
                    <li class="tab"><a href="#exam" class="">Exam</a></li>
                    <li class="tab"><a href="#document" class="">Document</a></li>
                </ul>
                <div id="profile" class="col s12 white " >
                        <div class="card"  style="padding-left:10px; padding-right: 10px; ">
                            <table >
                                <tbody>  
                                <tr>
    <th>Age</th>
    <td>
        <?php
        // Assuming you have a connection to your database established
        $query = "SELECT date_of_birth FROM students where id=$student_id";
        $result = mysqli_query($con, $query);
        
        while ($row = mysqli_fetch_assoc($result)) {
            $dob = $row['date_of_birth'];
            $dob_year = date("Y", strtotime($dob));
            $current_year = date("Y");
            $age = $current_year - $dob_year;
        }
        
        // Display the calculated age outside the loop
        echo $age;
        ?>
    </td>
</tr>


                                    <tr>
                                        <th>Category</th>
                                        <td>
                                            General  
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Mobile Number</th>
                                        <td><?php echo $contact; ?></td>
                                    </tr>
                                    
                                    <tr>
    <th>Religion</th>
    <td>
        <?php
        // Assuming you have a connection to your database established
        $query = "SELECT religion FROM students where id=$student_id";
        $result = mysqli_query($con, $query);
        
        while ($row = mysqli_fetch_assoc($result)) {
            $religion = $row['religion'];
            
        }
        echo $religion . "<br>";
        ?>
    </td>
</tr>

                                    <tr>
                                        <th>Email</th>
                                        <td><?php echo $email; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card"  style="padding-left:10px; padding-right: 10px; ">
                            <div class="left">
                                <h5>Address</h5>
                            </div>
                            <table>
                                <tbody>
                                    <tr>
                                        <th>Current Address</th>
                                        <td>
        <?php
        // Assuming you have a connection to your database established
        $query = "SELECT city FROM students where id=$student_id";
        $result = mysqli_query($con, $query);
        
        while ($row = mysqli_fetch_assoc($result)) {
            $city = $row['city'];
            
        }
        echo $city . "<br>";
        ?>
    </td>
                                    </tr>
                                    <tr>
                                        <th>Permanent Address</th>
                                        <td>
        <?php
        // Assuming you have a connection to your database established
        $query = "SELECT city FROM students where id=$student_id";
        $result = mysqli_query($con, $query);
        
        while ($row = mysqli_fetch_assoc($result)) {
            $city = $row['city'];
            
        }
        echo $city . "<br>";
        ?>
    </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                </div>
                <div id="fees" class="col s12 white">
                <div class="card"  style="padding-left:10px; padding-right: 10px; ">
            
<?php
require_once('../include/dbcon.php');
// $student_id = $_GET['id'];
$query = "SELECT * FROM students WHERE `id`='$student_id'";
$run = mysqli_query($con, $query);
$data = mysqli_fetch_assoc($run);
$image = $data['image'];
$name = $data['name'];
$rollno = $data['rollno'];
$standerd = $data['standerd'];
$gender = $data['gender'];
$city  = $data['city'];
$contact = $data['contact'];
$password = $data['password'];
$email = $data['email'];
?>

<?php
//Update Student Query Code
    require_once('../include/dbcon.php');

    if(isset($_POST['submit'])){
    $image_name = $_FILES['image']['name'];
    $temp_image_name =  $_FILES['image']['tmp_name'];
    $rollno = htmlentities(mysqli_real_escape_string($con,$_POST['rollno']));
    $standerd= htmlentities(mysqli_real_escape_string($con,$_POST['standerd']));
    $name= htmlentities(mysqli_real_escape_string($con,$_POST['name']));
    $gender= htmlentities(mysqli_real_escape_string($con,$_POST['gender']));
    $contact = htmlentities(mysqli_real_escape_string($con,$_POST['contact']));

    $email =  htmlentities(mysqli_real_escape_string($con,$_POST['email']));
    $city = htmlentities(mysqli_real_escape_string($con,$_POST['city']));
    move_uploaded_file($temp_image_name,"../img/$image_name");
   $query = "UPDATE `students` SET `rollno`='$rollno', `standerd`='$standerd', `name`='$name', `gender`='$gender', `contact`='$contact', `email`='$email', `city`='$city', `image`='$image' WHERE `id`='$student_id' ";
    $run = mysqli_query($con,$query);

    if($run)
    {
       $_SESSION['student_updated'] = "Student Updated Successfully";
       $student_updated =  $_SESSION['student_updated'];
    
    }
    else{

       $_SESSION['student_updated_failed'] = "Failed To Update";
       $student_updated_failed =  $_SESSION['student_updated_failed'];
     
     }
}
?>
      <!-- The Coding Has Been Started From Here -->

      <nav class="teal">
        <div class="container">
          <div class="nav-wrapper">
            <a href="" class="brand-logo center">My profile</a>
            <!-- <a href="" class="sidenav-trigger show-on-large" data-target="slide-out"><i class="material-icons">menu</i></a> -->
          </div>
        </div>
      </nav>


      <!-- The Dashboard Coding Started From Here -->

        <div class="row main">
            <div class="col l12 m12 s12">
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="card-panel">
                <div class="center">
                <h6 class="center red-text"><?php

              if(isset($student_updated)){
                echo $student_updated;
              }
              elseif(isset($student_updated_failed)){
                  echo $student_updated_failed."<br>".mysqli_error($con);
              }
            ?> </h6></div>
                    <div class="row">
                      <div class="col l4 m12 s12 center">
                     <div class="input-field file-field">
                     <input type="file" name="image" class="dropify" data-show-remove="false" value="<?php echo $image; ?>" data-default-file="../img/<?php
                                    if (isset($image) && !empty($image)){
                                     echo $image;
                                    }
                                    else
                                    {
                                      echo "user.png";
                                    }
                                      ?>" />
                     </div>
                      </div>
                        <div class="col l4">
                            <div class="input-field">
                                    <i class="material-icons prefix">person</i>
                                <input type="text" value="<?php echo $rollno; ?>" name="rollno" id="rollno" required="required" readonly>
                                <label for="rollnow">Enter Roll Number</label>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">person</i>
                                    <input type="text" value="<?php echo $name; ?>" name="name" id="name" required="required" readonly>
                                    <label for="name">Enter Name</label>
                                </div>
                                <!-- <div class="input-field">
                                        <i class="material-icons prefix">lock</i>
                                        <input type="text" name="password" id="password" value="<?php echo $password; ?>" required="required">
                                        <label for="password">Enter A Password</label>
                                    </div> -->
                                <div class="input-field">
                                        <i class="material-icons prefix">call</i>
                                        <input type="text" value="<?php echo $contact; ?>" name="contact" id="contact" required="required">
                                        <label for="contact">Enter Mobile Number</label>
                                    </div>
                        </div>
                        <div class="row">
                            <div class="col l4">
                                <div class="input-field">
                                    <select name="standerd" required="required">
                                            <option value="<?php echo $standerd; ?>"> <?php echo $standerd; ?> </option>
                                            <option value="1">1st</option>
                                            <option value="2">2nd</option>
                                            <option value="3">3rd</option>
                                            <option value="4">4th</option>
                                            <option value="5">5th</option>
                                            <option value="6">6th</option>
                                            <option value="7">7th</option>
                                            <option value="8">8th</option>
                                            <option value="9">9th</option>
                                            <option value="10">10th</option>
                                            <option value="11">11th</option>
                                            <option value="12">12th</option>
                                            <option value="BCA">BCA</option>
                                            <option value="MCA">MCA</option>
                                            <option value="B.COM">B.COM</option>
                                            <option value="Botanology">Botanology</option>


                                    </select>
                                </div>
                                <div class="input-field">
                                        <i class="material-icons prefix">location_city</i>
                                        <input type="text" value="<?php echo $city; ?>" name="city" id="city" required="required">
                                        <label for="city">Enter City Name</label>
                                    </div>
                                    <div class="input-field">
                                      <i class="material-icons prefix">email</i>
                                      <input type="text" value="<?php echo $email; ?>" name="email" id="email" required="required">
                                      <label for="email">Enter Email Address</label>
                                  </div>

                            </div>
                        </div>
                        <div class="col l4 center">

                        </div>
                        <div class="col l8 center large">
                          <input type="radio" name="gender" id="male" <?php
                           if($gender=="male")
                           {
                             echo "checked";
                            }
                           ?> value="male" required="required">
                          <label for="male">Male</label>
                          <input type="radio" name="gender" id="female" <?php
                           if($gender=="female")
                           {
                             echo "checked";
                            }
                           ?> value="female" required="required">
                          <label for="female">Female</label>
                        </div>
                    </div>

                    <button type="submit" name="submit" style="width:100%" class="btn">Update Students</button>
                </div>
              </form>

            </div>
        </div>

            
            </div>
            </div>
                <div id="exam" class="col s12 white">
                <div class="card"  style="padding-left:10px; padding-right: 10px; ">Tesasdft 1 <br>hey</div>
                </div>
                <div id="document" class="col s12 white">
                <div class="card"  style="padding-left:10px; padding-right: 10px; ">Tesasdft 1 <br>hey</div>
                </div> 
            
            </div>
        </div>
    </div>

    <!-- right sidenav's profile pic dropdown -->

    <ul class="dropdown-content" id="dropdown">
       
    <li><a href="../include/students/logout.php"><i class="material-icons">logout</i>Logout</a></li>
       
    </ul>

<!-- ********************Footer Area************************ -->
<?php require_once('../include/students/footer.php'); ?>