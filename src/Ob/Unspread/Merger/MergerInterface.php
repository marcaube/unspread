<?php

namespace Ob\Unspread\Merger;

interface MergerInterface
{
    public function merge($baseFile, $additionalFile);
}
