<?php
/**
 * Created by PhpStorm.
 * User: yura_sultonov
 * Date: 5/23/19
 * Time: 11:44 PM
 */

namespace models;

class Transaction
{
    /**
     * Локальный идентификатор транзакции
     * @access public
     * @var integer
     */
    public $id;
    /**
     * Удалённый идентификатор транзакции
     * @access public
     * @var integer
     */
    public $remoteId;
    /**
     * Статус транзакции
     * @access public
     * @var integer
     */
    public $status;
    /**
     * Идентификатор юзера или сервиса
     * @access public
     * @var string
     */
    public $client;
    /**
     * Сумма транзакции
     * @access public
     * @var double
     */
    public $amount;
    /**
     * Дата и время транзакции
     * @access public
     * @var \DateTime
     */
    public $timestamp;
}