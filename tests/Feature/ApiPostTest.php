<?php

use App\Models\User;

test('Test api', function () {
    
    $user = User::factory()->create();

    $response = $this->actingAs($user)->json('GET', 'api/post')
            ->assertStatus(200)
            ->assertJsonStructure([
                "data" => [
                    "identificador",
                    "titol",
                    "publicat",
                    "imatge" => [
                        "id",
                        "post_id",
                        "image",
                        "created_at",
                        "updated_at"
                    ],
                    "data_creacio",
                    "categoria" => [
                        "id",
                        "title"
                    ]
                ],
                "meta"
            ]);
});
