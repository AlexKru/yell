<?php

/**
 * Фабрика формирования фигур. Опирается на существующие ренереры фигур.
 * Добавление нового типа достигается имплементацией интерфейса IRenderer
 * User: alexkru
 * Date: 05.11.15
 * Time: 20:50
 */
class DrawFabric
{
    const FIGURE_CLASS_POSTFIX = 'Figure';

    /**
     * Формирует фигуру указанного типа по заданным параметрам
     * @param string $type Тип фигуры
     * @param array $params Параметры формирования фигуры
     * @return array Массив точек сформированной фигуры
     * @throws ErrorException
     */
    public function getFigure( $type, array $params )
    {
        $figureRenderer = $this->_getFigureByType( $type );

        if( !$figureRenderer )
            throw new ErrorException('Undefined figure');

        return $figureRenderer->render( $params );
    }

    /**
     * Ищет рендерер фигуры и проверяет, является ли он имплементатором IRenderer
     * В зависимости от окружения и автозагрузчика, можно еще проверять существование файла класса
     * @param $type
     * @return bool|IRenderer
     */
    protected function _getFigureByType( $type )
    {
        $className = ucfirst( $type ) . self::FIGURE_CLASS_POSTFIX;

        if( class_exists( $className ) ){
            $figureRenderer = new $className();

            if( $figureRenderer instanceof IRenderer )
                return $figureRenderer;
        }

        return false;
    }

}