<?php

namespace App\Telegraph;

use DefStudio\Telegraph\Facades\Telegraph;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;
use Illuminate\Support\Stringable;

class Handler extends WebhookHandler
{
    public function hello(string $name):void{
        $this->reply("hello");
    }
    public function help():void{
        $this->reply("hello, пока только hello..");
    }
    public function actions():void{
        Telegraph::message('кнопки')->keyboard(Keyboard::make()->buttons([
            Button::make('На сайт')->url("Здесь статичная ссылка"),
            Button::make('подписаться')->action('subscribe')->param('chanel', '@paxlow'),
        ]))->send();
    }
    public function subscribe():void{
        $this->reply("👍 {$this->data->get('chanel')}");
    }
    protected function handleUnknownCommand(Stringable $text):void
    {
        if($text->value() === '/start'){
            $this->reply('hello world');
        }else {
            parent::handleUnknownCommand($text);
        }
    }
}
