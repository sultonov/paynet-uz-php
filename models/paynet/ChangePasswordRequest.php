<?php
/**
 * Created by PhpStorm.
 * User: yura_sultonov
 * Date: 5/23/19
 * Time: 6:42 PM
 */

namespace models\paynet;


class ChangePasswordRequest extends GenericRequest
{
    /**
     * @access public
     * @var string
     */
    public $newPassword;
}