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
            $date = date('Y-m-d H:i:s');
            $sqlQuery = "INSERT INTO offers VALUES (NULL, '".$data['price']."', '".$data['province']."',
            '".$data['district']."', '".$data['city']."', '".$data["description"]."', ".$carID.", ".$userID.", '".$date."')";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result) {
                return true;
            }
            return false;
        }
    }
?>