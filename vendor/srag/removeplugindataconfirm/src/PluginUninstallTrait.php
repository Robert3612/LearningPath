<?php

namespace srag\RemovePluginDataConfirm\LearningPath;

/**
 * Trait PluginUninstallTrait
 *
 * @package srag\RemovePluginDataConfirm\LearningPath
 */
trait PluginUninstallTrait
{

    use BasePluginUninstallTrait;

    /**
     * @internal
     */
    protected final function afterUninstall() : void
    {

    }


    /**
     * @return bool
     *
     * @internal
     */
    protected final function beforeUninstall() : bool
    {
        return $this->pluginUninstall();
    }
}
