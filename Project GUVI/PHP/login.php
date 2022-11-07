


    <?php
        session_start();
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "guvi";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        } 
        if($_SERVER['REQUEST_METHOD']=='POST'){  
            $userName = $_POST['username'];
            $password = $_POST['password'];
            $query1 = "SELECT * FROM login WHERE user_name='$userName'";
            $result1 = mysqli_query($conn, $query1);
            if(mysqli_num_rows($result1) > 0)
            {
                $query2 = "SELECT * FROM login WHERE user_name='$userName' AND password='$password';";
                $result2 = mysqli_query($conn, $query2);
                if(mysqli_num_rows($result2) > 0)
                {
                    $row = mysqli_fetch_assoc($result2);
                    $_SESSION['username'] = $userName;
                    $_SESSION['password'] = $password;
                    $_SESSION['ID'] = $row['ID'][0];
                    $url = "profile.php";
                    header('Location: '.$url);
                    exit();
                }
                else
                {
                    echo "Invalid Password!!";
                }
            }
            else 
            {
                echo "Username not present !!";
            }
        }
    ?>
