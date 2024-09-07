<?php

namespace App\Traits;

trait ResponseDataTraits
{
    private $HTTP_STATUS_CODE = [
        'OK' => 200,
        'CREATED' => 201,
        'ACCEPTED' => 202,
        'NO_CONTENT' => 204,
        'BAD_REQUEST' => 400,
        'UNAUTHORIZED' => 401,
        'FORBIDDEN' => 403,
        'NOT_FOUND' => 404,
        'CONFLICT' => 409,
        'INTERNAL_SERVER_ERROR' => 500,
    ];

    private $HTTP_STATUS_MESSAGE = [
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        204 => 'No Content',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        403 => 'Forbidden',
        404 => 'Not Found',
        409 => 'Conflict',
        500 => 'Internal Server Error',
    ];

    public function internalServerError($message)
    {
        return response()->json([
            'statusCode' => $this->HTTP_STATUS_CODE['INTERNAL_SERVER_ERROR'],
            'message' => $message
        ], $this->HTTP_STATUS_CODE['INTERNAL_SERVER_ERROR']);
    }

    private function getHttpMessage($statusCode)
    {
        return $this->HTTP_STATUS_MESSAGE[$statusCode];
    }

    public function responseData($statusCode, $message, $data = null)
    {
        return response()->json([
            'statusCode' => $statusCode,
            'statusMessage' => $this->getHttpMessage($statusCode),
            'message' => $message,
            'data' => $data
        ], $statusCode);
    }

    public function badRequest($message = "Bad Request")
    {
        return response()->json([
            'statusCode' => $this->HTTP_STATUS_CODE['BAD_REQUEST'],
            'statusMessage' => $this->getHttpMessage($this->HTTP_STATUS_CODE['BAD_REQUEST']),
            'message' => $message
        ], $this->HTTP_STATUS_CODE['BAD_REQUEST']);
    }

    public function notFound($message = "Data not found")
    {
        return response()->json([
            'statusCode' => $this->HTTP_STATUS_CODE['NOT_FOUND'],
            'statusMessage' => $this->getHttpMessage($this->HTTP_STATUS_CODE['NOT_FOUND']),
            'message' => $message
        ], $this->HTTP_STATUS_CODE['NOT_FOUND']);
    }

    public function conflict($message = "Conflict")
    {
        return response()->json([
            'statusCode' => $this->HTTP_STATUS_CODE['CONFLICT'],
            'statusMessage' => $this->getHttpMessage($this->HTTP_STATUS_CODE['CONFLICT']),
            'message' => $message
        ], $this->HTTP_STATUS_CODE['CONFLICT']);
    }
}
