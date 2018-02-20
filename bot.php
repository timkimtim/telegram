<?php

require_once ("/var/www/html/AAF4kPCJzeEF4gcKpYmm7cYJY7C0XxU8E3w/db_test.php");
require_once ("vendor/autoload.php");
use YandexCheckout\Client;
//require_once ("/var/www/html/AAF4kPCJzeEF4gcKpYmm7cYJY7C0XxU8E3w/vendor/telegram-bot/api/src/Types/Payments/SuccessfulPayment.php");

try {
    // подключаем телеграмм
    $telegramApi = new \TelegramBot\Api\BotApi('#########################');
    $telegram = new \TelegramBot\Api\Client('#########################');

    try {
        $telegram->preCheckoutQuery(function ($query) use ($telegram, $telegramApi) {
            sleep(15);
            $telegramApi->answerPreCheckoutQuery($query->getId(), true); //Говорим что всё хорошо
        });
        $telegram->run();
    } catch (\TelegramBot\Api\Exception $e) {
        $e->getMessage();
    }

    $telegram->on(function($update) use ($telegram){

        $db = new Dbtest();
        $yandex_client = new Client();

        $admin = 0;
        $superadmin = 0;

        $provider_token = '#########################';

        $message = $update->getMessage();
        $text = $message->getText(); //"Назад";
        $chat_id = $message->getChat()->getId(); //422646556;
        $users_name = $message->getFrom()->getFirstName();
        $message_id = $message->getMessageId();
        $successful_payment = $message->getSuccessfulPayment();
        file_put_contents('debug.txt',$message);



        //--------------------------------------------------------------------------
        //------------Если деньги переведены, запустить нужную функцию стирки-------

        if ($successful_payment) {
            if ($successful_payment->getTotalAmount() == 10000 && $successful_payment->getInvoicePayload() == 'yandex_1114') {

                $price_for_sql = 100;
                $payload = 'yandex_1114';
                $db->insertPaymentSQL($chat_id, $price_for_sql, $payload);
                sleep(1);

                $payment_id = $successful_payment->getProviderPaymentChargeId();
                $reply = $db->setStirkaForInvoice1114($chat_id, $payment_id);
                $telegram->sendMessage($chat_id, $reply);

            } else if ($successful_payment->getTotalAmount() == 11000 && $successful_payment->getInvoicePayload() == 'yandex_1114') {

                $price_for_sql = 110;
                $payload = 'yandex_1114';
                $db->insertPaymentSQL($chat_id, $price_for_sql, $payload);
                sleep(1);

                $payment_id = $successful_payment->getProviderPaymentChargeId();
                $reply = $db->setStirkaForInvoice1114($chat_id, $payment_id);
                $telegram->sendMessage($chat_id, $reply);

            } else if ($successful_payment->getTotalAmount() == 9000 && $successful_payment->getInvoicePayload() == 'yandex_1114') {

                $price_for_sql = 90;
                $payload = 'yandex_1114';
                $db->insertPaymentSQL($chat_id, $price_for_sql, $payload);
                sleep(1);

                $payment_id = $successful_payment->getProviderPaymentChargeId();
                $reply = $db->setStirkaForInvoice1114($chat_id, $payment_id);
                $telegram->sendMessage($chat_id, $reply);

            } else if ($successful_payment->getTotalAmount() == 8000 && $successful_payment->getInvoicePayload() == 'yandex_1114') {

                $price_for_sql = 80;
                $payload = 'yandex_1114';
                $db->insertPaymentSQL($chat_id, $price_for_sql, $payload);
                sleep(1);

                $payment_id = $successful_payment->getProviderPaymentChargeId();
                $reply = $db->setStirkaForInvoice1114($chat_id, $payment_id);
                $telegram->sendMessage($chat_id, $reply);

            } else if ($successful_payment->getTotalAmount() == 10000 && $successful_payment->getInvoicePayload() == 'yandex_ss') {

                $price_for_sql = 100;
                $payload = 'yandex_ss';
                $db->insertPaymentSQL($chat_id, $price_for_sql, $payload);
                sleep(1);

                $payment_id = $successful_payment->getProviderPaymentChargeId();
                $reply = $db->setSimpleStirka($chat_id, $payment_id);
                $telegram->sendMessage($chat_id, $reply);

            } else if ($successful_payment->getTotalAmount() == 11000 && $successful_payment->getInvoicePayload() == 'yandex_ss') {

                $price_for_sql = 110;
                $payload = 'yandex_ss';
                $db->insertPaymentSQL($chat_id, $price_for_sql, $payload);
                sleep(1);

                $payment_id = $successful_payment->getProviderPaymentChargeId();
                $reply = $db->setSimpleStirka($chat_id, $payment_id);
                $telegram->sendMessage($chat_id, $reply);

            } else if ($successful_payment->getTotalAmount() == 9000 && $successful_payment->getInvoicePayload() == 'yandex_ss') {

                $price_for_sql = 90;
                $payload = 'yandex_ss';
                $db->insertPaymentSQL($chat_id, $price_for_sql, $payload);
                sleep(1);

                $payment_id = $successful_payment->getProviderPaymentChargeId();
                $reply = $db->setSimpleStirka($chat_id, $payment_id);
                $telegram->sendMessage($chat_id, $reply);

            } else if ($successful_payment->getTotalAmount() == 8000 && $successful_payment->getInvoicePayload() == 'yandex_ss') {

                $price_for_sql = 80;
                $payload = 'yandex_ss';
                $db->insertPaymentSQL($chat_id, $price_for_sql, $payload);
                sleep(1);

                $payment_id = $successful_payment->getProviderPaymentChargeId();
                $reply = $db->setSimpleStirka($chat_id, $payment_id);
                $telegram->sendMessage($chat_id, $reply);

            } else if ($successful_payment->getTotalAmount() == 8000 && $successful_payment->getInvoicePayload() == 'yandex_44') {

                $price_for_sql = 80;
                $payload = 'yandex_44';
                $db->insertPaymentSQL($chat_id, $price_for_sql, $payload);
                sleep(1);

                $payment_id = $successful_payment->getProviderPaymentChargeId();
                $reply = $db->setStirkaForInvoice44($chat_id, $payment_id);
                $telegram->sendMessage($chat_id, $reply);

            } else if ($successful_payment->getTotalAmount() == 7000 && $successful_payment->getInvoicePayload() == 'yandex_44') {

                $price_for_sql = 70;
                $payload = 'yandex_44';
                $db->insertPaymentSQL($chat_id, $price_for_sql, $payload);
                sleep(1);

                $payment_id = $successful_payment->getProviderPaymentChargeId();
                $reply = $db->setStirkaForInvoice44($chat_id, $payment_id);
                $telegram->sendMessage($chat_id, $reply);

            } else if ($successful_payment->getTotalAmount() == 6000 && $successful_payment->getInvoicePayload() == 'yandex_44') {

                $price_for_sql = 60;
                $payload = 'yandex_44';
                $db->insertPaymentSQL($chat_id, $price_for_sql, $payload);
                sleep(1);

                $payment_id = $successful_payment->getProviderPaymentChargeId();
                $reply = $db->setStirkaForInvoice44($chat_id, $payment_id);
                $telegram->sendMessage($chat_id, $reply);

            } else if ($successful_payment->getTotalAmount() == 6000 && $successful_payment->getInvoicePayload() == 'yandex_sushka') {

                $price_for_sql = 60;
                $payload = 'yandex_sushka';
                $db->insertPaymentSQL($chat_id, $price_for_sql, $payload);
                sleep(1);

                $payment_id = $successful_payment->getProviderPaymentChargeId();
                $reply = $db->setFreeSushkaForInvoice($chat_id, $payment_id);
                $telegram->sendMessage($chat_id, $reply);

            } else if ($successful_payment->getTotalAmount() == 6000 && $successful_payment->getInvoicePayload() == 'yandex_sushka2') {

                $price_for_sql = 60;
                $payload = 'yandex_sushka2';
                $db->insertPaymentSQL($chat_id, $price_for_sql, $payload);
                sleep(1);

                $payment_id = $successful_payment->getProviderPaymentChargeId();
                $reply = $db->setSimpleSushka($chat_id, $payment_id);
                $telegram->sendMessage($chat_id, $reply);
            }
        }




        if ($text){
            $db->setUserActualTime($chat_id);
            if ($db->isRegistered($chat_id)) {
                if ( $db->isAdmin($chat_id) == 1) {
                     $admin = 1;
                }
                if ( $db->isAdmin($chat_id) == 2) {
                     $admin = 2;
                }
                if ( $db->isSuperAdmin($chat_id) == 1) {
                     $superadmin = 1;
                }

                if ($db->getStep($chat_id) != 1111) {
                    if ($db->getStep($chat_id) != 1004) {
                        if ($db->getStep($chat_id) >= 101 && $db->getStep($chat_id) <= 104) {
                            if ($db->getStep($chat_id) >= 151 && $db->getStep($chat_id) <= 200) {
                                $is_text_valid = false;
                                $additional_buttons_array = array(["Принять"]);
                                $valid_text_array = array_merge($db->getCity(), $db->getCity2(), $db->getMenu($chat_id, 2100), $db->getUni($chat_id), $db->getUniAdmin($chat_id), $db->getPointByUser($chat_id), $db->getPointForAdmin($chat_id), $db->getValidCommandsFromMainMenu(), $db->getValidCommandsFromAdminMenu(), $db->getValidCommandsForAdmin(), $db->getValidDevices(), $additional_buttons_array);
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
                            }
                        }
                    }
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
        $step = $db->getStep($chat_id);

        if ($admin == 2) {
            if ($text == "Вернуться в меню клиента") {
                $db->setStudent($chat_id);
                $buttons = $db->getCity();
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, "Выбери город", false, null, null, $keyboard);
                $db->setStep($chat_id, 1001);

            } else if ($text == "id") {
                $reply = $chat_id;
                $telegram->sendMessage($chat_id, $reply);

            } else if ($text == "Меню сотрудников") {
                $reply = "Выберите задачу";
                $db->setStep($chat_id, 150);
                $buttons = $db->getAdminMenu($chat_id, 150);
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);


            } else if ($text == "Работа с клиентами") {
                $reply = "Выберите задачу";
                $db->setStep($chat_id, 130);
                $buttons = $db->getAdminMenu($chat_id, 130);
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);

            } else if ($text == "Обслуживание прачечных") {
                $position = $db->getAdminPosition($chat_id);
                if ($position == "root" || $position == "root2") {
                    $reply = "Выбери город";
                    $buttons = $db->getCity2();
                    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                    $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                    $db->setStep($chat_id, 101);
                } else {
                    $buttons = $db->getPointForAdmin3($chat_id);
                    $reply = "Выбери общежитие";
                    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                    $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                    $db->setStep($chat_id, 105);
                }

            } else if ($step >= 101 && $step <=105) {
                if (($step == 101 || $step == 105) && $text == "Назад") {
                    $db->setAdminChange0($chat_id);
                    $reply = "Тестовое меню админа";
                    $buttons = $db->getAdminMenu($chat_id, 100);
                    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                    $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                    exit();

                } else if ($text == "Назад") {
                    $reply = "Выбери город";
                    $buttons = $db->getCity2();
                    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                    $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                    $db->setStep($chat_id, 101);
                    exit();

                } else if ($step == 105 && $text) {
                    $db->setAdminChange2($chat_id, $text);
                    $reply = "Выбери действие";
                    $buttons = $db->getAdminMenu($chat_id, 110);
                    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                    $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                    $db->setStep($chat_id, 110);

                } else if (intval($text) >= 111) {
                    if (intval($text) <= 312) {
                        $db->setNumAdmin2($chat_id, $text);
                        $db->fastNum($chat_id, $text);
                        $buttons = [["Принять"],["Назад"]];
                        $reply = $db->getConfirmTextAdmin($chat_id) . "\nПодтвердить?";
                        $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                        $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                        $db->setStep($chat_id, 104);
                        exit();
                    }
                }

                switch ($step) {

                    case 101:
                        $db->setNumAdmin($chat_id, $text);
                        $db->setCityAdmin($chat_id, $text);
                        $reply = "Выбери ВУЗ";
                        $buttons = $db->getUniAdmin($chat_id);
                        $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                        $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                        $db->setStep($chat_id, 102);
                        break;

                    case 102:
                        $db->setNumAdmin($chat_id, $text);
                        $db->setUniAdmin($chat_id, $text);
                        $buttons = $db->getPointForAdmin($chat_id);
                        $reply = "Выбери общежитие";
                        $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                        $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                        $db->setStep($chat_id, 103);
                        break;

                    case 103:
                        $db->setNumAdmin($chat_id, $text);
                        $db->setPointAdmin($chat_id, $text);
                        $db->setAdminChange2($chat_id, $text);
                        $buttons = [["Принять"],["Назад"]];
                        $reply = $db->getConfirmTextAdmin($chat_id) . "\nПодтвердить?";
                        $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                        $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                        $db->setStep($chat_id, 104);
                        break;

                    case 104:
                        $reply = "Выбери действие";
                        $buttons = $db->getAdminMenu($chat_id, 110);
                        $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                        $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                        $db->setStep($chat_id, 110);
                        sleep(1);
                        break;
                }




            } else if ($step == 110 && $text == "Машинка") {
                $reply = "Выбери машинку";
                $db->setStep($chat_id, 210);
                $buttons = $db->getAdminMenu($chat_id, 210);
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);

            } else if ($step == 110 && $text == "Перезагрузить купюроприемник") {
                if ($db->checkOnlineStatus2($chat_id)) {
                    $txt = $db->sendCommand( $chat_id, "ccbill");
                    shell_exec($txt);
                    $reply = "Купюроприемник перезагружен";
                    $telegram->sendMessage($chat_id, $reply);
                } else {
                    $reply = "Терминал на точке не обвовляет статус";
                    $telegram->sendMessage($chat_id, $reply);
                }

            } else if ($step == 110 && $text == "Перезагрузить терминал") {
                $reply = "Перезагрузить терминал";
                $db->setStep($chat_id, 121);
                $buttons = $db->getAdminMenu($chat_id, 121);
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);

            } else if ($step == 110 && $text == "Текущие статусы машинок") {
                $reply = $db->getStatusAdmin($chat_id);
                $telegram->sendMessage($chat_id, $reply);

            } else if ($step == 110 && $text == "История операций") {
                $reply = $db->getHistory($chat_id);
                $telegram->sendMessage($chat_id, $reply);


            } else if ($step == 110 && $text == "Основное меню") {
                $db->setAdminChange0($chat_id);
                $reply = "Тестовое меню админа";
                $buttons = $db->getAdminMenu($chat_id, 100);
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);

            } else if ($step == 121 && $text == "Перезагрузить") {
                if ($db->checkOnlineStatus2($chat_id)) {
                    $txt = $db->sendCommand( $chat_id, "reboot");
                    shell_exec($txt);
                    $reply = "Терминал перезагружается...";
                    $telegram->sendMessage($chat_id, $reply);
                } else {
                    $reply = "Терминал на точке не обвовляет статус";
                    $telegram->sendMessage($chat_id, $reply);
                }

            } else if (($step == 120 || $step == 140 || $step == 121) && $text == "Назад") {
                $reply = "Выбери действие";
                $buttons = $db->getAdminMenu($chat_id, 110);
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                $db->setStep($chat_id, 110);

            } else if ($step == 130 && $text == "Отправить сообщение") { // || ($step == 181 || $text == "Назад")
                $reply = "Выбери действие";
                $buttons = $db->getAdminMenu($chat_id, 180);
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                $db->setStep($chat_id, 180);

            } else if (($step == 130 && $text == "Добавить стирку") || (($step == 171 || $step == 173) && $text == "Назад")) {
                $reply = "Выбери действие";
                $buttons = $db->getAdminMenu($chat_id, 170);
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                $db->setStep($chat_id, 170);

            } else if ($step == 130 && $text == "Узнать кол-во пользователей") {
                $reply = $db->getUsersInfo();
                $telegram->sendMessage($chat_id, $reply);

            } else if ($step == 130 && $text == "История клиента") {
                $reply = "Введите ID клиента";
                $db->setStep($chat_id, 131);
                $buttons = $db->getAdminMenu($chat_id, 131);
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);

            } else if ($step == 131 && $text == "Назад") {
                $reply = "Выбери действие";
                $buttons = $db->getAdminMenu($chat_id, 130);
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                $db->setStep($chat_id, 130);

            } else if ($step == 131 && $text) {
                if (ctype_digit($text)) {
                    $id = intval($text);
                    $reply = $db->adminHistory($id);
                    $buttons = $db->getAdminMenu($chat_id, 130);
                    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                    $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                    $db->setStep($chat_id, 130);
                } else {
                    $reply = "Введите корректное ID клиента";
                    $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                }

            } else if ($step == 130 && $text == "Назад") {
                $reply = "Выбери действие";
                $buttons = $db->getAdminMenu($chat_id, 100);
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                $db->setStep($chat_id, 100);


            } else if ($step == 140 && $text == "Запустить") {
                if ($db->checkOnlineStatus($chat_id)) {
                    if ($db->getMashineStatus($chat_id) == 0) {
                        $reply = "Машинка выключена";
                        $telegram->sendMessage($chat_id, $reply);
                    } else {
                        trigger_error("Start mashine");
                        $txt = $db->sendCommand( $chat_id, "start");
                        shell_exec($txt);
                        $telegram->sendMessage($chat_id, $txt);
                        $telegram->sendMessage($chat_id, "Подождите...");
                        sleep(30);
                        $status = $db->getMashineStatus($chat_id);
                        if ($status == 2 || $status == 4 || $status == 5) {
                            $db->updateActivStirka($chat_id);
                            $reply = "Машинка запущена";
                            $telegram->sendMessage($chat_id, $reply);
                        } else {
                            $reply = "Машинка не была запущена";
                            $telegram->sendMessage($chat_id, $reply);
                        }
                    }
                } else {
                    $reply = "Машинка на точке не обвовляет статус";
                    $telegram->sendMessage($chat_id, $reply);
                }

            } else if ($step == 140 && $text == "Поставить в ремонт") {
                if ($db->checkOnlineStatus($chat_id)) {
                    trigger_error("Repair");
                    $txt = $db->sendCommand( $chat_id, "repair");
                    shell_exec($txt);
                    $telegram->sendMessage($chat_id, $txt);
                    $telegram->sendMessage($chat_id, "Подождите...");
                    sleep(24);
                    $status = $db->getMashineStatus($chat_id);
                    if ($status == 3) {
                        $reply = "Машинка поставлена в ремонт";
                        $telegram->sendMessage($chat_id, $reply);
                    } else {
                        $reply = "Машинка не была поставлена в ремонт";
                        $telegram->sendMessage($chat_id, $reply);
                    }
                } else {
                    $reply = "Машинка на точке не обвовляет статус";
                    $telegram->sendMessage($chat_id, $reply);
                }

            } else if ($step == 140 && $text == "Снять с ремонта") {
                if ($db->checkOnlineStatus($chat_id)) {
                    trigger_error("Work");
                    $txt = $db->sendCommand( $chat_id, "work");
                    shell_exec($txt);
                    $telegram->sendMessage($chat_id, "Подождите...");
                    sleep(24);
                    $status = $db->getMashineStatus($chat_id);
                    if ($status != 3) {
                        $reply = "Машинка снята с ремонта";
                        $telegram->sendMessage($chat_id, $reply);
                    } else {
                        $reply = "Машинка не была снята с ремонта";
                        $telegram->sendMessage($chat_id, $reply);
                    }
                } else {
                    $reply = "Машинка на точке не обвовляет статус";
                    $telegram->sendMessage($chat_id, $reply);
                }


            } else if ($step == 150 && $text == "Добавить сотрудника") {
                $reply = "Введите ID сотрудника";
                $db->setStep($chat_id, 151);
                $buttons = $db->getAdminMenu($chat_id, 151);
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);

            } else if ($step == 151 && $text == "Назад") {
                $reply = "Выбери действие";
                $buttons = $db->getAdminMenu($chat_id, 150);
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                $db->setStep($chat_id, 150);

            } else if (($step == 152 || $step == 153 || $step == 154 || $step == 155 || $step == 156 || $step == 157 || $step == 158 || $step == 159) && $text == "Назад") {
                $db->deleteLastAdmin();
                $reply = "Введите ID сотрудника";
                $buttons = $db->getAdminMenu($chat_id, 151);
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                $db->setStep($chat_id, 151);

            } else if ($step == 151 && $text) {
                if (ctype_digit($text)) {
                    $db->setNewAdmin($text);
                    $reply = "Введите имя сотрудника";
                    $db->setStep($chat_id, 152);
                    $buttons = $db->getAdminMenu($chat_id, 151);
                    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                    $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                } else {
                    $reply = "Введите корректное ID сотрудника";
                    $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                }

            } else if ($step == 152 && $text) {
                $db->setAdminName($text);
                $reply = "Выберите должность";
                $db->setStep($chat_id, 153);
                $buttons = $db->getAdminMenu($chat_id, 153);
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);

            } else if ($step == 153 && $text) {
                if ($text == "root" || $text == "root2") {
                    $db->setAdminPosition($text);
                    $reply = $db->getNewAdminInfo() . "\nПодтвердите добавление сотрудника или вернитесь назад";
                    $buttons = [["Принять"],["Назад"]];
                    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                    $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                    $db->setStep($chat_id, 154);
                } else {
                    $db->setAdminPosition($text);
                    $reply = "Выберите город для должности";
                    $buttons = $db->getCity2();
                    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                    $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                    $db->setStep($chat_id, 155);
                    exit();
                }

            } else if (($step == 154 || $step == 158) && $text == "Принять") {
                $reply = "Сотрудник успешно зарегестрирован";
                $buttons = $db->getAdminMenu($chat_id, 150);
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                $db->setStep($chat_id, 150);

            } else if ($step == 155 && $text) {
                $db->setCityAdmin2($text);
                $reply = "Выберите ВУЗ для должности";
                $buttons = $db->getUniAdmin2();
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                $db->setStep($chat_id, 156);

            } else if ($step == 156 && $text) {
                $db->setUniAdmin2($text);
                $reply = "Выберите раздел";
                $buttons = [["Добавить ВУЗ полностью"],["Выбрать общежитие"],["Назад"]];
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                $db->setStep($chat_id, 157);

            } else if ($step == 157 && $text == "Выбрать общежитие") {
                $buttons = $db->getPointForAdmin2();
                $reply = "Выберите общежитие для должности";
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                $db->setStep($chat_id, 158);

            } else if ($step == 158 && $text) {
                $db->setPointAdmin2($text);
                $buttons = [["Принять"],["Назад"]];
                $reply = $db->getNewAdminInfo() . "\nПодтвердите добавление сотрудника или вернитесь назад";
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                $db->setStep($chat_id, 158);

            } else if ($step == 157 && $text == "Добавить ВУЗ полностью") {
                $buttons = [["Принять"],["Назад"]];
                $reply = $db->getNewAdminInfo() . "\nПодтвердите добавление сотрудника или вернитесь назад";
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                $db->setStep($chat_id, 159);

            } else if ($step == 159 && $text == "Принять") {
                $db->setUniAdmin3();
                $reply = "Сотрудник успешно зарегестрирован";
                $buttons = $db->getAdminMenu($chat_id, 150);
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                $db->setStep($chat_id, 150);




            } else if ($step == 150 && $text == "Сотрудники") {
                $reply = "Выбери действие";
                $buttons = $db->getAdminMenu($chat_id, 160);
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                $db->setStep($chat_id, 160);

            } else if ($step == 150 && $text == "Назад") {
                $reply = "Выбери действие";
                $buttons = $db->getAdminMenu($chat_id, 100);
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                $db->setStep($chat_id, 100);



            } else if (($step == 160 && $text == "Изменить должность сотрудника") || (($step == 162) && $text == "Назад")) {
                $db->uncheckAdminForChange();
                $reply = "Выберите сотрудника";
                $buttons = $db->getAdmins();
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                $db->setStep($chat_id, 161);

            } else if ($step == 161 && $text == "Назад") {
                $reply = "Выбери действие";
                $buttons = $db->getAdminMenu($chat_id, 160);
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                $db->setStep($chat_id, 160);

            } else if ($step == 161 && $text) {
                $db->checkAdminForChange($text);
                $reply = "Выберите новую должность для сотрудника";
                $buttons = $db->getAdminMenu($chat_id, 153);
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                $db->setStep($chat_id, 162);

            } else if ($step == 162 && $text) {
                $db->setNewAdminPosition($text);
                $reply = "Должность изменена";
                $buttons = $db->getAdminMenu($chat_id, 160);
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                $db->setStep($chat_id, 160);



            } else if (($step == 160 && $text == "Удалить сотрудника") || ($step == 165 && $text == "Назад")) {
                $reply = "Выберите сотрудника";
                $buttons = $db->getAdmins();
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                $db->setStep($chat_id, 164);

            } else if ($step == 164 && $text == "Назад") {
                $reply = "Выбери действие";
                $buttons = $db->getAdminMenu($chat_id, 160);
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                $db->setStep($chat_id, 160);

            } else if ($step == 164 && $text) {
                if ($db->checkAdminPositions($text) < 2) {
                    $db->deleteAdmin($text);
                    $reply = "Сотрудник удален";
                    $buttons = $db->getAdminMenu($chat_id, 160);
                    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                    $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                    $db->setStep($chat_id, 160);
                } else {
                    $reply = "Выбери действие";
                    $buttons = $db->getAdminAddressPosition($text);
                    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                    $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                    $db->setStep($chat_id, 165);
                }

            } else if ($step == 165 && $text) {
                $db->deleteAdminPosition($text);
                $reply = "Сотрудник удален c позиции";
                $buttons = $db->getAdminMenu($chat_id, 160);
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                $db->setStep($chat_id, 160);



            } else if ($step == 160 && $text == "Список сотрудников") {
                $reply = $db->adminsList();
                $telegram->sendMessage($chat_id, $reply);

            } else if ($step == 160 && $text == "Назад") {
                $reply = "Выбери действие";
                $buttons = $db->getAdminMenu($chat_id, 150);
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                $db->setStep($chat_id, 150);

            } else if (($step == 170 && $text == "Добавить бесплатную стирку") || ($step == 172 && $text == "Назад")) {
                $db->deleteTempStirka($chat_id);
                $reply = "Введите ID клиента";
                $buttons = $db->getAdminMenu($chat_id, 181);
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                $db->setStep($chat_id, 171);

            } else if ($step == 171 && $text) {
                if (ctype_digit($text)) {
                    $db->getFreePaidStirkaAdmin($chat_id, $text);
                    $reply = "Нажмите принять, чтобы добавить бесплатную стирку этому ID - " . $text;
                    $buttons = [["Принять"],["Назад"]];
                    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                    $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                    $db->setStep($chat_id, 172);
                } else {
                    $reply = "Введите корректное ID клиента";
                    $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                }

            } else if ($step == 172 && $text == "Принять") {
                $to_id = $db->setFreeStirkaAdmin($chat_id);
                $msg = "Вам добавлена бесплатная стирка";
                $telegram->sendMessage($to_id, $msg);
                $db->deleteTempStirka($chat_id);
                $reply = "Бесплатная стирка добавлена";
                $buttons = $db->getAdminMenu($chat_id, 170);
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                $db->setStep($chat_id, 170);
                $reply = $db->getUserHistory($chat_id);
                $telegram->sendMessage($to_id, $reply);




            } else if (($step == 170 && $text == "Добавить платную стирку") || ($step == 174 && $text == "Назад")) {
                $db->deleteTempStirka($chat_id);
                $reply = "Введите ID клиента";
                $buttons = $db->getAdminMenu($chat_id, 181);
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                $db->setStep($chat_id, 173);

            } else if ($step == 173 && $text) {
                if (ctype_digit($text)) {
                    $db->getFreePaidStirkaAdmin($chat_id, $text);
                    $reply = "Нажмите принять, чтобы добавить платную стирку этому ID - " . $text;
                    $buttons = [["Принять"],["Назад"]];
                    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                    $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                    $db->setStep($chat_id, 174);
                } else {
                    $reply = "Введите корректное ID клиента";
                    $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                }

            } else if ($step == 174 && $text == "Принять") {
                $to_id = $db->setPaidStirkaAdmin($chat_id);
                $msg = "Вам добавлена платная стирка";
                $telegram->sendMessage($to_id, $msg);
                $db->deleteTempStirka($chat_id);
                $reply = "Платная стирка добавлена";
                $buttons = $db->getAdminMenu($chat_id, 170);
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                $db->setStep($chat_id, 170);
                $reply = $db->getUserHistory($chat_id);
                $telegram->sendMessage($to_id, $reply);




            } else if ($step == 170  && $text == "Назад") {
                $reply = "Выбери действие";
                $buttons = $db->getAdminMenu($chat_id, 130);
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                $db->setStep($chat_id, 130);

            } else if (($step == 180 || $step == 183)  && $text == "Назад") {
                $reply = "Выбери действие";
                $buttons = $db->getAdminMenu($chat_id, 130);
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                $db->setStep($chat_id, 130);

            } else if (($step == 182  && $text == "Назад") || ($step == 180 && $text == "Общая рассылка")) {
                $db->sendGeneralMailing($chat_id);
                $reply = "Введите текст для рассылки";
                $buttons = $db->getAdminMenu($chat_id, 181);
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                $db->setStep($chat_id, 181);

            } else if ($step == 181 && $text) {
                $db->getGeneralMailing($chat_id, $text);
                $reply = "Нажмите принять, чтобы отправить данный текст:\n" . $text;
                $buttons = [["Принять"],["Назад"]];
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                $db->setStep($chat_id, 182);

            } else if ($step == 182 && $text == "Принять") {
                $txt = $db->sendGeneralMailing($chat_id);
                $users_array = $db->allUsers();
                foreach($users_array as $chat_id) {
                    $telegram->sendMessage($chat_id, $txt);
                }

                $reply = "Текст успешно отправлен";
                $buttons = $db->getAdminMenu($chat_id, 180);
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                $db->setStep($chat_id, 180);


            } else if ((($step == 184 || $step == 185) && $text == "Назад") || ($step == 180  && $text == "Персональное сообщение")) {
                $db->sendPersonalMailing($chat_id);
                $reply = "Введите ID клиента";
                $buttons = $db->getAdminMenu($chat_id, 181);
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                $db->setStep($chat_id, 183);

            } else if ($step == 183 && $text) {
                if (ctype_digit($text)) {
                    $db->getIdPersonalMailing($chat_id, $text);
                    $reply = "Введите текст для отправки";
                    $buttons = $db->getAdminMenu($chat_id, 181);
                    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                    $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                    $db->setStep($chat_id, 184);
                } else {
                    $reply = "Введите корректное ID сотрудника";
                    $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                }

            } else if ($step == 184 && $text) {
                $to_id = $db->getTextPersonalMailing($chat_id, $text);
                $reply = "Нажмите принять, чтобы отправить данный текст:\n" . $text . "\nдля ID - " . $to_id;
                $buttons = [["Принять"],["Назад"]];
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                $db->setStep($chat_id, 185);

            } else if ($step == 185 && $text == "Принять") {
                $id_message_array = $db->sendPersonalMailing($chat_id);
                $to_id = $id_message_array[0];
                $txt = $id_message_array[1];
                $telegram->sendMessage($to_id, $txt);

                $reply = "Текст успешно отправлен";
                $buttons = $db->getAdminMenu($chat_id, 180);
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                $db->setStep($chat_id, 180);




            } else if ($step == 210 && $text == "Назад") {
                $reply = "Выбери действие";
                $buttons = $db->getAdminMenu($chat_id, 110);
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                $db->setStep($chat_id, 110);

            } else if ($step == 210){
                switch ($text){
                    case "Назад":
                        $reply = "Выбери действие";
                        $buttons = $db->getAdminMenu($chat_id, 110);
                        $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                        $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                        $db->setStep($chat_id, 110);
                        break;
                    default:
                        if ($text == "1") {
                            $db->setMashineAdmin($chat_id, 1);
                        } else if ($text == "2") {
                            $db->setMashineAdmin($chat_id, 2);
                        } else if ($text == "3") {
                            $db->setMashineAdmin($chat_id, 3);
                        } else if ($text == "4") {
                            $db->setMashineAdmin($chat_id, 4);
                        } else if ($text == "5") {
                            $db->setMashineAdmin($chat_id, 5);
                        } else if ($text == "6") {
                            $db->setMashineAdmin($chat_id, 6);
                        } else if ($text == "7") {
                            $db->setMashineAdmin($chat_id, 7);
                        } else if ($text == "8") {
                            $db->setMashineAdmin($chat_id, 8);
                        } else if ($text == "9") {
                            $db->setMashineAdmin($chat_id, 9);
                        } else if ($text == "10") {
                            $db->setMashineAdmin($chat_id, 10);
                        } else if ($text == "Сушилка 1") {
                            $db->setDryAdmin($chat_id);
                        } else if ($text == "Сушилка 2") {
                            $db->setDryAdmin($chat_id);
                        } else if ($text == "Сушилка 3") {
                            $db->setDryAdmin($chat_id);
                        } else if ($text == "Сушилка 4") {
                            $db->setDryAdmin($chat_id);
                        }

                        $reply = "Выберите раздел";//$db->checkMashineStatus($chat_id);
                        $db->setStep($chat_id, 140);
                        $buttons = $db->getAdminMenu($chat_id, 140);
                        $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                        $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                }
            }

        } // конец админа 2





        // ветка пользователя
        if ($admin == 0) {
            // переход в админскую ветку
            // if ($text == "админ" || $text == "Админ") {
            //     $db->setAdmin($chat_id);
            //     showMainMenu( $chat_id, $telegram, $db);

            if ($text == "админ2" || $text == "Админ2") {
                $db->setAdmin2($chat_id);
                $reply = "Тестовое меню админа";
                $buttons = $db->getAdminMenu($chat_id, 100);
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);

            // запрос уникального id пользователя
            } else if ($text == "id") {
                $reply = $chat_id;
                $telegram->sendMessage($chat_id, $reply);

            // подветка регистрации (проходится единожды, когда пользователь написал в первый раз)
          } else if ($step >= 1000 && $step <=1005) {
                if ($text == "Назад") {
                    $reply = "Выбери город";
                    $buttons = $db->getCity();
                    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                    $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                    $db->setStep($chat_id, 1001);
                    exit();
                }

                switch ($step) {
                    case 1000:
                        $reply = "Выбери город";
                        $buttons = $db->getCity();
                        $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                        $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                        $db->setStep($chat_id, 1001);
                        exit();
                        break;

                    case 1001:
                        $db->setCityByName($chat_id, $text);
                        $reply = "Выбери ВУЗ";
                        $buttons = $db->getUni($chat_id);
                        $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                        $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                        $db->setStep($chat_id, 1002);
                        break;

                    case 1002:
                        $db->setUniByName($chat_id, $text);
                        if ($chat_id == 422646556 || $chat_id == 269450981) {
                            $buttons = $db->getPointForSergey($chat_id);
                            $reply = "Ок! А теперь укажи свою общагу";
                        } else {
                            $buttons = $db->getPointByUser($chat_id);
                            //$buttons = $db->getPointByUser($chat_id);
                            $reply = "Ок! А теперь укажи свою общагу";
                        }
                        $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                        $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                        $db->setStep($chat_id, 1003);
                        sleep(1);
                        break;

                    case 1003:
                        //if ($chat_id == 422646556 || $chat_id == 269450981) {
                            $db->setPointByName($chat_id, $text);
                            $reply = "Введи номер телефона и отправь мне, в формате: 79ХХххххххх";
                            $buttons = [["Назад"]];
                            $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                            $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                            $db->setStep($chat_id, 1004);
                            break;

                    case 1004:
                        if ((ctype_digit($text) && preg_match_all("/[0-9]/", $text) == 11) && substr($text, 0, 1) == "7") {
                            $db->setPhoneNum($chat_id, $text);
                            $buttons = [["Принять"],["Назад"]];
                            $reply = $db->getConfirmText($chat_id) . "\nПодтверди введенную инфу или поправь меня, вернувшись назад";
                            $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                            $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                            $db->setStep($chat_id, 1005);
                            sleep(1);
                            break;

                        } else {
                            $reply = "Неверный формат номера.\nВведи номер телефона в формате 79XXxxxxxxx";
                            $buttons = [["Назад"]];
                            $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                            $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                            $db->setStep($chat_id, 1004);
                            break;
                        }

                    case 1005:
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
                // $point_id = $db->getUserPointID($chat_id);
                // if ($text == "Сбербанк Онлайн" && $point_id != 0) {
                //     $reply = "Оплата Сбербанк Онлайн временно недоступна";
                //     $telegram->sendMessage($chat_id, $reply);
                //     exit();

                if ($step == 1100 && $text == "Участие в акциях") {
                    $reply = "Йоу! У меня для тебя суперские новости! Выбирай любую понравившуюся акцию, участвуй и получай услуги бесплатно или с хорошей скидкой!";
                    $db->setStep($chat_id, 1170);
                    $buttons = $db->getMenu($chat_id, 1170);
                    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                    $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);


                } else if ($step == 1100 && $text == "Оплата картой") {
                    //$point_id = $db->getUserPointID($chat_id);
                    //if ($point_id == 0) { //|| $point_id == 1 || $point_id == 22 || $point_id == 9 || $point_id == 23 || $point_id == 12 || $point_id == 11 || $point_id == 7) {
                        //if ($point_id == 0 || $point_id == 9 || $point_id == 7) { //$point_id == 23 || $point_id == 10 ||
                            $reply2 = "Итак, погнали! Загрузи белье, выбери программу стирки и пришли мне номер машинки";
                            $telegram->sendMessage($chat_id, $reply2);
                            $reply = "Внимание: данная оплата не участвует в акции";
                            $db->setStep($chat_id, 2400);
                            $buttons = $db->getMenu($chat_id, 2600);
                            $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                            $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                            exit();
                        //
                        // } else {
                        //     $reply2 = "Итак, погнали! Загрузи белье, выбери программу стирки и пришли мне номер машинки";
                        //     $telegram->sendMessage($chat_id, $reply2);
                        //     $reply = "Внимание: данная оплата не участвует в акции";
                        //     $db->setStep($chat_id, 2400);
                        //     $buttons = $db->getMenu($chat_id, 2400);
                        //     $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                        //     $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                        //     exit();
                        // }

                    // } else {
                    //      $reply = "Оплата картой временно недоступна";
                    //      $telegram->sendMessage($chat_id, $reply);
                    // }
                } else if ($step == 1100 && $text == "Оплата") {
                    $db->setStep($chat_id, 1101);
                    $buttons = $db->getMenu($chat_id, 1101);
                    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                    $telegram->sendMessage($chat_id, "Выбери удобный способ оплаты", false, null, null, $keyboard);

                } else if ($step == 1101 && $text == "Меню") {
                    gotoMainmenu($chat_id, $telegram, $db);

                } else if ($step == 1101 && $text == "Оплата картой") {
                    $reply2 = "Итак, погнали! Загрузи белье, выбери программу стирки и пришли мне номер машинки";
                    $telegram->sendMessage($chat_id, $reply2);
                    $reply = "Внимание: данная оплата не участвует в акции";
                    $db->setStep($chat_id, 2400);
                    $buttons = $db->getMenu($chat_id, 2600);
                    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                    $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                    exit();

                } else if (($step == 1101 && $text == "Сбербанк Онлайн") || $step == 1103 && $text == "Назад") {
                    if ($db->getPhoneNumber($chat_id)) {
                        $buttons = [[strval($db->getPhoneNumber($chat_id))],["Оплатить с другого номера"],["Меню"]];
                        $reply = "Укажи номер телефона привязанный к «Сбербанк Онлайн»";
                        $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                        $telegram->sendSticker($chat_id, "CAADAgADngQAAulVBRhnfYR2rHtLHwI");
                        $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                        $db->setStep($chat_id, 1102);

                    } else {
                        $reply = "Введи номер своего мобильного телефона, подключенный к «Мобильному банку» Сбербанка в формате 79ХХххххххх  и отправь мне.";
                        $buttons = [["Назад"]];
                        $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                        $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                        $db->setStep($chat_id, 1103);
                    }

                } else if ($step == 1102 && $text == "Меню") {
                    gotoMainmenu($chat_id, $telegram, $db);

                } else if ($step == 1102 && $text == "Оплатить с другого номера") {
                    $reply = "Введи номер своего мобильного телефона, подключенный к «Мобильному банку» Сбербанка в формате 79ХХххххххх  и отправь мне.";
                    $buttons = [["Назад"]];
                    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                    $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                    $db->setStep($chat_id, 1103);

                } else if (($step == 1102 && $text == strval($db->getPhoneNumber($chat_id))) || ($step == 1103 && $text == "Продолжить")) {
                    $reply2 = "Итак, погнали! Загрузи белье, выбери программу стирки и пришли мне номер машинки";
                    $telegram->sendMessage($chat_id, $reply2);
                    $reply = "Внимание: данная оплата не участвует в акции";
                    $db->setStep($chat_id, 2700);
                    $buttons = $db->getMenu($chat_id, 2700);
                    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                    $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);

                } else if ($step == 1103 && $text) {
                    if ((ctype_digit($text) && preg_match_all("/[0-9]/", $text) == 11) && substr($text, 0, 1) == "7") {
                        $db->setPhoneNum($chat_id, $text);
                        $buttons = [["Продолжить"],["Назад"]];
                        $reply = $db->getPhoneNumber($chat_id) . "\nНажми «Продолжить» для подтверждения номера телефона.";
                        $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                        $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                        $db->setStep($chat_id, 1103);

                    } else {
                        $reply = "Неверный формат номера.\nВведи номер телефона в формате 79XXxxxxxxx";
                        $buttons = [["Назад"]];
                        $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                        $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                        $db->setStep($chat_id, 1103);
                    }


                } else if ($step == 1100 && $text == "Личный кабинет") {
                    if ($db->checkForParentless($chat_id)) {                           // проверка на сироту
                        $reply = "Личный кабинет";
                        $db->setStep($chat_id, 1161);
                        $buttons = $db->getMenu($chat_id, 1161);
                        $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                        $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                    } else {
                        $reply = "Личный кабинет";
                        $db->setStep($chat_id, 1160);
                        $buttons = $db->getMenu($chat_id, 1160);
                        $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                        $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                    }

                } else if ($step == 1100 && $text == "Помощь") {
                    $reply = "Помощь";
                    $db->setStep($chat_id, 1110);
                    $buttons = $db->getMenu($chat_id, 1110);
                    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                    $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);

                } else if ($step == 1100 && ($text == "Меню" || $text == "меню")){
                    gotoMainmenu($chat_id, $telegram, $db);


                } else if ($step == 1110 && $text == "Как пользоваться прачечной") {
                    $reply = "Хочешь постираться, но не знаешь с чего тебе начать?\nНе парься! Все очень легко и просто. Загружаешь белье, вводишь команды через сенсорную панель терминала, а дальше за тебя все делает умная техника. Остается только подождать";
                    $url = "https://i.imgur.com/c0xNvxt.png";
                    $telegram->sendPhoto($chat_id, $url);
                    $telegram->sendMessage($chat_id, $reply);

                } else if ($step == 1110 && $text == "Как участвовать в акциях") {
                    $reply = "Интересуют скидки или бонусная программа?\nЛови халяву, студент! Прочитай правила, выполни условия и получи возможность постираться и посушиться бесплатно или с умопомрачительной скидкой!\nВыбери акцию и кликни на «участвовать»";
                    $db->setStep($chat_id, 1150);
                    $buttons = $db->getMenu($chat_id, 1150);
                    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                    $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);

                } else if ($step == 1110 && $text == "Обратная связь") {
                      if ($db->getCityID($chat_id) == 1) {
                          $point_id = $db->getUserPointID($chat_id);
                          if ($point_id == 22 || $point_id == 9 || $point_id == 11 || $point_id == 1 || $point_id == 23) {
                              $reply = "Сложно воткнуться? Есть вопросы? Не переживай, я всегда на связи, все детально расскажу и подскажу. Напиши свой вопрос и отправь мне прямо здесь или звони по телефону: 8(812)629-666-0";
                          } else if ($point_id == 12) {
                              $reply = "Сложно воткнуться? Есть вопросы? Не переживай, я всегда на связи, все детально расскажу и подскажу. Напиши свой вопрос и отправь мне прямо здесь или звони по телефону: 8(812)629-222-0";
                          } else {
                              $reply = "Сложно воткнуться? Есть вопросы? Не переживай, я всегда на связи, все детально расскажу и подскажу. Напиши свой вопрос и отправь мне прямо здесь или звони по телефону: 8(812)408-1-555";
                          }
                      } else if ($db->getCityID($chat_id) == 2){
                          $reply = "Сложно воткнуться? Есть вопросы? Не переживай, я всегда на связи, все детально расскажу и подскажу. Напиши свой вопрос и отправь мне прямо здесь или звони по телефону: 8(383)312-10-40";
                      } else if ($db->getCityID($chat_id) == 4) {
                          $reply = "Сложно воткнуться? Есть вопросы? Не переживай, я всегда на связи, все детально расскажу и подскажу. Напиши свой вопрос и отправь мне прямо здесь или звони по телефону: 8(495)01-888-10";
                      } else {
                          $reply = "Сложно воткнуться? Есть вопросы? Не переживай, я всегда на связи, все детально расскажу и подскажу. Напиши свой вопрос и отправь мне прямо здесь или звони по телефону: 8(383)312-10-40";
                      }
                      $db->setStep($chat_id, 1111);
                      $buttons = $db->getMenu($chat_id, 1111);
                      $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                      $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);

                } else if ($step == 1110 && $text == "Меню"){
                      gotoMainmenu($chat_id, $telegram, $db);

                } else if ($step == 1111 && $text == "Меню") {
                      gotoMainmenu($chat_id, $telegram, $db);

                } else if ($step == 1111 && $text) {
                      $point_name = $db->getUserPointName($chat_id);
                      $reply = "ID: " . strval($chat_id) . "\nОбщежитие: " . $point_name . "";
                      $telegram->forwardMessage(269450981, $chat_id, $message_id); //269450981
                      $telegram->sendMessage(269450981, $reply);

                } else if ($step == 1150 && $text == "1+1+1=4") {
                    $reply = "Студент! А ты в курсе, что у нас свои правила? 1+1+1=4! Накопи 3 «оплаченных» стирки за 30 дней и получи четвертую бесплатно!\nКак накопить:\n1) вруби машинку и закинь вещи;\n2) отправь мне сообщение с номером машинки;\n3) внеси оплату в течение 3-х минут.\nКак использовать бонус:\n1) включи машинку и загрузи белье;\n2) сообщи мне номер машинки.\nТолько зарегался? Супер! Получай подарок – в первый раз тебе будет зачислено сразу две стирки!";
                    $url = "https://i.imgur.com/6wgbZRh.jpg";
                    $telegram->sendPhoto($chat_id, $url);
                    $telegram->sendMessage($chat_id, $reply);

                } else if ($step == 1150 && $text == "Чистый Четверг") {
                    $point_id = $db->getUserPointID($chat_id);
                    if ($point_id == 7 || $point_id == 6 || $point_id == 8) {
                        $url = "https://i.imgur.com/q4inYXR.jpg";
                        $telegram->sendPhoto($chat_id, $url);
                    } else {
                        $url = "https://i.imgur.com/WCKH2mg.jpg";
                        $telegram->sendPhoto($chat_id, $url);
                    }
                    //$reply = "Хочешь сэкономить и не знаешь, как это сделать? Делюсь зачетной темой! По четвергам Ландроматик особенно щедр и радует студентов улетными скидками!";
                    //$telegram->sendMessage($chat_id, $reply);
                } else if ($step == 1150 && $text == "Меню") {
                      gotoMainmenu($chat_id, $telegram, $db);

                } else if (($step == 1160 || $step == 1161) && $text == "Свободные машинки") {
                    $reply = "Уффф! Бывает, что стирка нужна здесь и сейчас, а бежать наобум нет никакого желания. Вдруг все занято? Доверься мне и будь всегда в курсе текущей ситуации!";
                    $telegram->sendMessage($chat_id, $reply);
                    $reply1 = $db->getStatusStudent($chat_id);
                    $telegram->sendMessage($chat_id, $reply1);

                } else if (($step == 1160 || $step == 1161) && $text == "Занять очередь") {
                    $reply = "Время – деньги! Ломает слоняться с ворохом вещей и караулить очередь, теряя драгоценные минуты? Нет проблем, я все сделаю за тебя! Просто подойди к условленному часу.\n\nСкоро будет доступна!";
                    $telegram->sendMessage($chat_id, $reply);

                } else if (($step == 1160 || $step == 1161) && $text == "Моя история") {
                    // if ( $chat_id !=269450981 && $chat_id != 422646556) {
                    //     $reply = "Обожаешь порядок во всем? Тогда тебе сказочно повезло со мной! Каждый поход в прачечную и использованная услуга тщательно фиксируются в личном кабинете! Составлять расписание и планировать бюджет будет гораздо проще!\n\nСкоро будет доступна!";
                    //     $telegram->sendMessage($chat_id, $reply);
                    // } else {
                        $reply = $db->myHistory($chat_id);
                        $telegram->sendMessage($chat_id, $reply);
                    // }
                } else if ($step == 1161 && $text == "Бесплатная стирка") {
                    if ($db->checkParentlessCount($chat_id) > 0 ) {
                        $reply = "Итак, погнали! Загрузи белье, выбери программу стирки и пришли мне номер машинки";
                        $db->setStep($chat_id, 2500);
                        $buttons = $db->getMenu($chat_id, 2500);
                        $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                        $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                    } else {
                        $reply = "У вас закончились бесплатные стирки";
                        $telegram->sendMessage($chat_id, $reply);
                    }

                } else if (($step == 1160 || $step == 1161) && $text == "Меню"){
                    gotoMainmenu($chat_id, $telegram, $db);

                // запрос, является ли стирка бесплатной
                } else if ($step == 1170 && $text == "1+1+1=4"){
                    // если да, переводит в особое меню для бесплатной стирки
                    if ($db->check4FreeStirka($chat_id) == true) {
                        $reply = "Вау! Быть чистюлей не только приятно, но и выгодно! Ходи в прачечную как можно чаще и получай заслуженные бонусы: за каждую четвертую стирку тебе не придется платить из своего кармана ни единого рубля";
                        $db->setStep($chat_id, 1181);
                        $buttons = $db->getMenu($chat_id, 1181);
                        $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                        $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                    // стандартное меню для платной стирки
                    } else {
                        $reply = "Вау! Быть чистюлей не только приятно, но и выгодно! Ходи в прачечную как можно чаще и получай заслуженные бонусы: за каждую четвертую стирку тебе не придется платить из своего кармана ни единого рубля";
                        $db->setStep($chat_id, 1180);
                        $buttons = $db->getMenu($chat_id, 1180);
                        $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                        $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                    }

                } else if ($step == 1170 && $text == "Чистый Четверг"){
                    $db->setStep($chat_id, 1200);
                    $reply = "Хочешь сэкономить и не знаешь, как это сделать? Делюсь зачетной темой! По четвергам Ландроматик особенно щедр и радует студентов улетными скидками!";
                    $buttons = $db->getMenu($chat_id, 1200);
                    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                    $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);

                } else if ($step == 1170 && $text == "3-я сушка в подарок"){
                    // $point_id = $db->getUserPointID($chat_id);
                    // if ($point_id == 6 || $point_id == 8) {
                    //     $reply = "Данная акция временно недоступна";
                    //     $telegram->sendMessage($chat_id, $reply);
                    // } else {
                        if ($db->check4FreeSushka($chat_id) == true) {
                            $db->setStep($chat_id, 1221);
                            $reply = "Отпадное предложение, перед которым нельзя устоять! Воспользуйся услугой сушки дважды, и третий раз будет абсолютно бесплатным!";
                            $buttons = $db->getMenu($chat_id, 1221);
                            $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                            $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                        // стандартное меню для платной стирки
                        } else {
                            $db->setStep($chat_id, 1220);
                            $reply = "Отпадное предложение, перед которым нельзя устоять! Воспользуйся услугой сушки дважды, и третий раз будет абсолютно бесплатным!";
                            $buttons = $db->getMenu($chat_id, 1220);
                            $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                            $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                        }
                    // }

                } else if ($step == 1170 && $text == "Меню"){
                    gotoMainmenu($chat_id, $telegram, $db);

                } else if ($step == 1180 && $text == "Участвовать") {
                    $reply = "Итак, погнали! Загрузи белье, выбери программу стирки и пришли мне номер машинки";
                    $db->setStep($chat_id, 2100);
                    $buttons = $db->getMenu($chat_id, 2100);
                    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                    $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);

                } else if ($step == 1180 && $text == "Меню"){
                    gotoMainmenu($chat_id, $telegram, $db);

                } else if ($step == 1181 && $text == "Бесплатная стирка") {
                    $reply = "Итак, погнали! Загрузи белье, выбери программу стирки и пришли мне номер машинки";
                    $db->setStep($chat_id, 2100);
                    $buttons = $db->getMenu($chat_id, 2100);
                    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                    $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);

                } else if ($step == 1181 && $text == "Меню"){
                    gotoMainmenu($chat_id, $telegram, $db);

                // для акции ЧЧ, проверка на день недели
                } else if ( $step == 1200 && $text == "Участвовать"){
                    // если четверг, разрешить доступ к акции
                    if (date("w") == 4) {
                        $reply = "Итак, погнали! Загрузи белье, выбери программу стирки и пришли мне номер машинки";
                        $db->setStep($chat_id, 2200);
                        $buttons = $db->getMenu($chat_id, 2200);
                        $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                        $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                        exit();

                    // если не четверг, выдать сообщение, вернуть в основное меню
                    } else {
                        $reply = "Акция проводится только в четверг.";
                        $telegram->sendMessage($chat_id, $reply);
                        gotoMainmenu($chat_id, $telegram, $db);
                    }

                } else if ($step == 1200 && $text == "Меню"){
                    gotoMainmenu($chat_id, $telegram, $db);

                } else if ( $step == 1220 && $text == "Участвовать"){
                    $reply = "Итак, погнали! Загрузи белье, выбери программу сушки и пришли мне номер сушилки";
                    $db->setStep($chat_id, 2300);
                    $buttons = $db->getMenu($chat_id, 2300);
                    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                    $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);

                } else if ($step == 1220 && $text == "Меню"){
                    gotoMainmenu($chat_id, $telegram, $db);

                } else if ( $step == 1221 && $text == "Бесплатная сушка"){
                    $reply = "Итак, погнали! Загрузи белье, выбери программу сушки и пришли мне номер сушилки";
                    $db->setStep($chat_id, 2300);
                    $buttons = $db->getMenu($chat_id, 2300);
                    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                    $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);

                } else if ($step == 1221 && $text == "Меню"){
                    gotoMainmenu($chat_id, $telegram, $db);

                // для акции 1114 при нажатии кнопки "Наличный" запускает функцию выполняющую необходимые действия для данной акции
                } else if ($step == 1300 && $text == "Наличные"){
                    $reply = $db->set1114($chat_id);
                    $telegram->sendMessage($chat_id, $reply);
                    gotoMainmenu($chat_id, $telegram, $db);

                //------------------------------------------------------------------
                // для акции 1114, формируем платежку с данными---------------------
                } else if ($step == 1300 && $text == "Оплата картой") {
                    //$point_id = $db->getUserPointID($chat_id);
                    //if ($point_id == 0) { //|| $point_id == 1 || $point_id == 22 || $point_id == 9 || $point_id == 23 || $point_id == 12 || $point_id == 11 || $point_id == 7) {
                        $title = 'Оплата услуги прачечной';
                        $description = "Оплата стирки 6 кг в прачечной самообслуживания Ландроматик\nИНН: 780622399373";
                        $payload = 'yandex_1114';
                        $startParameter = 'invoice_yandex';
                        $currency = 'RUB';
                        $point_id = $db->getUserPointID($chat_id);
                        if (date("w") >= 1 && date("w") <= 5) {
                            if (date('H:i') > '14:00' || date('H:i') < '02:00') {
                                if ($point_id == 23 || $point_id == 12) {
                                    $price = 11000;
                                } else {
                                    $price = 10000;
                                }
                            } else {
                                if ($point_id == 23 || $point_id == 12 || $point_id == 0) {
                                    $price = 9000;
                                } else if ($point_id == 1 || $point_id == 9) {
                                    $price = 10000;
                                } else {
                                    $price = 8000;
                                }
                            }
                        } else {
                            if ($point_id == 23 || $point_id == 12) {
                                $price = 11000;
                            } else {
                                $price = 10000;
                            }
                        }
                        $price_for_sql = intval($price / 100);
                        $prices = [['label' => 'Стирка', 'amount' => $price]];
                        $isFlexible = false;
                        $photoUrl = 'https://i.imgur.com/w7mSbqi.jpg';
                        $photoSize = null;
                        $photoWidth = 185;
                        $photoHeight = 171;

                        //$db->insertPaymentSQL($chat_id, $price_for_sql, $payload);
                        sleep(1);
                        $telegram->sendInvoice($chat_id, $title, $description, $payload, $provider_token, $startParameter, $currency, $prices, $isFlexible, $photoUrl, $photoSize, $photoWidth, $photoHeight);
                        $telegram->sendMessage($chat_id, "ВНИМАНИЕ! Не создавайте одновременно несколько платежных счетов. Вызов следующего платежного счета делает предыдущий недействительным");
                        gotoMainmenu($chat_id, $telegram, $db);
                      // } else {
                      //    $reply = "Оплата картой временно недоступна";
                      //    $telegram->sendMessage($chat_id, $reply);
                      // }


                } else if (($step == 1300 && $text == "Сбербанк Онлайн") || $step == 1302 && $text == "Назад") {
                    if ($db->getPhoneNumber($chat_id)) {
                        $buttons = [[strval($db->getPhoneNumber($chat_id))],["Оплатить с другого номера"],["Назад"]];
                        $reply = "Укажи номер телефона привязанный к «Сбербанк Онлайн»";
                        $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                        $telegram->sendSticker($chat_id, "CAADAgADngQAAulVBRhnfYR2rHtLHwI");
                        $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                        $db->setStep($chat_id, 1301);

                    } else {
                        $reply = "Введи номер своего мобильного телефона, подключенный к «Мобильному банку» Сбербанка в формате 79ХХххххххх  и отправь мне.";
                        $buttons = [["Назад"]];
                        $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                        $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                        $db->setStep($chat_id, 1302);
                    }

                } else if ($step == 1301 && $text == "Назад") {
                    $db->setStep($chat_id, 1300);
                    $buttons = $db->getMenu($chat_id, 1300);
                    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                    $telegram->sendMessage($chat_id, "Выбери удобный способ оплаты", false, null, null, $keyboard);

                } else if ($step == 1301 && $text == "Оплатить с другого номера") {
                    $reply = "Введи номер своего мобильного телефона, подключенный к «Мобильному банку» Сбербанка в формате 79ХХххххххх  и отправь мне.";
                    $buttons = [["Назад"]];
                    $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                    $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                    $db->setStep($chat_id, 1302);

                } else if (($step == 1301 && $text == strval($db->getPhoneNumber($chat_id))) || ($step == 1302 && $text == "Продолжить")) {
                      // phone_num
                      $phone_num = strval($db->getPhoneNumber($chat_id));
                      $phone_num = substr_replace($phone_num, "8", 0, 1);

                      // price
                      $point_id = $db->getUserPointID($chat_id);
                      if (date("w") >= 1 && date("w") <= 5) {
                          if (date('H:i') > '14:00' || date('H:i') < '02:00') {
                              if ($point_id == 23 || $point_id == 12) {
                                  $price = 110.00;
                              } else {
                                  $price = 100.00;
                              }
                          } else {
                              if ($point_id == 23 || $point_id == 12 || $point_id == 0) {
                                  $price = 90.00;
                              } else if ($point_id == 1 || $point_id == 9) {
                                  $price = 100.00;
                              } else {
                                  $price = 80.00;
                              }
                          }
                      } else {
                          if ($point_id == 23 || $point_id == 12) {
                              $price = 110.00;
                          } else {
                              $price = 100.00;
                          }
                      }
                      $payment_type = '1114';
                      $db->createInvoiceSberbank1114($chat_id, $phone_num, $price, $payment_type);
                      $reply = "Ок! Заявка принята!\nПодтверди платеж:\nВ течение 1–2 минут ты получишь SMS с номера 900 для подтверждения платежа.\nОтветь на сообщение кодом, указанным в тексте сообщения.\n\nЕсли SMS не приходит в течение 10 минут, это значит, что указанный номер не подключен к «Мобильному банку» Сбербанка или в данный момент оператор испытывает технические проблемы. Воспользуйтесь другим способом оплаты или повторите попытку позднее.";
                      $telegram->sendMessage($chat_id, $reply);
                      gotoMainmenu( $chat_id, $telegram, $db);

                } else if ($step == 1302 && $text) {
                    if ((ctype_digit($text) && preg_match_all("/[0-9]/", $text) == 11) && substr($text, 0, 1) == "7") {
                        $db->setPhoneNum($chat_id, $text);
                        $buttons = [["Продолжить"],["Назад"]];
                        $reply = $db->getPhoneNumber($chat_id) . "\nНажми «Продолжить» для подтверждения номера телефона.";
                        $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                        $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                        $db->setStep($chat_id, 1302);

                    } else {
                        $reply = "Неверный формат номера.\nВведи номер телефона в формате 79XXxxxxxxx";
                        $buttons = [["Назад"]];
                        $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                        $telegram->sendMessage($chat_id, $reply, false, null, null, $keyboard);
                        $db->setStep($chat_id, 1302);
                    }




                } else if ($step == 1300 && $text == "Меню"){
                    gotoMainmenu($chat_id, $telegram, $db);

                // для акции ЧЧ при нажатии кнопки "Наличный" запускает функцию выполняющую необходимые действия для данной акции
                } else if ( $step == 1400 && $text == "Наличные"){
                    $reply = $db->setCleanThursday($chat_id);
                    $telegram->sendMessage($chat_id, $reply);
                    gotoMainmenu($chat_id, $telegram, $db);

                // для акции ЧЧ, безналичная оплата с помощью яндекс кассы
                } else if ( $step == 1400 && $text == "Оплата картой"){
                        $title = 'Оплата услуги прачечной';
                        $description = "Оплата стирки 6 кг в прачечной самообслуживания Ландроматик\nИНН: 780622399373";
                        $payload = 'yandex_44';
                        $startParameter = 'invoice_yandex';
                        $currency = 'RUB';
                          $point_id = $db->getUserPointID($chat_id);
                          if ($point_id == 7 || $point_id == 6 || $point_id == 8) {
                              $price = 6000;
                          } else if ($point_id == 23) {
                              $price = 8000;
                          } else {
                              $price = 7000;
                          }
                        $price_for_sql = intval($price / 100);
                        $prices = [['label' => 'Стирка', 'amount' => $price]];
                        $isFlexible = false;
                        $photoUrl = 'https://i.imgur.com/w7mSbqi.jpg';
                        $photoSize = null;
                        $photoWidth = 185;
                        $photoHeight = 171;

                        //$db->insertPaymentSQL($chat_id, $price_for_sql, $payload);
                        sleep(1);
                        $telegram->sendInvoice($chat_id, $title, $description, $payload, $provider_token, $startParameter, $currency, $prices, $isFlexible, $photoUrl, $photoSize, $photoWidth, $photoHeight);
                        $telegram->sendMessage($chat_id, "ВНИМАНИЕ! Не создавайте одновременно несколько платежных счетов. Вызов следующего платежного счета делает предыдущий недействительным");
                        gotoMainmenu($chat_id, $telegram, $db);

                } else if ($step == 1400 && $text == "Меню"){
                    gotoMainmenu($chat_id, $telegram, $db);

                } else if ($step == 1500 && $text == "Наличные"){
                    $reply = $db->setFreeSushka($chat_id);
                    $telegram->sendMessage($chat_id, $reply);
                    gotoMainmenu($chat_id, $telegram, $db);

                } else if ( $step == 1500 && $text == "Оплата картой"){
                    $title = 'Оплата услуги прачечной';
                    $description = "Оплата сушки в прачечной самообслуживания Ландроматик\nИНН: 780622399373";
                    $payload = 'yandex_sushka';
                    $startParameter = 'invoice_yandex';
                    $currency = 'RUB';
                    $price = 6000;
                    $price_for_sql = intval($price / 100);
                    $prices = [['label' => 'Стирка', 'amount' => $price]];
                    $isFlexible = false;
                    $photoUrl = 'https://i.imgur.com/w7mSbqi.jpg';
                    $photoSize = null;
                    $photoWidth = 185;
                    $photoHeight = 171;

                    sleep(1);
                    $telegram->sendInvoice($chat_id, $title, $description, $payload, $provider_token, $startParameter, $currency, $prices, $isFlexible, $photoUrl, $photoSize, $photoWidth, $photoHeight);
                    $telegram->sendMessage($chat_id, "ВНИМАНИЕ! Не создавайте одновременно несколько платежных счетов. Вызов следующего платежного счета делает предыдущий недействительным");
                    gotoMainmenu($chat_id, $telegram, $db);

                } else if ($step == 1500 && $text == "Меню"){
                    gotoMainmenu($chat_id, $telegram, $db);

                } else if ($step == 1100 || $text) {
                    $reply = "Бот игнорирует твои сообщения? Ты хочешь постирать, но ничего не происходит? Кажется ты потерялся(\nПросто напиши мне 'Меню' или нажми кнопку в строке «Сообщения». Теперь ты готов к стирке!";
                    $telegram->sendMessage($chat_id, $reply);
                    $telegram->sendPhoto($chat_id, "https://i.imgur.com/y53bZbi.png");

                // навигация по меню
                } else {
                    // $reply = "Произошла ошибка, возвращение в главное меню";
                    // $telegram->sendMessage($chat_id, $reply);
                    // gotoMainmenu($chat_id, $telegram, $db);
                    exit();
                }
            // меню выбора мшинок для акции 1114
            } else if ($step == 2100) {
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
                        } else if ($text == "8") {
                            $db->setMashine($chat_id, 8);
                        } else if ($text == "9") {
                            $db->setMashine($chat_id, 9);
                        } else if ($text == "10") {
                            $db->setMashine($chat_id, 10);
                        } else {
                            $reply = "Пожалуйста, выберите машинку для оплаты";
                            $telegram->sendMessage($chat_id, $reply);
                            $db->getMenu($chat_id, 2100);
                        }

                        // проверка на состояние машинки
                        if (strpos($db->checkMashineStatus($chat_id), "готова")) {
                            // запуск машинки для бесплатной стирки
                            if ($db->check4FreeStirka($chat_id) == true) {
                                //$db->setStep($chat_id, 2101);
                                //$telegram->sendMessage($chat_id, "Пожалуйста, подождите...");
                                $reply = $db->set1114($chat_id);
                                $telegram->sendMessage($chat_id, $reply);
                                gotoMainmenu($chat_id, $telegram, $db);
                            // меню оплаты машинки
                            } else {
                                $db->setStep($chat_id, 1300);
                                $buttons = $db->getMenu($chat_id, 1300);
                                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                                $telegram->sendMessage($chat_id, "Выбери удобный способ оплаты", false, null, null, $keyboard);
                            }

                        } else if ($db->checkForPriceless($chat_id) == true) {
                            $reply = "Стиральная машина уже стирает, пожалуйста, выберите другую стиральную машину и ЕЩЁ РАЗ ОТПРАВЬТЕ ЗАЯВКУ";
                            $telegram->sendMessage($chat_id, $reply);
                            $db->getMenu($chat_id, 2100);
                        // если машинка не включена, выводит сообщение о состоянии машинки и возвращает к меню выбора машинки
                        } else {
                            $reply = $db->checkMashineStatus($chat_id);
                            $telegram->sendMessage($chat_id, $reply);
                            $db->getMenu($chat_id, 2100);
                        }
                }

            // } else if ($step == 2101) {
            //     $telegram->sendMessage($chat_id, "Подождите пока обработается запрос");
            // меню выбора машинок для акции ЧЧ
            } else if ($step == 2200) {
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
                         } else if ($text == "8") {
                             $db->setMashine($chat_id, 8);
                         } else if ($text == "9") {
                             $db->setMashine($chat_id, 9);
                         } else if ($text == "10") {
                             $db->setMashine($chat_id, 10);
                         } else {
                             $reply = "Пожалуйста, выберите машинку для оплаты";
                             $telegram->sendMessage($chat_id, $reply);
                             $db->getMenu($chat_id, 2200);
                         }
                         // проверка на состояние машинки, если готова, перевести в меню оплаты, если нет вывести статус машинки, и вернуть в меню выбора машинок
                         if (strpos($db->checkMashineStatus($chat_id), "готова")){
                             $db->setStep($chat_id, 1400);
                             $buttons = $db->getMenu($chat_id, 1400);
                             $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                             $telegram->sendMessage($chat_id, "Выбери удобный способ оплаты", false, null, null, $keyboard);
                         } else {
                             $reply = $db->checkMashineStatus($chat_id);
                             $telegram->sendMessage($chat_id, $reply);
                             $db->getMenu( $chat_id, 2200);
                         }
                 }

             // меню выбора машинок для акции 3 сушка в подарок
             } else if ($step == 2300){
                 switch ($text){
                     case "Меню":
                         gotoMainmenu($chat_id, $telegram, $db);
                         break;
                     default:
                         if ($text == "Сушильная машина 1") {
                             $db->setDry($chat_id, 0);
                         } else if ($text == "Сушильная машина 2") {
                             $db->setDry($chat_id, 1);
                         } else if ($text == "Сушильная машина 3") {
                             $db->setDry($chat_id, 2);
                         } else {
                             $reply = "Пожалуйста, выберите сушилку для оплаты";
                             $telegram->sendMessage($chat_id, $reply);
                             $db->getMenu($chat_id, 2300);
                         }

                         if (strpos($db->checkSushkaStatus($chat_id), "готова")){

                             if ($db->check4FreeSushka($chat_id) == true) {
                                 $reply = $db->setFreeSushka($chat_id);
                                 $telegram->sendMessage($chat_id, $reply);
                                 gotoMainmenu($chat_id, $telegram, $db);
                             // меню оплаты машинки
                             } else {
                                 // $point_id = $db->getUserPointID($chat_id);
                                 // if ($point_id == 0 || $point_id == 9 || $point_id == 7) { //$point_id == 23 || $point_id == 10 ||
                                     $db->setStep($chat_id, 1500);
                                     $buttons = $db->getMenu($chat_id, 1500);
                                     $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                                     $telegram->sendMessage($chat_id, "Выбери удобный способ оплаты", false, null, null, $keyboard);

                                 // } else {
                                 //     $db->setStep($chat_id, 1500);
                                 //     $buttons = [["Наличные"],["Меню"]];
                                 //     $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($buttons, null, true);
                                 //     $telegram->sendMessage($chat_id, "Выбери удобный способ оплаты", false, null, null, $keyboard);
                                 // }
                             }

                         } else {
                             $reply = $db->checkSushkaStatus($chat_id);
                             $telegram->sendMessage($chat_id, $reply);
                             $db->getMenu( $chat_id, 2300);
                         }
                  }

              // оплата обычной стирки с помощью карты
              } else if ($step == 2400){
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
                              // if ($db->getMashineTypeByUser($chat_id) == 1) {
                              //     $telegram->sendMessage($chat_id, "Оплата картой для сушильной машины временно недоступна");
                              //     exit();
                              // }
                          } else if ($text == "5") {
                              $db->setMashine($chat_id, 5);

                          } else if ($text == "6") {
                              $db->setMashine($chat_id, 6);

                          } else if ($text == "7") {
                              $db->setMashine($chat_id, 7);

                          } else if ($text == "8") {
                              $db->setMashine($chat_id, 8);

                          } else if ($text == "9") {
                              $db->setMashine($chat_id, 9);

                          } else if ($text == "10") {
                              $db->setMashine($chat_id, 10);

                          } else if ($text == "11") {
                              $db->setMashine($chat_id, 11);

                          } else if ($text == "Сушильная машина 1") {
                              $db->setDry($chat_id, 0);

                          } else if ($text == "Сушильная машина 2") {
                              $db->setDry($chat_id, 1);

                          } else if ($text == "Сушильная машина 3") {
                              $db->setDry($chat_id, 2);

                          } else {
                              $reply = "Пожалуйста, выберите машинку или сушилку для оплаты";
                              $telegram->sendMessage($chat_id, $reply);
                              $db->getMenu($chat_id, 2400);
                              exit();
                          }

                          // проверка на состояние машинки
                          if (strpos($db->checkMashineStatus($chat_id), "готова")){
                              $mtype = $db->getMashineTypeByUser($chat_id);
                              if ($mtype == 0) {
                                  $title = 'Оплата услуги прачечной';
                                  $description = "Оплата стирки 6 кг в прачечной самообслуживания Ландроматик\nИНН: 780622399373";
                                  $payload = 'yandex_ss';
                                  $startParameter = 'invoice_yandex';
                                  $currency = 'RUB';
                                  $point_id = $db->getUserPointID($chat_id);
                                  if (date("w") >= 1 && date("w") <= 5) {
                                      if (date('H:i') > '14:00' || date('H:i') < '02:00') {
                                          if ($point_id == 23 || $point_id == 12) {
                                              $price = 11000;
                                          } else {
                                              $price = 10000;
                                          }
                                      } else {
                                          if ($point_id == 23 || $point_id == 12 || $point_id == 0) {
                                              $price = 9000;
                                          } else if ($point_id == 1 || $point_id == 9) {
                                              $price = 10000;
                                          } else {
                                              $price = 8000;
                                          }
                                      }
                                  } else {
                                      if ($point_id == 23 || $point_id == 12) {
                                          $price = 11000;
                                      } else {
                                          $price = 10000;
                                      }
                                  }
                                  $price_for_sql = intval($price / 100);
                                  $prices = [['label' => 'Стирка', 'amount' => $price]];
                                  $isFlexible = false;
                                  $photoUrl = 'https://i.imgur.com/w7mSbqi.jpg';
                                  $photoSize = null;
                                  $photoWidth = 185;
                                  $photoHeight = 171;
                                  // $needName = false;
                                  // $needPhoneNumber = false;
                                  // $needEmail = false;
                                  // $needShippingAddress = false;
                                  // $replyToMessageId = null;
                                  // $buttons = [[['pay'=>true,'text'=>'Оплатить']],[['text'=>'Отменить оплату']]];
                                  // $keyboard = new \TelegramBot\Api\Types\Inline\InlineKeyboardMarkup([$buttons]);
                                  // $disableNotification = false;

                                  sleep(1);
                                  $telegram->sendInvoice($chat_id, $title, $description, $payload, $provider_token, $startParameter, $currency, $prices, $isFlexible, $photoUrl, $photoSize, $photoWidth, $photoHeight); //$needName, $needPhoneNumber, $needEmail, $needShippingAddress, $replyToMessageId, $keyboard, $disableNotification
                                  $telegram->sendMessage($chat_id, "ВНИМАНИЕ! Не создавайте одновременно несколько платежных счетов. Вызов следующего платежного счета делает предыдущий недействительным");
                                  gotoMainmenu($chat_id, $telegram, $db);

                              } else if ($mtype == 1) {
                                  $title = 'Оплата услуги прачечной';
                                  $description = "Оплата сушки в прачечной самообслуживания Ландроматик\nИНН: 780622399373";
                                  $payload = 'yandex_sushka2';
                                  $startParameter = 'invoice_yandex';
                                  $currency = 'RUB';
                                  $price = 6000;
                                  $price_for_sql = intval($price / 100);
                                  $prices = [['label' => 'Стирка', 'amount' => $price]];
                                  $isFlexible = false;
                                  $photoUrl = 'https://i.imgur.com/w7mSbqi.jpg';
                                  $photoSize = null;
                                  $photoWidth = 185;
                                  $photoHeight = 171;

                                  sleep(1);
                                  $telegram->sendInvoice($chat_id, $title, $description, $payload, $provider_token, $startParameter, $currency, $prices, $isFlexible, $photoUrl, $photoSize, $photoWidth, $photoHeight);
                                  $telegram->sendMessage($chat_id, "ВНИМАНИЕ! Не создавайте одновременно несколько платежных счетов. Вызов следующего платежного счета делает предыдущий недействительным");
                                  gotoMainmenu($chat_id, $telegram, $db);
                              }
                          // если машинка не включена, выводит сообщение о состоянии машинки и возвращает к меню выбора машинки
                          } else {
                              $reply = $db->checkMashineStatus($chat_id);
                              $telegram->sendMessage($chat_id, $reply);
                              $db->getMenu($chat_id, 2400);
                          }
                  }

             // стирка для сирот
             } else if ($step == 2500){
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
                         } else if ($text == "8") {
                             $db->setMashine($chat_id, 8);
                         } else if ($text == "9") {
                             $db->setMashine($chat_id, 9);
                         } else if ($text == "10") {
                             $db->setMashine($chat_id, 10);
                         } else {
                             $reply = "Пожалуйста, выберите машинку для оплаты";
                             $telegram->sendMessage($chat_id, $reply);
                             $db->getMenu($chat_id, 2500);
                         }

                         // проверка на состояние машинки
                         if (strpos($db->checkMashineStatus($chat_id), "готова")){
                             // запуск машинки для бесплатной стирки
                             $reply = $db->setStirkaForParentless($chat_id);
                             $telegram->sendMessage($chat_id, $reply);
                             gotoMainmenu($chat_id, $telegram, $db);

                         } else {
                             $reply = $db->checkMashineStatus($chat_id);
                             $telegram->sendMessage($chat_id, $reply);
                             $db->getMenu($chat_id, 2500);
                         }
                 }

             } else if ($step == 2700) {
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
                             // if ($db->getMashineTypeByUser($chat_id) == 1) {
                             //     $telegram->sendMessage($chat_id, "Оплата картой для сушильной машины временно недоступна");
                             //     exit();
                             // }
                         } else if ($text == "5") {
                             $db->setMashine($chat_id, 5);

                         } else if ($text == "6") {
                             $db->setMashine($chat_id, 6);

                         } else if ($text == "7") {
                             $db->setMashine($chat_id, 7);

                         } else if ($text == "8") {
                             $db->setMashine($chat_id, 8);

                         } else if ($text == "9") {
                             $db->setMashine($chat_id, 9);

                         } else if ($text == "10") {
                             $db->setMashine($chat_id, 10);

                         } else if ($text == "11") {
                             $db->setMashine($chat_id, 11);

                         } else if ($text == "Сушильная машина 1") {
                             $db->setDry($chat_id, 0);

                         } else if ($text == "Сушильная машина 2") {
                             $db->setDry($chat_id, 1);

                         } else if ($text == "Сушильная машина 3") {
                             $db->setDry($chat_id, 2);

                         } else {
                             $reply = "Пожалуйста, выберите машинку или сушилку для оплаты";
                             $telegram->sendMessage($chat_id, $reply);
                             $db->getMenu($chat_id, 2700);
                             exit();
                         }

                         // проверка на состояние машинки
                         if (strpos($db->checkMashineStatus($chat_id), "готова")){
                             $mtype = $db->getMashineTypeByUser($chat_id);
                             if ($mtype == 0) {
                                 // phone_num
                                 $phone_num = strval($db->getPhoneNumber($chat_id));
                                 $phone_num = substr_replace($phone_num, "8", 0, 1);

                                 // price
                                 $point_id = $db->getUserPointID($chat_id);
                                 if (date("w") >= 1 && date("w") <= 5) {
                                     if (date('H:i') > '14:00' || date('H:i') < '02:00') {
                                         if ($point_id == 23 || $point_id == 12) {
                                             $price = 110.00;
                                         } else {
                                             $price = 100.00;
                                         }
                                     } else {
                                         if ($point_id == 23 || $point_id == 12 || $point_id == 0) {
                                             $price = 90.00;
                                         } else if ($point_id == 1 || $point_id == 9) {
                                             $price = 100.00;
                                         } else {
                                             $price = 80.00;
                                         }
                                     }
                                 } else {
                                     if ($point_id == 23 || $point_id == 12) {
                                         $price = 110.00;
                                     } else {
                                         $price = 100.00;
                                     }
                                 }
                                 if ($chat_id == 422646556) {
                                     $price = 1.00;
                                 }
                                 $payment_type = 'simple_stirka';
                                 $db->createInvoiceSberbank($chat_id, $phone_num, $price, $payment_type);
                                 $reply = "Ок! Заявка принята!\nПодтверди платеж:\nВ течение 1–2 минут ты получишь SMS с номера 900 для подтверждения платежа.\nОтветь на сообщение кодом, указанным в тексте сообщения.\n\nЕсли SMS не приходит в течение 10 минут, это значит, что указанный номер не подключен к «Мобильному банку» Сбербанка или в данный момент оператор испытывает технические проблемы. Воспользуйтесь другим способом оплаты или повторите попытку позднее.";
                                 $telegram->sendMessage($chat_id, $reply);
                                 gotoMainmenu( $chat_id, $telegram, $db);

                             } else if ($mtype == 1) {
                                  $phone_num = strval($db->getPhoneNumber($chat_id));
                                  $phone_num = substr_replace($phone_num, "8", 0, 1);
                                  $price = 60.00;
                                  $payment_type = 'simple_sushka';
                                  $db->createInvoiceSberbank($chat_id, $phone_num, $price, $payment_type);
                                  $reply = "Ок! Заявка принята!\nПодтверди платеж:\nВ течение 1–2 минут ты получишь SMS с номера 900 для подтверждения платежа.\nОтветь на сообщение кодом, указанным в тексте сообщения.\n\nЕсли SMS не приходит в течение 10 минут, это значит, что указанный номер не подключен к «Мобильному банку» Сбербанка или в данный момент оператор испытывает технические проблемы. Воспользуйтесь другим способом оплаты или повторите попытку позднее.";
                                  $telegram->sendMessage($chat_id, $reply);
                                  gotoMainmenu( $chat_id, $telegram, $db);
                             }

                         } else {
                             $reply = $db->checkMashineStatus($chat_id);
                             $telegram->sendMessage($chat_id, $reply);
                             $db->getMenu($chat_id, 2700);
                         }
                  }

             // возврат в основное меню
           } else if ($step == 1100 && ($text == "Меню" || $text == "меню")) {
               gotoMainmenu( $chat_id, $telegram, $db);

           }
        }


     }, function($update){
         return true;
     });

    $telegram->run();


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
