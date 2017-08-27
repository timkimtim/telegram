<?php

require_once ("/var/www/html/AAF4kPCJzeEF4gcKpYmm7cYJY7C0XxU8E3w/db_test.php");
require_once "vendor/autoload.php";

try {
    // подключаем телеграмм
    $telegram = new \TelegramBot\Api\BotApi('#####################################');
    $telegram_client = new \TelegramBot\Api\Client('###########################################');
    $provider_token = '390540012:LIVE:1066';    //'381764678:TEST:1297'
    // update содержит информацию о сообщениях пользователя, берем оттуда id и текст
    $update = file_get_contents('php://input');
    $update = json_decode($update, true);
    $chat_id = $update["message"]["chat"]["id"];
    $text = $update["message"]["text"];
    //$pre_checkout_query = $update["pre_checkout_query"]["id"];
    //создаем экземпляр класса dbtest
    $db = new Dbtest();
    $admin = 0;
    $superadmin = 0;
    trigger_error("----Start----");
    trigger_error($chat_id);

    //try {
    //    $telegram_client->preCheckoutQuery(function ($query) use ($telegram_client, $telegram) {
    //        $telegram->answerPreCheckoutQuery($query->getId(), true); //Говорим что всё хорошо
    //    });
    //    $telegram_client->run();

    //    $reply = $db->setStirkaForInvoice($chat_id);
    //    $telegram->sendMessage($chat_id, $reply);
    //    gotoMainmenu($chat_id, $telegram, $db);

    //} catch (\TelegramBot\Api\Exception $e) {
    //    $e->getMessage();
    //}

    if ($text){
        $db->setUserActualTime($chat_id);
        if ($db->isRegistered($chat_id)) {
            if ( $db->isAdmin($chat_id) == 1) {
                 $admin = 1;
            }
            if ( $db->isSuperAdmin($chat_id) == 1) {
                 $superadmin = 1;
            }

            $is_text_valid = false;
            $additional_buttons_array = array(["Принять"]);
            $valid_text_array = array_merge($db->getMenu($chat_id, 2100), $db->getUni(), $db->getPointByUser($chat_id), $db->getValidCommandsFromMainMenu(), $db->getValidCommandsForAdmin(), $db->getValidDevices(), $additional_buttons_array);
            foreach ($valid_text_array as $value){
                    if ($text == $value[0]){
                        $is_text_valid = true;
                        break;
                    }
                }
            if ($is_text_valid == false) {
                $reply = "Неверная команда";
                $telegram->sendMessage($chat_id, $reply);
                exit();
            }
        } else {
            if (!$db->register($chat_id)) {
                $reply = "Возникла ошибка при регистрации.";
                $telegram->sendMessage($chat_id, $reply);
                exit();
            } else {
                $reply = "Привет! Ну что, задумываешь устроить грандиозную стирку? Тогда не теряйся и поскорей регайся!";
                $telegram->sendMessage($chat_id, $reply);
                $db->setStep( $chat_id, 1000);
            }
        }
    }

    // определяет step закрпленный в таблице bot_users
    $step = $db->getStep( $chat_id);

    // ветка админа
    if ($admin == 1) {
        if($text){
            if ($text == "начать" || $text == "Начать" ) {
                $reply = "Добро пожаловать в бота!";
                $db->setStep( $chat_id, 0);
                showMainMenu( $chat_id, $telegram, $db);
                //$reply_markup = $telegram->replyKeyboardMarkup([ 'keyboard' => $keyboard, 'resize_keyboard' => true, 'one_time_keyboard' => false ]);
                //$telegram->sendMessage([ 'chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $replyMarkup ]);

            } else if ($text == "id") {
                $reply = $chat_id;
                $telegram->sendMessage($chat_id, $reply);

            } else if ( $text == "студент") {
                $db->setStudent($chat_id);
                $buttons = $db->getUni();
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, "--Выбери ВУЗ--", false, null, null, $keyboard);
                $db->setStep($chat_id, 1001);

            } else if ($text == "Деньги") {
                $db->setStep( $chat_id, 1);
                showPointMenu( $chat_id, $telegram, $db);
                //$reply_markup = $telegram->replyKeyboardMarkup([ 'keyboard' => $keyboard2, 'resize_keyboard' => true, 'one_time_keyboard' => true ]);
                //$telegram->sendMessage([ 'chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $reply_markup ]);

            } else if ($text == "Запуск") {
                $db->setStep( $chat_id, 2);
                showPointMenu( $chat_id, $telegram, $db);

            } else if ($text == "История") {
                $db->setStep( $chat_id, 3);
                showPointMenu( $chat_id, $telegram, $db);

            } else if ($text == "Статус") {
                $db->setStep( $chat_id, 4);
                showPointMenu( $chat_id, $telegram, $db);

            } else if ($text == "Меню") {
                $db->setStep( $chat_id, 0);
                showMainMenu( $chat_id, $telegram, $db);

            } else if ($text == "Машинка 1") {
                $db->setMashine( $chat_id, 1);
                showRepairMenu( $chat_id, $telegram);

            } else if ($text == "Машинка 2") {
                $db->setMashine( $chat_id, 2);
                showRepairMenu( $chat_id, $telegram);

            } else if ($text == "Машинка 3") {
                $db->setMashine( $chat_id, 3);
                showRepairMenu( $chat_id, $telegram);

            } else if ($text == "Машинка 4") {
                $db->setMashine( $chat_id, 4);
                showRepairMenu( $chat_id, $telegram);

            } else if ($text == "Машинка 5") {
                $db->setMashine( $chat_id, 5);
                showRepairMenu( $chat_id, $telegram);

            } else if ($text == "Машинка 6") {
                $db->setMashine( $chat_id, 6);
                showRepairMenu( $chat_id, $telegram);

            } else if ($text == "Машинка 7") {
                $db->setMashine( $chat_id, 7);
                showRepairMenu( $chat_id, $telegram);

            } else if ($text == "Сушилка") {
                $db->setDry( $chat_id);
                showRepairMenu( $chat_id, $telegram);

            } else if ($text == "Старт") {
                $txt = $db->sendCommand( $chat_id, "start");
                shell_exec($txt);
                $telegram->sendMessage($chat_id, $txt);

            } else if ($text == "Ремонт") {
                $txt = $db->sendCommand( $chat_id, "repair");
                shell_exec($txt);
                $telegram->sendMessage($chat_id, $txt);

            } else if ($text == "Починили") {
                $txt = $db->sendCommand( $chat_id, "work");
                shell_exec($txt);
                $telegram->sendMessage($chat_id, $txt);

            } else if ($text == "Перегрузить") {
                $txt = $db->sendCommand( $chat_id, "reboot");
                shell_exec($txt);
                $telegram->sendMessage($chat_id, $txt);

            } else if ($text == "Резет") {
                $txt = $db->sendCommand( $chat_id, "ccbill");
                shell_exec($txt);
                $telegram->sendMessage($chat_id, $txt);

            } else {
                $db->setDevice( $chat_id, $text);
                showData( $chat_id, $telegram, $db, $step);
                //$reply = "По запросу \"<b>".$text."</b>\" ничего не найдено.";
                //$telegram->sendMessage([ 'chat_id' => $chat_id, 'parse_mode'=> 'HTML', 'text' => $reply ]);
            }
        } else {
           $telegram->sendMessage($chat_id, "Отправьте текстовое сообщение.");
        }

    // ветка пользователя
    } else {
        // переход в админскую ветку
        if ($text == "админ") {
            $db->setAdmin($chat_id);
            $reply = "Добро пожаловать в бота!";
            showMainMenu( $chat_id, $telegram, $db);

        // запрос уникального id пользователя
        } else if ($text == "id") {
            $reply = $chat_id;
            $telegram->sendMessage($chat_id, $reply);

        // подветка регистрации (проходится единожды, когда пользователь написал в первый раз)
        } else if ($step >= 1000 && $step <=1003) {
            if ($text == "Назад") {
                $reply = "Выбери ВУЗ";
                $buttons = $db->getUni();
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                $db->setStep($chat_id, 1001);
                exit();
            }
            switch ($step) {
                case 1000:
                    $reply = "Выбери ВУЗ";
                    $buttons = $db->getUni();
                    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                    $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                    $db->setStep($chat_id, 1001);
                    sleep(1);
                    break;

                case 1001:
                    $db->setUniByName($chat_id, $text);
                    $buttons = $db->getPointByUser( $chat_id);
                    $reply = "Ок! А теперь укажи свою общагу";
                    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                    $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                    $db->setStep($chat_id, 1002);
                    sleep(1);
                    break;

                case 1002:
                    $db->setPointByName($chat_id, $text);
                    $buttons = [["Принять"],["Назад"]];
                    $reply = $db->getConfirmText($chat_id) . "\nПодтверди введенную инфу или поправь меня, вернувшись назад";
                    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                    $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                    $db->setStep($chat_id, 1003);
                    sleep(1);
                    break;
                case 1003:
                    $reply = "Урааа! Товарищ, отныне ты в системе Ландроматик! Поздравляю!";
                    $buttons = $db->getMenu($chat_id, 1100);
                    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                    $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                    $db->setStep($chat_id, 1100);
                    sleep(1);
                    break;
            }
        // основная подветка
        } else if ($step >= 1100 && $step < 2000) {
            // запрос статутсв машинок
            if ($step == 1110 && $text == "Как пользоваться прачечной") {
                $reply = "Хочешь постираться, но не знаешь с чего тебе начать?\nНе парься! Все очень легко и просто. Загружаешь белье, вводишь команды через сенсорную панель терминала, а дальше за тебя все делает умная техника. Остается только подождать";
                $telegram->sendMessage($chat_id, $reply);

            } else if ($step == 1110 && $text == "Как участвовать в акциях") {
                $reply = "Интересуют скидки или бонусная программа?\nЛови халяву, студент! Прочитай правила, выполни условия и получи возможность постираться и посушиться бесплатно или с умопомрачительной скидкой!";
                $db->setStep($chat_id, 1150);
                $buttons = $db->getMenu($chat_id, 1150);
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);

            } else if ($step == 1110 && $text == "Обратная связь") {
                  $reply = "Сложно воткнуться? Есть вопросы? Не переживай, я всегда на связи, все детально расскажу и подскажу";
                  $telegram->sendMessage($chat_id, $reply);

            } else if ($step == 1150 && $text == "1+1+1=4") {
                $reply = "Вау! Быть чистюлей не только приятно, но и выгодно! Ходи в прачечную как можно чаще и получай заслуженные бонусы: за каждую четвертую стирку тебе не придется платить из своего кармана ни единого рубля";
                $telegram->sendMessage($chat_id, $reply);

            } else if ($step == 1150 && $text == "Чистый Четверг") {
                $reply = "Хочешь сэкономить и не знаешь, как это сделать? Делюсь зачетной темой! По четвергам Ландроматик особенно щедр и радует студентов улетными скидками!";
                $telegram->sendMessage($chat_id, $reply);

            } else if ($step == 1160 && $text == "Свободные машинки") {
                $reply = "Уффф! Бывает, что стирка нужна здесь и сейчас, а бежать наобум нет никакого желания. Вдруг все занято? Доверься мне и будь всегда в курсе текущей ситуации!\n\n" . $db->getStatusStudent($chat_id);
                $telegram->sendMessage($chat_id, $reply);

            } else if ($step == 1160 && $text == "Занять очередь") {
                $reply = "Время – деньги! Ломает слоняться с ворохом вещей и караулить очередь, теряя драгоценные минуты? Нет проблем, я все сделаю за тебя! Просто подойди к условленному часу";
                $telegram->sendMessage($chat_id, $reply);

            } else if ($step == 1160 && $text == "Моя история") {
                $reply = "Обожаешь порядок во всем? Тогда тебе сказочно повезло со мной! Каждый поход в прачечную и использованная услуга тщательно фиксируются в личном кабинете! Составлять расписание и планировать бюджет будет гораздо проще!";
                $telegram->sendMessage($chat_id, $reply);

            // запрос, является ли стирка бесплатной
            } else if ($step == 1170 && $text == "1+1+1=4"){
                // если да, переводит в особое меню для бесплатной стирки
                if ($db->check4Free($chat_id) == true) {
                    $db->setStep($chat_id, 1181);
                    $buttons = $db->getMenu($chat_id, 1181);
                    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                    $telegram->sendMessage($chat_id, "1181", false, null, null, $keyboard);
                // стандартное меню для платной стирки
                } else {
                    $db->setStep($chat_id, 1180);
                    $buttons = $db->getMenu($chat_id, 1180);
                    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                    $telegram->sendMessage($chat_id, "1180", false, null, null, $keyboard);
                }

            // для акции ЧЧ, проверка на день недели
            } else if ( $step == 1200 && $text == "Участвовать"){
                // если четверг, разрешить доступ к акции
                if (date("w") == 5) {
                    $menuid = $db->getMenuIdByText($chat_id, $text);
                    $db->setStep($chat_id, $menuid);
                    $buttons = $db->getMenu($chat_id, $menuid);
                    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                    $telegram->sendMessage($chat_id, $menuid, false, null, null, $keyboard);
                    exit();

                // если не четверг, выдать сообщение, вернуть в основное меню
                } else {
                    $reply = "Акция проводится только в четверг.";
                    $telegram->sendMessage($chat_id, $reply);
                    gotoMainmenu($chat_id, $telegram, $db);
                }

            // для акции 1114 при нажатии кнопки "Наличный" запускает функцию выполняющую необходимые действия для данной акции
            } else if ($step == 1300 && $text == "Наличные"){
                $reply = $db->set1114($chat_id);
                $telegram->sendMessage($chat_id, $reply);
                gotoMainmenu($chat_id, $telegram, $db);

            // для акции 1114, безналичная оплата с помощью яндекс кассы
            } else if ($step == 1300 && $text == "Оплата картой"){
                //invoicePay($chat_id, $telegram, $provider_token);
                $title = 'Оплата';
                $description = 'Оплата стиральной машинки';
                $payload = 'yandex';
                $startParameter = 'invoice_yandex';
                $currency = 'RUB';
                $price = 10000;
                $price_for_sql = $price / 100;
                $prices = [['label' => 'Стирка', 'amount' => $price]];
                $telegram->sendInvoice($chat_id, $title, $description, $payload, $provider_token, $startParameter, $currency, $prices);

                $db->insertPaymentSQL($chat_id, $price_for_sql, $payload);

            // для акции ЧЧ при нажатии кнопки "Наличный" запускает функцию выполняющую необходимые действия для данной акции
            } else if ( $step == 1400 && $text == "Наличные"){
                $reply = $db->setCleanThursday($chat_id);
                $telegram->sendMessage($chat_id, $reply);
                gotoMainmenu($chat_id, $telegram, $db);

            // для акции ЧЧ, безналичная оплата с помощью яндекс кассы
            } else if ( $step == 1400 && $text == "Оплата картой"){

            // навигация по меню
            } else {
                $menuid = $db->getMenuIdByText($chat_id, $text);
                $db->setStep($chat_id, $menuid);
                $buttons = $db->getMenu( $chat_id, $menuid);
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $menuid, false, null, null, $keyboard);
                exit();
            }
        // меню выбора мшинок для акции 1114
        } else if ($step == 2100){
            switch ($text){
                case "Меню":
                    gotoMainmenu($chat_id, $telegram, $db);
                    break;
                default:
                    if ($text == "1") {
                        $db->setMashine($chat_id, 1);
                    } else if ($text == "2") {
                        $db->setMashine($chat_id, 2);
                    } else if ($text == "3") {
                        $db->setMashine($chat_id, 3);
                    } else if ($text == "4") {
                        $db->setMashine($chat_id, 4);
                    } else if ($text == "5") {
                        $db->setMashine($chat_id, 5);
                    } else if ($text == "6") {
                        $db->setMashine($chat_id, 6);
                    } else if ($text == "7") {
                        $db->setMashine($chat_id, 7);
                    } else {
                        $db->setDry($chat_id);
                    }

                    // проверка на состояние машинки
                    if (strpos($db->checkMashineStatus($chat_id), "готова")){
                        // запуск машинки для бесплатной стирки
                        if ($db->check4Free($chat_id) == true) {
                            $reply = $db->set1114($chat_id);
                            $telegram->sendMessage($chat_id, $reply);
                            gotoMainmenu($chat_id, $telegram, $db);
                        // меню оплаты машинки
                        } else {
                            $db->setStep($chat_id, 1300);
                            $buttons = $db->getMenu($chat_id, 1300);
                            $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                            $telegram->sendMessage($chat_id, "Оплата", false, null, null, $keyboard);
                        }
                    // если машинка не включена, выводит сообщение о состоянии машинки и возвращает к меню выбора машинки
                    } else {
                        $reply = $db->checkMashineStatus($chat_id);
                        $telegram->sendMessage($chat_id, $reply);
                        $db->getMenu( $chat_id, 2100);
                    }
            }

        // меню выбора машинок для акции ЧЧ
         } else if ($step == 2200){
             switch ($text){
                 case "Меню":
                     gotoMainmenu($chat_id, $telegram, $db);
                     break;
                 default:
                     if ($text == "1") {
                         $db->setMashine($chat_id, 1);
                     } else if ($text == "2") {
                         $db->setMashine($chat_id, 2);
                     } else if ($text == "3") {
                         $db->setMashine($chat_id, 3);
                     } else if ($text == "4") {
                         $db->setMashine($chat_id, 4);
                     } else if ($text == "5") {
                         $db->setMashine($chat_id, 5);
                     } else if ($text == "6") {
                         $db->setMashine($chat_id, 6);
                     } else if ($text == "7") {
                         $db->setMashine($chat_id, 7);
                     }
                     // проверка на состояние машинки, если готова, перевести в меню оплаты, если нет вывести статус машинки, и вернуть в меню выбора машинок
                     if (strpos($db->checkMashineStatus($chat_id), "готова")){
                         $db->setStep($chat_id, 1400);
                         $buttons = $db->getMenu($chat_id, 1400);
                         $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                         $telegram->sendMessage($chat_id, "Оплата", false, null, null, $keyboard);
                     } else {
                         $reply = $db->checkMashineStatus($chat_id);
                         $telegram->sendMessage($chat_id, $reply);
                         $db->getMenu( $chat_id, 2200);
                     }
             }

         // возврат в основное меню
         } else if ($text == "Меню") {
             gotoMainmenu( $chat_id, $telegram, $db);

         } else {
             $telegram->sendMessage([ 'chat_id' => $chat_id, 'text' => "coming soon..." ]);
         }
    }

    // разрешение на безналичную оплату


} catch (\TelegramBot\Api\Exception $e) {
    $e->getMessage();
}

