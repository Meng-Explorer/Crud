<?php
global $data;
include("user-list.php");
    // require_once "model/user.php";
    // $user = new User();
    // $data = $user->getAllUsers();
?>

<div class="d-flex justify-content-between p-3">
    <div>
        <h4>User List</h4>
    </div>
    <div>
        <a class="btn btn-primary" href="user-add.php">Add</a>
    </div>
</div>

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">No</th>
        <th scope="col">Username</th>
        <th scope="col">Password</th>
        <th width="150px" scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
        while ($row = $data->fetch_assoc()) {
    ?>
    <tr>
        <th scope="row"><?php echo $row ['id'] ?></th>
        <td><?php echo $row ['username'] ?></td>
        <td><?php echo $row ['password'] ?></td>
        <td>
            <a class="btn btn-sm btn-warning" href="user-edit.php?id=<?php echo $row['id']?>">Edit</a>
            <a class="btn btn-sm btn-danger" href="user-delete.php?id=<?php echo $row['id'] ?>">Delete</a>
        </td>
    </tr>
    <?php
        }
    ?>
    </tbody>
</table>
