<?php include("db.php");?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD CUSTOMER FORM -->
      <h1 style="text-align:center;">AGREGAR</h1>
      <div class="card card-body">
        <form action="create_vehicle.php" method="POST">
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Vehicle Name" autofocus>
          </div>
          <div class="form-group">
            Capacity:
            <input type="number" id="capacity" name="capacity" class="form-control" min="1" max="99999999">
          </div>
          <div class="form-group">
            Gas Amount:
          <input type="number" id="gas" name="gas" class="form-control" min="1"  step="any">          
          </div>
          <div class="form-group">
            Distance:
            <input type="number" id="distance" name="distance" class="form-control" min="1" max="99999999">
          </div>
          <div class="form-group">
            Disponibility:
            <input type="radio" name="dispoV" class="form-control" id="dispoV" value="0">No
            <input type="radio" name="dispoV" class="form-control" id="dispoV" value="1">Yes
          </div>
          <div class="form-group">
            Depreciation:
          <input type="number" id="depV" name="depV" class="form-control" min="1"  step="any">
          </div>
          <div class="form-group">
            <input type="text" name="type" class="form-control" placeholder="Type of Merch" autofocus>
          </div>
          <input type="submit" name="vehicle" class="btn btn-success btn-block" value="Save Vehicle">
        </form>
      </div>
    </div>
    <div class="col-md-8">
    <h1 style="text-align:center;"> VEHICULOS</h1>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Name</th>
            <th>Capacity</th>
            <th>Gas</th>
            <th>Distance</th>
            <th>Disponibility</th>
            <th>Depreciation</th>
            <th>Type</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM vehicles";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['capacity']; ?></td>
            <td><?php echo $row['gas']; ?></td>
            <td><?php echo $row['distance']; ?></td>
            <td><?php echo $row['dispoV']; ?></td>
            <td><?php echo $row['depV']; ?></td>
            <td><?php echo $row['type']; ?></td>

            <td>
              <a href="edit_vehicle.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_vehicle.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>




