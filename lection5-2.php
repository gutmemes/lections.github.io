<?php 

include('index.php');
    
?>

    <div class="lections">
    <h3 id="zapros">Коррелированные подзапросы</h3>
    <p>В операторе SELECT из внутреннего подзапроса можно ссылаться на столбцы внешнего запроса, указанного во фразе SELECT. Такой подзапрос выполняется для каждой строки таблицы, определяя условие ее вхождения в формируемый результирующий набор.

Например:</p>
<pre><span class="keywords_red">SELECT * from tbl1 t1
    WHERE f2 IN (SELECT f2 FROM tbl2 t2
                 WHERE t1.f3=t2.f3);</span></pre>
                 <p>В данном случае для каждой строки таблицы tbl1 будет проверяться условие, что значение поля f2 совпадает со значением строки таблицы tbl2, где значение поля f3 равно значению поля f3 внешней таблицы ( tbl1 ). Это простейший пример коррелированного подзапроса.

Очень часто требуется, чтобы подзапрос использовал те же данные, что и внешняя таблица. В этом случае обязательно применение алиасов.

Например:</p>
<pre><span class="keywords_red">SELECT * from tbl1 t_out
    WHERE f2< (SELECT AVG(f2) FROM tbl1 t_in
               WHERE t_out.f1= t_in.f1);</span></pre>
               <p>В случае коррелированного подзапроса во фразе HAVING можно использовать только агрегирующие функции, так как каждый раз на момент выполнения подзапроса в качестве проверяемой строки, к значениям которой имеет доступ подзапрос, выступает результат группирования строк на основе агрегирующих функций основного запроса.

Например:</p>
    <div class="pages">
        <div class="page"><a href="lection5.php">1</a></div>
        <div class="page"><a href="lection5-2.php">2</a></div>
        <div class="page"><a href="lection5-3.php">3</a></div>
    </div>
    </div>
</body>
</html>