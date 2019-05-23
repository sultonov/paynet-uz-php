<?php
/**
 * Created by PhpStorm.
 * User: yura_sultonov
 * Date: 5/23/19
 * Time: 3:08 PM
 */

namespace models\paynet;


abstract class GenericRequest
{
    /**
     * Пароль
     * @access public
     * @var string
     */
    public $password;
    /**
     * Имя пользователя
     * @access public
     * @var string
     */
    public $username;
    /**
     * Перечень дополнительных параметров
     * @access public
     * @var GenericParam[]|GenericParam
     */
    public $parameters;
    /**
     * Идентификатор сервиса
     * @access public
     * @var integer
     */
    public $serviceId;
    public static function create(\StdClass $data)
    {
        $class = new static();
        foreach ($data as $key => $value) {
            if (property_exists($class, $key)) {
                if (in_array($key, ['dateFrom', 'dateTo', 'transactionTime']))
                    $class->{$key} = new \DateTime($value);
                else
                    $class->{$key} = $value;
            }
        }
        return $class;
    }
}
