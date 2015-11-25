insert into `orderstatuslist`(`osl_ord_id`) select `ord_id` from `order`;

SELECT * FROM `category` WHERE `id`=`parent_category_id` AND `name` LIKE ('авто%');

// работает только если уровень вложенности <= 1
SELECT  `parent_category_id` ,  `name` , COUNT(  `id` ) 
FROM  `category` 
GROUP BY  `parent_category_id` 
HAVING COUNT(  `id` ) <5
AND COUNT(  `id` ) >0


//все родители

SELECT * 
FROM  `category` AS  `lvl1` 
WHERE 1 <= ( 
SELECT COUNT(  `id` ) 
FROM  `category` AS  `lvl2` 
WHERE  `lvl1`.`id` =  `lvl2`.`parent_category_id` 
AND  `lvl1`.`id` !=  `lvl2`.`id` ) 	

//все родители имеющие не больше 3-х подгрупп.

SELECT * FROM `category` AS `lvl1`
WHERE 3 >= ( 
	SELECT COUNT(`id`) FROM `category` AS `lvl2`
	WHERE `lvl1`.`id` = `lvl2`.`parent_category_id` AND `lvl1`.`id` != `lvl2`.`id`
        HAVING COUNT(`id`) > 0
	)
	
//все "бездетные".

SELECT * 
FROM  `category` AS  `lvl1` 
WHERE 0 = ( 
SELECT COUNT(  `id` ) 
FROM  `category` AS  `lvl2` 
WHERE  `lvl1`.`id` =  `lvl2`.`parent_category_id` 
AND  `lvl1`.`id` !=  `lvl2`.`id` ) 