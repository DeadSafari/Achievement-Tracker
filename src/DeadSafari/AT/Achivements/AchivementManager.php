<?php

namespace DeadSafari\AT\Achievements;

use DeadSafari\AT\Main;

// TODO

class AchievementManager {
    private array $acheivements = [];

    public function __construct() {
        $keyValuePairs = Main::getInstance()->getConfig()->getAll();
        foreach ($keyValuePairs as $keyValuePair) {

            if (str_starts_with($keyValuePair[0], "achievement")) {

                $this->acheivements[] = new Achievement($keyValuePair);

            }
        }

    }
}