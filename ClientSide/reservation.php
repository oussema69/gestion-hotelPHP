<?php echo $_GET["id"] ?>

<form action="reservation.php" method="post">
  <input type="hidden" id="id_client" name="id_client" required>

  <input type="hidden" id="id_chambre" name="id_chambre" required>

  <label for="date_deb">Date de début:</label>
  <input type="date" id="date_deb" name="date_deb" required>

  <label for="date_fin">Date de fin:</label>
  <input type="date" id="date_fin" name="date_fin" required>

  <input type="submit" value="Réserver">
</form>
