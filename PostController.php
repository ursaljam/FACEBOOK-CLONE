<?php
include_once '../config.php';
include_once '../models/Post.php';

class PostController {

    public function createPost($user_id, $content) {
        $post = new Post($GLOBALS['conn']);
        $post->user_id = $user_id;
        $post->content = $content;
        if ($post->createPost()) {
            return "Post created successfully!";
        } else {
            return "Error in creating post.";
        }
    }

    public function getPosts() {
        $post = new Post($GLOBALS['conn']);
        $posts = $post->getAllPosts();
        return $posts;
    }
}
?>
