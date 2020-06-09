<h2>Start project</h2>
<h3>redis-server</h3>
    если порт занят:<br>
     - <b>ps aux | grep redis</b> (ищем порт на котором работает redis)<br>
     - <b>kill -9 <номер порта></b> (убиваем)
<h3>laravel-echo-server start</h3>
    если порт занят:<br>
    - <b>lsof -i TCP:6001 | grep LISTEN</b> (ищем порт на котором работает laravel-echo-server)<br>
    - <b>kill -9 <номер порта></b> (убиваем)
<h3>php artisan queue:work</h3>
<h3>npm run watch-poll</h3>
<hr>