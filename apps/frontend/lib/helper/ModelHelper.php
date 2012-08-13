<?php


/**
 * Returns setter method name for given DB field
 * @example 'can_be_reordered' => setCanBeReordered
 *
 *
 * @param string $value name of the field in underlines
 *
 * @return string setter name
 */
function getSetterName($value)
{
    return 'set' . str_replace(' ', '', ucwords(str_replace('_', ' ', $value)));
}