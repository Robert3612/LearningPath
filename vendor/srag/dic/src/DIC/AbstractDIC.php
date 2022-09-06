<?php

namespace srag\DIC\LearningPath\DIC;

use ILIAS\DI\Container;
use srag\DIC\LearningPath\Database\DatabaseDetector;
use srag\DIC\LearningPath\Database\DatabaseInterface;

/**
 * Class AbstractDIC
 *
 * @package srag\DIC\LearningPath\DIC
 */
abstract class AbstractDIC implements DICInterface
{

    /**
     * @var Container
     */
    protected $dic;


    /**
     * @inheritDoc
     */
    public function __construct(Container &$dic)
    {
        $this->dic = &$dic;
    }


    /**
     * @inheritDoc
     */
    public function database() : DatabaseInterface
    {
        return DatabaseDetector::getInstance($this->databaseCore());
    }
}
