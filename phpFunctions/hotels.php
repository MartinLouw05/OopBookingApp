<?php
    session_start();

    class Hotels {
        public $hotelName;
        public $hotelLocation;
        public $hotelActivities;
        public $hotelDailyRate;  
        
        //Get and Set Hotel Name
        public function setHotelName($hotelName) {
            $this -> name = $hotelName;
        }

        public function getHotelName() {
            echo $this -> name;
        }

        //Get and Set Hotel Location
        public function setHotelLocation($hotelLocation) {
            $this -> location = $hotelLocation;
        }

        public function getHotelLocation() {
            echo $this -> location;
        }

        //Get and Set Hotel Activities
        public function setHotelActivities($hotelActivities) {
            $this -> activities = $hotelActivities;
        }

        public function getHotelActivities() {
            echo $this -> activities;
        }

        //Get and Set Hotel Daily Rate
        public function setHotelDailyRate($hotelDailyRate) {
            $this -> dailyRate = $hotelDailyRate;
        }

        public function getHotelDailyRate() {
            echo $this -> dailyRate;
        }

        public function createHotel() {
            $hotelsData = file_get_contents('hotels.json');
            $hotelsData = json_decode($hotelsData);

            $hotel = array(
                'name' => $this -> name,
                'location' => $this -> location,
                'activities' => $this -> activities,
                'dailyRate' => $this -> dailyRate
            );

            $hotelsData[] = $hotel;

            $hotelsData = json_encode($hotelsData);
            file_put_contents('hotels.json', $hotelsData);
        }
    }

    //Hotel's Information
    function hotelsInformation() {
        $newHotel = new Hotels();

        $newHotel -> setHotelName("The Plaza");
        $newHotel -> setHotelLocation("New York");
        $newHotel -> setHotelActivities(["Fitness Center", "Salon", "Shops", "Eloise"]);
        $newHotel -> setHotelDailyRate("15900");

        $newHotel -> createHotel();
    }
?>