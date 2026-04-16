<?php
// تأكد من صحة هذا المسار أيضاً
require_once __DIR__ . '/../IA/AIClient.php';

class chatboot {
    public static function chatboot($prompt) {
      
            
            $ai = new AIClient();
            return $ai->ask($prompt); 
       
    }
}