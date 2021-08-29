        <?php
            include('modals.php');

            if(isset($_POST['user_login_req'])){
                $login_email    = $_POST['user_email'];
                $login_pass     = $_POST['user_pass'];

                $login_query    = "SELECT*FROM users WHERE useremail='$login_email' AND userpass='$login_pass'";
                $login_result   = mysqli_query($db, $login_query);

                if(mysqli_num_rows($login_result) == 1){
                    $login_data     = mysqli_fetch_array($login_result);
                    $userid         = $login_data['user_id'];
                    $userfullname   = $login_data['user_full_name'];
                    $username       = $login_data['username'];
                    $useremail      = $login_data['useremail'];
                    $userpass       = $login_data['userpass'];
                    $user_role      = $login_data['userrole'];

                    $_SESSION['user_id']    = $userid;
                    $_SESSION['username']   = $username;
                    $_SESSION['loggedin']   = $useremail;
                    $_SESSION['user_role']  = $user_role;

                    echo '<script>window.open("index.php", "_self")</script>';
                }else{
                    echo '<script>alert("Your username or Password is incorrect!!")</script>';
                }
            }
        ?>
        <script src="./assets/js/jquery.min.js"></script>
        <script src="./assets/js/bootstrap.min.js"></script>
        <script src="./assets/js/main.js"></script>
    </body>
</html>