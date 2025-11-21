<!-- register user info portal -->
 <html>
    <head>
        <title>Registration page</title>
        <link rel="stylesheet" type="text/css" href="Registration.css">
    </head>
    <body>
        <div class="register-box">
            <h1>Enter Details</h1>
            <div class="box">
                <form method ="POST">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>

                <label for="email">Email</label><br>
                <input type="email" id="email" name="email" required>

                <label for="phone">Phone Number</label>
                <input type="text" id="phone" name="phone" pattern="[0-9]{10}" maxlength="10" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>

                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required>

                <input type="submit" value="Register" name="submit"class="btn">
            </form>
            </div>
        </div>
        <?php
        $connection = mysqli_connect("localhost", "root", "", "user_identification");
        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            if($password === $confirm_password){
                $check_query = mysqli_query($connection, "SELECT * FROM user_info WHERE email='$email'");
                if(mysqli_num_rows($check_query)>0){
                    echo "<script>alert('Email already registered. Please use a different email.');</script>";
                    exit();
                }else{
                $query = "INSERT INTO user_info (username, email, phone_number, passward,confirm_password) VALUES ('$username', '$email', '$phone', '$password', '$confirm_password')";
                $result = mysqli_query($connection, $query);
                }
                if($result){
                    echo "<script>alert('Registration successful.');</script>";
                } else {
                    echo "<script>alert('Error inserting data:');</script>";
                }
            } else {
                echo "<script>alert('Passwords do not match. Please try again.');</script>";
            }
        }
        ?>
    </body>
</html>
