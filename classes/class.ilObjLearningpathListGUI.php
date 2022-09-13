<?php

require_once __DIR__ . "/../vendor/autoload.php";

use srag\Plugins\LearningPath\Utils\LearningPathTrait;
use srag\DIC\LearningPath\DICTrait;

/**
 * Class ilObjLearningPathListGUI
 *
 * Generated by SrPluginGenerator v2.9.1
 *
 * @author Robert <support@fluxlabs.ch>
 * @author fluxlabs <support@fluxlabs.ch>
 */
class ilObjLearningPathListGUI extends ilObjectPluginListGUI
{

    use DICTrait;a
    use LearningPathTrait;

    const PLUGIN_CLASS_NAME = ilLearningPathPlugin::class;


    /**
     * ilObjLearningPathListGUI constructor
     *
     * @param int $a_context
     */
    public function __construct(/*int*/ $a_context = self::CONTEXT_REPOSITORY)
    {
        parent::__construct($a_context);
    }


    /**
     * @inheritDoc
     */
    public function getGuiClass() : string
    {
        return ilObjLearningPathGUI::class;
    }


    /**
     * @inheritDoc
     */
    public function getProperties() : array
    {
        $props = [];

        if (ilObjLearningPathAccess::_isOffline($this->obj_id)) {
            $props[] = [
                "alert"    => true,
                "property" => self::plugin()->translate("status", ilObjLearningPathGUI::LANG_MODULE_OBJECT),
                "value"    => self::plugin()->translate("offline", ilObjLearningPathGUI::LANG_MODULE_OBJECT)
            ];
        }

        return $props;
    }


    /**
     * @inheritDoc
     */
    public function initCommands() : array
    {
        $this->commands_enabled = true;
        $this->copy_enabled = true;
        $this->cut_enabled = true;
        $this->delete_enabled = true;
        $this->description_enabled = true;
        $this->notice_properties_enabled = true;
        $this->properties_enabled = true;

        $this->comments_enabled = false;
        $this->comments_settings_enabled = false;
        $this->expand_enabled = false;
        $this->info_screen_enabled = false;
        $this->link_enabled = false;
        $this->notes_enabled = false;
        $this->payment_enabled = false;
        $this->preconditions_enabled = false;
        $this->rating_enabled = false;
        $this->rating_categories_enabled = false;
        $this->repository_transfer_enabled = false;
        $this->search_fragment_enabled = false;
        $this->static_link_enabled = false;
        $this->subscribe_enabled = false;
        $this->tags_enabled = false;
        $this->timings_enabled = false;

        $commands = [
            [
                "permission" => "read",
                "cmd"        => ilObjLearningPathGUI::getStartCmd(),
                "default"    => true
            ]
        ];

        return $commands;
    }


    /**
     * @inheritDoc
     */
    public function initType() : void
    {
        $this->setType(ilLearningPathPlugin::PLUGIN_ID);
    }
}
