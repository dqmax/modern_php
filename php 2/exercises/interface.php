<?php 

interface SocialMediaPublisher {
    public function publishPost($publisher, string $content, string $token);
}


class FacebookPublisher implements SocialMediaPublisher {
    public function publishPost($publisher, string $content, string $token){}
}

class LinkedInPublisher implements SocialMediaPublisher {
    public function publishPost($publisher, string $content, string $token){}
}
