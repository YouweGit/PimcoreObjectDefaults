<?php

namespace PimcoreObjectDefaults;

use Pimcore\API\Plugin as PluginLib;

class Plugin extends PluginLib\AbstractPlugin implements PluginLib\PluginInterface
{
    public function init()
    {
        parent::init();

        // using anonymous function
//        \Pimcore::getEventManager()->attach(["object.preAdd", "object.preUpdate"], function ($event) {
        \Pimcore::getEventManager()->attach(["object.preAdd"], function ($event) {


            // do something
            $object = $event->getTarget();

//            var_dump($object->getId());
//            var_dump(get_class($object));

            if(method_exists($object, 'getDefaultParent')) {
                if($object->getParentId() == $object->getId() || !$object->getParentId()) {
                    $object->setParent($object->getDefaultParent());
                }
            }

            if(method_exists($object, 'getDefaultKey')) {
                if(!$object->getKey()) {
                    $object->setKey($object->getDefaultKey());
                }
            }

        });

    }

    public function handleDocument($event)
    {
        // do something
        $document = $event->getTarget();
    }

    public static function install()
    {
        // implement your own logic here
        return true;
    }

    public static function uninstall()
    {
        // implement your own logic here
        return true;
    }

    public static function isInstalled()
    {
        // implement your own logic here
        return true;
    }
}
