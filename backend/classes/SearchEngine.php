<?php
    class SearchEngine {

        private $brand;
        private $model;
        private $priceFrom;
        private $priceTo;
        private $productionYearFrom;
        private $productionYearTo;
        private $fuel;
        private $runFrom;
        private $runTo;
        private $origin;
        private $powerFrom;
        private $powerTo;
        private $gearbox;
        private $drive;
        private $type;
        private $state;
        private $engineCapacity;
        private $province;

        public function __construct($brand, $model, $priceFrom, $priceTo, $productionYearFrom, $productionYearTo, $fuel, $runFrom, $runTo, $origin, $powerFrom, $powerTo, $gearbox, $drive, $type, $state, $engineCapacity, $province) {
            $this->brand = $brand;
            $this->model = $model;
            $this->priceFrom = $priceFrom;
            $this->priceTo = $priceTo;
            $this->productionYearFrom = $productionYearFrom;
            $this->productionYearTo = $productionYearTo;
            $this->fuel = $fuel;
            $this->runFrom = $runFrom;
            $this->runTo = $runTo;
            $this->origin = $origin;
            $this->powerFrom = $powerFrom;
            $this->powerTo = $powerTo;
            $this->gearbox = $gearbox;
            $this->drive = $drive;
            $this->type = $type;
            $this->state = $state;
            $this->engineCapacity = $engineCapacity;
            $this->province = $province;
        }

        private function areDataValid() {
            return true;
        }

        public function searchOffers($connection) {
            if (!$this->areDataValid()) {
                echo "Data are invalid";
            }
            else {

            }
        }
    }
?>