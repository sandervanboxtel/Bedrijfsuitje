<?php
   if(isset($_SESSION['loggedIn']))
   {
   
   }else{
       header("Location: index.php?page=login");
   }
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>userpanel</title>
   </head>
   <body>
       <main>

      <div class="containter">
         <div class="row">
            <div class="col-12">
            <center>
            <h1 class="adminpaneltxt">Userpanel - Kies een activiteit</h1>
            </center>
               <?php
                  $sql = "SELECT * FROM activiteiten"; //You don't need a ; like you do in SQL
                      $r = $verbinding->query($sql);
                          ?>
               <div class="container">
                  <div class="row">
                     <div class="col-12 justify-content-center white">
                        <table class="table ">
                           <thead>
                              <tr>
                                 <th>ID</th>
                                 <th>Naam</th>
                                 <th>Aantal Inschrijvinggen</th>
                                 <th>Aanvang</th>
                                 <th>Einde</th>
                                 <th>Deadline</th>
                                 <th>Inschrijven</th>
                              </tr>
                           </thead>
                           <?php
                              while ($row = $r->fetch(PDO::FETCH_ASSOC)) :
                              ?>
                           <tr>
                              <td>
                                 <?php echo $row['id']; ?>
                              </td>
                              <td>
                                 <?php echo $row['naam']; ?>
                              </td>
                              <td>
                                 <?php echo $row['maximaal_aantal_inschrijvingen']; ?>
                              </td>
                              <td>
                                 <?php echo $row['tijdstip_aanvang']; ?>
                              </td>
                              <td>
                                 <?php echo $row['tijdstip_einde']; ?>
                              </td>
                              <td>
                                 <?php echo $row['deadline_inschrijven']; ?>
                              </td>
                              <td>
                                 <form method="POST"><button class="btninschrijven"name="inschrijven" type="submit">Inschrijven</button></form>
                              </td>
                           </tr>
                           <?php
                              endwhile;
                              ?>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <br><br><br>      
    </main>
   </body>
</html>