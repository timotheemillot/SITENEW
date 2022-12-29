<?php

class StatsController{

    public function displayStatistique()
    {
        $indexView = new View('Statistique');
        $indexView->generer([]);
    }

}

?>