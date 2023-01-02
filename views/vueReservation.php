<script type="text/javascript">
         
         jQuery(function($){
               $('.month').hide();
               $('.month:first').show();
               $('.months a:first').addClass('active');
               var current = 1;
               $('.months a').click(function(){
                    var month = $(this).attr('id').replace('linkMonth','');
                    if(month != current){
                        $('#month'+current).slideUp();
                        $('#month'+month).slideDown();
                        $('.months a').removeClass('active'); 
                        $('.months a#linkMonth'+month).addClass('active'); 
                        current = month;                      
                    }
                    return false; 
               });
         
            });
    </script>



    <?php 
       require_once("models/calendrier/horaire.php");

       $date = new Horaire();
       $events = $date->getEvents($year);
       $dates = $date->getAll($year);


        
    ?>

    <div class="periods">
        <div class="year" id="nextyear" ><?php echo $year?> <a  href="index.php?action=Reservation"> ⇚ </a> <a  href="index.php?action=next-year&year=" . $year > ⇛ </a>  </div>
        <div class="months">

            
        <form action="index.php?action=add-reservation" method="POST"> 
                    <div id="divform" > 
                        <div class="divinput">
                         <select  name="vehicule" placeholder="Véhicule" required class="textinput" >    
                                <?php
                                    foreach($allVehicule as $vehicule)
                                    {
                                        if (($vehicule->getDisponible() == 1 && $admin == 0) || $admin == 1) {
                                         echo "<option >" . $vehicule->getMarque() . " - " . $vehicule->getModele() . "</option>";
                                        }
                                    }
                                 ?>
                                 </select>  
                        </div>

                        <div class="divinput">
                         <select  name="duree" placeholder="durée" required class="textinput" >    
                              <option> 08h - 19h</option>
                              <option> 08h - 13h</option>
                              <option> 13h - 19h</option>
                         </select>  
                        </div>

                        <!--<div class="divinput">
                            <input type="text"  class="textinput" name="duree"  required placeholder="durée">  
                        </div>-->


                        <div class="divinput">
                            <input type="date"  class="textinput" name="date"  required placeholder="Date de réservation">  
                        </div>
                        <div class="divinput">
                            <input type="number"  class="textinput" name="numbe"  required placeholder="Nombre de personne" max=4>  
                        </div>

                        <p id="submit">
                          <input class="button" type="submit" name="submit" value="Réserver" accesskey="enter">
                        </p>
                        <br>
                        <br>
                        <p id="popup"><?= $popup; ?></p> 
                    </div> 
                    
            </form> 


            
     

            <ul>
                <?php foreach ($date->months as $id=>$m): ?>
                    <li><a class="calend" href="#" id="linkMonth<?php echo $id+1; ?>"><?php echo utf8_encode(substr(utf8_decode($m), 0, 3)); ?> </a> </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="clear"></div>
        <?php $dates = current($dates); ?>                                                                                                                                                                                                                              
        <?php foreach ($dates as $m =>$days): ?>
            <div class="month" class="relative"  id="month<?php echo $m; ?>">
            <table>
                <thead>
                    <tr>
                        <?php foreach ($date -> days as $d): ?>
                            <th><?php echo substr($d,0,3); ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php $end = end($days); foreach ($days as $d=>$w): ?>
                            <?php $time = strtotime("$year-$m-$d");  ?>
                            <?php if($d ==1): ?>
                                <td colspan="<?php echo $w-1; ?>" class="padding"></td>
                            <?php endif; ?>

                            <td>
                                <div class="relative">
                                   <div class="day"> <?php echo $d; ?></div>
                                </div>
                                <div class="daytitle">
                                    <?php echo $date->days[$w-1]; ?> <?php echo $d; ?> <?php echo $date->months[$m-1]; ?> 
                                </div>
                                <div class="events">
                                    <?php  if(isset($events[$time])) : foreach($events[$time] as $e):  ?>
                                        <li> <?php  echo $e; ?>
                                       
                                        </li> 
                                    <?php endforeach; endif;?>
                                </div>
                            </td>
                            <?php if($w ==7): ?>
                             </tr><tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <?php if($end != 7): ?>
                            <td colspan="<?php echo 7-$end?>" class="padding"></td> 
                        <?php endif; ?>
                    </tr>
                </tbody>
            </table>


            </div>
            <?php endforeach; ?>

            <?php if($admin == 1)echo "<a href=\"index.php?action=HistRes\" id=\"lien\">Consulter les réservations</a> "?>

    </div>