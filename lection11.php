<?php 

include('index.php');
    
?>

    <div class="lections">
<h3>Структура программы на PL/SQL</h3>

<p>PL/SQL - это процедурный блочно-структурированный язык. Он представляет собой расширение языка SQL и предназначен для работы с СУБД Oracle.</p>

<p>PL/SQL предоставляет разработчику приложений и интерактивному пользователю следующие основные возможности:</p>
<ul>
    <li>реализация подпрограмм как отдельных блоков, в том числе использование вложенных блоков;</li>
    <li>создание пакетов, процедур и функций, хранимых в базе данных;</li>
    <li>предоставление интерфейса для вызова внешних процедур;</li>
    <li>поддержка как типов данных SQL, так и типов, вводимых в PL/SQL ;</li>
    <li>применение явного и неявного курсора, а также оператора цикла FOR для курсора;</li>
    <li>введение у переменных PL/SQL и курсоров атрибутов, которые позволяют ссылаться на тип данных или структуру элемента;</li>
    <li>введение типов коллекций и объектных типов;</li>
    <li>поддержка набора операторов управления и операторов цикла;</li>
    <li>реализация механизма обработки исключений.</li>
</ul>
<p>Основной программной единицей PL/SQL является блок, который может содержать вложенные блоки, называемые иногда подблоками.</p>

<p>Блок позволяет объединять объявления и операторы, связанные общей логикой; может быть анонимным и именованным.</p>

<p>Блок состоит из трех основных частей:</p>
<ul>
    <li>секция объявлений (необязательная часть);</li>
    <li>тело блока ;</li>
    <li>обработчики исключений (необязательная часть).</li>
</ul>
<pre><span class="keywords_red">
[ << label_name>> ]
[DECLARE

]
BEGIN

[EXCEPTION

]
END [label_name];

    

- Метка блока

 - Секция объявлений


 - Тело блока

 - Обработчики исключений

PL/SQL не чувствителен к регистру, кроме строковых переменных и констант.
</span></pre>
<p>Каждая конструкция PL/SQL должна заканчиваться символом ;.

Одна конструкция может быть расположена на нескольких строках.</p>
    </div>
</body>
</html>