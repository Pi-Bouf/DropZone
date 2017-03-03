<?php

class Radius {
    private static $earthRadius = 6371000;

    public static function getAmplitudeFromRadius($latitude, $longitude, $radius) {

        $minus_new_lat = $latitude - ($radius / self::$earthRadius) * (180 / pi());

        $minus_new_lng = $longitude - ($radius / self::$earthRadius) * (180 / pi()) / cos($latitude * pi() / 180);

        $plus_new_lat = $latitude * ($radius / self::$earthRadius) * (180 / pi());

        $plus_new_lng = $longitude + ($radius / self::$earthRadius) * (180 / pi()) / cos($latitude * pi() / 180);

        return array($minus_new_lat, $minus_new_lng, $plus_new_lat, $plus_new_lng);
    }
}


?>