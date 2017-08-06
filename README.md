# channels - Подписные каналы пользователя

Установить composer.json, добавить в composer.json блок
"repositories":{
        "type":"vcs",
        "url":"https://github.com/anavadit/channels.git"
    }
если его нет,
добавить в блок "require" строку: "rina/channels" : "^1.0.0".


Далее выполнить команду "composer update" в корне сайта находясь.

После прописать в файле 'config/app.php' провайдера:
'providers' => [
  ...
  \Rina\Channels\ChannelsServiceProvider::class,
]


В корне сайта запустить миграцию - прописать в консоли:
php artisan migrate


Далее в шаблоне home.blade.php (например, там где должен отображаться и функционировать выбор подписных каналов) добавить:
{!! channels() !!}
для вызова хелпера, который подключает блок с чекбоксами.
