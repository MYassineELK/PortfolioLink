<?php
// تأكد من صحة هذا المسار أيضاً
require_once __DIR__ . '/../IA/AIClient.php';

class chatboot {
    public function __construct()
    {
    }
    public static function chatboot($prompt) {
            $ai = new AIClient();
            return $ai->ask($prompt); 
       
    }
    public static function boi($prompt) {
            $ai = new AIClient();
            return $ai->generateBio($prompt); 
       
    }
}