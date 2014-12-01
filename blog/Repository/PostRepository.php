<?php

namespace Blog\Repository;

use Blog\Post\Post;

interface PostRepository {

    public function findPost($postId);

    public function savePost(Post $post);

}