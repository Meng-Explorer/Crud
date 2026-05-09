<?php
require_once("model/user.php");

if(!isset($_GET["id"])){
    header("Location: index.php");
}
$id = $_GET["id"];
$user = new user();
$data = $user->getInstructById($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Users to Database</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc; /* ពណ៌ផ្ទៃខាងក្រោយស្រទន់ */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .all-card {
            background: white;
            padding: 2.5rem;
            border-radius: 20px; /* ជ្រុងមូលបែប modern */
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05); /* ស្រមោលស្រាល */
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
        <h3 class="text-center mb-4 fw-bold" style="color: #1e293b;">Add New Instruct</h3>
        <form method="post">
            <div class="mb-3">
                <label for="username" class="form-label fw-medium text-secondary">Name</label>
                <input value="<?php echo $data['name']?>" name="name" type="text" class="form-control" id="username" placeholder="e.g. Name" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label fw-medium text-secondary">Name English</label>
                <input value="<?php echo $data['nameEnglish']?>" name="nameEnglish" type="text" class="form-control" id="password" placeholder="e.g. Name English" required>
            </div>

            <div class="mb-4">
                <label for="email" class="form-label fw-medium text-secondary">Department Name</label>
                <input value="<?php echo $data['department']?>" name="department" type="text" class="form-control" id="email" placeholder="department" required>
            </div>

            <div class="mb-4">
                <label for="email" class="form-label fw-medium text-secondary">Note</label>
                <input value="<?php echo $data['note']?>" name="note" type="text" class="form-control" id="email" required>
            </div>

            <div class="d-flex gap-3">
                <a href="instruct.php" type="button" class="btn btn-cancel w-100">Cancel</a>
                <button type="submit" name="btn_save" class="btn btn-primary btn-save w-100">Save instruct</button>
            </div>
        </form>
    </div>
</div>
</body>
<?php
if (isset($_POST['btn_save'])) {
    $id = $_GET["id"];
    $name = $_POST['name'];
    $nameEnglish = $_POST['nameEnglish'];
    $department = $_POST['department'];
    $note = $_POST['note'];
    $user = new user();
    $user->updateInstruct($id,$name, $nameEnglish, $department, $note);

}
?>

</html>