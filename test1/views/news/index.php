<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>новостной сайт</title>
  <style type="text/css">
   body {
    font: 10pt Arial, Helvetica, sans-serif; /* Шрифт на веб-странице */
    background: #54463d; /* Цвет фона */
    margin: 0; /* Убираем отступы */
   }
   h2 {
    font-size: 1.1em; /* Размер шрифта */
    color: #752641; /* Цвет текста */
    margin-bottom: 0; /* Отступ снизу */
   }
   #container {
    width: 500px; /* Ширина макета */
    margin: 0 auto; /* Выравниваем по центру */
    background: #f0f0f0; /* Цвет фона правой колонки */ 
   }
   #header {
    background: #8fa09b; /* Цвет фона */
    font-size: 24pt; /* Размер текста */
    font-weight: bold; /* Жирное начертание */
    color: #edeed5; /* Цвет текста */
    padding: 5px; /* Отступы вокруг текста */
   }
   #content {
    float: left; /* Обтекание по правому краю */
    width: 329px; /* Ширина левой колонки */
    padding: 10px; /* Поля вокруг текста */
    border-right: 1px dashed #183533; /* Линия справа */
    background: #fff; /* Цвет фона левой колонки */
   }
   #content p {
    margin-top: 0.3em /* Отступ сверху */
   }
   #sidebar {
    float: left; /* Обтекание по правому краю */
    width: 120px; /* Ширина */
    padding: 10px; /* Отступы вокруг текста */
   }
   #footer {
    background: #8fa09b; /* Цвет фона */
    color: #fff; /* Цвет текста */
    padding: 5px; /* Отступы вокруг текста */
   }
   .clear { 
    clear: both; /* Отмена обтекания */ 
   }
  </style>
 </head>
 <body>
  <div id="container">
   <div id="header">новости</div>
   <div id="content">
    <?php   
       foreach($newsList as $item):
            echo '<h1>Новость №'.$item['id'].'</h1>';
            echo '<h3>'.$item['name'].'</h3>';
            echo '<p>'.$item['description'].'</p>';
       endforeach;
    ?>
       
   </div>
   <div id="sidebar">
    <p><a href="popular.html">Популярные новости</a></p>
    <p><a href="day.html">новость дня</a></p>
   </div>
   <div class="clear"></div>
   <div id="footer">&copy; Мамед Лорсанов</div>
  </div>
 </body>
</html>