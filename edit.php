<?php 
require 'db.php';
$id=$_GET['id'];
$sql="SELECT * FROM people WHERE id=:id";
$statement=$conn->prepare($sql);
$statement->execute([':id' => $id]);
$person=$statement->fetch(PDO::FETCH_OBJ);
if(isset($_POST['name']) && isset($_POST['email'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $sql='UPDATE people SET name=:name,email=:email WHERE id=:id';
    $statement=$conn->prepare($sql);
    if($statement->execute([':name'=>$name, ':email'=>$email , ':id'=>$id])){
        header('location:index.php');
    }
}

?>

<?php require'header.php' ?>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header"><h2>Update <?php echo $person->name;  ?></h2></div>
            <div class="card-body">
                <?php if(!empty($message)): ?>
                    <div class="alert alert-success">
                        <?php echo $message; ?>
                    </div>
                <?php endif; ?>
                <form method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input value="<?= $person->name; ?>" type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input value="<?= $person->email; ?>" type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Update" class="btn btn-info">
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require'footer.php' ?>

