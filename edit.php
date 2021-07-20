<?php
include("db.php");
$title = '';
$description= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM task WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $title = $row['title'];
    $description = $row['description'];
    $viat = $row['viat'];
    $various = $row['various'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $title= $_POST['title'];
  $description = $_POST['description'];
  $viat = $_POST['viat'];
  $various = $_POST['various'];

  $query = "UPDATE task set title = '$title', description = '$description', viat = '$viat', various = '$various' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: interface.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          TITULO ENTREGA:
          <input name="title" type="text" class="form-control" value="<?php echo $title; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          DESCRIPCION:
        <textarea name="description" class="form-control" cols="30" rows="10"><?php echo $description;?></textarea>
        </div>
        <!-- <div class="form-group">
          <input name="viat" type="text" class="form-control" value="<?php echo $viat; ?>" placeholder="Update Viaticos">
        </div> -->
        <div class="form-group">
            Gastos Viáticos:
          <input type="number" id="viat" name="viat" class="form-control" value="<?php echo $viat; ?>" min="1"  step="any">
          </div>

        <!-- <div class="form-group">
          <input name="various" type="text" class="form-control" value="<?php echo $various; ?>" placeholder="Update Gastos Varios">
        </div> -->
        <div class="form-group">
            Gastos Varios:
          <input type="number" id="various" name="various" class="form-control" value="<?php echo $various; ?>" min="1"  step="any">
          </div>

        <button class="btn-success" name="update">
          Update
        </button>
        <button class="btn-danger" name="cancel">
        <a href="interface.php" style="color:white; ">
        Cancel
        </a>  
        </button>

      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
