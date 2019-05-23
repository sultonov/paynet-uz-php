<?php
/**
 * Created by PhpStorm.
 * User: yura_sultonov
 * Date: 5/23/19
 * Time: 4:06 PM
 */

namespace models\paynet;


class Statuses
{
    const STATUS_OK = 0;
    const STATUS_INSUFFICIENT_FUNDS_TO_CANCEL = 77;
    const STATUS_SERVICE_UNAVAILABLE = 100;
    const STATUS_SYSTEM_ERROR = 102;
    const STATUS_UNKNOWN_ERROR = 103;
    const STATUS_TRANSACTION_ALREADY_CREATED = 201;
    const STATUS_TRANSACTION_CANCELED = 202;
    const STATUS_UNKNOWN_NUMBER = 301;
    const STATUS_UNKNOWN_USER = 302;
    const STATUS_UNKNOWN_PRODUCT = 304;
    const STATUS_TRANSACTION_NOT_FOUND = 305;
    const STATUS_MISSING_PARAMETERS = 411;
    const STATUS_USER_NOT_FOUND = 412;
    const STATUS_INVALID_AMOUNT = 413;
    const STATUS_OUTSIDE_THE_SERVICE_ARIA = 502;
    const STATUS_ACCESS_DENIED = 601;

    public static function getMessage($status)
    {
        $messages = [
            static::STATUS_OK => "Ok",
            static::STATUS_INSUFFICIENT_FUNDS_TO_CANCEL => "Недостаточно средств на счету клиента для отмены платежа",
            static::STATUS_SERVICE_UNAVAILABLE => "Услуга временно не поддерживается",
            static::STATUS_SYSTEM_ERROR => "Системная ошибка",
            static::STATUS_UNKNOWN_ERROR => "Неизвестная ошибка",
            static::STATUS_TRANSACTION_ALREADY_CREATED => "Транзакция уже существует",
            static::STATUS_TRANSACTION_NOT_FOUND => "Транзакция не найден",
            static::STATUS_TRANSACTION_CANCELED => "Транзакция уже отменена",
            static::STATUS_UNKNOWN_NUMBER => "Номер не существует",
            static::STATUS_UNKNOWN_USER => "Пользователь не найден",
            static::STATUS_UNKNOWN_PRODUCT => "Товар не найден",
            static::STATUS_MISSING_PARAMETERS => "Не задан один или несколько обязательных параметров",
            static::STATUS_USER_NOT_FOUND => "Пользователь не найден",
            static::STATUS_INVALID_AMOUNT => "Неверная сумма",
            static::STATUS_OUTSIDE_THE_SERVICE_ARIA => "Клиент вне зоны обслуживания провайдера",
            static::STATUS_ACCESS_DENIED => "Доступ запрещен"
        ];
        return $messages[$status];
    }
}