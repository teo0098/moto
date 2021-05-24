<?php
    class WatchedOffers {

        public static function insertOffer($offerID, $userID, $connection) {
            $sqlQuery = "INSERT INTO watched_offers VALUES (NULL, $offerID, $userID)";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result) {
                return true;
            }
            return false;
        }

        public static function deleteOffer($offerID, $userID, $connection) {
            $sqlQuery = "DELETE FROM watched_offers WHERE `offer_id` = $offerID AND `user_id` = $userID";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result) {
                return true;
            }
            return false;
        }

        public static function getOffers($limit, $offset, $connection) {
            $sqlQuery = "SELECT offers.id, offers.price, provinces.name, 
            cars.brand, cars.model, cars.production_year, cars.run, car_fuels.fuel,
            cars.engine_capacity, cars.image_url
            FROM offers 
            JOIN watched_offers ON watched_offers.offer_id=offers.id
            JOIN cars ON offers.car_id=cars.id 
            JOIN provinces ON offers.province=provinces.id
            JOIN car_fuels ON cars.fuel=car_fuels.id
            JOIN gearbox ON cars.gearbox=gearbox.id
            JOIN car_drives ON cars.drive=car_drives.id
            JOIN car_types ON cars.type=car_types.id
            JOIN car_states ON cars.state=car_states.id
            WHERE offers.visible=1
            AND watched_offers.user_id=".$_SESSION['userID']." ORDER BY offers.date DESC LIMIT $limit OFFSET $offset";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows > 0) {
                return $result;
            }
            return false;
        }

        public static function getOffersAmount($connection) {
            $sqlQuery = "SELECT COUNT(*) AS offersAmount FROM offers 
            JOIN watched_offers ON watched_offers.offer_id=offers.id
            JOIN cars ON offers.car_id=cars.id 
            JOIN provinces ON offers.province=provinces.id
            JOIN car_fuels ON cars.fuel=car_fuels.id
            JOIN gearbox ON cars.gearbox=gearbox.id
            JOIN car_drives ON cars.drive=car_drives.id
            JOIN car_types ON cars.type=car_types.id
            JOIN car_states ON cars.state=car_states.id
            WHERE offers.visible=1 
            AND watched_offers.user_id=".$_SESSION['userID']."";
            $result = mysqli_query($connection, $sqlQuery);
            if ($result->num_rows > 0) {
                return $result;
            }
            return false;
        }
    }
?>