<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatbotConversation;

class ChatbotController extends Controller
{
    /**
     * Send a message to the chatbot.
     */
    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
            'language' => 'nullable|string|in:en,es,fr,de,it,pt,ru,zh,ja,ko,ar,hi',
        ]);

        $language = $request->get('language', 'en');
        $message = $request->get('message');

        // For now, return a simple response
        // In a real implementation, you would integrate with an AI service
        $response = $this->generateResponse($message, $language);

        // Store the conversation if user is authenticated
        if (auth()->check()) {
            ChatbotConversation::create([
                'user_id' => auth()->id(),
                'message' => $message,
                'response' => $response,
                'language' => $language,
            ]);
        }

        return response()->json([
            'response' => $response,
            'language' => $language,
        ]);
    }

    /**
     * Get available languages.
     */
    public function getLanguages()
    {
        return response()->json([
            'languages' => [
                ['code' => 'en', 'name' => 'English'],
                ['code' => 'es', 'name' => 'Spanish'],
                ['code' => 'fr', 'name' => 'French'],
                ['code' => 'de', 'name' => 'German'],
                ['code' => 'it', 'name' => 'Italian'],
                ['code' => 'pt', 'name' => 'Portuguese'],
                ['code' => 'ru', 'name' => 'Russian'],
                ['code' => 'zh', 'name' => 'Chinese'],
                ['code' => 'ja', 'name' => 'Japanese'],
                ['code' => 'ko', 'name' => 'Korean'],
                ['code' => 'ar', 'name' => 'Arabic'],
                ['code' => 'hi', 'name' => 'Hindi'],
            ]
        ]);
    }

    /**
     * Generate a simple response based on the message.
     */
    private function generateResponse(string $message, string $language): string
    {
        $message = strtolower($message);

        // Simple keyword-based responses
        if (strpos($message, 'scholarship') !== false) {
            return "I can help you find scholarships! You can browse our scholarship database or use the eligibility checker to find scholarships that match your profile.";
        }

        if (strpos($message, 'university') !== false) {
            return "I can help you explore universities! Check out our university database to find institutions that match your interests and requirements.";
        }

        if (strpos($message, 'application') !== false) {
            return "For application help, I recommend checking our community section where students share their experiences and advice about the application process.";
        }

        if (strpos($message, 'hello') !== false || strpos($message, 'hi') !== false) {
            return "Hello! I'm here to help you with your educational journey. You can ask me about scholarships, universities, applications, or any other questions you have.";
        }

        if (strpos($message, 'help') !== false) {
            return "I can help you with:\n• Finding scholarships\n• Exploring universities\n• Application guidance\n• General questions about studying abroad\n\nWhat would you like to know more about?";
        }

        // Default response
        return "I understand you're asking about: " . $message . ". While I'm still learning, I can help you find information about scholarships, universities, and study abroad opportunities. Feel free to explore our website or ask more specific questions!";
    }
}
