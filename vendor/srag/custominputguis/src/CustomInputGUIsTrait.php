<?php

namespace srag\CustomInputGUIs\Learningpath;

/**
 * Trait CustomInputGUIsTrait
 *
 * @package srag\CustomInputGUIs\Learningpath
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
