
 <form class="filtre" action="index.php?action=search" method="post">
        <select id="divforme" name="champ" >
            <option value=""> <?php echo $filtre ?></option>
            <option value="Nom">Nom</option>
            <option value="Date-Cr">Date (croissant)</option>
            <option value="Date-Dé">Date (décroissant)</option>
            <option value="Durée">Durée</option>
            <option value="Véhicule">Véhicule</option>
            <option value="Nombre_covoit">Nombre de Covoit</option>

        </select>   
       
        <input class="button" type="submit" name="submit" value="Filtrer" >


    </form>

       <table id="listres">
        <tr id="coul">
            <th>Nom</th>
            <th>Date</th>
            <th>Durée</th>
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
                     <td >" . $reservation->getDurée() . "</td>
                     <td >" . $reservation->getVéhicule() . "</td>
                     <td >" . $reservation->getNombre_covoit() . "</td>   
                 ";

                 if($reservation->getDate() >= $date ){
                 echo "<td> <a href=\"index.php?action=del-reservation&idReservation=" . $reservation->getIdReservation() . "\"> annuler la réservation </a></td>" ;
                 }
                 else {
                    echo "<td> réservation terminé</td>" ;
                 }      
             }

            
         }
         ?>
         </tr>

        </table>

        <p id="popup"><?= $popup; ?></p> 
