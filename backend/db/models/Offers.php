<?php
    class Offers {
        
        public static function getOffers($limit, $offset, $connection) {
            $sqlQuery = "SELECT offers.price, offers.province, offers.city,
            cars.brand, cars.model, cars.production_year, cars.run, cars.fuel, cars.engine_capacity, cars.image_url 
            FROM offers JOIN cars ON offers.car_id=cars.id LIMIT $limit OFFSET $offset";
            $result = mysqli_query($connection, $sqlQuery);
            return $result;
        }

        public static function getOfferById($id, $connection) {

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
    }
?>