<h1>Start project</h2>
<h3>1. redis-server</h3>
<h6>
    если порт занят:<br>
     - <b>ps aux | grep redis</b> (ищем порт на котором работает redis)<br>
     - <b>kill -9 <номер порта></b> (убиваем)
</h6>
<h3>2. laravel-echo-server start</h3>
<h6>
    если порт занят:<br>
    - <b>lsof -i TCP:6001 | grep LISTEN</b> (ищем порт на котором работает laravel-echo-server)<br>
    - <b>kill -9 <номер порта></b> (убиваем)
</h6>
<h3>3. php artisan queue:work</h3>
<h3>4. npm run watch-poll</h3>
<hr>