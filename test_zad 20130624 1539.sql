-- Скрипт сгенерирован Devart dbForge Studio for MySQL, Версия 6.0.265.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 24.06.2013 15:39:16
-- Версия сервера: 5.1.30-community
-- Версия клиента: 4.1

-- 
-- Отключение внешних ключей
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Установка кодировки, с использованием которой клиент будет посылать запросы на сервер
--
SET NAMES 'utf8';

-- 
-- Установка базы данных по умолчанию
--
USE test_zad;

--
-- Описание для таблицы opros
--
DROP TABLE IF EXISTS opros;
CREATE TABLE opros (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(50) DEFAULT NULL,
  stat INT(11) DEFAULT NULL,
  col INT(11) DEFAULT 0,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 32
AVG_ROW_LENGTH = 8192
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы otvet
--
DROP TABLE IF EXISTS otvet;
CREATE TABLE otvet (
  id INT(11) NOT NULL AUTO_INCREMENT,
  id_vopros INT(11) DEFAULT NULL,
  name VARCHAR(50) DEFAULT NULL,
  col INT(11) DEFAULT 0,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 210
AVG_ROW_LENGTH = 1260
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы users
--
DROP TABLE IF EXISTS users;
CREATE TABLE users (
  id INT(11) NOT NULL AUTO_INCREMENT,
  id_u INT(11) DEFAULT NULL,
  id_o INT(11) DEFAULT NULL,
  id_oprosa INT(11) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 46
AVG_ROW_LENGTH = 780
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы vopros
--
DROP TABLE IF EXISTS vopros;
CREATE TABLE vopros (
  id INT(11) NOT NULL AUTO_INCREMENT,
  id_opros INT(11) DEFAULT NULL,
  name VARCHAR(50) DEFAULT NULL,
  stat INT(11) DEFAULT NULL,
  type INT(11) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 84
AVG_ROW_LENGTH = 4096
CHARACTER SET utf8
COLLATE utf8_general_ci;

-- 
-- Вывод данных для таблицы opros
--
INSERT INTO opros VALUES
(30, 'Тест №1', 1, 4),
(31, 'Тест №2', 0, 0);

-- 
-- Вывод данных для таблицы otvet
--
INSERT INTO otvet VALUES
(197, 80, 'Это мой первый визит', 2),
(198, 80, 'Раз в месяц и реже', 1),
(199, 80, 'Несколько раз в месяц', 1),
(200, 81, 'Новости', 1),
(201, 81, 'О компании', 4),
(202, 81, 'Производство', 1),
(203, 81, 'Контакты', 3),
(204, 82, 'Мужской', 3),
(205, 82, 'Женский', 1),
(206, 83, 'Меньше 20 лет', 0),
(207, 83, '20-30 лет', 1),
(208, 83, '31-40 лет', 2),
(209, 83, 'Старше 40', 1);

-- 
-- Вывод данных для таблицы users
--
INSERT INTO users VALUES
(18, 1, 197, 30),
(20, 1, 201, 30),
(21, 1, 202, 30),
(23, 1, 204, 30),
(24, 1, 207, 30),
(25, 2, 198, 30),
(27, 2, 201, 30),
(29, 2, 203, 30),
(30, 2, 205, 30),
(31, 2, 208, 30),
(32, 3, 199, 30),
(33, 3, 200, 30),
(34, 3, 201, 30),
(36, 3, 203, 30),
(37, 3, 204, 30),
(38, 3, 209, 30),
(39, 4, 197, 30),
(41, 4, 201, 30),
(43, 4, 203, 30),
(44, 4, 204, 30),
(45, 4, 208, 30);

-- 
-- Вывод данных для таблицы vopros
--
INSERT INTO vopros VALUES
(80, 30, 'Как часто вы заходите на сайт?', 1, 1),
(81, 30, 'Какие разделы представляют для Вас наибольший инте', 1, 2),
(82, 30, 'Ваш пол?', 1, 1),
(83, 30, 'Ваш возраст:', 1, 1);

-- 
-- Включение внешних ключей
-- 
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;