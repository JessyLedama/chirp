<?php 

namespace App\Services;

class YoutubeService 
{
    // Function to extract YouTube video ID from URL
    private static function getYouTubeVideoId($url)
    {
        $videoId = '';

        $queryString = parse_url($url, PHP_URL_QUERY);
        if ($queryString) {
            parse_str($queryString, $params);
            if (isset($params['v'])) {
                $videoId = $params['v'];
            }
        }

        return $videoId;
    }

    public static function showVideo($video)
    {
        $url = $video->link;

        // Extract video ID from the URL
        $videoId = YoutubeService::getYouTubeVideoId($url);

        if($videoId) 
        {
            $embedUrl = "https://www.youtube.com/embed/{$videoId}";

            return $embedUrl;
        } 
        else {
            $imagePath = 'path_to_your_image.jpg'; // Replace with the path to your image

            return $imagePath;
        }
    }

    public static function slideshowVideo(array $slide)
    {
        $url = $slide->url;

        // Extract video ID from the URL
        $videoId = $this->getYouTubeVideoId($url);

        if($videoId) 
        {
            $embedUrl = "https://www.youtube.com/embed/{$videoId}";

            return $embedUrl;
        } 
        else {
            $imagePath = $slide->image;

            return $imagePath;
        }
    }

    public static function showPreview($video)
    {
        $url = $video->preview;

        // Extract video ID from the URL
        $videoId = YoutubeService::getYouTubeVideoId($url);

        if($videoId) 
        {
            $embedUrl = "https://www.youtube.com/embed/{$videoId}";

            return $embedUrl;
        } 
        else {
            $imagePath = $video->thumbnail; 

            return $imagePath;
        }
    }
}