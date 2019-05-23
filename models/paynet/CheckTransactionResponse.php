<?php
/**
 * Created by PhpStorm.
 * User: yura_sultonov
 * Date: 5/23/19
 * Time: 3:24 PM
 */

namespace models\paynet;


class CheckTransactionResponse extends GenericResponse
{
    /**
     * @access public
     * @var integer
     */
    public $providerTrnId;
    /**
     * @access public
     * @var integer
     */
    public $transactionState;
    public $transactionStateErrorStatus;
    public $transactionStateErrorMsg;
}