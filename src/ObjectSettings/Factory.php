<?php

namespace srag\Plugins\LearningPath\ObjectSettings;

use srag\Plugins\LearningPath\ObjectSettings\Form\FormBuilder;
use srag\Plugins\LearningPath\Utils\LearningPathTrait;
use ilLearningPathPlugin;
use ilObjLearningPath;
use ilObjLearningPathGUI;
use srag\DIC\LearningPath\DICTrait;

/**
 * Class Factory
 *
 * Generated by SrPluginGenerator v2.9.1
 *
 * @package srag\Plugins\LearningPath\ObjectSettings
 *
 * @author Robert <support@fluxlabs.ch>
 * @author fluxlabs <support@fluxlabs.ch>
 */
final class Factory
{

    use DICTrait;
    use LearningPathTrait;

    const PLUGIN_CLASS_NAME = ilLearningPathPlugin::class;
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
     * @param ilObjLearningPathGUI $parent
     * @param ilObjLearningPath    $object
     *
     * @return FormBuilder
     */
    public function newFormBuilderInstance(ilObjLearningPathGUI $parent, ilObjLearningPath $object) : FormBuilder
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
