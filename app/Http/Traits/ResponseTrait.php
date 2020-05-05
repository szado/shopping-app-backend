<?php
namespace App\Http\Traits;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

/**
 * Trait ResponseTrait
 * @package App\Http\Traits
 */
trait ResponseTrait {
    /**
     * @var int
     */
    protected int $code = 200;
    /**
     * @var array
     */
    protected array $errors = [];
    /**
     * @var bool
     */
    protected bool $success = true;
    /**
     * @var
     */
    protected $data = [];

    /**
     * @return mixed
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * @param mixed $errors
     */
    public function setErrors($errors): void
    {
        $this->errors = $errors;
    }

    /**
     * @return mixed
     */
    public function getSuccess(): bool
    {
        return $this->success;
    }

    /**
     * @param mixed $success
     */
    public function setSuccess($success): void
    {
        $this->success = $success;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data): void
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code): void
    {
        $this->code = $code;
    }

    /**
     * @return array
     */
    public function baseResponse(): array {
        return [
            'code' => $this->getCode(),
            'success' => $this->getSuccess(),
            'errors' => $this->getErrors(),
            'data' => $this->getData()
        ];
    }

    public function exceptionResponse(): JsonResponse {
        return response()->json([
            'code' => $this->getCode(),
            'success' => $this->getSuccess(),
            'errors' => $this->getErrors()
        ]);
    }
}
