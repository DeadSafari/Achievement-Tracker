<?php

namespace DeadSafari\AT\Listeners;

use DeadSafari\AT\Main;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerLoginEvent;
use pocketmine\utils\TextFormat;

class ServerListeners implements Listener {

    public function onLogin(PlayerLoginEvent $event) {
        Main::getInstance()->getSessionManager()->createSession($event->getPlayer());
    }

    public function onJoin(PlayerJoinEvent $event) {
        $event->getPlayer()->sendMessage("Session initiated.");
    }
}