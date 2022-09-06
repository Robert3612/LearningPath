<?php

namespace srag\Plugins\learningpath\ObjectSettings;

use srag\Plugins\learningpath\ObjectSettings\Form\FormBuilder;
use srag\Plugins\learningpath\Utils\LearningpathTrait;
use ilLearningpathPlugin;
use ilObjLearningpath;
use ilObjLearningpathGUI;
use srag\DIC\Learningpath\DICTrait;

/**
 * Class Factory
 *
 * Generated by SrPluginGenerator v2.9.1
 *
 * @package srag\Plugins\learningpath\ObjectSettings
 *
 * @author robert <support@fluxlabs.ch>
 * @author fluxlabs <support@fluxlabs.ch>
 */
final class Factory
{

    use DICTrait;
    use LearningpathTrait;

    const PLUGIN_CLASS_NAME = ilLearningpathPlugin::class;
    /**
     * @var self|null
     */
    protected static $instance = null;


    /**
     * Factory constructor
     */
    private function __construct()
    {

    }


    /**
     * @return self
     */
    public static function getInstance() : self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }


    /**
     * @param ilObjLearningpathGUI $parent
     * @param ilObjLearningpath    $object
     *
     * @return FormBuilder
     */
    public function newFormBuilderInstance(ilObjLearningpathGUI $parent, ilObjLearningpath $object) : FormBuilder
    {
        $form = new FormBuilder($parent, $object);

        return $form;
    }


    /**
     * @return ObjectSettings
     */
    public function newInstance() : ObjectSettings
    {
        $object_settings = new ObjectSettings();

        return $object_settings;
    }
}
