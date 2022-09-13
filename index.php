<?php 
require 'db.php';
$sql='SELECT * FROM people';
$statement=$conn->prepare($sql);
$statement->execute();
$people=$statement->fetchAll(PDO::FETCH_OBJ);
?>

<?php require'header.php' ?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">All People </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th colspan="2">ACTION</th>
                </tr>
                <?php foreach($people as $person): ?>
                <tr>
                    <td> <?php echo $person->id; ?> </td>
                    <td> <?php echo $person->name;  ?> </td>
                    <td> <?=  $person->email; ?> </td>
                    <td> <a onclick="return confirm('are you sure you want to update this person')" href="edit.php?id=<?= $person->id ?>"><i class="btn btn-info">Edit</i>  </td>
                    <td> <a onclick="return confirm('are you sure you want to delete this person')" href="delete.php?id=<?= $person->id ?>"><i class="btn btn-danger">Delete</i>  </td>
                </tr>    
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
<?php require'footer.php' ?>

