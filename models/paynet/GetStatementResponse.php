<?php
/**
 * Created by PhpStorm.
 * User: yura_sultonov
 * Date: 5/23/19
 * Time: 3:30 PM
 */

namespace models\paynet;


class GetStatementResponse extends GenericResponse
{
    /**
     * @access public
     * @var TransactionStatement[]
     */
    public $statements;
}