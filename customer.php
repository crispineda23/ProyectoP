<?php include("db.php");?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

        <h1 style="text-align:center;"> AGREGAR </h1>

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD CUSTOMER FORM -->
      <div class="card card-body">
        <form action="create_customer.php" method="POST">
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Customer Name" autofocus>
          </div>
          <!-- <div class="form-group">
            <input type="text" name="cost" class="form-control" placeholder="Trip Amount" autofocus>
          </div> -->
          <div class="form-group">
            TOTAL DE VIAJE:
          <input type="number" id="cost" name="cost" class="form-control" min="1"  step="any">
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
          <input type="submit" name="customer" class="btn btn-success btn-block" value="Create Customer">
        </form>
      </div>
    </div>
    
    <div class="col-md-8">
    <h1 style="text-align:center;"> CLIENTES </h1>  
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Name</th>
            <th>Amount</th>
            <th>Reception Ad</th>
            <th>Delivery Ad</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM customers";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['cost']; ?></td>
            <td><?php echo $row['addressR']; ?></td>
            <td><?php echo $row['addressD']; ?></td>

            <td>
              <a href="edit_customer.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_customer.php?id=<?php echo $row['id']?>" class="btn btn-danger">
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







