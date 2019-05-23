<?php
/**
 * Created by PhpStorm.
 * User: yura_sultonov
 * Date: 5/23/19
 * Time: 3:10 PM
 */

namespace models\paynet;


use DateTime;

class GenericResponse
{
    /**
     * @access public
     * @var string
     */
    public $errorMsg;
    /**
     * @access public
     * @var integer
     */
    public $status;
    /**
     * @access public
     * @var dateTime
     */
    public $timeStamp;
}
