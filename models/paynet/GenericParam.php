<?php
/**
 * Created by PhpStorm.
 * User: yura_sultonov
 * Date: 5/23/19
 * Time: 3:06 PM
 */

namespace models\paynet;


class GenericParam
{
    /**
     * @access public
     * @var string
     */
    public $paramKey;
    /**
     * @access public
     * @var string
     */
    public $paramValue;

    public function __construct($paramKey = "", $paramValue = "")
    {
        $this->paramKey = $paramKey;
        $this->paramValue = $paramValue;
    }
}