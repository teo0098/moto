<div class="container-fluid searchimage" style=" min-height: 400px; max-height: 750px; background-size: cover; background-position:center">
    <div class="row">
        <div class="container" style="height:100px">
            <div class="d-flex justify-content-center" style="margin-top: 20px;">
                <div class="card w-75" style="background:none; border:none">
                    <article class="card-body" style="max-width: 100%;">
                        <form class="form-postOffer" method='GET' action="../views/offers.php?page=1">

                            <div class="row" style="margin-top:20px;">

                                <div class="col-md-4 col-12">
                                    <div class="input-group mt-3">
                                        <input name='brand' type="text" class="form-control" placeholder="Marka samochodu">
                                    </div>
                                    <div class="input-group mt-3">
                                        <input name='model' type="text" class="form-control" placeholder="Model samochodu">
                                    </div> 
                                </div>

                                <div class="col-md-4 col-12">
                                    <div class="row mt-3">
                                        <div class="input-group">
                                            <input name='runFrom' type="text" class="form-control" placeholder="Przebieg do">
                                            <input name='runTo' type="text" class="form-control" placeholder="Przebieg od">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="input-group">
                                            <input name='priceFrom' type="text" class="form-control" placeholder="Cena od">
                                            <input name='priceTo' type="text" class="form-control" placeholder="Cena od">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-12">   
                                    <div class="input-group mt-3">
                                        <input name='production_year' type="text" class="form-control" placeholder="Rok produkcji">
                                    </div>
                                    <div class="form-group input-group mt-3">
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
                                </div>
                            </div>
                            <div class="col-md-12 col12 d-flex justify-content-center" style="margin-top: 20px;">
                                <button class="btn btn-danger" style="height: 50px; width:150px" type='submit'><i class="fa fa-search me-2"></i>Szukaj</button>
                            </div>
                        </form>
                    </article>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-12" style="height:400px">
        </div>
    </div>
</div>