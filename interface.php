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

      <!-- ADD TASK FORM -->
      <h1 style="text-align:center;"> AGREGAR </h1>
      <div class="card card-body">
        <form action="save_task.php" method="POST">
          <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Title" autofocus>
          </div>
          <div class="form-group">
            <textarea name="description" rows="2" class="form-control" placeholder="Task Description"></textarea>
          </div>
          <!-- <div class="form-group">
            <input type="text" name="viat" class="form-control" placeholder="Viaticos" autofocus>
          </div> -->
          <div class="form-group">
            Gastos Viáticos:
          <input type="number" id="viat" name="viat" class="form-control" min="1"  step="any">
          </div>
          <!-- <div class="form-group">
            <input type="text" name="various" class="form-control" placeholder="Gastos Varios" autofocus>
          </div> -->
          <div class="form-group">
            Gastos Varios:
          <input type="number" id="various" name="various" class="form-control" min="1"  step="any">
          </div>
          <div class="form-group">
            Cliente:
            <select name="customerId" id="">
              <?php
                $que = "select * from customers";
                $res = mysqli_query($conn, $que);
              ?>
              <?php foreach($res as $op):?>

                <option value="<?php echo $op['id'] ?>"> <?php echo $op['name'] ?> </option>

              <?php endforeach ?>

            </select>
          </div>

          <div class="form-group">
            Piloto:
            <select name="pilotId" id="">
              <?php
                $que = "select * from pilots";
                $res = mysqli_query($conn, $que);
              ?>
              <?php foreach($res as $op):?>

                <option value="<?php echo $op['id'] ?>"> <?php echo $op['name'] ?> </option>

              <?php endforeach ?>

            </select>
          </div>

          <div class="form-group">
            Vehiculo:
            <select name="vehicleId" id="">
              <?php
                $que = "select * from vehicles";
                $res = mysqli_query($conn, $que);
              ?>
              <?php foreach($res as $op):?>

                <option value="<?php echo $op['id'] ?>"> <?php echo $op['name'] ?> | <?php echo $op['type'] ?> </option>

              <?php endforeach ?>

            </select>
          </div>

          <input type="submit" name="save_task" class="btn btn-success btn-block" value="Create Task">
        </form>
      </div>
    </div>
    <div class="col-md-8">
    <h1 style="text-align:center;"> ENTREGAS </h1>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Viaticos</th>
            <th>Gastos Varios</th>
            <th>Cliente</th>
            <th>Piloto</th>
            <th>Vehiculo</th>
            <th>Action        </th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM task";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['viat']; ?></td>
            <td><?php echo $row['various']; ?></td>
            <td><?php echo $row['customerId']; ?></td>
            <td><?php echo $row['pilotId']; ?></td>
            <td><?php echo $row['vehicleId']; ?></td>

            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
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


