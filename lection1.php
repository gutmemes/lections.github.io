<?php 

include('index.php');
    
?>

    <div class="lections">

    <h1>Стандартизация управления и обмена данными.</h1>
    <p>Язык SQL предназначен для доступа к информации и управления реляционной базой данных. Управление различными реляционными базами данных осуществляют программы, называемые СУБД - системы управления базами данных (DBMS - DataBase Management System). Сама реляционная база данных представляет собой хранилище определенным образом организованной информации и СУБД. Однако на практике термин СУБД часто заменяют термином БД (База Данных). Для того чтобы c различными базами данных - такими как Oracle, Microsoft SQL Server, Informix, DB2, Access, MySQL - можно было общаться на одном языке, был разработан язык SQL.</p>
    <p>Начиная с 1986 года, комитеты ISO (International Organization for Standardization) и ANSI (American National Standards Institute) приступили к созданию ряда стандартов языка SQL, которые впоследствии были приняты и получили следующие названия: SQL86, SQL89, SQL92 и SQL99.

Стандарт SQL86 зафиксировал минимальный стандартный синтаксис языка SQL.

Стандарт SQL89 был принят в 1989 году. Он вводил набор операторов языка SQL, которые должны были реализовывать все СУБД, заявляющие поддержку стандарта SQL89. На практике каждая реальная коммерческая СУБД предоставляет значительно более широкий набор возможностей, чем предусмотрено стандартом. Так, несмотря на то, что большинство СУБД на момент принятия стандарта уже поддерживали встроенный и динамический SQL, в стандарте SQL89 правила встраивания языка SQL в процедурный язык программирования (такой как язык С) и правила использования динамического SQL прописаны не были.

До последнего времени большинство СУБД поддерживали стандарт SQL92.

В стандарте SQL92 было определено три уровня соответствия:</p>
<ul>
    <li>основной (Entry)</li>
    <li>средний (Intermediate)</li>
    <li>полный (Full)</li>
</ul>
<p>При этом, для того чтобы объявить СУБД поддерживающей стандарт SQL92, большинство производителей реализовывали только основной уровень соответствия.

Новый стандарт SQL99, при разработке именовавшийся как SQL3, стандартизировал объектные расширения языка SQL и некоторые процедурные расширения языка SQL. К моменту принятия этого стандарта большинство коммерческих СУБД, таких как Oracle, уже де-факто ввели использование объектных типов и наследования.

В стандарте SQL99 определено обязательное функциональное ядро (Core) и набор уровней расширенного соответствия. Функциональное ядро SQL99 включает в себя основной уровень соответствия SQL92. Уровни расширенного соответствия не являются обязательными для реализации в СУБД, претендующей на поддержку стандарта SQL99. СУБД может не поддерживать ни одного уровня расширенного соответствия или поддерживать любые из них.

Каждый уровень описывает набор возможностей языка SQL, которые должны поддерживать реализации СУБД, претендующие на данный уровень соответствия.

При этом объявлено, что стандарт SQL99 является открытым для всех последующих уровней расширенного соответствия, которые могут появиться в дальнейшем.

