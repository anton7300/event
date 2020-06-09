Start project
- <h4>redis-server</h4> 
    если порт занят:
     - <b>ps aux | grep redis</b> (ищем порт на котором работает redis)
     - <b>kill -9 <номер порта></b> (убиваем)
- <h4>laravel-echo-server start</h4>
    если порт занят:
    - <b>lsof -i TCP:6001 | grep LISTEN</b> (ищем порт на котором работает laravel-echo-server)
    - <b>kill -9 <номер порта></b> (убиваем)
- <h4>php artisan queue:work</h4>
- <h4>npm run watch-poll</h4>