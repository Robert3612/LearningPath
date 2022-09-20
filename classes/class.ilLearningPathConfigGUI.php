<?php
declare(strict_types=1);
require_once __DIR__ . "/../vendor/autoload.php";

use srag\Plugins\LearningPath\Config\ConfigCtrl;
use srag\Plugins\LearningPath\Utils\LearningPathTrait;
use srag\DevTools\LearningPath\DevToolsCtrl;
use srag\DIC\LearningPath\DICTrait;

/**
 * Class ilLearningPathConfigGUI
 *
 * Generated by SrPluginGenerator v2.9.1
 *
 * @author Robert <support@fluxlabs.ch>
 * @author fluxlabs <support@fluxlabs.ch>
 *
 * @ilCtrl_isCalledBy srag\DevTools\LearningPath\DevToolsCtrl: ilLearningPathConfigGUI
 */
class ilLearningPathConfigGUI extends ilPluginConfigGUI
{

    use DICTrait;
    use LearningPathTrait;

    const CMD_CONFIGURE = "configure";
    const PLUGIN_CLASS_NAME = ilLearningPathPlugin::class;


    /**
     * ilLearningPathConfigGUI constructor
     */
    public function __construct()
    {

    }


    /**
     * @inheritDoc
     */
    public function performCommand(/*string*/ $cmd) : void
    {
        $this->setTabs();

        $next_class = self::dic()->ctrl()->getNextClass($this);

        switch (strtolower($next_class)) {
            case strtolower(ConfigCtrl::class):
                self::dic()->ctrl()->forwardCommand(new ConfigCtrl());
                break;

            case strtolower(DevToolsCtrl::class):
                self::dic()->ctrl()->forwardCommand(new DevToolsCtrl($this, self::plugin()));
                break;

            default:
                $cmd = self::dic()->ctrl()->getCmd();

                switch ($cmd) {
                    case self::CMD_CONFIGURE:
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
        self::dic()->ctrl()->redirectByClass(ConfigCtrl::class, ConfigCtrl::CMD_CONFIGURE);
    }


    /**
     *
     */
    protected function setTabs() : void
    {
        ConfigCtrl::addTabs();

        DevToolsCtrl::addTabs(self::plugin());

        self::dic()->locator()->addItem(ilLearningPathPlugin::PLUGIN_NAME, self::dic()->ctrl()->getLinkTarget($this, self::CMD_CONFIGURE));
    }
}
