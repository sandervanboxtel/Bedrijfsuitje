<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title></title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="css/styles.css"/>
   </head>
   <body>
      <main>
         <div class="container">
            <div class="row">
               <div class="col-12">

                  <!-- Breaklines toegevoegd vanwege de Login Form die te hoog stond -->
                                    <br><br><br><br><br>

                  <form name="formLogin" onsubmit="return validateForm1()" action="" method="POST">
                     <div class="form-group">
                        <label for="exampleInputEmail1">Personeelsnummer</label>
                        <input type="text" class="form-control" id="email" name="personeelsnummer" placeholder="Personeelsnummer">
                        <small class="form-text text-muted"></small>
                     </div>
                     <div class="form-group">
                        <label for="voucher">Voucher</label>
                        <input type="password" class="form-control" id="wachtwoord" name="voucher" placeholder="Voucher">
                     </div>
                     <button type="submit" value="login" name="login" class="btn loginBtn">Login</button>
                  </form>
               </div>
            </div>
         </div>
      </main>
      <?php
         if(isset($_POST["login"])) {
         $personeelscode = $_POST["personeelsnummer"];
         $vouchercode = $_POST["voucher"];
         
         $sql = "SELECT users_id, vouchercode FROM personeel";
         $stmt = $verbinding->prepare($sql); //Prepare SQL query
         
         $stmt = $verbinding->query($sql);
         
         while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { //Get all data from requested rows
           if($row["users_id"] == $personeelscode && $row["vouchercode"] == $vouchercode) {
         
            //echo password_hash("admin1", PASSWORD_DEFAULT);
            $_SESSION['rol'] = 0;
            $_SESSION['loggedIn'] = $row['vouchercode'];
         
            header("Location: index.php?page=userpanel");
         } else {
           $melding="<p id=\"timedErr\" class=\"error\">Verkeerde personeelscode of vouchercode!</p>";
             }
           }
           echo $melding;
         }
         ?>
      <!-- Breaklines toegevoegd vanwege de footer die niet omlaag bleef zitten -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
   </body>
</html>