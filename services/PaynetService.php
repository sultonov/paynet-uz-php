<?php
/**
 * Created by PhpStorm.
 * User: yura_sultonov
 * Date: 5/22/19
 * Time: 9:51 PM
 */

namespace services;

use Constants;
use models\paynet\CancelTransactionRequest;
use models\paynet\CancelTransactionResponse;
use models\paynet\ChangePasswordRequest;
use models\paynet\CheckTransactionRequest;
use models\paynet\CheckTransactionResponse;
use models\paynet\GenericRequest;
use models\paynet\GenericResponse;
use models\paynet\GetInformationRequest;
use models\paynet\GetInformationResponse;
use models\paynet\GetStatementRequest;
use models\paynet\GetStatementResponse;
use models\paynet\PerformTransactionRequest;
use models\paynet\PerformTransactionResponse;
use models\paynet\Statuses;
use models\TransactionStatus;

class PaynetService
{
    /**
     * Доступные IP адреса
     * @var string[]
     */
    private $allowedIps = [];
    /**
     * Сервис для обработки логики транзакции
     * @var PaymentService
     */
    private $paymentService;

    public function __construct()
    {
        $this->paymentService = new PaymentService();
    }

    /**
     * проведение финансовой операции в счет поставщика услуг
     * @param $args
     * @return PerformTransactionResponse
     */
    public function PerformTransaction($args)
    {
        $request = PerformTransactionRequest::create($args);
        $response = new PerformTransactionResponse();
        $response->status = $this->validateArguments($request);
        if (is_array($request->parameters) && isset($arguments->parameters[0])) {
            $client = $request->parameters[0]->paramValue;
        } else {
            $client = $request->parameters->paramValue;
        }
        if (empty($request->amount) || empty($client)
            || empty($request->transactionId) || empty($request->transactionTime)) {
            $response->status = Statuses::STATUS_MISSING_PARAMETERS;
        }
        if ($this->getAmount($request->amount) < Constants::MINIMUM_AMOUNT) {
            $response->status = Statuses::STATUS_INVALID_AMOUNT;
        }
        if (!$this->paymentService->isUserOrServiceExist($client))
            $response->status = Statuses::STATUS_UNKNOWN_USER;
        if ($response->status == Statuses::STATUS_OK) {
            if ($this->paymentService->isRemoteTransactionIdExist($request->transactionId))
                $response->status = Statuses::STATUS_TRANSACTION_ALREADY_CREATED;
            else {
                if (!$this->paymentService->createTransaction(
                    $request->transactionId,
                    $this->getAmount($request->amount),
                    $client,
                    $request->transactionTime
                ))
                    $response->status = Statuses::STATUS_SYSTEM_ERROR;
            }
        }
        $request->transactionTime = new \DateTime();
        $response->providerTrnId = $request->transactionId;
        $response->errorMsg = Statuses::getMessage($response->status);
        return $response;
    }

    /**
     * @param GenericRequest $arguments
     * @return int
     */
    protected function validateArguments(GenericRequest $arguments)
    {
        if (!$this->isAllowedIp()) {
            return Statuses::STATUS_ACCESS_DENIED;
        } elseif ($arguments->username != Constants::PAYNET_USERNAME) {
            return Statuses::STATUS_USER_NOT_FOUND;
        } elseif ($arguments->password != Constants::PAYNET_PASSWORD) {
            return Statuses::STATUS_ACCESS_DENIED;
        } elseif ($arguments->serviceId != Constants::PAYNET_SERVICE_ID) {
            return Statuses::STATUS_OUTSIDE_THE_SERVICE_ARIA;
        } else {
            return Statuses::STATUS_OK;
        }

    }

    /**
     * @return bool
     */
    protected function isAllowedIp()
    {
        if (empty($this->allowedIps)) {
            return true;
        }
        return in_array($_SERVER['REMOTE_ADDR'], $this->allowedIps);
    }

    /**
     * конвертировать сумму от тийинах
     * @param $amount
     * @return float|int
     */
    protected function getAmount($amount)
    {
        return ($amount / 100);
    }

