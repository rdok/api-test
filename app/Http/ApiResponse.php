<?php

namespace App\Http;

/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/9/17
 */

trait ApiResponse
{
    protected $statusCode = 200;

    public function respondNotFound($message = null)
    {
        $message = $message === null ? 'Not Found.' : $message;

        return $this->setStatusCode(404)->respondWithError($message);
    }

    public function respondWithError($message)
    {
        return $this->respond([
            'error' => [
                'message' => $message,
                'status_code' => $this->statusCode,
            ],
        ], [], $this->statusCode);
    }

    public function respond($data, $headers = [], $code = 200)
    {
        return response()->json($data, $code, $headers);
    }

    public function respondWithSuccess(
        $message = 'Request processed successfully.')
    {
        return $this->respond([
            'success' => [
                'message' => $message,
                'status_code' => $this->getStatusCode(),
            ],
        ]);
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    public function respondUnprocessableEntity($message)
    {
        return $this->setStatusCode(422)
            ->responseWithValidationErrors($message);

    }

    private function responseWithValidationErrors($message)
    {
        return $this->respondWithError($message);
    }
}
