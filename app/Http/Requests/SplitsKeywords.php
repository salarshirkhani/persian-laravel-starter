<?php
namespace App\Http\Requests;

trait SplitsKeywords {
    public function addKeywordsToData($data) {
        if (!array_key_exists('keywords', $data))
            throw new \RuntimeException("ٰValidated data doesn't contain keywords key.");
        $data['keywords'] = array_filter(array_map('trim', preg_split('/[،,]/u', $data['keywords'])), function ($item) {
            return !empty($item);
        });
        return $data;
    }
}
