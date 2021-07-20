<?php
include("db.php");
$name = '';
$cost= '';
$addressR = '';
$addressD = '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM customers WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $name = $row['name'];
    $cost = $row['cost'];
    $addressR = $row['addressR'];
    $addressD = $row['addressD'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $name= $_POST['name'];
  $cost = $_POST['cost'];
  $addressR = $_POST['addressR'];
  $addressD = $_POST['addressD'];

  $query = "UPDATE customers set name = '$name', cost = '$cost', addressR = '$addressR', addressD = '$addressD' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Customer Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: customer.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit_customer.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          NOMBRE:
          <input name="name" type="text" class="form-control" value="<?php echo $name; ?>" placeholder="Update Name">
        </div>
        <!-- <div class="form-group">
          <input name="cost" type="text" class="form-control" value="<?php echo $cost; ?>" placeholder="Update Amount">
        </div> -->
        <div class="form-group">
            TOTAL DE VIAJE:
          <input type="number" id="cost" name="cost" class="form-control" value="<?php echo $cost; ?>" min="1"  step="any">
          </div>

        <div class="form-group">
          LUGAR DE RECEPCION:
            <select name="addressR" id="">
              <?php
                $que = "select * from zonar";
                $res = mysqli_query($conn, $que);
              ?>
              <?php foreach($res as $op):?>

                <option value="<?php echo $op['place'] ?>"> <?php echo $op['place'] ?> </option>

              <?php endforeach ?>

            </select>
          </div>
        <div class="form-group">
          LUGAR DE ENTREGA:
            <select name="addressD" id="">
              <?php
                $que = "select * from zonad";
                $res = mysqli_query($conn, $que);
              ?>
              <?php foreach($res as $op):?>

                <option value="<?php echo $op['place'] ?>"> <?php echo $op['place'] ?> </option>

              <?php endforeach ?>

            </select>
          </div>

        <button class="btn-success" name="update">
          Update
        </button>
        <button class="btn-danger" name="cancel">
        <a href="customer.php" style="color:white; ">
        Cancel
        </a>  
        </button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>