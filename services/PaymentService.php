<?php

namespace services;

use DateTime;
use models\paynet\GenericParam;
use models\paynet\TransactionStatement;
use models\Transaction;

/**
 * Created by PhpStorm.
 * User: yura_sultonov
 * Date: 5/23/19
 * Time: 11:30 PM
 */
class PaymentService
{

    /**
     * Функция проверки юзер или сервис доступны
     * @param $userOrServiceId string Идентификатор юзера или сервиса
     * @return bool
     */
    public function isUserOrServiceExist($userOrServiceId)
    {
        //TODO напишите проверку юзера или сервиса
        return true;
    }

    /**
     * Функция проверки транзакции по удаленного транзакции
     * @param $transactionId int Идентификатор удаленного транзакции
     * @return bool
     */
    public function isRemoteTransactionIdExist($transactionId)
    {
        //TODO напишите проверки для удаленного идентификатора транзакции
        return true;
    }

    /**
     * Функция для создание транзакции
     * @param $remoteTransactionId int Идентификатор удаленного транзакции
     * @param $amount double Сумма на сумах
     * @param $client string Идентификатор юзера или сервиса
     * @param $transactionTime DateTime Дата и время транзакции
     * @return bool
     */
    public function createTransaction($remoteTransactionId, $amount, $client, $transactionTime)
    {
        //TODO напишите функцию для вставки
        $transaction = new Transaction();
        $transaction->remoteId = $remoteTransactionId;
        $transaction->amount = $amount;
        $transaction->client = $client;
        $transaction->timestamp = $transactionTime;
        return true;
    }

    /**
     * Функция для выборки транзакции по удаленного транзакции
     * @param $transactionId  int Идентификатор удаленного транзакции
     * @return Transaction
     */
    public function getPaymentByRemoteTransactionId($transactionId)
    {
        //TODO возвращаем объект транзакции по удаленного идентификатора транзакции
        return new Transaction();
    }

    /**
     * Функция для отмены транзакции
     * @param $transactionId int Идентификатор удаленного транзакции
     * @return bool
     */
    public function cancelByRemoteTransactionId($transactionId)
    {
        // TODO проверим что у юзера достаточно баланс чтобы отченить транзацию
        // TODO отменяем транзацию, если все ОК то возвращаем true, иначе false
        return true;
    }

    /**
     * Функция для отчета
     * @param $dateFrom DateTime Дата и время начала периода
     * @param $dateTo DateTime Дата и время окончания периода
     * @return TransactionStatement[]
     */
    public function getStatements($dateFrom, $dateTo)
    {
        //TODO возвращаем лист транзакции за этот период
        return [
            new TransactionStatement(1, 2, 3, new DateTime()),
            new TransactionStatement(2, 4, 6, new DateTime())
        ];
    }

    /**
     * Функция для получение информации о юзера или сервиса
     * @param $client string Идентификатор юзера или сервиса
     * @return GenericParam[]
     */
    public function getUserOrServiceParams($client)
    {
        //TODO здесь вы должны указывать данные о сервисе или о пользователя
        return [
            new GenericParam("key1", "value2"),
            new GenericParam("key2", "value2"),
        ];
    }
}