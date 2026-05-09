<?php
session_start();
    if(isset($_POST['di_menglang'])){
        $_SESSION['di_menglang'] = $_POST['di_menglang'];
        echo "Session created successfully <br/>";
    }
?>
<form method="post">
    <label>Enter Name:</label>
    <input type="text" name="di_menglang" required >
    <button>Create Session</button>

</form>
<a href="read.php" >Read</a> | <a href="update.php">Update</a> | <a href="delete.php">Delete</a>
