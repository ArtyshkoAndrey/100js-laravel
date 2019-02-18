<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BotController extends Controller
{
    /**
     * Проводим верификацию URL
     *
     * @return mixed
     */
    private function confirm()
    {
        return '0a7a72e1';
    }

    /**
     * Обрабатываем Callback
     *
     * @param \Illuminate\Http\Request $request Запрос от ВКонтакте
     * @return mixed
     */
    public function index(Request $request)
    {
        $data = json_decode($request->getContent());

        switch ($data->type) {
            case 'confirmation':
                return $this->confirm();
            case 'message_new':
                dispatch(new HandleMessage($data->object->user_id));
                return 'ok';
            default:
                return 'ok';
        }
    }
}