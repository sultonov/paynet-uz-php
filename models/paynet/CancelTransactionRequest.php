<?php
/**
 * Created by PhpStorm.
 * User: yura_sultonov
 * Date: 5/23/19
 * Time: 2:57 PM
 */

namespace models\paynet;

use DateTime;

class CancelTransactionRequest extends GenericRequest
{
    /**
     * @access public
     * @var integer
     */
    public $serviceId;
    /**
     * @access public
     * @var integer
     */
    public $transactionId;
    /**
     * @access public
     * @var dateTime
     */
    public $transactionTime;
}