<?php

namespace srag\Plugins\learningpath\Config;

require_once __DIR__ . "/../../vendor/autoload.php";

use srag\Plugins\learningpath\Utils\LearningpathTrait;
use ilLearningpathPlugin;
use ilUtil;
use srag\DIC\Learningpath\DICTrait;

/**
 * Class ConfigCtrl
 *
 * Generated by SrPluginGenerator v2.9.1
 *
 * @package           srag\Plugins\learningpath\Config
 *
 * @author robert <support@fluxlabs.ch>
 * @author fluxlabs <support@fluxlabs.ch>
 *
 * @ilCtrl_isCalledBy srag\Plugins\learningpath\Config\ConfigCtrl: ilLearningpathConfigGUI
 */
class ConfigCtrl
{

    use DICTrait;
    use LearningpathTrait;

    const CMD_CONFIGURE = "configure";
    const CMD_UPDATE_CONFIGURE = "updateConfigure";
    const LANG_MODULE = "config";
    const PLUGIN_CLASS_NAME = ilLearningpathPlugin::class;
    const TAB_CONFIGURATION = "configuration";


    /**
     * ConfigCtrl constructor
     */
    public function __construct()
    {

    }


    /**
     *
     */
    public static function addTabs() : void
    {
        self::dic()->tabs()->addTab(self::TAB_CONFIGURATION, self::plugin()->translate("configuration", self::LANG_MODULE), self::dic()->ctrl()
            ->getLinkTargetByClass(self::class, self::CMD_CONFIGURE));
    }


    /**
     *
     */
    public function executeCommand() : void
    {
        $this->setTabs();

        $next_class = self::dic()->ctrl()->getNextClass($this);

        switch (strtolower($next_class)) {
            default:
                $cmd = self::dic()->ctrl()->getCmd();

                switch ($cmd) {
                    case self::CMD_CONFIGURE:
                    case self::CMD_UPDATE_CONFIGURE:
                        $this->{$cmd}();
                        break;

                    default:
                        break;
                }
                break;
        }
    }


    /**
     *
     */
    protected function configure() : void
    {
        self::dic()->tabs()->activateTab(self::TAB_CONFIGURATION);

        $form = self::learningpath()->config()->factory()->newFormBuilderInstance($this);

        self::output()->output($form);
    }


    /**
     *
     */
    protected function setTabs() : void
    {

    }


    /**
     *
     */
    protected function updateConfigure() : void
    {
        self::dic()->tabs()->activateTab(self::TAB_CONFIGURATION);

        $form = self::learningpath()->config()->factory()->newFormBuilderInstance($this);

        if (!$form->storeForm()) {
            self::output()->output($form);

            return;
        }

        ilUtil::sendSuccess(self::plugin()->translate("configuration_saved", self::LANG_MODULE), true);

        self::dic()->ctrl()->redirect($this, self::CMD_CONFIGURE);
    }
}
