<div class="container-fluid" style="background-color:slategrey; min-height: 400px; max-height: 1600px">
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="d-flex justify-content-center" style="margin-top: 20px;">
                <div class="card" style="width:100%;">
                    <article class="card-body" style="max-width: 100%;">
                        <h4 class="card-title mt-3 text-center">Panel wyszukiwania</h4>
                        <form class="form-postOffer" method='GET' action="../views/offers.php?page=1">
                            <div class="row">
                                <div class="col-md-4 col12">
                                    <div class="row" style="margin-top:20px;">
                                        <div class="col-md-6 col-12">
                                            <span>Marka samochodu</span>
                                            <div class="input-group">
                                                <input name='brand' type="text" class="form-control">
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <span>Cena od:</span>
                                                    <div class="input-group">
                                                        <input name='priceFrom' type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <span>Cena do:</span>
                                                    <div class="input-group">
                                                        <input name='priceTo' type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <span>Przebieg od:</span>
                                                    <div class="input-group">
                                                        <input name='runFrom' type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <span>Przebieg do:</span>
                                                    <div class="input-group">
                                                        <input name='runTo' type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <span>Model samochodu</span>
                                            <div class="input-group">
                                                <input name='model' type="text" class="form-control">
                                            </div>
                                            <span>Rok produkcji</span>
                                            <div class="input-group">
                                                <input name='production_year' type="text" class="form-control">
                                            </div>
                                            <span>Rodzaj paliwa</span>
                                            <div class="input-group">
                                                <?php
                                            include_once realpath(dirname(__FILE__) . '/../../backend/db/dbConnect.php');
                                            include_once realpath(dirname(__FILE__) . '/../../backend/db/dbCredentials.php');
                                            include_once realpath(dirname(__FILE__) . '/../../backend/db/models/CarFuels.php');
                                            $db = new DB($host, $user, $password, $database);
                                            if (!$db->connect()) {
                                                echo '<div class="alert alert-danger" role="alert">
                                                                    Nie udało się nawiązać połączenia z bazą
                                                                </div>';
                                            } else {
                                                $carFuels = CarFuels::getFuels($db->getConnection());
                                                $carFuels = mysqli_fetch_all($carFuels, MYSQLI_ASSOC);  
                                            }
                                        ?>
                                        <select name="fuel" class="form-select" aria-label="Default select example">
                                            <option selected></option>
                                             <?php
                                                for ($i = 0; $i < count($carFuels); $i++) {
                                                    echo '<option value="'.$carFuels[$i]['id'].'">'.$carFuels[$i]['fuel'].'</option>';
                                                }
                                            ?>
                                        </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col12">
                                    <div class="row" style="margin-top:20px;">
                                        <div class="col-md-6 col-12">
                                            <span>Moc</span>
                                            <div class="input-group">
                                                <input name='power' type="text" class="form-control">
                                            </div>

                                            <span>Skrzynia biegów</span>
                                            <div class="input-group">
                                                <?php
                                            include_once realpath(dirname(__FILE__) . '/../../backend/db/dbConnect.php');
                                            include_once realpath(dirname(__FILE__) . '/../../backend/db/dbCredentials.php');
                                            include_once realpath(dirname(__FILE__) . '/../../backend/db/models/Gearboxes.php');
                                            $db = new DB($host, $user, $password, $database);
                                            if (!$db->connect()) {
                                                echo '<div class="alert alert-danger" role="alert">
                                                                    Nie udało się nawiązać połączenia z bazą
                                                                </div>';
                                            } else {
                                                $gearboxes = Gearboxes::getGearboxes($db->getConnection());
                                                $gearboxes = mysqli_fetch_all($gearboxes, MYSQLI_ASSOC);  
                                            }
                                        ?>
                                        <select name="gearbox" class="form-select" aria-label="Default select example">
                                            <option selected></option>
                                             <?php
                                                for ($i = 0; $i < count($gearboxes); $i++) {
                                                    echo '<option value="'.$gearboxes[$i]['id'].'">'.$gearboxes[$i]['type'].'</option>';
                                                }
                                            ?>
                                        </select>
                                            </div>
                                            <span>Napęd</span>
                                            <div class="input-group">
                                                <?php
                                            include_once realpath(dirname(__FILE__) . '/../../backend/db/dbConnect.php');
                                            include_once realpath(dirname(__FILE__) . '/../../backend/db/dbCredentials.php');
                                            include_once realpath(dirname(__FILE__) . '/../../backend/db/models/CarDrives.php');
                                            $db = new DB($host, $user, $password, $database);
                                            if (!$db->connect()) {
                                                echo '<div class="alert alert-danger" role="alert">
                                                                    Nie udało się nawiązać połączenia z bazą
                                                                </div>';
                                            } else {
                                                $carDrives = CarDrives::getDrives($db->getConnection());
                                                $carDrives = mysqli_fetch_all($carDrives, MYSQLI_ASSOC);  
                                            }
                                        ?>
                                        <select name="drive" class="form-select" aria-label="Default select example">
                                            <option selected></option>
                                             <?php
                                                for ($i = 0; $i < count($carDrives); $i++) {
                                                    echo '<option value="'.$carDrives[$i]['id'].'">'.$carDrives[$i]['drive'].'</option>';
                                                }
                                            ?>
                                        </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">

                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <span>Liczba drzwi:</span>
                                                    <div class="input-group">
                                                        <input name='door' type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <span>Liczba siedzeń:</span>
                                                    <div class="input-group">
                                                        <input name='seats' type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <span>Pochodzenie</span>
                                            <div class="input-group">
                                                <input name='origin' type="text" class="form-control">
                                            </div>
                                            <span>Stan</span>
                                             <div class="input-group">
                                                <?php
                                            include_once realpath(dirname(__FILE__) . '/../../backend/db/dbConnect.php');
                                            include_once realpath(dirname(__FILE__) . '/../../backend/db/dbCredentials.php');
                                            include_once realpath(dirname(__FILE__) . '/../../backend/db/models/CarStates.php');
                                            $db = new DB($host, $user, $password, $database);
                                            if (!$db->connect()) {
                                                echo '<div class="alert alert-danger" role="alert">
                                                                    Nie udało się nawiązać połączenia z bazą
                                                                </div>';
                                            } else {
                                                $carStates = CarStates::getStates($db->getConnection());
                                                $carStates = mysqli_fetch_all($carStates, MYSQLI_ASSOC);  
                                            }
                                        ?>
                                        <select name="state" class="form-select" aria-label="Default select example">
                                            <option selected></option>
                                             <?php
                                                for ($i = 0; $i < count($carStates); $i++) {
                                                    echo '<option value="'.$carStates[$i]['id'].'">'.$carStates[$i]['state'].'</option>';
                                                }
                                            ?>
                                        </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col12">
                                    <div class="row" style="margin-top:20px;">
                                        <div class="col-md-6 col-12">
                                            <span>Pojemność skokowa</span>
                                            <div class="input-group">
                                                <input name='engine_capacity' type="text" class="form-control" aria-label="Text input with dropdown button">
                                            </div>

                                            <span>Typ samochodu</span>
                                             <div class="input-group">
                                                <?php
                                            include_once realpath(dirname(__FILE__) . '/../../backend/db/dbConnect.php');
                                            include_once realpath(dirname(__FILE__) . '/../../backend/db/dbCredentials.php');
                                            include_once realpath(dirname(__FILE__) . '/../../backend/db/models/CarTypes.php');
                                            $db = new DB($host, $user, $password, $database);
                                            if (!$db->connect()) {
                                                echo '<div class="alert alert-danger" role="alert">
                                                                    Nie udało się nawiązać połączenia z bazą
                                                                </div>';
                                            } else {
                                                $CarTypes = CarTypes::getTypes($db->getConnection());
                                                $CarTypes = mysqli_fetch_all($CarTypes, MYSQLI_ASSOC);  
                                            }
                                        ?>
                                        <select name="type" class="form-select" aria-label="Default select example">
                                            <option selected></option>
                                             <?php
                                                for ($i = 0; $i < count($CarTypes); $i++) {
                                                    echo '<option value="'.$CarTypes[$i]['id'].'">'.$CarTypes[$i]['type'].'</option>';
                                                }
                                            ?>
                                        </select>
                                            </div>
                                            <span>Kolor samochodu</span>
                                            <div class="input-group">
                                                <input name='color' type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <span>Województwo</span>
                                            <div class="input-group">
                                                <?php
                                            include_once realpath(dirname(__FILE__) . '/../../backend/db/dbConnect.php');
                                            include_once realpath(dirname(__FILE__) . '/../../backend/db/dbCredentials.php');
                                            include_once realpath(dirname(__FILE__) . '/../../backend/db/models/Provinces.php');
                                            $db = new DB($host, $user, $password, $database);
                                            if (!$db->connect()) {
                                                echo '<div class="alert alert-danger" role="alert">
                                                                    Nie udało się nawiązać połączenia z bazą
                                                                </div>';
                                            } else {
                                                $provinces = Provinces::getProvinces($db->getConnection());
                                                $provinces = mysqli_fetch_all($provinces, MYSQLI_ASSOC);  
                                            }
                                        ?>
                                        <select name="province" class="form-select" aria-label="Default select example">
                                            <option selected></option>
                                             <?php
                                                for ($i = 0; $i < count($provinces); $i++) {
                                                    echo '<option value="'.$provinces[$i]['id'].'">'.$provinces[$i]['name'].'</option>';
                                                }
                                            ?>
                                        </select>
                                            </div>
                                            <span>Powiat</span>
                                            <div class="input-group">
                                                <input name='district' type="text" class="form-control">
                                            </div>
                                            <span>Miasto</span>
                                            <div class="input-group">
                                                <input name='city' type="text" class="form-control">
                                            </div>
                                            <input type="text" value='1' name='page' hidden>
                                            <div class="col-md-12 col12 d-flex justify-content-end" style="margin-top: 20px;">
                                                <button class="btn btn-success" style="height: 50px; width:100px" type='submit'>Szukaj</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>