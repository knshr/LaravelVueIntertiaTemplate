<?php

namespace App\Traits;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\JsonResponse;

trait ResponsesJson
{
    public function response(
        $isSucessful,
        $data,
        $message, 
        $errors,
        $responseCode = Response::HTTP_OK
    ) {
        return new JsonResponse(
            array(
                'isSuccessful' => $isSucessful,
                'values' => $data,
                'message' => $message,
                'errors' => $errors
            ),
            $responseCode
        );
    }

    public function successfulResponse($data = null, $message = 'Request success.')
    {
        return $this->response(true, $data, $message, array(), Response::HTTP_OK);
    }

    public function noEntryFoundResponse($errors = array(), $message = 'No entry found.')
    {
        return $this->response(false, array(), $message, $errors, Response::HTTP_NOT_FOUND);
    }

    public function errorResponse($errors = array(), $message = 'Request failed.')
    {
        return $this->response(false, array(), $message, $errors, Response::HTTP_BAD_REQUEST);
    }

    public function notAuthorizedResponse($message = 'You are not authorized to access this page.')
    {
        return $this->response(false, array(), $message, array(), Response::HTTP_UNAUTHORIZED);
    }

    public function createdResponse($data = null, $message = 'Resource created.')
    {
        return $this->response(true, $data, $message, array(), Response::HTTP_CREATED);
    }

    public function noContentResponse($data = null, $message = 'No content.')
    {
        return $this->response(true, $data, $message, array(), Response::HTTP_NO_CONTENT);
    }
}