//-----functions----------------------------------------------------------------


function showMainMenu($chat_id, $telegram, $db){
	  if ( $db->isSuperAdmin($chat_id) == 1) {
        $buttons = [["Деньги"],["Запуск"],["История"],["Статус"]];

    } else {
		    $buttons = [["Запуск"],["История"],["Статус"]];
	  }
    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
    $telegram->sendMessage($chat_id, "Выбери категорию", false, null, null, $keyboard);
}


function gotoMainmenu($chat_id, $telegram, $db)  {
    $db->setStep($chat_id, 1100);
    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($db->getMenu($chat_id, 1100), null, true);
    $telegram->sendMessage($chat_id, "Главное меню", false, null, null, $keyboard);
}


function showPointMenu($chat_id, $telegram, $db){
    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($db->getDevices(), null, true);
    $telegram->sendMessage($chat_id, "Выбери адрес", false, null, null, $keyboard);
}


function showRepairMenu($chat_id, $telegram){
    $buttons = [["Старт"],["Ремонт"],["Починили"],["Перегрузить"],["Резет"], ["Меню"] ];
    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
    $telegram->sendMessage($chat_id, "Выбери действие", false, null, null, $keyboard);
}


function showData( $chat_id, $telegram, $db, $step) {
    $reply = "не реализовано";
    if ( $step == 1) {
        if ( $db->isSuperAdmin($chat_id) == 0){
		    return;
		    }
        $reply = $db->getMoney($chat_id);
		    $telegram->sendMessage($chat_id, $reply);

    } elseif ($step == 2){
 		    $buttons = $db->getMashine($chat_id);
	      $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
        $telegram->sendMessage($chat_id, "Выбери машинку", false, null, null, $keyboard);

    } elseif ($step == 3){
		    $reply = $db->getHistory($chat_id);
		    $telegram->sendMessage($chat_id, $reply);

    } elseif ($step == 4){
		    $reply = $db->getStatus($chat_id);
		    $telegram->sendMessage($chat_id, $reply);
    }
}


function invoicePay($chat_id, $telegram, $provider_token) {
    //$keyboard = [["Оплатить"],["Меню"]];
    //$reply_markup = $telegram->replyKeyboardMarkup([ 'keyboard' => $keyboard, 'resize_keyboard' => true, 'one_time_keyboard' => false ]);
    $invoiceParameters = array($chat_id,                                // chat_id
                               'Invoice',                               // title
                               'Оплата стирки',                         // description
                               'test',                                  // payload - внутренняя id платежа
                               $provider_token,                         // provider_token
                               'yandex',                                // start parameter - начальный параметр, который будет использован для генерации платежа
                               'RUB',                                   // currency
                               json_encode(array(array('label' => "Оплатить", 'amount' => 100))));      // prices
                               //'reply_markup' =>$reply_markup);
    $telegram->sendInvoice($invoiceParameters);
}
