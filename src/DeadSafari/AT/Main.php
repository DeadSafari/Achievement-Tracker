<?php

namespace DeadSafari\AT;

use DeadSafari\AT\Achievements\AchievementManager;
use DeadSafari\AT\Listeners\ServerListeners;
use DeadSafari\AT\Sessions\SessionManager;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Main extends PluginBase {

    private static Main $_instance;
    private SessionManager $sessionManager;
    private AchievementManager $achievementManager;

    public function onLoad(): void {
        self::$_instance = $this;
        $this->sessionManager = new SessionManager();

        $this->achievementManager = new AchievementManager();

        $this->getLogger()->info(TextFormat::GREEN . "Achievement Tracker successfully loaded!");
    }

    public function onEnable(): void {
        $this->registerListeners();
        $this->getLogger()->info(TextFormat::GREEN . "Achievement Tracker successfully enabled!");
    }

    public function onDisable(): void {
        $this->getLogger()->info(TextFormat::RED . "Achievement Tracker successfully disabled!");
    }

    public function registerListeners(): void {
        $this->getServer()->getPluginManager()->registerEvents(new ServerListeners(), $this);
    }

    public function getSessionManager(): SessionManager {
        return $this->sessionManager;
    }

    public function getAchievementManager(): AchievementManager {
        return $this->achievementManager;
    }

    public static function getInstance(): Main {
        return self::$_instance;
    }

}