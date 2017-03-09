<?php

namespace PimcoreObjectDefaults\Formatter;

use Pimcore\Model\Element\ElementInterface;
use Pimcore\Model\Object\Concrete;

class ToStringFormatter {
    /** @noinspection MoreThanThreeArgumentsInspection */
    /**
     * @param $result                  array containing the nice path info. Modify it or leave it as it is. Pass it out afterwards!
     * @param ElementInterface $source the source object
     * @param array $targets           list of nodes describing the target elements
     * @param array $params            optional parameters. may contain additional context information in the future. to be defined.
     * @return array list of display names.
     */
    public static function formatPath($result, ElementInterface $source, $targets, $params) {
        foreach ($targets as $key => $item) {
            if ($item['type'] === 'object') {
                /** @var Concrete $targetObject */
                $targetObject = Concrete::getById($item['id']);
                $result[$key] = (string)$targetObject;
            }
        }
        return $result;
    }
}