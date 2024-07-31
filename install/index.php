<?php

use Bitrix\Main\EventManager;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ModuleManager;

Loc::loadMessages(__FILE__);

class logistic_tarifficator extends CModule
{
    public function __construct()
    {
        $this->MODULE_ID = 'logistic.tarifficator';
        $this->MODULE_VERSION = '1.0.0';
        $this->MODULE_VERSION_DATE = '2024-07-22';
        $this->MODULE_NAME = "Logistic tarifficator";
        $this->MODULE_DESCRIPTION = "Logistic tarifficator based on data from libraries";
        $this->PARTNER_NAME = "Legende Logistic";
        $this->PARTNER_URI = "http://legende-log.ru/";
    }

    public function DoInstall()
    {
        ModuleManager::registerModule($this->MODULE_ID);

        global $APPLICATION;

        $APPLICATION->IncludeAdminFile(
            "Module installed",
            __DIR__ . '/step.php'
        );
    }

    public function DoUninstall()
    {
        ModuleManager::unRegisterModule($this->MODULE_ID);

        global $APPLICATION;

        $APPLICATION->IncludeAdminFile(
            "Module removed",
            __DIR__ . '/unstep.php'
        );
    }
}