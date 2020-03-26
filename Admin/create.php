<?php
  require_once 'db.php';

  if($_SERVER['REQUEST_METHOD'] === 'POST') :
    //print_r($_POST);
    $sql = "INSERT INTO backendprojekt_posts(subject, posts)
            VALUES (:subject, :posts)";

    $stmt =  $db->prepare($sql);

    $subject = htmlspecialchars($_POST['subject']);
    $posts    = htmlspecialchars($_POST['posts']);

    $stmt->bindParam(':subject', $subject);
    $stmt->bindParam(':posts', $posts);

    $stmt->execute();

  endif;

  require_once 'header.php';
?>

<h1>Här kan du skapa dina inlägg</h1>

<form action="#" method="POST">
<label for="subject">Ämne</label>
<br>
  <input 
    type="text" 
    id="subject"s
    name="subject">
<br>
<label for="posts">Skriv ditt inlägg här</label>
<br>
  <textarea 
    name="posts" 
    id="posts" 
    cols="100" 
    rows="30"
    maxlength="1000">
    </textarea>
<br>

  <input 
    type="submit"
    value="Publicera">
  
</form>
<br>

<button>
  <a href="../index.php">Visa min blogg</a>
</button>
<button>
  <a href="adminstart.php">Tillbaka</a>
</button>



<?php
  require_once 'footer.php'
?>