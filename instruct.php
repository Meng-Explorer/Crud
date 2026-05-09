<?php
global $data;
  include("instruct-list.php");
?>

<div class="d-flex justify-content-between p-3">
    <div>
        <h4>Position List</h4>
    </div>
    <div>
        <a class="btn btn-primary" href="instruct-add.php">Add</a>
    </div>
</div>

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">No</th>
        <th scope="col">Name</th>
        <th scope="col">Name_english</th>
        <th scope="col">Department</th>
        <th scope="col">Note</th>
        <th width="150px" scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
        while ($row = $data->fetch_assoc()) {
    ?>
    <tr>
        <th scope="row"><?php echo $row ['id'] ?></th>
        <td><?php echo $row ['name'] ?></td>
        <td><?php echo $row ['nameEnglish'] ?></td>
        <td><?php echo $row ['department'] ?></td>
        <td><?php echo $row ['note'] ?></td>
        <td>
            <a class="btn btn-sm btn-warning" href="instruct-edit.php?id=<?php echo $row['id']?>">Edit</a>
            <a class="btn btn-sm btn-danger" href="instruct-delete.php?id=<?php echo $row['id'] ?>">Delete</a>
        </td>
    </tr>
    <?php
        }
    ?>
    </tbody>
</table>
