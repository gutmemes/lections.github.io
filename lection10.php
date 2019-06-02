<?php 

include('index.php');
    
?>

    <div class="lections">
        <h3>Создание операторов динамического SQL</h3>

<p>Операторы динамического SQL - в отличие от операторов встроенного SQL - формируются не на этапе компиляции, а на этапе выполнения приложения. Динамический SQL может применяться совместно с ODBC API или в рамках SQL/CLI, представляющего собой расширенный уровень соответствия стандарта SQL-99.</p>

<p>Поддержка динамического SQL на начальном уровне соответствия стандарту SQL-92 не требуется.</p>

<p>Операторы динамического SQL формируются как текстовые переменные.</p>

Например:
<pre><span class="keywords_red">
Stmt1:='SELECT * FROM tbl1';</span></pre>

<p>Для динамического формирования оператора можно выполнять последовательное объединение строк.</p>

<p>Операторы динамического SQL можно использовать:</p>
<ul>
    <li>однократно, производя за один шаг компиляцию и выполнение оператора. Будем называть такое применение одношаговым интерфейсом;</li>
    <li>многократно, разделяя процесс компиляции оператора, на котором строится план выполнения, и процесс непосредственного выполнения оператора. Будем называть такое применение многошаговым интерфейсом.</li>
</ul>
<p>Одношаговый интерфейс</p>

<p>одношаговый интерфейс реализуется SQL-оператором EXECUTE IMMEDIATE, который имеет в стандарте SQL-92 следующее формальное описание:</p>
<pre><span class="keywords_red">
EXECUTE IMMEDIATE :variable;</span></pre>

<p>На оператор, указываемый переменной (variable), накладываются следующие ограничения:</p>
<ul>
    <li>оператор не может использовать INTO-переменные;</li>
    <li>оператор не может использовать переменные связи.</li>
</ul>
<p>Следующий пример иллюстрирует применение динамического SQL с одношаговым интерфейсом:</p>
<pre><span class="keywords_red">
stmt_str := 'INSERT INTO ' || table_name ||
            ' values (:f1, :f2, :f3)';
EXEC SQL EXECUTE IMMEDIATE :stmt_str;
</span></pre>
<p>Многошаговый интерфейс</p>

<p>Оператор EXECUTE IMMEDIATE удобен для одноразового выполнения, но при необходимости неоднократного выполнения, например в цикле одного и того же оператора, но с различными параметрами, более эффективно использовать многошаговый интерфейс, реализуемый операторами PREPARE и EXECUTE.</p>

<p>При выполнении оператора PREPARE, указываемый им SQL-оператор передается в СУБД. Далее выполняется синтаксический разбор оператора и строится план выполнения. После этого при каждом выполнении оператора EXECUTE используется уже "откомпилированный" SQL-оператор, что значительно повышает производительность. Дополнительно при выполнении оператора EXECUTE на сервер передаются значения переменных связи (если они есть), используемые, в частности, для вычисления предиката фразы WHERE.</p>

<pre><span class="keywords_red">
PREPARE [ GLOBAL | LOCAL ] operator_sql FROM string_variable;
</span></pre>
<p>Параметр operator_sql определяет идентификатор SQL-оператора, указываемый далее для выполнения в операторе EXECUTE или для включения в курсор в операторах ALLOCATE CURSOR или DECLARE CURSOR .

Параметр string_variable указывает строку, содержащую динамически сформированный текст SQL-оператора.

Например:</p>
<pre><span class="keywords_red">
stmt_str := 'INSERT INTO ' || table_name ||
            ' values (:f1, :f2, :f3)';
EXEC SQL PREPARE GLOBAL stmt1 FROM :stmt_str;
</span></pre>
<p>Фразы GLOBAL и LOCAL определяют область видимости оператора: GLOBAL указывает, что оператор с данным идентификатором доступен всем процессам данного сеанса работы с СУБД, а LOCAL ограничивает доступ рамками данного выполняемого модуля (значение по умолчанию).

