<?php

namespace DocsMd;

/**
 * Interface for classes that can compute ClassEntity objects
 * @package DocsMd
 */
interface ReflectorInterface
{

    /**
     * @return \DocsMd\ClassEntity
     */
    public function getClassEntity();
}
