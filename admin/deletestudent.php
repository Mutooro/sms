<?php
require_once('../include/dbcon.php');
require_once('../include/header.php');

?>
  
<?php
 if(isset($_POST['search'])){

    $standerd = $_POST['standerd'];
    $name = $_POST['name'];
    

    $query = "select * from students where `standerd` = '$standerd' and `name` LIKE '%$name%'";
    $run = mysqli_query($con,$query);
    $row = mysqli_num_rows($run);
    if($row < 1)
    {
        echo "<script> alert('No Student Found')</script>";
    }
    else{
      
    }
}

if (isset($_GET['delete_id']) && is_numeric($_GET['delete_id'])) {
  $student_id = $_GET['delete_id'];

  // Include necessary files and establish database connection
  require_once('../include/dbcon.php'); // Adjust the path as needed

  // Perform the delete operation
  $delete_query = "DELETE FROM students WHERE id = $student_id";

  if (mysqli_query($con, $delete_query)) {
      http_response_code(200); // OK status
  } else {
      http_response_code(500); // Internal Server Error status
  }

  // Close the database connection
  mysqli_close($con);
  exit;
}
?>

      <!-- The Coding Has Been Started From Here -->

      <nav class="teal">
        <div class="container">
          <div class="nav-wrapper">
            <a href="" class="brand-logo center">Social Learnia</a>
            <a href="" class="sidenav-trigger show-on-large" data-target="slide-out"><i class="material-icons">menu</i></a>
          </div>        
        </div>
      </nav>


      <!-- The Dashboard Coding Started From Here -->
        <div class="row main">
          <div class="col l12 m12 s12">
            <form action="" method="POST">
            <div class="card-panel">
              <div class="row">
                <div class="col l4">
                  <div class="input-field">
                      <select name="standerd">
                          <option value="">Choose Standerd </option>
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
                  </select>
                </div>
              </div>
              <div class="col l5">
                <div class="input-field">
                  <input type="text" name="name" id="name">
                  <label for="name">Enter Student Name</label>
                </div>
              </div>
              <div class="col l3">
                  <div class="">
                      <button class="btn" name="search">Search Student</button>
                  </div>
                </div>
            </div>
          </div>
        </form>
        </div>
      </div>


        <div class="row main">
            <div class="col l12">
                <div class="card">
                    <ul class="collection">
                        <li class="collection-item">
                        <table class="striped">
                            <tr class="cyan lighten-2 z-depth-1">
                                <th>Sr. No</th>
                                <th>Student Image</th>
                                <th>Name</th>
                                <th>Roll No</th>
                                <th>Standerd</th>
                                <th>Gender</th>
                                <th>City</th>
                                <th>Contact</th>
                                <th>Action</th>
                            </tr>
                            
                            <?php
$query = "SELECT * FROM students WHERE `standerd` = '$standerd' AND `name` LIKE '%$name%'";
$run = mysqli_query($con, $query);
$count = 0;

while ($data = mysqli_fetch_assoc($run)) {
    $count++;
    $image = $data['image'];
    $name = $data['name'];
    $rollno = $data['rollno'];
    $standerd = $data['standerd'];
    $gender = $data['gender'];
    $city = $data['city'];
    $contact = $data['contact'];
    $student_id = $data['id'];

    echo "<tr>
        <td>$count</td>
        <td><img src=\"images/$image\" class=\"responsive-img circle\" style=\"width: 100px;\"></td>
        <td>$name</td>
        <td>$rollno</td>
        <td>$standerd</td>
        <td>$gender</td>
        <td>$contact</td>
        <td>$city</td>
        <td>
            <a href=\"#\" class=\"red-text waves-light\" onclick=\"deleteStudent($student_id)\">
                <i class=\"material-icons\">delete</i>
            </a>
        </td>
    </tr>";
}

if ($count === 0) {
    echo "<tr><td colspan=\"9\">No student records found</td></tr>";
}
?>

                                
                            
                        </table>
                    </li>
                    </ul>
                </div>
            </div>
        </div>

        <script>
function deleteStudent(studentId) {
    var confirmDelete = confirm("Are you sure you want to delete this student?");

    if (confirmDelete) {
        // Send an AJAX request to delete the student
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    // Refresh the page after successful deletion
                    location.reload();
                } else {
                    alert("Error deleting student.");
                }
            }
        };

        xhr.open("GET", "deletestudent.php?delete_id=" + studentId, true);
        xhr.send();
    }
}
</script>




      <!-- The Navbar Menu Collection List -->
      <?php
require_once('../include/sidenav.php');
?>

      <?php
require_once('../include/footer.php');
?>