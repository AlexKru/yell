-- Самый быстрый по реализации это такой вариант.
-- Но он использует временные таблицы и filesort, при этом на индексы не смотрит
SELECT `type`, `value`
FROM ( SELECT * FROM `data` ORDER BY `date` DESC ) as self
GROUP BY `type`;

-- Если добавить индекс по типу сущности и дате записи
CREATE INDEX idx_type_date ON `data`( `type`, `date` );

-- То быстрее будет работать запрос вида. И он не использует временные таблицы.
SELECT
	`type`,
    ( SELECT `value` FROM `data` WHERE `type` = self.`type` ORDER BY `date` DESC LIMIT 1 )
FROM `data` self
GROUP BY `type`;