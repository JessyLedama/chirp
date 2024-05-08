<?php 

namespace App\Services;

use App\Models\Video;

class VideoService
{
    // get all videos
    public static function videos()
    {
        $videos = Video::all();

        return $videos;
    }

    // search for a video
    public static function search($id)
    {
        $video = Video::find($id);

        return $video;
    }

    // search for a video by slug
    public static function searchBySlug($slug)
    {
        $video = Video::where('slug', 'LIKE', "%$slug%")->with(['comments.user'])->first();

        return $video;
    }

    // search for a video by slug
    public static function searchByName($validated)
    {
        $name = $validated['search'];

        $videos = Video::where('name', 'LIKE', "%$name%")->get();

        return $videos;
    }

    // store a new video
    public static function store($validated)
    {
        $slug = SlugService::make($validated['name']);

        if(isset($validated['thumbnail']))
        {
            $thumbnail = $validated['thumbnail']->store('thumbnails', ['disk' => 'public']);
        }

        $videoData = [
            'name' => $validated['name'],
            'slug' => $slug,
            'thumbnail' => $thumbnail ?? '',
            'link' => $validated['link'],
            'category_id' =>$validated['category_id'],
            'preview' => $validated['preview'],
        ];

        $video = Video::create($videoData);

        return $video;
    }

    // returns the count of videos
    public static function count()
    {
        $count = Video::count();

        return $count;
    }

    // get featured videos
    public static function featured()
    {
        $category = VideoCategoryService::featured();

        // $videos = Video::where('category_id', $category->id)
        //                 ->with(['category'])
        //                 ->get();

        $videos = Video::inRandomOrder()->limit(6)->get();

        return $videos;
    }

    // get top videos
    public static function topVideos()
    {
        $category = VideoCategoryService::topVideos();

        $videos = Video::where('category_id', $category->id)
                        ->with(['category'])
                        ->get();

        return $videos;
    }

    // get featured videos
    public static function latestVideos()
    {
        $category = VideoCategoryService::featured();

        if(!$category == null)
        {
            $videos = Video::where('category_id', $category->id)
            ->with(['category'])
            ->get();

            return $videos;
        }
        else{
            return null;
        }
    }

    public static function update(array $validated)
    {
        $video = Video::find($validated['id']);

        if(isset($validated['thumbnail']))
        {
            $thumbnail = $validated['thumbnail']->store('thumbnails', ['disk' => 'public']);

            $validated['thumbnail'] = $thumbnail;
        }

        unset($validated['id']);

        $video->update($validated);

        return $video;
    }

    public static function delete($id)
    {
        // find the video
        $video = Video::find($id);

        // delete the video if it exists
        if($video)
        {
            $video->delete();
        }

        return response()->json(['message' => 'Deleted'], 200);
    }

    public static function allPlaylistVideos($playlistId)
    {
        // get the playlist
        $apiKey = "AIzaSyBG-CB_X9e3YPTho-vUqfsItveEHXCdzr8";
        $client = new Google_Client();
        $client->setDeveloperKey($apiKey);

        $youtube = new Google_Service_YouTube($client);

        $playlistId = "PLTcSrz4JaoGFe9Z3bTVyjHILhdCnKu7jE";

        $params = [
            'playlistId' => $playlistId,
            'maxResults' => 50,
            'part' => 'snippet',
        ];

        do {
            // Retrieve playlist items
            $playlistItems = $youtube->playlistItems->listPlaylistItems('snippet', $params);
    
            // Iterate through each item and collect video details
            foreach ($playlistItems as $playlistItem) {
                $videos[] = [
                    'title' => $playlistItem->snippet->title,
                    'videoId' => $playlistItem->snippet->resourceId->videoId,
                ];
            }
    
            // Get the next page token for pagination
            $nextPageToken = $playlistItems->getNextPageToken();
    
            // Set the page token for the next request
            $params['pageToken'] = $nextPageToken;
    
        } while ($nextPageToken);
    
        return $videos;
    }
}