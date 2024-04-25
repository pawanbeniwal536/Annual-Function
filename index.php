<?php
$insert = false;
if(isset($_POST['submit'])) {
        try{
        $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'Registration';

    $connection = new mysqli($server, $username, $password, $database);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    } else {
        $firstname = $_POST['firstname'];
        $middlename = $_POST['middlename'];
        $lastname = $_POST['lastname'];
        $fathername = $_POST['fathername'];
        $rollno = $_POST['rollno'];
        $Email = $_POST['Email'];
        $Address = $_POST['Address'];
        $mobile = $_POST['mobile'];
        $class = $_POST['class'];
        $gender = $_POST['gender'];
        
        $my_sql = "INSERT INTO `Registration`.`StudentRegistration`(`Roll No`, `First Name`, `Middle Name`, `Last Name`, `Father Name`, `Class`, `Gender`, `Mobile No.`, `Address`, `Email` ) VALUES ('$rollno', '$firstname', '$middlename', '$lastname', '$fathername', '$class', '$gender', '$mobile', '$Address', '$Email')";
        
        if ($connection->query($my_sql) === true) {
            $insert = true;
        } else {
            echo "Error: " . $my_sql . "<br>" . $connection->error;
            $insert= false;
        }
   }  } catch (Exception $error) {
            // echo "Some error occurred in uploading the data: " . $error->getMessage();
        }
    }
?>
<!DOCTYPE html>
<HTML lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Registration form</title>
</head>
<body>
    <form class="container" action="index.php" method="post">

        <center>
            <h3>Anguri Devi Public School </h3>
            <h2>Annul Function Participate Student</h2>
            <p>Registration for participate in annual function </p>
            <!-- <?php
            if($insert == true){
            echo "<p class=\"after-insert\">Successfully Submitted your data </p>";
            }
            ?> -->
        </center>
        <label for="Roll No ">
            <br>  Roll No : <input type="text" name="rollno" id="rollno"><br>
        </label>
        <label for="First name ">
            <br>  First name : <input type="text" name="firstname" id="first"><br>
            <?php if(isset($_POST['submit']) && empty($_POST['firstname'])): ?>
                <p class="require-field">First name is required</p>
            <?php endif; ?>
        </label>
        <label for="Middle name ">
            <br> Middle name : <input type="text" name="middlename" id="middle"><br>
        </label>
        <label for="Last name ">
            <br>  Last name : <input type="text" name="lastname" id="last"><br>
        </label>
        <label for="Father name ">
            <br>  Father name : <input type="text" name="fathername" id="fathername"><br>
            <?php if(isset($_POST['submit']) && empty($_POST['fathername'])): ?>
                <p class="require-field">Father name is required</p>
            <?php endif; ?>
        </label>
        <br> Class :
        <label for="Class">
            <select name="class" id="class">
                <option value="select course">select course</option>
                <option value="5th">5th</option>
                <option value="6th">6th</option>
                <option value="7th">7th</option>
                <option value="8th">8th</option>
                <option value="9th">9th</option>
                <option value="10th">10th</option>
            </select>

            <?php if(isset($_POST['submit']) && (empty($_POST['class']) || $_POST['class'] == 'select course')): ?>
                <p class="require-field">Class is required</p>
            <?php endif; ?>
            <br>
        </label>
        
        <label for="Gender">
            <br>
            Gender :
        </label>
        <label for="Male">
            <br> <input type="radio" name="gender" id="gender">Male
            <br> <input type="radio" name="gender" id="gender">Female
            <br><input type="radio" name="gender" id="gender">Other
            <?php if(isset($_POST['submit']) && empty($_POST['gender'])): ?>
                <p class="require-field">Gender is required</p>
            <?php endif; ?>
        </label>
        <br>

        <label for="mobileno">
            <br>
            Mobile Number :
        </label>

        <input type="text" name="mobileno"id="mobileno" size="2" value="+91">
        <!-- <input type="number" name="mobile number"><br> -->
        <input type="text" name="mobile"id="mobile" size="10"><br>
        <?php if(isset($_POST['submit']) && (empty($_POST['class']) || $_POST['class'] == 'select course')): ?>
                <p class="require-field">Class is required</p>
            <?php endif; ?>

        <label for="E=mail">
            <br>email : <input type="email" name="Email" id="email 1">
        </label>
        <!-- Now use for the address of student  -->
        <br><br>
        <label for="Address">
            Address :
            <br>
            <textarea name="Address" id="students" cols="50" rows="5" placeholder="Enter address here"></textarea>
        </label>
        <br>
        <div class="contain">
            <label for="submit">
                <input class='submit-btn'type="submit" name="submit" value="Submit">
            </label>

            <label for="register-student"class='registered-student'>
                <a class='registered-student'href="student.php">Registered Student</a>
            </label>
        </div>        
    </form>
</body>
<script>
         <?php if(isset($_POST['submit'])): ?>
            setTimeout(() => {
                const requireFields = document.querySelectorAll('.require-field');
                requireFields.forEach(field => {
                    field.style.display = 'none';
                });
            }, 2000);
        <?php endif; ?>
</script>
</HTML>