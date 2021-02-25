<?php
if ($stmt->num_rows == 1) { //To check if the row exists
    if ($stmt->fetch()) { //fetching the contents of the row
        if (password_verify($pwd, $password)) {
            $_SESSION['username'] = $username;
            echo 'Success!';
            exit();
        } else {
            echo "INVALID PASSWORD!";
        }
    }
} else {
    echo "INVALID USERNAME";
}
$stmt->close();