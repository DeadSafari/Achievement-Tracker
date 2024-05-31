<?php

namespace DeadSafari\AT\Sessions;

use pocketmine\player\Player;

class SessionManager {
    private array $sessions = [];

    public function getSession(Player $player): ?Player {
        foreach ($this->sessions as $session) {
            if ($session->getPlayer() == $player) {
                return $session;
            }
        }
        return null;
    }

    public function createSession(Player $player): PlayerSession {
        $session = new PlayerSession($player);
        $this->sessions[] = $session;
        return $session;
    }
}