В настоящий момент стандарт SQL99 содержит следующие уровни соответствия:</p>
<ul>
    <li>Функциональное ядро.</li>
    <p>Данный уровень является обязательным для любой реализации СУБД. Он включает в себя основной уровень соответствия SQL92, а также поддержку работы с LOB-объектами (Large Object), вызов из SQL внешних программ, написанных на других языках программирования, и простые типы данных, определяемые пользователем (UDT-типы, User-Defined Datatypes). Вводится поддержка LOB-объектов двух типов: бинарных BLOB-объектов (Binary Large Object) и символьных CLOB-объектов (Character Large Object). Для доступа к LOB-объектам вводятся объекты, называемые локаторами. Локаторы описываются целочисленными переменными, реализующими доступ к LOB-объекту по ссылке. Внешние программы определяются как объекты схемы, так же, как и таблицы. В зависимости от реализации сам код внешней программы может находиться в DLL-библиотеке или в произвольном файле, а внешняя программа создается оператором языка <span class="keywords_red">CREATE PROCEDURE</span> или <span class="keywords_red">CREATE FUNCTION</span> с обязательным указанием фраз <span class="keywords_red">LANGUAGE и EXTERNAL.</span> Следует отметить, что хотя использование внешних программ входит в функциональное ядро, но поддержка вызова процедур и функций SQL относится к расширенному уровню соответствия " PSM -модули" (Persistent Stored Module). Определяемые пользователем типы данных могут быть простыми и структурированными. Второй случай относится к уровню соответствия "Базовая поддержка объектов". Простой тип данных, определяемый пользователем - это существующий тип данных, для которого определено новое имя и возможно некоторое ограничение по количеству символов или цифр. Простой тип данных, определяемый пользователем, создается оператором CREATE TYPE (например, <span class="keywords_red">CREATE TYPE name_of_new_type AS INTEGER (5) FINAL;</span> ).</p>
    <li>Поддержка работы с датой/временем.</li>
    <p>Этот уровень соответствия вводит типы данных <span class="keywords_red">DATETIME и INTERVAL,</span> а для типа <span class="keywords_red">DATETIME</span> вводит поля <span class="keywords_red">TIMEZONE_HOUR и TIMEZONE_MINUTE,</span> определяющие смещение для зонального времени относительно универсального времени. В стандарте SQL92 полного уровня соответствия типы данных <span class="keywords_red">DATETIME и INTERVAL</span> уже были специфицированы.</p>
    <li>Управление целостностью.</li>
    <p>Этот уровень соответствия вводит поддержку дополнительных возможностей ссылочной целостности: подзапросы в ограничениях целостности CHECK оператора <span class="keywords_red">CREATE TABLE,</span> триггеры, утверждения, создаваемые оператором <span class="keywords_red">CREATE ASSERTION.</span> Большинство из этих возможностей входило в стандарт SQL92.</p>
    <li>Активные базы данных.</li>
    <p>На этом уровне соответствия определяется поддержка триггеров базы данных, хранимых в базе данных и выполняемых. Триггеры представляют собой фрагменты кода, выполняемые перед или после указанного изменения данных (такого как вставка строки, удаление или изменение строки).</p>
    <li>OLAP.</li>
    <p>Этот уровень соответствия определяет средства описания более сложных запросов. Так, в оператор <span class="keywords_red">SELECT</span> включена фраза <span class="keywords_red">INTERSECT,</span> позволяющая получать пересечения множеств, выданных несколькими запросами. В стандарте SQL92 эта возможность прописывалась только для полного уровня соответствия. В оператор SELECT включена фраза FULL OUTER JOIN, предназначенная для создания полных внешних соединений таблиц. Такое соединение будет содержать все строки из объединяемых таблиц, в которых при отсутствии совпадений проставляются NULL-значения. Подобная возможность была предусмотрена и в полном уровне соответствия стандарта SQL92. В операторах языка SQL, применяемых для манипулирования данными, определяется поддержка использования конструкторов значений строк и таблиц. Конструкторы значений строк состоят из одного или нескольких выражений (например, (NULL,1,'Field1') ). Конструкторы значений таблиц представляют собой набор значений конструкторов строк, описывающий группу строк (например, VALUES (1,'A'), (2,'B') ).</p>
    <li>PSM-модули.</li>
    <p>Этот уровень соответствия полностью описан в документе SQL/PSM стандарта SQL99. Так, язык SQL расширяется операторами управления <span class="keywords_red">CASE, IF, WHILE, REPEAT, LOOP и FOR.</span> Вводится поддержка процедур и функций, создаваемых операторами <span class="keywords_red">CREATE PROCEDURE и CREATE FUNCTION.</span> В язык SQL введено использование переменных и применение обработчиков ошибок.</p>
    <li>CLI-интерфейс.</li>
    <p>Этот уровень соответствия вводит поддержку интерфейса уровня вызова, определяющего вызов операторов SQL. В свое время на базе CLI -интерфейса был разработан стандарт ODBC, который более подробно будет рассматриваться в последующих лекциях.</p>
    <li>Базовая поддержка объектов (Basic Object Support).</li>
    <p>Этот уровень соответствия стандартизирует использование объектов, вводя поддержку объектных типов данных, определяемых пользователем, применение типизированных таблиц (таблиц на базе объектных типов), использование массивов и ссылочных типов данных, а также переопределение внешних процедур.</p>
    <li>Расширенная поддержка объектов (Enhanced Object Support).</li>
    <p>Этот уровень соответствия включает все возможности, предоставляемые уровнем базовой поддержки объектов, дополняя их поддержкой множественного наследования для типов данных, определяемых пользователем.</p>
</ul>
<p>Представленные выше уровни расширенного соответствия напрямую не связаны с документами, соответствующими разделам стандарта. В настоящее время стандарт SQL99 содержит следующие основные разделы:</p>
<ul>
    <li><b>SQLFramework</b> - описывает логические основы стандарта.</li>
    <li><b>SQLFoundation</b> - определяет содержание каждого раздела стандарта и описывает функциональное ядро стандарта (Core SQL99 ).</li>
    <li><b>SQL/CLI</b> - описывает интерфейс уровня вызова.</li>
    <li><b>SQL/PSM</b> - определяет процедурные расширения языка SQL.</li>
    <li><b>SQL/Bindings</b> - определяет механизм взаимодействия языка SQL с другими языками программирования.</li>
    <li><b>SQL/MM</b> - описываются средства языка SQL, предназначенные для работы с мультимедийными данными.</li>
    <li><b>SQL/OLB</b> - определяет связь SQL с объектными языками, описывая 0-часть стандарта SQLJ для встраивания операторов SQL в язык Java.</li>
</ul>
    <div class="pages">
        <div class="page"><a href="lection1.php">1</a></div>
        <div class="page"><a href="lection1-2.php">2</a></div>
    </div>
    </div>
</body>
</html>