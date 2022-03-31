<?php

class HomeController extends Controller {

    public function index() {
    
        $races = $this->model('Race')->all();

       // mozemo koristiti compact funkciju za prosledivanje podataka view-u
       $this->view('home/index', ['races' => $races]);
    }

    // u nasem slucaju kreira se jedan metod i za prikaz obrasca i za cuvanje podataka iz popunjeg obrasca
    // moguc je i drugi pristup, gde kreiramo create metod za get zahtev, i store metod za post zahtev
    public function create() {

        // cuvanje podataka iz obrasca
        if(isset($_POST['create'])) {

            $newRace = $this->model('Race');
            $newRace->name = $_POST['name'];
            $newRace->country = $_POST['country'];
            $newRace->start_date = $_POST['start_date'];
            $newRace->end_date = $_POST['end_date'];
            $newRace->laps = $_POST['laps'];
            $newRace->winner = $_POST['winner'];
            $newRace->constructor_winner = $_POST['constructor_winner'];
            $newRace->create();
            header("location:/home/index");
            
        }
        // prikaz obrasca
        else {
            $this->view('home/create');
        }

    }

    public function show($id) {

        $race = $this->model('Race')->find($id);
        // treba napomenuti da ovde stavljamo race kao promenljivu, a ne kao niz, iako je parametar po defaultu prazan niz
        // mozda mozemo pretvoriti u niz da ne bi pravilo problem zbog kasnijeg type hinta
        // ipak cemo ubaciti niz
        $this->view('home/show', ['race' => $race]);

    }

    // u nasem slucaju kreira se jedan metod i za editovanje obrasca i za cuvanje promena iz editovanog obrasca
    // moguc je i drugi pristup, gde kreiramo edit metod za get zahtev (prikaz obrasca), i update metod za post zahtev (cuvanje promena)
    public function edit($id) {

        $race = $this->model('Race')->find($id);

        // cuvanje promenjenih podataka iz obrasca
        if(isset($_POST['edit'])) {

            $race->name = $_POST['name'];
            $race->country = $_POST['country'];
            $race->start_date = $_POST['start_date'];
            $race->end_date = $_POST['end_date'];
            $race->laps = $_POST['laps'];
            $race->winner = $_POST['winner'];
            $race->constructor_winner = $_POST['constructor_winner'];
            $race->update();
            header("location:/home/index");

        }
        // prikaz popunjenog obrasca sa dosadasnjim podacima
        else {
            $this->view('home/edit', ['race' => $race]);
        }
    }

    public function delete($id) {

        $race = $this->model('Race')->find($id);
        
        if(isset($_POST['delete'])) {
            $race->delete();
            header('location:/home/index');
        }
        
    }

}