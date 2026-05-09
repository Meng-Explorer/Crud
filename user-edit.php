<?php
    require_once("model/user.php");
    if(!isset($_GET["id"])){
        header("Location: index.php");
    }
    $id = $_GET["id"];
    $user = new user();
    $data = $user->getById($id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Users to Database</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc; 
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .all-card {
            background: white;
            padding: 2.5rem;
            border-radius: 20px; 
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05); 
            width: 100%;
            max-width: 450px;
        }
        .form-control {
            padding: 0.75rem 1rem;
            border-radius: 10px;
            border: 1px solid #e2e8f0;
        }
        .form-control:focus {
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
            border-color: #4f46e5;
        }
        .btn-save {
            background-color: #4f46e5;
            border: none;
            padding: 0.75rem;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s;
        }
        .btn-save:hover {
            background-color: #4338ca;
            transform: translateY(-1px);
        }
        .btn-cancel {
            background-color: #f1f5f9;
            color: #475569;
            border: none;
            padding: 0.75rem;
            border-radius: 10px;
            font-weight: 600;
        }
    </style>
</head>
<body>

<div class="all-card">
    <div class="from-add-user">
        <h3 class="text-center mb-4 fw-bold" style="color: #1e293b;">Edit User</h3>

        <form method="post">
            <div class="mb-3">
                <label for="username" class="form-label fw-medium text-secondary">Username</label>
                <input value="<?php echo $data['username']?>" name="username" type="text" class="form-control" id="username" placeholder="e.g. Username" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label fw-medium text-secondary">Password</label>
                <input value="<?php echo $data['password']?>" name="password" type="text" class="form-control" id="password" placeholder="••••••" required>
            </div>

            <div class="d-flex gap-3">
                <a href="index.php" type="button" class="btn btn-cancel w-100">Cancel</a>
                <button type="submit" name="btn_save" class="btn btn-primary btn-save w-100">Save User</button>
            </div>
        </form>
    </div>
</div>
</body>
<?php
if (isset($_POST['btn_save'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = new user();
    $user->update($id,$username, $password );
}
?>

</html>