<?php
/**
 * Created by PhpStorm.
 * User: yura_sultonov
 * Date: 5/23/19
 * Time: 3:26 PM
 */

namespace models\paynet;


use DateTime;

class GetStatementRequest extends GenericRequest
{
    /**
     * @access public
     * @var dateTime
     */
    public $dateFrom;
    /**
     * @access public
     * @var dateTime
     */
    public $dateTo;
    /**
     * @access public
     * @var integer
     */
    public $serviceId;
    public $onlyTransactionId;
}