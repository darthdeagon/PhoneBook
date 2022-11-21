<?php
require_once("database.php");
$contacts = get_contacts();



 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="row d-flex justify-content-center pt-5">
      <div class="col col-6 bg-dark text-light mt-2 p-5 mb-5">
        <table class="table text-light">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Number</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($contacts as $rov => $contact): ?>
    <tr>
      <th scope="row"><?php echo $contact['id']; ?></th>
      <td><?php echo $contact['name']; ?></td>
      <td><?php echo $contact['phone_number']; ?></td>
      <td>
        <form method="GET">
          <button type="submit" name="edit_user" value="<?php echo $contact['id'] ?>"  class="btn btn-success">Edit</button>

        </form>
      </td>

    </tr>


  <?php endforeach; ?>
  </tbody>
</table>
      </div>
    </div>
<?php
if (isset($_GET['edit_user'])): ?>
  <?php
  $contact_info = get_contact_by_id($_GET['edit_user']);

  if (isset($_POST['save_change'])) {
    $errors = 0;
    if (empty($_POST['name'])) {
      $errors++;
      $name_error = "Please enter name";
    }else {
      $name_data = $_POST['name'];
    }
    if (empty($_POST['number'])) {
      $errors++;
      $number_error = "Please enter phone number";
    }else {
      $number_data = $_POST['number'];
    }
    if ($errors == 0) {
      update_contact($_GET['edit_user'], $name_data, $number_data);
      header("Location: phoneBook.php");
      }

    }
    if (isset($_POST['delete_contact'])) {
      delete_user($_GET['edit_user']);
        header("Location: phoneBook.php");
    }



   ?>
    <div class="container">
      <div class="row d-flex justify-content-center pt-5">
        <div class="col col-6 bg-dark text-light mt-2 p-5 mb-5">
          <form method="POST">
        <div class="mb-3">
          <label for="exampleInputEmail1  " class="form-label">Name</label>
          <input type="text" name="name" class="form-control" value="<?php echo  $contact_info['name']; ?>" id="exampleInputEmail1" autocomplete="off">
          <div id="emailHelp" class="form-text">
            <?php if (isset($name_error)): ?>
              <?php echo $name_error ?>
            <?php endif; ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Phone number</label>
          <input type="number" name="number" class="form-control" value="<?php echo $contact_info['phone_number']; ?>"  id="exampleInputPassword1" autocomplete="off">
        </div>
        <div id="emailHelp" class="form-text">
          <?php if (isset($number_error)): ?>
            <?php echo $number_error ?>
          <?php endif; ?>
        </div>
        <button type="submit" name="save_change" class="btn btn-primary">Save change</button>
          <button type="submit" name="delete_contact" class="btn btn-primary">Delete contact</button>

          </form>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
