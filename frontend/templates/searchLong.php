<div class="container-fluid searchimage" style="min-height: 400px; max-height: 750px; background-size: cover; background-position:center; min-height: 400px; max-height: 1600px">
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="d-flex justify-content-center" style="margin-top: 20px;">
                <div class="card" style="width:100%; background:none; border:none">
                    <article class="card-body" style="max-width: 100%; ">
                        <form class="form-postOffer" method='GET' action="../views/offers.php?page=1">
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="row" style="margin-top:20px;">
                                        <div class="col-md-6 col-12">
                                            <div class="input-group mt-3">
                                                <input value="<?php echo $_GET['brand']; ?>" name='brand' type="text" class="form-control" placeholder="Marka samochodu">
                                            </div>

                                            
                                            <div class="col-md-12 col-12">
                                                <div class="row">
                                                    <div class="input-group mt-3">
                                                        <input value="<?php echo $_GET['priceFrom']; ?>" name='priceFrom' type="text" class="form-control" placeholder="Cena od">
                                                        <input value="<?php echo $_GET['priceTo']; ?>" name='priceTo' type="text" class="form-control" placeholder="Cena do">
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-612 col-12">
                                                <div class="row">
                                                    <div class="input-group mt-3">
                                                        <input value="<?php echo $_GET['runFrom']; ?>" name='runFrom' type="text" class="form-control" placeholder="Przebieg od">
                                                        <input value="<?php echo $_GET['runTo']; ?>" name='runTo' type="text" class="form-control" placeholder="Przebieg do">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="input-group mt-3">
                                                <input value="<?php echo $_GET['model']; ?>" name='model' type="text" class="form-control" placeholder="Model samochodu">
                                            </div>
                                            <div class="input-group mt-3">
                                                <input value="<?php echo $_GET['production_year']; ?>" name='production_year' type="text" class="form-control" placeholder="Rok produkcji">
                                            </div>
                                            <div class="input-group mt-3">
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
                                            <option value="" selected>Rodzaj paliwa</option>
                                             <?php
                                                for ($i = 0; $i < count($carFuels); $i++) {
                                                    if ($carFuels[$i]['id'] == $_GET['fuel']) {
                                                        echo '<option selected value="'.$carFuels[$i]['id'].'">'.$carFuels[$i]['fuel'].'</option>';
                                                    }
                                                    else {
                                                        echo '<option value="'.$carFuels[$i]['id'].'">'.$carFuels[$i]['fuel'].'</option>';
                                                    }
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
                                            
                                            <div class="input-group mt-3">
                                                <input value="<?php echo $_GET['power']; ?>" name='power' type="text" class="form-control" placeholder="Moc">
                                            </div>

                                            <div class="input-group mt-3">
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
                                            <option value="" selected>Skrzynia biegów</option>
                                             <?php
                                                for ($i = 0; $i < count($gearboxes); $i++) {
                                                    if ($gearboxes[$i]['id'] == $_GET['gearbox']) {
                                                        echo '<option selected value="'.$gearboxes[$i]['id'].'">'.$gearboxes[$i]['type'].'</option>';
                                                    }
                                                    else {
                                                        echo '<option value="'.$gearboxes[$i]['id'].'">'.$gearboxes[$i]['type'].'</option>'; 
                                                    }
                                                }
                                            ?>
                                        </select>
                                            </div>
                                            <div class="input-group mt-3">
                                                <?php
                                            include_once realpath(dirname(__FILE__) . '/../../backend/db/dbConnect.php');
                                            include_once realpath(dirname(__FILE__) . '/../../backend/db/dbCredentials.php');
                                            include_once realpath(dirname(__FILE__) . '/../../backend/db/models/CarDrives.php');
                                            $db = new DB($host, $user, $password, $database);
                                            if (!$db->connect()) {
                                                echo '<div class="alert alert-danger" role="alert">
                                                                    Nie udało się nawiązać połączenia z bazą
                                                                </div>';
                                            } 
                                            else {
                                                $carDrives = CarDrives::getDrives($db->getConnection());
                                                $carDrives = mysqli_fetch_all($carDrives, MYSQLI_ASSOC);  
                                            }
                                        ?>
                                        <select name="drive" class="form-select" aria-label="Default select example">
                                        <option value="" selected>Napęd</option>
                                             <?php
                                                for ($i = 0; $i < count($carDrives); $i++) {
                                                    if ($carDrives[$i]['id'] == $_GET['drive']) {
                                                        echo '<option selected value="'.$carDrives[$i]['id'].'">'.$carDrives[$i]['drive'].'</option>';
                                                    } 
                                                    else {
                                                        echo '<option value="'.$carDrives[$i]['id'].'">'.$carDrives[$i]['drive'].'</option>';
                                                    }
                                                }
                                            ?>
                                        </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">

                                            <div class="col-md-12 col-12 mt-3">
                                                <div class="row">
                                                    <div class="input-group">
                                                        <input value="<?php echo $_GET['door']; ?>" name='door' type="text" class="form-control" placeholder="Liczba drzwi">
                                                        <input value="<?php echo $_GET['seats']; ?>" name='seats' type="text" class="form-control" placeholder="Liczba siedzeń">
                                                    </div>
                                                </div>
                                            </div>
                                    
                                            <div class="input-group mt-3">
                                                <input value="<?php echo $_GET['origin']; ?>" name='origin' type="text" class="form-control" placeholder="Pochodzenie">
                                            </div>
                                           
                                             <div class="input-group mt-3">
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
                                        <option value="" selected>Stan</option>
                                             <?php
                                                for ($i = 0; $i < count($carStates); $i++) {
                                                    if ($carStates[$i]['id'] == $_GET['state']) {
                                                        echo '<option selected value="'.$carStates[$i]['id'].'">'.$carStates[$i]['state'].'</option>';
                                                    }
                                                    else {
                                                        echo '<option value="'.$carStates[$i]['id'].'">'.$carStates[$i]['state'].'</option>';
                                                    }
                                                }
                                            ?>
                                        </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12 ">
                                    <div class="row" style="margin-top:20px;">
                                        <div class="col-md-6 col-12">
                                          
                                            <div class="input-group mt-3">
                                                <input value="<?php echo $_GET['engine_capacity']; ?>" name='engine_capacity' type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Pojemność skokowa">
                                            </div>

                                            
                                             <div class="input-group mt-3">
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
                                        <option value="" selected>Typ samochodu</option>
                                             <?php
                                                for ($i = 0; $i < count($CarTypes); $i++) {
                                                    if ($CarTypes[$i]['id'] == $_GET['type']) {
                                                        echo '<option selected value="'.$CarTypes[$i]['id'].'">'.$CarTypes[$i]['type'].'</option>';
                                                    }
                                                    else {
                                                        echo '<option value="'.$CarTypes[$i]['id'].'">'.$CarTypes[$i]['type'].'</option>';
                                                    }
                                                }
                                            ?>
                                        </select>
                                            </div>
                                            
                                            <div class="input-group mt-3">
                                                <input value="<?php echo $_GET['color']; ?>" name='color' type="text" class="form-control" placeholder="Kolor samochodu">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            
                                            <div class="input-group mt-3">
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
                                        <option value="" selected>Województwo</option>
                                             <?php
                                                for ($i = 0; $i < count($provinces); $i++) {
                                                    if ($provinces[$i]['id'] == $_GET['province']) {
                                                        echo '<option selected value="'.$provinces[$i]['id'].'">'.$provinces[$i]['name'].'</option>';
                                                    }
                                                    else {
                                                        echo '<option value="'.$provinces[$i]['id'].'">'.$provinces[$i]['name'].'</option>';
                                                    }
                                                }
                                            ?>
                                        </select>
                                            </div>
                                            
                                            <div class="input-group mt-3">
                                                <input value="<?php echo $_GET['district']; ?>" name='district' type="text" class="form-control" placeholder="Powiat">
                                            </div>
                                            
                                            <div class="input-group mt-3">
                                                <input value="<?php echo $_GET['city']; ?>" name='city' type="text" class="form-control" placeholder="Miasto">
                                            </div>
                                            <input type="text" value='1' name='page' hidden>
                                            <div class="col-md-12 col12 d-flex justify-content-end" style="margin-top: 20px;">
                                                <button class="btn btn-danger" style="height: 50px; width:150px" type='submit'><i class="fa fa-search me-2"></i>Szukaj</button>
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