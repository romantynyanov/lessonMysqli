<?php
include("db_link.php");
 // Функция вывода из базы
                       
    function out($query){
    include( "db_link.php");
    $result = mysqli_query($link,$query);  
    while($arWor = mysqli_fetch_assoc($result)){
    echo "<tr>";
    foreach($arWor as $key=>$value)
        echo "<td>".$arWor[$key]."</td>";
    echo "</tr>";
            }
    }
          
$arQuery=[    
/*1*/["QUERY"=>"CREATE TABLE `workers` (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, name VARCHAR(100), age INT(11), salary INT(11), departament_id INT(11))",
     "DESCRIPTION"=>"Создание таблицы Сотрудники с полями: id, name (имя), age (возраст), salary (зарплата), departament_id (отдел id)"],
     ["QUERY"=>"INSERT INTO `workers` (name, age, salary, departament_id) VALUES ('Кирилл',17,300,2), ('Антон',35,900,1), ('Ирина',17,500,4), ('Максим',33,200,4),              ('Валентин',27,600,1),('Андрей',29,700,3)","DESCRIPTION"=>"Добавление в таблицу Сотрудники 6 записей"],
//--------------------------
/*2*/["QUERY"=>"CREATE TABLE `departament` (dep_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, dep_name VARCHAR(100), floor INT(11))",
     "DESCRIPTION"=>"Создание таблицы  Отделы с полями: id, name (название отдела), floor (этаж)"],
     ["QUERY"=>"INSERT INTO `departament` (dep_name, floor) VALUES ('Сейлз',1),('Поддержка',2),('Финансы',3),('Логистика',4),('Бухгалтерия',5)","DESCRIPTION"=>"Добавление в таблицу Сотрудники 6 записей"],
//--------------------------    
/*3*/["QUERY"=>"SELECT W.id,W.name,W.age,D.dep_name FROM `workers` AS W INNER JOIN `departament` AS D ON W.departament_id=D.dep_id AND W.age>18 ORDER BY W.name","DESCRIPTION"=>"Сделать SELECT запрос в таблицу Сотрудники и вывести всех сотрудников у которых возраст больше 18 лет, а также добавить в запрос LEFT JOIN с таблицей Отделы, откуда вывести название отдела, в котором работает сотрудник."],
//--------------------------    
/*4*/["QUERY"=>"SELECT D.dep_name as 'Отделы', COUNT(D.dep_name) as 'Кол.сотрудников' FROM `departament` AS D INNER JOIN `workers` AS W ON D.dep_id=W.departament_id GROUP BY    D.dep_name ","DESCRIPTION"=>"Сделать SELECT запрос в таблицу Отделы и вывести все отделы, а также добавить поле Количество сотрудников в отделе, где выводится число сотрудников из связанной таблицы Сотрудники."],
//--------------------------  
        
/*5*/["QUERY"=>"SELECT D.dep_name, MAX(W.salary) as max
                FROM departament as D INNER JOIN workers as W ON D.dep_id = W.departament_id WHERE W.salary
                GROUP BY D.dep_name ",
      "DESCRIPTION"=>"Сделать SELECT запрос в таблицу Отделы и получить в каждом отделе сотрудника с самой большой зарплатой. Подсказка, используйте функцию MAX по полю SALARY."]
];




?>
