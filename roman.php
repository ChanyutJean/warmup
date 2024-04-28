<?php
    function convert(int $decimal): string {
        if ($decimal <= 0) {
            throw new InvalidArgumentException("Cannot convert non-positive integer into roman numeral.");
        }

        if ($decimal > 999) {
            throw new InvalidArgumentException("Cannot convert integer above 9999 into roman numeral.");
        }

        return hundreds(extractPlaceValue($decimal, 2)) .
            tens(extractPlaceValue($decimal, 1)) .
            ones(extractPlaceValue($decimal, 0));
    }

    function extractPlaceValue(int $decimal, int $place): int {
        return intdiv($decimal, pow(10, $place)) % 10;
    }

    function hundreds(int $digit): string {
        $hundreds = ["", "C", "CC", "CCC", "CD", "D", "DC", "DC", "DCCC", "CM"];

        return $hundreds[$digit];
    }

    function tens(int $digit): string {
        $tens = ["", "X", "XX", "XXX", "XL", "L", "LX", "LXX", "LXXX", "XC"];

        return $tens[$digit];
    }

    function ones(int $digit): string {
        $ones = ["", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX"];

        return $ones[$digit];
    }

    echo convert($argv[1]) . "\n";
?>