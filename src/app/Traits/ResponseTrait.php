<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseCode;

trait ResponseTrait
{
    //Format return json
    private function json($code = null, $message = null, $data = null): JsonResponse
    {
        return response()->json(['code' => $code, 'message' => $message, 'data' => $data]);
    }

    //Return Code 200 Success get data
    public function success($data, $message = 'OK'): JsonResponse
    {
        return $this->json(ResponseCode::HTTP_OK, $message, $data);
    }

    //Return Code 201 Success create
    public function created($data, $message = 'Record has been created.'): JsonResponse
    {
        return $this->json(ResponseCode::HTTP_CREATED, $message, $data);
    }

    //Return Code 202 Success update data
    public function updated($data, $message = 'Record has been updated.'): JsonResponse
    {
        return $this->json(ResponseCode::HTTP_ACCEPTED, $message, $data);
    }

    //Return Code 204 Success delete
    public function deleted($data = '', $message = 'Record has been deleted.'): JsonResponse
    {
        return $this->json(ResponseCode::HTTP_NO_CONTENT, $message, $data);
    }

    //Return Code 500 Serve error
    public function error($message = "Something went wrong!"): JsonResponse
    {
        return $this->json(ResponseCode::HTTP_INTERNAL_SERVER_ERROR, $message);
    }

    //Return Code 400 Bad Request
    public function badRequest($message = 'Bad Request'): JsonResponse
    {
        return $this->json(ResponseCode::HTTP_BAD_REQUEST, $message);
    }

    //Return Code 422 unprocessable
    public function unprocessable($message = 'Unprocessable Entity Request'): JsonResponse
    {
        return $this->json(ResponseCode::HTTP_UNPROCESSABLE_ENTITY, $message);
    }

    //Return Code 404 data not found
    public function notFound($message = 'Record not found', $data = null): JsonResponse
    {
        return $this->json(ResponseCode::HTTP_NOT_FOUND, $message, $data);
    }
}
