<?php

/**
 * Контроллер, который на основе типа и параметров фигуры формирует массив точек.
 * Предположил что это ajax-контроллер, и фигура рендерится на клиенте
 * User: alexkru
 * Date: 05.11.15
 * Time: 20:49
 */
class SomeController
{
    public function indexAction()
    {
        /**
         * Тут абстрактное получение данных от пользователя.
         * Предположим, что он присылает сразу пулл фигур для формирования
         */
        $shapes = [
            ['type' => 'circle', 'params' => []],
            ['type' => 'circle', 'params' => []]
        ];

        $fabric = new DrawFabric();

        $output = [];

        foreach( $shapes as $shape )
        {
            try{
                $figure = $fabric->getFigure( $shape['type'], $shape['params'] );

                $output[] = $figure;

            }catch (ErrorException $e)
            {
                echo json_encode([
                    'status' => 0,
                    'message' => $e->getMessage()
                ]);
                exit();
            }
        }

        echo json_encode( [
            'status' => 1,
            'shapes' => $output
        ] );

        exit();
    }
}