<?php
/**
 * Created by PhpStorm.
 * User: yura_sultonov
 * Date: 5/23/19
 * Time: 3:25 PM
 */

namespace models\paynet;


class GetInformationRequest extends GenericRequest
{
    /**
     * @access public
     * @var integer
     */
    public $serviceId;
}