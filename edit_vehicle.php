<?php
include("db.php");
$name = '';
$capacity= '';
$gas = '';
$distance = '';
$dispoV = '';
$depV = '';
$type = '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM vehicles WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $name = $row['name'];
    $capacity = $row['capacity'];
    $gas = $row['gas'];
    $distance = $row['distance'];
    $dispoV = $row['dispoV'];
    $depV = $row['depV'];
    $type = $row['type'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $name= $_POST['name'];
  $capacity = $_POST['capacity'];
  $gas = $_POST['gas'];
  $distance = $_POST['distance'];
  $dispoV = $_POST['dispoV'];
  $depV = $_POST['depV'];
  $type = $_POST['type'];

  $query = "UPDATE vehicles set name = '$name', capacity = '$capacity', gas = '$gas', distance = '$distance', dispoV = '$dispoV'
            , depV = '$depV', type = '$type'   WHERE id=$id";


  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Vehicle Updated Successfully';
  echo $query;
  $_SESSION['message_type'] = 'warning';
  header('Location: vehicles.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit_vehicle.php?id=<?php echo $_GET['id']; ?>" method="POST">
      <div class="form-group">
          Nombre:
            <input type="text" name="name" class="form-control" value="<?php echo $name;?>" placeholder="Vehicle Name" autofocus>
          </div>
          <div class="form-group">
            Capacity:
            <input type="number" id="capacity" name="capacity" class="form-control" value="<?php echo $capacity;?>" min="1" max="99999999">
          </div>
          <div class="form-group">
            Gas Amount:
          <input type="number" id="gas" name="gas" class="form-control" min="1" value="<?php echo $gas;?>"  step="any">          
          </div>
          <div class="form-group">
            Distance:
            <input type="number" id="distance" name="distance" class="form-control" value="<?php echo $distance;?>" min="1" max="99999999">
          </div>
          <div class="form-group">
            Disponibility:
            <input type="radio" name="dispoV"  id="dispoV" value="0">No
            <input type="radio" name="dispoV"  id="dispoV" value="1">Yes
          </div>
          <div class="form-group">
            Depreciation:
          <input type="number" id="depV" name="depV" class="form-control" value="<?php echo $depV;?>" min="1"  step="any">
          </div>
          <div class="form-group">
            Tipo de Carga:
            <input type="text" name="type" class="form-control" value="<?php echo $type;?>" placeholder="Type of Merch" autofocus>
          </div>

        <button class="btn-success" name="update">
          Update
        </button>
        <button class="btn-danger" name="cancel">
        <a href="vehicles.php" style="color:white; ">
        Cancel
        </a>  
        </button>
      </form>
      </div>
    </div>
  </div>
</div> 
<?php include('includes/footer.php'); ?>