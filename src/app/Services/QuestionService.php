<?php

namespace App\Services;

use App\Models\Question;
use GuzzleHttp\Client;

class QuestionService extends ApiService
{

    protected $model = Question::class;

    protected function getOrderbyableFields(): array
    {
        return [

        ];
    }

    protected function fields(): array
    {
        return [
            'content', 'lecture_id', 'user_id', 'created_at',
        ];
    }

    public function generateText($question): string
    {
        return 'Văn bản bao gồm các tài liệu, tư liệu, giấy tờ có giá trị pháp lý nhất định, được sử dụng trong hoạt động của các cơ quan Nhà nước';

        $response = (new Client(['headers' => ['authorization' => 'Bearer '.env('OPEN_AI_KEY')]]))->post('https://api.openai.com/v1/chat/completions', [
            'json' => [
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => $question,
                    ]
                ],
                'temperature' => 0.5,
                'max_tokens' => 1000,
                'top_p' => 0.3,
                'frequency_penalty' => 0.5,
                'presence_penalty' => 0,
            ],
        ])->getBody()->getContents();
        $response = json_decode($response);

        return $response->choices[0]->message->content;
    }

}
