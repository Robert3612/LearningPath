<?php

namespace srag\DIC\Learningpath\Plugin;

/**
 * Interface Pluginable
 *
 * @package srag\DIC\Learningpath\Plugin
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
