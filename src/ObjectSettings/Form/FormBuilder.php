<?php

namespace srag\Plugins\learningpath\ObjectSettings\Form;

use srag\Plugins\learningpath\Utils\LearningpathTrait;
use ilLearningpathPlugin;
use ilObjLearningpath;
use ilObjLearningpathGUI;
use srag\CustomInputGUIs\Learningpath\FormBuilder\AbstractFormBuilder;

/**
 * Class FormBuilder
 *
 * @package srag\Plugins\learningpath\ObjectSettings\Form
 *
 * @author robert <support@fluxlabs.ch>
 * @author fluxlabs <support@fluxlabs.ch>
 */
class FormBuilder extends AbstractFormBuilder
{

    use LearningpathTrait;

    const PLUGIN_CLASS_NAME = ilLearningpathPlugin::class;
    /**
     * @var ilObjLearningpath
     */
    protected $object;


    /**
     * @inheritDoc
     *
     * @param ilObjLearningpathGUI $parent
     * @param ilObjLearningpath    $object
     */
    public function __construct(ilObjLearningpathGUI $parent, ilObjLearningpath $object)
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
            ilObjLearningpathGUI::CMD_SETTINGS_STORE  => self::plugin()->translate("save", ilObjLearningpathGUI::LANG_MODULE_SETTINGS),
            ilObjLearningpathGUI::CMD_MANAGE_CONTENTS => self::plugin()->translate("cancel", ilObjLearningpathGUI::LANG_MODULE_SETTINGS)
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
            "title"       => self::dic()->ui()->factory()->input()->field()->text(self::plugin()->translate("title", ilObjLearningpathGUI::LANG_MODULE_SETTINGS))->withRequired(true),
            "description" => self::dic()->ui()->factory()->input()->field()->textarea(self::plugin()->translate("description", ilObjLearningpathGUI::LANG_MODULE_SETTINGS)),
            "online"      => self::dic()->ui()->factory()->input()->field()->checkbox(self::plugin()->translate("online", ilObjLearningpathGUI::LANG_MODULE_SETTINGS))
        ];

        return $fields;
    }


    /**
     * @inheritDoc
     */
    protected function getTitle() : string
    {
        return self::plugin()->translate("settings", ilObjLearningpathGUI::LANG_MODULE_SETTINGS);
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
