<?php

/**
 * Пример реализации формирования треугольника
 * User: alexkru
 * Date: 05.11.15
 * Time: 21:16
 */
class TriangleFigure implements IRenderer
{

    /**
     * @param array $params
     * @return array
     */
    public function render(array $params)
    {
        return [
            [1,1],
            [3,5],
            [1,2]
        ];
    }
}