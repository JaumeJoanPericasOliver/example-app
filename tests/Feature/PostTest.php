<?php

use App\Models\Post;
use App\Models\User;

test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});


test('pagina posts', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/post');

    $response->assertStatus(200);
    $response->assertOk();

    $response->assertSee("Llistat de posts");
    $response->assertViewIs("post.index");

});


test('crear post', function () {

    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/post',[
        'title' => 'Test title',
        'url_clean' => 'test_title',
        'content'  => 'Test Content',
        'categories_id' => 2,
        'posted' => 'not'
    ]);

    $response->assertStatus(302);

   /* $post = Post::orderBy("id", "desc")->first();

    dd($post);

    $this->assertEquals($post->title, 'Test title');

    $post->delete();*/

    $response->assertSessionHas("status" , "<h1>Post creat correctament</h1>");
  });