<?php

namespace DeadSafari\AT\Sessions;

use pocketmine\player\Player;

class PlayerSession {
    private Player $player;

    public function __construct(Player $player) {
        $this->player = $player;
    }

    public function getPlayer(): Player {
        return $this->player;
    }

}