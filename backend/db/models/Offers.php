<?php
    class Offers {
        
        public static function getOffers($limit, $offset, $connection) {
            $sqlQuery = "SELECT offers.id, offers.price, provinces.name, 
            cars.brand, cars.model, cars.production_year, cars.run, car_fuels.fuel,
            cars.engine_capacity, cars.image_url
            FROM offers 
            JOIN cars ON offers.car_id=cars.id 
            JOIN provinces ON offers.province=provinces.id
            JOIN car_fuels ON cars.fuel=car_fuels.id
            JOIN gearbox ON cars.gearbox=gearbox.id
            JOIN car_drives ON cars.drive=car_drives.id
            JOIN car_types ON cars.type=car_types.id
            JOIN car_states ON cars.state=car_states.id
            WHERE offers.visible=1
            ORDER BY offers.date DESC
            LIMIT $limit OFFSET $offset";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows > 0) {
                return $result;
            }
            return false;
        }

        public static function getOfferById($id, $connection) {
            $sqlQuery = "SELECT offers.id, offers.price, provinces.name AS province, offers.district, offers.city, offers.description, 
            offers.date, offers.car_id, cars.brand, cars.model, cars.production_year, cars.run, car_fuels.fuel, cars.power, gearbox.type AS gearbox,
            car_drives.drive, car_types.type, cars.door, cars.seats, cars.color, cars.origin, car_states.state, cars.VIN, cars.engine_capacity, cars.image_url, users.name, users.surname, users.phone
            FROM offers 
            JOIN cars ON offers.car_id=cars.id 
            JOIN provinces ON offers.province=provinces.id
            JOIN car_fuels ON cars.fuel=car_fuels.id
            JOIN gearbox ON cars.gearbox=gearbox.id
            JOIN car_drives ON cars.drive=car_drives.id
            JOIN car_types ON cars.type=car_types.id
            JOIN car_states ON cars.state=car_states.id 
            JOIN users ON users.id=offers.user_id
            WHERE offers.id=$id
            AND offers.visible=1";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows > 0) {
                return $result;
            }
            return false;
        }

        public static function insertOffer($data, $carID, $userID, $connection) {
            $date = date('Y-m-d');
            $desc = filter_var($data['description'], FILTER_SANITIZE_STRING);
            $sqlQuery = "INSERT INTO offers (`id`, `price`, `province`, `district`, `city`, `description`, `car_id`, `user_id`, `date`) VALUES (NULL, '".$data['price']."', '".$data['province']."',
            '".$data['district']."', '".$data['city']."', '$desc', $carID, $userID, '$date')";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result) {
                return true;
            }
            return false;
        }

        public static function updateOffer($data, $offerID, $connection) {
            $desc = filter_var($data['description'], FILTER_SANITIZE_STRING);
            $sqlQuery = "UPDATE offers SET price='".$data['price']."', province='".$data['province']."',
            district='".$data['district']."', city='".$data['city']."', `description`='$desc' WHERE id=$offerID";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result) {
                return true;
            }
            return false;
        }

        public static function updateVisibility($id, $visible, $connection) {
            $sqlQuery = "UPDATE offers SET visible=$visible WHERE id=$id";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result) {
                return true;
            }
            return false;
        }

        public static function getOffersAmount($data, $connection) {
            $brand = $data['brand'];
            $model = $data['model'];
            $priceFrom = $data['priceFrom'];
            $priceTo = $data['priceTo'];
            $runFrom = $data['runFrom'];
            $runTo = $data['runTo'];
            $production_year = $data['production_year'];
            $fuel = $data['fuel'];
            $power = $data['power'];
            $gearbox = $data['gearbox'];
            $drive = $data['drive'];
            $door = $data['door'];
            $seats = $data['seats'];
            $origin = $data['origin'];
            $state = $data['state'];
            $engine_capacity = $data['engine_capacity'];
            $type = $data['type'];
            $color = $data['color'];
            $province = $data['province'];
            $district = $data['district'];
            $city = $data['city'];
            if (!isset($runFrom) || $runFrom == null) $runFrom = '0';
            if (!isset($runTo) || $runTo == null) $runTo = '999999999';
            if (!isset($priceFrom) || $priceFrom == null) $priceFrom = '0';
            if (!isset($priceTo) || $priceTo == null) $priceTo = '999999999';
            $year = "";
            $fuelType = "";
            $carPower = "";
            $gearboxType = "";
            $driveType = "";
            $doorAmount = "";
            $seatsAmount = "";
            $originPlace = "";
            $stateType = "";
            $engineCapacity = "";
            $carType = "";
            $colorType = "";
            $provincePlace = "";
            $districtPlace = "";
            $cityPlace = "";
            if (!isset($production_year) || $production_year == null) $year = '1=1';
            else $year = "cars.production_year = '$production_year'";
            if (!isset($fuel) || $fuel == null) $fuelType = '1=1';
            else $fuelType = "cars.fuel = $fuel";
            if (!isset($power) || $power == null) $carPower = '1=1';
            else $carPower = "cars.power = $power";
            if (!isset($gearbox) || $gearbox == null) $gearboxType = '1=1';
            else $gearboxType = "cars.gearbox = $gearbox";
            if (!isset($drive) || $drive == null) $driveType = '1=1';
            else $driveType = "cars.drive = $drive";
            if (!isset($door) || $door == null) $doorAmount = '1=1';
            else $doorAmount = "cars.door = $door";
            if (!isset($seats) || $seats == null) $seatsAmount = '1=1';
            else $seatsAmount = "cars.seats = $seats";
            if (!isset($origin) || $origin == null) $originPlace = '1=1';
            else $originPlace = "cars.origin LIKE '%$origin%'";
            if (!isset($state) || $state == null) $stateType = '1=1';
            else $stateType = "cars.state = $state";
            if (!isset($engine_capacity) || $engine_capacity == null) $engineCapacity = '1=1';
            else $engineCapacity = "cars.engine_capacity = $engine_capacity";
            if (!isset($type) || $type == null) $carType = '1=1';
            else $carType = "cars.type = $type";
            if (!isset($color) || $color == null) $colorType = '1=1';
            else $colorType = "cars.color LIKE '%$color%'";
            if (!isset($province) || $province == null) $provincePlace = '1=1';
            else $provincePlace = "offers.province = $province";
            if (!isset($district) || $district == null) $districtPlace = '1=1';
            else $districtPlace = "offers.district LIKE '%$district%'";
            if (!isset($city) || $city == null) $cityPlace = '1=1';
            else $cityPlace = "offers.city LIKE '%$city%'";
            $sqlQuery = "SELECT COUNT(*) AS offersAmount FROM offers 
            JOIN cars ON offers.car_id=cars.id 
            JOIN provinces ON offers.province=provinces.id
            JOIN car_fuels ON cars.fuel=car_fuels.id
            JOIN gearbox ON cars.gearbox=gearbox.id
            JOIN car_drives ON cars.drive=car_drives.id
            JOIN car_types ON cars.type=car_types.id
            JOIN car_states ON cars.state=car_states.id
            WHERE offers.visible=1
            AND cars.brand LIKE '%$brand%'
            AND cars.model LIKE '%$model%'
            AND cars.run BETWEEN CAST($runFrom AS UNSIGNED) AND CAST($runTo AS UNSIGNED)
            AND offers.price BETWEEN CAST($priceFrom AS UNSIGNED) AND CAST($priceTo AS UNSIGNED)
            AND $year AND $fuelType AND $carPower AND $gearboxType AND $driveType AND $doorAmount AND $seatsAmount
            AND $originPlace AND $stateType AND $engineCapacity AND $carType AND $colorType AND $provincePlace
            AND $districtPlace AND $cityPlace";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows > 0) {
                return $result;
            }
            return false;
        }

        public static function getSearchedOffers($limit, $offset, $data, $connection) {
            $brand = $data['brand'];
            $model = $data['model'];
            $priceFrom = $data['priceFrom'];
            $priceTo = $data['priceTo'];
            $runFrom = $data['runFrom'];
            $runTo = $data['runTo'];
            $production_year = $data['production_year'];
            $fuel = $data['fuel'];
            $power = $data['power'];
            $gearbox = $data['gearbox'];
            $drive = $data['drive'];
            $door = $data['door'];
            $seats = $data['seats'];
            $origin = $data['origin'];
            $state = $data['state'];
            $engine_capacity = $data['engine_capacity'];
            $type = $data['type'];
            $color = $data['color'];
            $province = $data['province'];
            $district = $data['district'];
            $city = $data['city'];
            if (!isset($runFrom) || $runFrom == null) $runFrom = '0';
            if (!isset($runTo) || $runTo == null) $runTo = '999999999';
            if (!isset($priceFrom) || $priceFrom == null) $priceFrom = '0';
            if (!isset($priceTo) || $priceTo == null) $priceTo = '999999999';
            $year = "";
            $fuelType = "";
            $carPower = "";
            $gearboxType = "";
            $driveType = "";
            $doorAmount = "";
            $seatsAmount = "";
            $originPlace = "";
            $stateType = "";
            $engineCapacity = "";
            $carType = "";
            $colorType = "";
            $provincePlace = "";
            $districtPlace = "";
            $cityPlace = "";
            if (!isset($production_year) || $production_year == null) $year = '1=1';
            else $year = "cars.production_year = '$production_year'";
            if (!isset($fuel) || $fuel == null) $fuelType = '1=1';
            else $fuelType = "cars.fuel = $fuel";
            if (!isset($power) || $power == null) $carPower = '1=1';
            else $carPower = "cars.power = $power";
            if (!isset($gearbox) || $gearbox == null) $gearboxType = '1=1';
            else $gearboxType = "cars.gearbox = $gearbox";
            if (!isset($drive) || $drive == null) $driveType = '1=1';
            else $driveType = "cars.drive = $drive";
            if (!isset($door) || $door == null) $doorAmount = '1=1';
            else $doorAmount = "cars.door = $door";
            if (!isset($seats) || $seats == null) $seatsAmount = '1=1';
            else $seatsAmount = "cars.seats = $seats";
            if (!isset($origin) || $origin == null) $originPlace = '1=1';
            else $originPlace = "cars.origin LIKE '%$origin%'";
            if (!isset($state) || $state == null) $stateType = '1=1';
            else $stateType = "cars.state = $state";
            if (!isset($engine_capacity) || $engine_capacity == null) $engineCapacity = '1=1';
            else $engineCapacity = "cars.engine_capacity = $engine_capacity";
            if (!isset($type) || $type == null) $carType = '1=1';
            else $carType = "cars.type = $type";
            if (!isset($color) || $color == null) $colorType = '1=1';
            else $colorType = "cars.color LIKE '%$color%'";
            if (!isset($province) || $province == null) $provincePlace = '1=1';
            else $provincePlace = "offers.province = $province";
            if (!isset($district) || $district == null) $districtPlace = '1=1';
            else $districtPlace = "offers.district LIKE '%$district%'";
            if (!isset($city) || $city == null) $cityPlace = '1=1';
            else $cityPlace = "offers.city LIKE '%$city%'";
            $sqlQuery = "SELECT offers.id, offers.price, provinces.name, 
            cars.brand, cars.model, cars.production_year, cars.run, car_fuels.fuel,
            cars.engine_capacity, cars.image_url
            FROM offers 
            JOIN cars ON offers.car_id=cars.id 
            JOIN provinces ON offers.province=provinces.id
            JOIN car_fuels ON cars.fuel=car_fuels.id
            JOIN gearbox ON cars.gearbox=gearbox.id
            JOIN car_drives ON cars.drive=car_drives.id
            JOIN car_types ON cars.type=car_types.id
            JOIN car_states ON cars.state=car_states.id
            WHERE offers.visible=1
            AND cars.brand LIKE '%$brand%'
            AND cars.model LIKE '%$model%'
            AND cars.run BETWEEN CAST($runFrom AS UNSIGNED) AND CAST($runTo AS UNSIGNED)
            AND offers.price BETWEEN CAST($priceFrom AS UNSIGNED) AND CAST($priceTo AS UNSIGNED)
            AND $year AND $fuelType AND $carPower AND $gearboxType AND $driveType AND $doorAmount AND $seatsAmount
            AND $originPlace AND $stateType AND $engineCapacity AND $carType AND $colorType AND $provincePlace
            AND $districtPlace AND $cityPlace
            ORDER BY offers.date DESC
            LIMIT $limit OFFSET $offset";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows > 0) {
                return $result;
            }
            return false;
        }
       
    }
?>