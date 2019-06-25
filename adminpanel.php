<?php
   $users_id= "";
   $voorletters = "";
   $tussenvoegsel= "";
   $achternaam= "";
   $email= "";
   $vouchercode= "";
   
   if($_SESSION['rol'] != 1 ){
      header("Location: index.php?page=userpanel");
   }
   if(isset($_SESSION['loggedIn']))
   {
   
   }else{
       header("Location: index.php?page=AdminLogin");
   }
   
   
   
   if(isset($_GET['action'])=="update")
   {
   
   $users_id = $_GET['id'];
   
   $sql = "SELECT * FROM personeel WHERE users_id='$users_id'";
        $r = $verbinding->query($sql);
   
        if($r->rowCount()==1){
            $row = $r->fetch(PDO::FETCH_ASSOC);
   
            $users_id = $row['users_id'];
            $voorletters = $row['voorletters'];
            $tussenvoegsel = $row['tussenvoegsel'];
            $achternaam = $row['achternaam'];
            $email = $row['email'];
            $vouchercode = $row['vouchercode'];
        }
   
   }
   
   ?>
<?php
   if(isset($_GET['action']) && $_GET['action'] == 'delete'){
      $sth = $verbinding->prepare('DELETE FROM personeel WHERE users_id = :users_id');
      $sth->execute(array(':users_id' => $_GET['id']));
   
      $_SESSION['message'] = "Record has been deleted!";
      $_SESSION['msg_type'] = "danger";
   
      header('Location: index.php?page=adminpanel');
      exit();     

      // if(isset($_GET['action']) && $_GET['action'] == 'update'){
      //    $sth = $verbinding->prepare('UPDATE `personeel` SET `users_id`=[value-1],`voorletters`=[value-2],`tussenvoegsel`=[value-3],`achternaam`=[value-4],`email`=[value-5],`vouchercode`=[value-6] WHERE users_id = :users_id');
      //    $sth->execute(array(':users_id' => $_GET['id']));
      
      //    header('Location: index.php?page=adminpanel');
      //    exit();  
   }


   if(isset($_GET['action']) && $_GET['action'] == 'update'){
      $_SESSION['message'] = "The form has been updated with the information of the Record!";
      $_SESSION['msg_type'] = "info";
   }

   if(isset($_GET['action']) && $_GET['action'] == 'save'){
      $_SESSION['message'] = "The Record has been saved in the Database!";
      $_SESSION['msg_type'] = "success";
   }
   ?>
<?php 
   if (isset($_SESSION['message'])): ?>
<div class="alert alert-<?=$_SESSION['msg_type']?>">
   <?php
      echo $_SESSION['message'];
      unset($_SESSION['message']);
      ?>
</div>
<?php endif ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Adminpanel</title>
   </head>
   <body>
      <main>
         <div class="container">
         <div class="row">
            <div class="col-12">
               <div class="userText">
                  <h2 class="adminpaneltxt">Admin Panel</h2>
                  <h3 class="adminpaneltxt">Update Personeel Database</h3>
                  <div class="userForm">
                     <form method="post">
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <?php
            $sql = "SELECT * FROM personeel";               
            $r = $verbinding->query($sql);               
            ?>
         <div class="container">
            <div class="row">
               <div class="col-12">
                  <form action="" method="POST">
                     <div class="form-group">
                        <label for="exampleInputEmail1">Users ID</label>
                        <input type="text" class="form-control" id="email" name="users_id" placeholder="Users ID" value="<?php echo $users_id; ?>" >
                        <small class="form-text text-muted"></small>
                     </div>
                     <div class="form-group">
                        <label for="voucher">Voorletters</label>
                        <input type="text" class="form-control" id="wachtwoord" name="voorletters" placeholder="Voorletters" value="<?php echo $voorletters; ?>" >
                     </div>
                     <div class="form-group">
                        <label for="exampleInputEmail1">Tussenvoegsel</label>
                        <input type="text" class="form-control" id="email" name="tussenvoegsel" placeholder="Tussenvoegsel" value="<?php echo $tussenvoegsel; ?>" >
                        <small class="form-text text-muted"></small>
                     </div>
                     <div class="form-group">
                        <label for="voucher">Achternaam</label>
                        <input type="text" class="form-control" id="wachtwoord" name="achternaam" placeholder="Achternaam" value="<?php echo $achternaam; ?>" >
                     </div>
                     <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="email" value="<?php echo $email; ?>" >
                        <small class="form-text text-muted"></small>
                     </div>
                     <div class="form-group">
                        <label for="voucher">Vouchercode</label>
                        <input type="text" class="form-control" id="wachtwoord" name="vouchercode" placeholder="Vouchercode" value="<?php echo $vouchercode; ?>" >
                     </div>
                     <!--<button type="submit" value="login" name="save" class="btn loginBtn">Save</button>-->
                     <a href="index.php?page=adminpanel&action=save&id=<?php echo $row['users_id'];?>" class="btn btn-success">Save</a>
                  </form>
               </div>
            </div>
            <div class="row">
               <div class="col-12 justifiy-content-center white">
                  <table class="table">
                     <thead>
                        <tr>
                           <th>Users_id</th>
                           <th>Voorletters</th>
                           <th>Tussenvoegsel</th>
                           <th>Achternaam</th>
                           <th>Email</th>
                           <th>Vouchercode</th>
                           <th>Acties</th>
                        </tr>
                     </thead>
                     <?php
                        while ($row = $r->fetch(PDO::FETCH_ASSOC)) :                        
                        ?>
                     <tr>
                        <td><?php echo $row['users_id']; ?></td>
                        <td><?php echo $row['voorletters']; ?></td>
                        <td><?php echo $row['tussenvoegsel']; ?></td>
                        <td><?php echo $row['achternaam']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['vouchercode']; ?></td>
                        <td>
                           <a href="index.php?page=adminpanel&action=delete&id=<?php echo $row['users_id'];?>" class="btn btn-danger">Delete</a> - 
                           <a href="index.php?page=adminpanel&action=update&id=<?php echo $row['users_id'];?>" class="btn btn-info">Update</a>
                        </td>
                     </tr>
                     <?php
                        endwhile;                        
                        ?>
                  </table>
               </div>
            </div>
         </div>
         <br><br><br>
      </main>
   </body>
</html>