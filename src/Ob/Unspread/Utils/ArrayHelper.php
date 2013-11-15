<?php

namespace Ob\Unspread\Utils;

class ArrayHelper
{
    /**
     * Checks if the given array is associative
     *
     * @param array $array
     *
     * @return bool
     */
    public function isAssoc($array)
    {
        foreach (array_keys($array) as $key => $value) {
            if ($key !== $value) {
                return true;
            }
        }

        return false;
    }

    /**
     * Checks if the given array is multi-dimensionnal
     *
     * @param array $array
     *
     * @return bool
     */
    public function isMulti($array)
    {
        foreach ($array as $value) {
            if (is_array($value)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Renames the keys of an array
     *
     * @param array $array
     * @param array $newKeys
     *
     * @return array
     */
    public function renameKeys($array, $newKeys)
    {
        $keyMapping = array_combine(array_keys($array), $newKeys);

        foreach ($array as $key => $value) {
            $array[$keyMapping[$key]] = $value;
            unset($array[$key]);
        }

        return $array;
    }
}
