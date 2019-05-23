<?php
/**
 * Created by PhpStorm.
 * User: yura_sultonov
 * Date: 5/23/19
 * Time: 11:46 PM
 */

namespace models;


class TransactionStatus
{
    /**
     * 1 если оплачено
     */
    const PAID = 1;
    /**
     * 2 если отменено
     */
    const CANCELLED = 2;
}