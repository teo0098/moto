<?php
    class Offers {
        
        public static function getOffers($limit, $offset, $connection) {
            $sqlQuery = "SELECT offers.price, offers.province, offers.city,
            cars.brand, cars.model, cars.production_year, cars.run, cars.fuel, cars.engine_capacity, cars.image_url 
            FROM offers JOIN cars ON offers.car_id=cars.id LIMIT $limit OFFSET $offset";
            $result = mysqli_query($connection, $sqlQuery);
            return $result;
        }

        public static function getOffer($id, $connection) {

        }
    }
?>