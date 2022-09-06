<?php

namespace srag\Plugins\LearningPath\ObjectSettings\Form;

use srag\Plugins\LearningPath\Utils\LearningPathTrait;
use ilLearningPathPlugin;
use ilObjLearningPath;
use ilObjLearningPathGUI;
use srag\CustomInputGUIs\LearningPath\FormBuilder\AbstractFormBuilder;

/**
 * Class FormBuilder
 *
 * @package srag\Plugins\LearningPath\ObjectSettings\Form
 *
 * @author Robert <support@fluxlabs.ch>
 * @author fluxlabs <support@fluxlabs.ch>
 */
class FormBuilder extends AbstractFormBuilder
{

    use LearningPathTrait;

    const PLUGIN_CLASS_NAME = ilLearningPathPlugin::class;
    /**
     * @var ilObjLearningPath
     */
    protected $object;


    /**
     * @inheritDoc
     *
     * @param ilObjLearningPathGUI $parent
     * @param ilObjLearningPath    $object
     */
    public function __construct(ilObjLearningPathGUI $parent, ilObjLearningPath $object)
    {
        $this->object = $object;

        parent::__construct($parent);
    }


    /**
     * @inheritDoc
     */
    protected function getButtons() : array
    {
        $buttons = [
            ilObjLearningPathGUI::CMD_SETTINGS_STORE  => self::plugin()->translate("save", ilObjLearningPathGUI::LANG_MODULE_SETTINGS),
            ilObjLearningPathGUI::CMD_MANAGE_CONTENTS => self::plugin()->translate("cancel", ilObjLearningPathGUI::LANG_MODULE_SETTINGS)
        ];

        return $buttons;
    }


    /**
     * @inheritDoc
     */
    protected function getData() : array
    {
        $data = [
            "title"       => $this->object->getTitle(),
            "description" => $this->object->getLongDescription(),
            "online"      => $this->object->isOnline()
        ];

        return $data;
    }


    /**
     * @inheritDoc
     */
    protected function getFields() : array
    {
        $fields = [
            "title"       => self::dic()->ui()->factory()->input()->field()->text(self::plugin()->translate("title", ilObjLearningPathGUI::LANG_MODULE_SETTINGS))->withRequired(true),
            "description" => self::dic()->ui()->factory()->input()->field()->textarea(self::plugin()->translate("description", ilObjLearningPathGUI::LANG_MODULE_SETTINGS)),
            "online"      => self::dic()->ui()->factory()->input()->field()->checkbox(self::plugin()->translate("online", ilObjLearningPathGUI::LANG_MODULE_SETTINGS))
        ];

        return $fields;
    }


    /**
     * @inheritDoc
     */
    protected function getTitle() : string
    {
        return self::plugin()->translate("settings", ilObjLearningPathGUI::LANG_MODULE_SETTINGS);
    }


    /**
     * @inheritDoc
     */
    protected function storeData(array $data) : void
    {
        $this->object->setTitle(strval($data["title"]));
        $this->object->setDescription(strval($data["description"]));
        $this->object->setOnline(boolval($data["online"]));

        $this->object->update();
    }
}
