<?php
/**
 * Created by PhpStorm.
 * User: yura_sultonov
 * Date: 5/23/19
 * Time: 3:14 PM
 */

namespace models\paynet;


class CancelTransactionResponse extends GenericResponse
{
    /**
     * @access public
     * @var integer
     */
    public $transactionState;
}