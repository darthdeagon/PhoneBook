<?php
require_once("database.php");
$contact_id = get_contact_by_id();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <div class="container">
      <div class="row d-flex justify-content-center pt-5">
        <div class="col col-6 bg-dark text-light mt-2 p-5 mb-5">
          <form method="POST">
        <div class="mb-3">
          <label for="exampleInputEmail1  " class="form-label">Name</label>
          <input type="text" name="name" class="form-control" value="<?php if(isset($name_data)): echo $name_data; ?> <?php endif; ?>" id="exampleInputEmail1" autocomplete="off">
          <div id="emailHelp" class="form-text">
            <?php if (isset($name_error)): ?>
              <?php echo $name_error ?>
            <?php endif; ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Phone number</label>
          <input type="number" name="number" class="form-control" id="exampleInputPassword1" autocomplete="off">
        </div>
        <div id="emailHelp" class="form-text">
          <?php if (isset($number_error)): ?>
            <?php echo $number_error ?>
          <?php endif; ?>
        </div>
        <button type="submit" name="Add_contact" class="btn btn-primary">Add contact</button>
          </form>
        </div>
      </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

  </body>
</html>
