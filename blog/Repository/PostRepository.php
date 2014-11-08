<?php

namespace Repository;

use Post\Post;

interface PostRepository {

    public function findPost($postId);

    public function savePost(Post $post);

}