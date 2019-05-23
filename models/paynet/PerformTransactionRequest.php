<?php
/**
 * Created by PhpStorm.
 * User: yura_sultonov
 * Date: 5/23/19
 * Time: 3:45 PM
 */

namespace models\paynet;


use DateTime;

class PerformTransactionRequest extends GenericRequest
{
    /**
     * @access public
     * @var integer
     */
    public $amount;
    /**
     * Идентификатор транзакции клиента
     * @access public
     * @var integer
     */
    public $transactionId;
    /**
     * Дата и время транзакции
     * @access public
     * @var dateTime
     */
    public $transactionTime;
}