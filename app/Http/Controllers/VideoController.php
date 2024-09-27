<?php

namespace App\Http\Controllers;

use App\Services\VideoService;
use Illuminate\Http\Request;

class VideoController extends Controller
{

    protected $videoService;

    public function __construct(VideoService $videoService)
    {
        $this->videoService = $videoService;
    }

    public function getAllVideos() {
        $result = $this->videoService->getAllVideo();
        return response()->json($result);
    }
}
