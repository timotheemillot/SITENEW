function displayAddCourroie($idVehicule)
    {
         if (isset($_POST['submit']))
         {
            $vm = new VehiculeManager();
            $vehicule = $vm->getById($idVehicule);
            if ($_POST['kmDerniereCourroie'] > $_POST['cadenceCourroie'])
                $courroieAFaire = 1;
            else
                $courroieAFaire = 0;

            $courroieData = array(
                "cadenceCourroie" => $_POST['cadenceCourroie'],
                "kmDerniereCourroie" => $_POST['kmDerniereCourroie'],
                "courroieAFaire" => $courroieAFaire,
                "idVehicule" => $idVehicule
            );
            $courroie = new Courroie();
            $courroie->hydrate($courroieData);
            $message = $this->addCourroie($courroie);
            
            
            $indexView = new View('Detail');
            $indexView->generer([
                'vehicule' => $vehicule,
                'popup' => $message
            ]);
         }
         else
         {
            $vm = new VehiculeManager();
            $indexView = new View('AddCourroie');
            $indexView->generer([
                'titre' => "Ajouter une donnée courroie",
                'idVehicule' => $idVehicule
            ]);

         }
    }