    /**
     * проверка состояния финансовой операции
     * @param $args
     * @return CheckTransactionResponse
     */
    public function CheckTransaction($args)
    {
        $request = CheckTransactionRequest::create($args);
        $response = new CheckTransactionResponse();
        $response->status = $this->validateArguments($request);
        if (!$request->transactionId) {
            $response->status = Statuses::STATUS_MISSING_PARAMETERS;
        }
        $response->providerTrnId = 0;
        $response->transactionState = 1;
        $response->transactionStateErrorStatus = 0;
        $response->transactionStateErrorMsg = "Success";
        if ($response->status == Statuses::STATUS_OK) {
            if (!$this->paymentService->isRemoteTransactionIdExist($request->transactionId)) {
                $response->transactionStateErrorMsg = "Transaction not found";
                $response->status = Statuses::STATUS_TRANSACTION_NOT_FOUND;
            } else {
                $payment = $this->paymentService->getPaymentByRemoteTransactionId($request->transactionId);
                $response->providerTrnId = $payment->id;
                if ($payment->status == TransactionStatus::CANCELLED) {
                    $response->transactionState = 2;
                    $response->transactionStateErrorStatus = 1;
                }
            }
        }
        $request->transactionTime = new \DateTime();
        $response->errorMsg = Statuses::getMessage($response->status);
        return $response;
    }

    /**
     * изменение пароля (метод необязательный, можно удалить его)
     * @param $args
     * @return GenericResponse
     */
    public function ChangePassword($args)
    {
        $request = ChangePasswordRequest::create($args);
        // TODO логика для изменение пароля


        $response = new GenericResponse();
        $response->status = $this->validateArguments($request);
        $response->errorMsg = Statuses::getMessage($response->status);
        $response->timeStamp = new \DateTime();
        return $response;
    }

    /**
     * отмена финансовой операции
     * @param $args
     * @return CancelTransactionResponse
     */
    public function CancelTransaction($args)
    {
        $request = CancelTransactionRequest::create($args);
        $response = new CancelTransactionResponse();
        $response->status = $this->validateArguments($request);
        if (!$request->transactionId) {
            $response->status = Statuses::STATUS_MISSING_PARAMETERS;
        }
        $response->transactionState = 0;
        if ($response->status == Statuses::STATUS_OK) {
            if (!$this->paymentService->isRemoteTransactionIdExist($request->transactionId)) {
                $response->status = Statuses::STATUS_TRANSACTION_NOT_FOUND;
            } else {
                $payment = $this->paymentService->getPaymentByRemoteTransactionId($request->transactionId);
                if ($payment->status == TransactionStatus::CANCELLED) {
                    $response->status = Statuses::STATUS_TRANSACTION_CANCELED;
                } else {
                    if ($this->paymentService->cancelByRemoteTransactionId($request->transactionId))
                        $response->transactionState = 2;
                    else {
                        $response->status = Statuses::STATUS_SYSTEM_ERROR;
                    }
                }
            }
        }
        $response->errorMsg = Statuses::getMessage($response->status);
        $response->timeStamp = new \DateTime();
        return $response;
    }

    /**
     * получение сверочной информации по проведенным финансовым операциям за период
     * @param $args
     * @return GetStatementResponse
     */
    public function GetStatement($args)
    {
        $request = GetStatementRequest::create($args);
        $response = new GetStatementResponse();
        $response->status = $this->validateArguments($request);
        if (empty($request->dateFrom) || empty($request->dateTo)) {
            $response->status = Statuses::STATUS_MISSING_PARAMETERS;
        }
        if ($response->status == Statuses::STATUS_OK) {
            $response->statements = $this->paymentService
                ->getStatements($request->dateFrom, $request->dateTo);
        }
        $response->errorMsg = Statuses::getMessage($response->status);
        $response->timeStamp = new \DateTime();
        return $response;
    }

    /**
     * получение справочной информации
     * @param $args
     * @return GetInformationResponse
     */
    public function GetInformation($args)
    {
        $request = GetInformationRequest::create($args);
        $response = new GetInformationResponse();
        $response->status = $this->validateArguments($request);
        if (is_array($request->parameters) && isset($request->parameters[0])) {
            $client = $request->parameters[0]->paramValue;
        } elseif (isset($request->parameters->paramValue)) {
            $client = $request->parameters->paramValue;
        } else {
            $client = 0;
            $response->status = Statuses::STATUS_MISSING_PARAMETERS;
        }
        if ($response->status == Statuses::STATUS_OK) {
            if (!$this->paymentService->isUserOrServiceExist($client))
                $response->status = Statuses::STATUS_UNKNOWN_USER;
            else {
                $response->parameters = $this->paymentService->getUserOrServiceParams($client);
            }
        }
        $response->errorMsg = Statuses::getMessage($response->status);
        $response->timeStamp = new \DateTime();
        return $response;
    }
}