<?php

namespace App\Services;

use Gemini\Laravel\Facades\Gemini;
use Gemini\Data\Blob;
use Gemini\Enums\MimeType;

class GeminiService
{
    public function analyzeImage(string $imageUrl)
    {
      $prompt = "retorne um json com os dados";
      $imageBlob = new Blob(
        mimeType: MimeType::IMAGE_JPEG,
        data: base64_encode(file_get_contents($imageUrl))
      );

      $result = Gemini::geminiProVision()->generateContent(
        [
          $prompt,
          $imageBlob
        ]
      );
      return $result->text();
    }

    public function analyzeImage2(?string $imageUrl)
    {
        if ($imageUrl === null) {
            // Handle null value gracefully, e.g., throw an exception or return an error message.
            throw new \InvalidArgumentException(' Image URL cannot be null.');
        }

        $prompt = "Describe this image. Answer in Portuguese.";
        $imageBlob = new Blob(
            mimeType: MimeType::IMAGE_JPEG,
            data: base64_encode(file_get_contents($imageUrl))
        );

        $result = Gemini::geminiProVision()->generateContent([$prompt, $imageBlob]);

        return $result->text();
    }
}
