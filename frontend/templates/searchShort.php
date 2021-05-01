<div class="container-fluid" style="background-image: url('../assets/cars-gora-prawa.jpg'); min-height: 400px; max-height: 750px; background-size: cover; background-position:center">
    <div class="row">
        <div class="col-md-4 col-12" style="height:0px">

        </div>

        <div class="col-md-4 col-12" style="height:400px">
            <div class="d-flex justify-content-center" style="margin-top: 20px;">
                <div class="card" style="width:100%;">
                    <article class="card-body" style="max-width: 100%;">
                        <h4 class="card-title mt-3 text-center">Panel wyszukiwania</h4>
                        <form class="form-postOffer" method='GET' action="../views/offers.php?page=1">
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
                                    <div class="form-group input-group mt-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rodzaj paliwa</span>
                                        </div>
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
                                        <input type="text" value='' name='power' hidden>
                                        <input type="text" value='' name='gearbox' hidden>
                                        <input type="text" value='' name='drive' hidden>
                                        <input type="text" value='' name='door' hidden>
                                        <input type="text" value='' name='seats' hidden>
                                        <input type="text" value='' name='origin' hidden>
                                        <input type="text" value='' name='state' hidden>
                                        <input type="text" value='' name='engine_capacity' hidden>
                                        <input type="text" value='' name='type' hidden>
                                        <input type="text" value='' name='color' hidden>
                                        <input type="text" value='' name='province' hidden>
                                        <input type="text" value='' name='district' hidden>
                                        <input type="text" value='' name='city' hidden>
                                        <input type="text" value='1' name='page' hidden>
                                    </div>
                                    <div class="col-md-12 col12 d-flex justify-content-end" style="margin-top: 20px;">
                                        <button class="btn btn-success" style="height: 50px; width:100px" type='submit'>Szukaj</button>
                                    </div>
                                </div>
                            </div>
                </div>
                </form>
                </article>
            </div>
        </div>
        <div class="col-md-4 col-12" style="height:400px">
        </div>
    </div>
</div>