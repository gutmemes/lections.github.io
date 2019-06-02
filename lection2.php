<?php 

include('index.php');
    
?>

    <div class="lections">
    <h1 id="form">Формы языка SQL</h1>
    <p>Структурированный язык запросов SQL реализуется в следующих формах:</p>
    <ul>
        <li>Интерактивный SQL.</li>
        <li>Статический SQL.</li>
        <li>Динамический SQL.</li>
        <li>Встроенный SQL.</li>
    </ul>
    <p>Интерактивный SQL позволяет конечному пользователю в интерактивном режиме выполнять SQL-операторы. Все СУБД предоставляют инструментальные средства для работы с базой данных в интерактивном режиме. Например, СУБД Oracle включает утилиту SQL*Plus, позволяющую в строчном режиме выполнять большинство SQL-операторов.

Статический SQL может реализовываться как встроенный SQL или модульный SQL. Операторы статического SQL определены уже в момент компиляции программы.

Динамический SQL позволяет формировать операторы SQL во время выполнения программы.

Встроенный SQL позволяет включать операторы SQL в код программы на другом языке программирования (например, С++).</p>
<h1 id="group">Группы операторов SQL</h1>
<p>Язык SQL определяет:</p>
<ul>
    
    <li>операторы языка, называемые иногда командами языка SQL;</li>
    <li>типы данных;</li>
    <li>набор встроенных функций.</li>

</ul>
<p>По своему логическому назначению операторы языка SQL часто разбиваются на следующие группы:</p>
<ul>
    <li>язык определения данных DDL (Data Definition Language);</li>
<li>язык манипулирования данными DML (Data Manipulation Language).</li>
</ul>
<p>Язык определения данных включает операторы, управляющие объектами базы данных. К последним относятся таблицы, индексы, представления. Для каждой конкретной базы данных существует свой набор объектов базы данных, который может значительно расширять набор объектов, предусмотренный стандартом. В некоторых СУБД, таких как Oracle, все объекты базы данных, принадлежащие одному пользователю, образуют схему базы данных. С другой стороны, в стандарте SQL92 термином "схема" стали называть группу взаимосвязанных таблиц.

Язык манипулирования данными включает операторы, управляющие содержанием таблиц базы данных и извлекающими информацию из этих таблиц.

Язык DML определяет следующие операторы:</p>
<ul>
    <li><span class="keywords_red">SELECT</span> - извлечение данных из одной или нескольких таблиц;</li>
    <li><span class="keywords_red">INSERT</span> - добавление строк в таблицу;</li>
    <li><span class="keywords_red">DELETE</span> - удаление строк из таблицы;</li>
    <li><span class="keywords_red">UPDATE</span> - изменение значений полей в таблице.</li>
</ul>
<h1 id="phase">Фазы выполнения SQL-оператора</h1>
<img src="tablelect2.png" alt="">
    <div class="pages">
        <div class="page"><a href="lection2.php">1</a></div>
        <div class="page"><a href="lection2-2.php">2</a></div>
    </div>
    </div>
</body>
</html>