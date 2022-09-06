<?php

namespace srag\ActiveRecordConfig\LearningPath\Config;

use srag\DIC\LearningPath\DICTrait;

/**
 * Class AbstractFactory
 *
 * @package srag\ActiveRecordConfig\LearningPath\Config
 */
abstract class AbstractFactory
{

    use DICTrait;

    /**
     * AbstractFactory constructor
     */
    protected function __construct()
    {

    }


    /**
     * @return Config
     */
    public function newInstance() : Config
    {
        $config = new Config();

        return $config;
    }
}
