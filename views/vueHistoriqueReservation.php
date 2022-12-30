        <table id="listres">
        <tr id="coul">
            <th>Nom</th>
            <th>Date</th>
            <th>Véhicule</th>
            <th>Nombre de covoit</th>
            <th></th>
        </tr>
        <?php 
         if(isset($allreservation))
         {
             for ($i = 0;$i<count($allreservation); $i++)
             {
                 $reservation = $allreservation[$i];
                 echo "
                 <tr class =\"ligne\">
                     <td >" . $reservation->getNom() . "</td>
                     <td >" . $reservation->getDate() . "</td>
                     <td >" . $reservation->getVéhicule() . "</td>
                     <td >" . $reservation->getNombre_covoit() . "</td>
                     <td><a href=\"index.php?action=del-reservation&idReservation=" . $reservation->getIdReservation() . "\">Annuler la réservation</a></td>
                 </tr>";
                 
             }
         }
         ?>
        

        </table>

        <p id="popup"><?= $popup; ?></p> 
