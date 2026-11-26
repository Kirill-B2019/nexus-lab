<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\JsonResponse;

class ContactController extends Controller
{
    /**
     * GET /api/contact — метаданные формы.
     */
    public function info(): JsonResponse
    {
        return response()->json([
            'ok' => true,
            'service' => 'Лаборатория НЕКСУС — форма заявки',
            'methods' => ['POST'],
        ]);
    }

    /**
     * POST /api/contact — приём заявки на лабораторный спринт.
     *
     * В проде здесь была бы запись в БД / отправка в CRM.
     * Сейчас — валидация и подтверждение с тикетом.
     */
    public function store(ContactRequest $request): JsonResponse
    {
        $data = $request->validated();

        $ticket = 'NEX-'.strtoupper(base_convert((string) time(), 10, 36));

        return response()->json([
            'ok' => true,
            'ticket' => $ticket,
            'received_at' => now()->toIso8601String(),
            'summary' => [
                'name' => $data['name'],
                'email' => $data['email'],
                'project' => $data['project'],
                'message_length' => mb_strlen((string) ($data['message'] ?? '')),
            ],
        ], 201);
    }
}
