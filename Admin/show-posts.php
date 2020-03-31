<?php

/* 
Visar tabell över blogginlägg med länkar för att 
redigera respektive ta bort inlägg (ruta för att avpublicera/publicera
enstaka tillägg ska också läggas till) 
*/

require_once 'db.php';
require_once 'header.php';


$sql = "SELECT * FROM backendprojekt_posts";

$stmt = $db->prepare($sql);
$stmt->execute();

echo "<table class='table'>";
echo "<tr>
        <th>Inläggs-id</th>
        <th>Ämne</th>
        <th>Datum</th>
        <th>Bild/er</th>
        <th>Publicerad/Avpublicerad<th>
        <th>Redigera/Ta bort</th>
      </tr>";

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): 
  
  $id      = htmlspecialchars( $row['id'] ); 
  $subject = htmlspecialchars( $row['subject'] );
  $date    = htmlspecialchars( $row['date'] );
  $image   = htmlspecialchars( $row['image'] );
  $publish = htmlspecialchars( $row['publish'] );

echo "<tr> 
        <td>$id</td>
        <td>$subject</td>
        <td>$date</td>
        <td>$image</td>
        <td>$publish</td>
        <td><a href='update.php?id=$id' 
        class='btn btn-outline-info'>
        Redigera
      </a>
      <a href='delete.php?id=$id' 
        class='btn btn-outline-danger'
        data-toggle='modal' data-target='#exampleModalCenter'> 
        Ta bort
      </a></td>
      </tr>"; 

endwhile;

echo '</table>';

?>

<button>
  <a href="index.php">Adminpanelen</a>
</button>
<button>
  <a href="../index.php">Visa min blogg</a>
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered"role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Du är på väg att radera ett inlägg..</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Är du säker på att du vill ta bort detta inlägg?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Nej, jag har ångrat mig</button>
        <button type="button" class="btn btn-primary"><a href="delete.php?id= <?php echo $id ?>" >Ja, ta bort</a></button>
      </div>
    </div>
  </div>
</div>

<?php
require_once 'footer.php';
?>