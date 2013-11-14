<?php

namespace Ob\Unspread\Utils;

class ArrayHelper
{
    /**
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
}