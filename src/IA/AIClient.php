<?php
class AIClient {
    private string $apiKey;
    private string $url = "https://api.groq.com/openai/v1/chat/completions";
    public function __construct()
    {
        // استخدام dirname(__DIR__) لضمان الوصول للمسار الصحيح لملف الـ .env
        $envPath = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . '.env';
        
        if (!file_exists($envPath)) {
            $this->apiKey = '';
            return;
        }

        $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $env   = [];

        foreach ($lines as $line) {
            if (strpos($line, '=') !== false) {
                [$key, $value]   = explode('=', $line, 2);
                $env[trim($key)] = trim($value);
            }
        }

        $this->apiKey = $env['GROQ_API_KEY'] ?? '';
    }

    public function ask(string $prompt): string
    {
       
        
        // ── تحديد تعليمات النظام (التأطير) بناءً على مستند المشروع ──
        $systemInstructions = "
        أنت المساعد الذكي الرسمي لمنصة PortfolioLink.
        وصف المنصة: منصة رقمية لبناء ملفات تعريفية (Portfolios) احترافية تتكيف مع مهارات الطلاب.
        
        الإمكانيات التي يجب أن تشرحها للمستخدمين:
        1. للطلاب: إنشاء ملف شخصي، واستيراد البيانات تلقائياً من LinkedIn PDF[cite: 1, 6].
        2. إدارة المشاريع: رفع وإدارة المشاريع الفردية والجماعية (CRUD)[cite: 4, 6].
        3. الذكاء الاصطناعي: تقديم اقتراحات ذكية للمهارات بناءً على محتوى الملف الشخصي[cite: 6].
        4. للأكاديميين: لوحة تحكم للأساتذة لتقييم المهارات والمصادقة عليها[cite: 4, 6].
        5. للشركات: محرك بحث متقدم للوصول للمواهب بناءً على فلاتر المهارات[cite: 4, 6].

        فريق العمل:
        - محمد ياسين القنفودي: مسؤول عن ملف تعريف الطالب، الأمان، واستيراد PDF[cite: 1, 4].
        - عادل أباركي: مسؤول عن إدارة المشاريع والربط بين المستخدمين.
        - دعاء لوليدي: مسؤولة عن نظام التقييم الأكاديمي ولوحة تحكم الأساتذة.
        - نجوى أمغار: مسؤولة عن بوابة الشركات ومحرك البحث المتقدم.

        قواعد الإجابة:
        - أجب فقط عما يتعلق بـ PortfolioLink وإمكانياتها.
        - كن احترافياً وودوداً.
        - إذا سُئلت عن موعد الإطلاق: النسخة النهائية ستكون جاهزة في 12 مايو 2026.
        ";

        $data = [
            "model"    => "llama-3.3-70b-versatile",
            "messages" => [
                ["role" => "system", "content" => $systemInstructions],
                ["role" => "user", "content" => $prompt]
            ],
            "temperature" => 0.6 // توازن بين الإبداع والدقة
        ];

        $ch = curl_init($this->url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => json_encode($data),
            CURLOPT_HTTPHEADER     => [
                "Content-Type: application/json",
                "Authorization: Bearer {$this->apiKey}"
            ],
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_TIMEOUT        => 30,
        ]);

        $exec = curl_exec($ch);
        $response = json_decode($exec, true);
        curl_close($ch);

        if (isset($response['error'])) {
            return "خطأ: " . $response['error']['message'];
        }

        return $response['choices'][0]['message']['content'] ?? "لم أتمكن من الحصول على رد حالياً.";
    }
     public function generateBio(string $prompt): string
    {
        
        
        // ── تحديد تعليمات النظام (التأطير) بناءً على مستند المشروع ──
        $systemInstructions = "";

        $data = [
            "model"    => "llama-3.3-70b-versatile",
            "messages" => [
                ["role" => "system", "content" => $systemInstructions],
                ["role" => "user", "content" => $prompt]
            ],
            "temperature" => 0.6 // توازن بين الإبداع والدقة
        ];

        $ch = curl_init($this->url );
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => json_encode($data),
            CURLOPT_HTTPHEADER     => [
                "Content-Type: application/json",
                "Authorization: Bearer {$this->apiKey}"
            ],
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_TIMEOUT        => 30,
        ]);

        $exec = curl_exec($ch);
        $response = json_decode($exec, true);
        curl_close($ch);

        if (isset($response['error'])) {
            return "خطأ: " . $response['error']['message'];
        }

        return $response['choices'][0]['message']['content'] ?? "لم أتمكن من الحصول على رد حالياً.";
    }
}