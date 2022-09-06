<?php

namespace srag\CustomInputGUIs\LearningPath;

/**
 * Trait CustomInputGUIsTrait
 *
 * @package srag\CustomInputGUIs\LearningPath
 */
trait CustomInputGUIsTrait
{

    /**
     * @return CustomInputGUIs
     */
    protected static final function customInputGUIs() : CustomInputGUIs
    {
        return CustomInputGUIs::getInstance();
    }
}
