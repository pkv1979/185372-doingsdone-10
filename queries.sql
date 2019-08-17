USE `doingsdone`;

insert into user set 
	email = 'Vasyl.Pupkin@testmail.com',
	name = 'Vasyl Pupkin',
	password = 'qwerty';
insert into user set
	email = 'Ivan.Ivanov@testmail.com',
	name = 'Ivan Ivanov',
	password = 'asdfgh';

insert into project set
	name = 'Входящие',
	userId = 1;
insert into project set
	name = 'Учеба',
	userId = 1;
insert into project set
	name = 'Работа',
	userId = 1;
insert into project set
	name = 'Домашние дела',
	userId = 1;
insert into project set
	name = 'Авто',
	userId = 1;

insert into task set
	userId = 1,
	projectId = 3,
	taskStatus = 0,
	name = 'Собеседование в IT компании',
	termDate = '2019-12-01 00:00:00';
insert into task set
	userId = 1,
	projectId = 3,
	taskStatus = 0,
	name = 'Выполнить тестовое задание',
	termDate = '2019-12-25 00:00:00';
insert into task set
	userId = 1,
	projectId = 2,
	taskStatus = 1,
	name = 'Сделать задание первого раздела',
    termDate = '2019-12-21 00:00:00';
insert into task set
	userId = 1,
	projectId = 1,
	taskStatus = 0,
	name = 'Встреча с другом',
	termDate = '2019-08-18 00:00:00';
insert into task set
	userId = 1,
	projectId = 4,
	taskStatus = 0,
	name = 'Купить корм для кота';
insert into task set
	userId = 1,
	projectId = 4,
	taskStatus = 0,
	name = 'Заказать пиццу';

// Получить список из всех проектов для одного пользователя;
select name from project where userId = 1;

// Получить список из всех задач для одного проекта
select u.name, p.name, t.createdDate, t.taskStatus, t.name, t.fileUrl, t.termDate 
from task t join user u on t.userId = u.id join project p on t.projectId = p.id where projectId = 3;

// Пометить задачу как выполненную
update task set taskStatus = 1 where id = 6;

// Обновить название задачи по её идентификатору
update task set name = 'Обязательно купить корм для кота' where id = 5;