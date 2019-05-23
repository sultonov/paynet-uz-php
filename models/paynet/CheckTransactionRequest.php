<?php
/**
 * Created by PhpStorm.
 * User: yura_sultonov
 * Date: 5/23/19
 * Time: 3:20 PM
 */

namespace models\paynet;


class CheckTransactionRequest extends GenericRequest
{
    /**
     * @access public
     * @var integer
     */
    public $transactionId;

    /**
     * @access public
     * @var string
     */
    public $transactionTime;
}