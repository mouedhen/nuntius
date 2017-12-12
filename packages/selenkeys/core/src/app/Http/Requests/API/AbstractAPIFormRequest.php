<?php
/**
 * AbastractAPIFormRequest.php
 * Project: nuntius
 */

namespace Selenkeys\Core\App\Http\Requests\API;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

abstract class AbstractAPIFormRequest extends FormRequest
{
    abstract public function rules();

    public function response(array $errors)
    {
        $data = [];
        foreach ($errors as $field => $message) {
            $data[] = [
                'field' => $field,
                'message' => $message[0]
            ];
        }
        return response()->json([
            'errors' => $data
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
    }
}