Если создаются два одноименных оператора, но один как GLOBAL, а другой - как LOCAL, то СУБД создает два отдельных плана выполнения как для разных операторов. В противном случае при компиляции оператора с уже существующим именем просто строится новый план выполнения оператора.

Для освобождения подготовленного SQL-оператора используется оператор DEALLOCATE PREPARE, который освобождает все ресурсы, занимаемые подготовленным SQL-оператором.

Например:</p>
<pre><span class="keywords_red">
EXEC SQL DEALLOCATE PREPARE GLOBAL stmt1;
</span></pre>
<p>Для выполнения откомпилированного SQL-оператора используется оператор EXECUTE, который в стандарте SQL-92 имеет следующее формальное описание:</p>
<pre><span class="keywords_red">
EXECUTE [ GLOBAL | LOCAL ] operator_sql
   [ INTO {variable .,:} 
     | { SQL DESCRIPTOR [ GLOBAL | LOCAL ]
         descriptor_name } ]
   [ USING {variable .,:}
      | { SQL DESCRIPTOR [ GLOBAL | LOCAL ]
          descriptor_name } ]
</span></pre>
<p>Фраза INTO указывается в том случае, если выполняемый SQL-оператор представляет собой запрос, возвращающий одну строку.
Динамические параметры

Значения динамических параметров передаются на сервер каждый раз при выполнении откомпилированного SQL-оператора. Динамическими параметрами могут быть как переменные связи, так и INTO-переменные.

Динамические параметры можно использовать как во встроенном SQL, так и в динамическом SQL.

динамические параметры задаются в тексте SQL-оператора символами "знак вопроса". Стандарт не определяет максимально допустимое число динамических параметров. Как правило, СУБД могут иметь ограничения только на размер вводимого SQL-оператора.

Например:</p>
<pre><span class="keywords_red">
stmt_str :='INSERT INTO tbl1 
                   VALUES (?, ?, ?)';
EXEC SQL PREPARE stmt2 FROM :stmt_str;
</span></pre>
<p>При выполнении данного откомпилированного оператора вместо динамических параметров значения будут подставляться в порядке, указанном в SQL-операторе EXECUTE или в области SQL-дескриптора.

Список значений для динамических параметров может быть указан:</p>
<ul>
    <li>фразой USING оператора EXECUTE - для динамических параметров, не указываемых фразой INTO откомпилированного оператора;</li>
    <li>фразой INTO оператора EXECUTE - для динамических параметров, указанных во фразе INTO откомпилированного оператора.</li>
</li>
<p>Например:</p>
<pre><span class="keywords_red">
stmt_str1 :='INSERT INTO tbl1 (f1,f2,f3)
                    VALUES (?, ?, ?)';
EXEC SQL PREPARE stmt2 FROM :stmt_str1;
EXEC SQL EXECUTE stmt2 USING :f1, :f2, :f3;
</span></pre>
<p>Значение переменных f1, f2 и f3 основного языка программирования будут переданы на сервер для выполнения откомпилированного оператора с идентификатором stmt2.

Возможен вариант, когда откомпилированный оператор содержит динамические параметры и во фразе INTO оператора SELECT, и в предикате.

Например:</p>
<pre><span class="keywords_red">
stmt_str2 :='SELECT f1, f2, f3 
             FROM tbl1 INTO ?, ?, ? 
             WHERE f2= ?';
EXEC SQL PREPARE stmt3 FROM :stmt_str2;
EXEC SQL EXECUTE stmt3 INTO :f1, :f2, :f3
         USING :f4;
</span></pre>
<p>Переменные f1, f2 и f3 основного языка программирования будут использованы как INTO-переменные, а значение переменной f4 будет передано на сервер для выполнения откомпилированного оператора с идентификатором stmt3.</p>

    
    </div>
</body>
</html>