<?php
    class Offers {
        
        public static function getOffers($limit, $offset, $connection) {
            $sqlQuery = "SELECT offers.id, offers.price, provinces.name, offers.district, offers.city, offers.description, 
            offers.date, cars.brand, cars.model, cars.production_year, cars.run, car_fuels.fuel, cars.power, gearbox.type,
            car_drives.drive, car_types.type, cars.door, cars.seats, cars.color, cars.origin, car_states.state, cars.VIN, cars.engine_capacity, cars.image_url
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
    }
?>