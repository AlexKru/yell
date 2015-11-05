<?php

/**
 * Created by PhpStorm.
 * User: alexkru
 * Date: 05.11.15
 * Time: 20:55
 */
interface IRenderer
{
    /**
     * @param array $params
     * @return array
     */
    public function render( array $params );
}