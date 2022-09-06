<?php

namespace srag\Plugins\learningpath\Config;

use srag\Plugins\learningpath\Config\Form\FormBuilder;
use srag\Plugins\learningpath\Utils\LearningpathTrait;
use ilLearningpathPlugin;
use srag\ActiveRecordConfig\Learningpath\Config\AbstractFactory;
use srag\ActiveRecordConfig\Learningpath\Config\AbstractRepository;
use srag\ActiveRecordConfig\Learningpath\Config\Config;

/**
 * Class Repository
 *
 * Generated by SrPluginGenerator v2.9.1
 *
 * @package srag\Plugins\learningpath\Config
 *
 * @author robert <support@fluxlabs.ch>
 * @author fluxlabs <support@fluxlabs.ch>
 */
final class Repository extends AbstractRepository
{

    use LearningpathTrait;

    const PLUGIN_CLASS_NAME = ilLearningpathPlugin::class;
    /**
     * @var self|null
     */
    protected static $instance = null;


    /**
     * Repository constructor
     */
    protected function __construct()
    {
        parent::__construct();
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
     * @inheritDoc
     *
     * @return Factory
     */
    public function factory() : AbstractFactory
    {
        return Factory::getInstance();
    }


    /**
     * @inheritDoc
     */
    protected function getFields() : array
    {
        return [
            FormBuilder::KEY_SOME => Config::TYPE_STRING
        ];
    }


    /**
     * @inheritDoc
     */
    protected function getTableName() : string
    {
        return ilLearningpathPlugin::PLUGIN_ID . "_config";
    }
}
