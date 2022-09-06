<?php

namespace srag\DIC\LearningPath\Plugin;

/**
 * Interface Pluginable
 *
 * @package srag\DIC\LearningPath\Plugin
 */
interface Pluginable
{

    /**
     * @return PluginInterface
     */
    public function getPlugin() : PluginInterface;


    /**
     * @param PluginInterface $plugin
     *
     * @return static
     */
    public function withPlugin(PluginInterface $plugin)/*: static*/ ;
}
