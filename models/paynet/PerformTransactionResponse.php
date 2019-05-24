<?php
/**
 * Created by PhpStorm.
 * User: yura_sultonov
 * Date: 5/23/19
 * Time: 3:46 PM
 */

namespace models\paynet;


class PerformTransactionResponse extends GenericResponse
{
    /**
     * @access public
     * @var integer
     */
    public $providerTrnId;
}