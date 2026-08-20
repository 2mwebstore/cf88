<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{
    /**
     * Handle voting for a video
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id Video ID
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $query = Video::query();
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
        $query->orderBy('id', 'desc');
        $perPage = $request->input('length', 10);
        $videos = $query->paginate($perPage)->appends([
            'search' => $request->search,
            'length' => $perPage
        ]);

        return view('admin/video/index', compact('videos'));
    }
    public function create()
    {
        return view('admin.video.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'message' => 'required|string|max:500',
            'url'     => 'required|string',
            'thumb'   => 'required|string',
        ]);

        $video = Video::create([
            'title'       => $request->title,
            'message'     => $request->message,
            'url'         => $request->url,
            'thumb'       => $request->thumb,
        ]);

        return redirect()->route('video')->with('success', 'Video created successfully.');
    }

    public function edit($id)
    {
        $Video = Video::findOrFail($id);
        return view('admin.video.edit', compact('Video'));
    }

    public function update(Request $request, $id)
    {
        $video = Video::findOrFail($id);

        $data = [
            'date'        => date('Y-m-d H:i:s', strtotime($request->date)),
            'url'         => $request->url,
            'thumb'       => $request->thumb,
            'title'       => $request->title,
            'message'     => $request->message,
        ];
        $video->update($data);

        return redirect()->route('video')->with('success', 'Video updated successfully.');
    }

    public function destroy($id)
    {
        $Video = Video::findOrFail($id);
        $Video->delete();
         Alert::success('Successful', 'Video deleted successfully.');
        return redirect()->route('video');
    }
        public function getindex()
    {
        // Get all videos with votes and percentages
        $videos = Video::all();

        return response()->json([
            'status' => true,
            'videos' => $videos
        ]);
    }
    public function vote(Request $request, $id)
    {
        $video = Video::findOrFail($id);

        // Check which vote type
        $voteType = $request->input('vote'); // 'red' or 'blue'

        if ($voteType === 'red') {
            $video->votes_red++;
        } elseif ($voteType === 'blue') {
            $video->votes_blue++;
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Invalid vote type.'
            ], 400);
        }

        // Update total and percentages
        $video->updateVotePercent();

        return response()->json([
            'status' => true,
            'video' => $video
        ]);
    }

        public function show($id)
    {
        $video = Video::findOrFail($id);
        return response()->json([
            'status' => true,
            'video' => $video
        ]);
    }


    public function getVideos()
    {
        $videos = [
            [
                'id'          => 1,
                'title'       => 'V168',
                'streamName'  => 'gv168',
                'channelName' => 'V168',
                'dataId'      => '47',
                'thumb'       => asset('images/channels/v168.jpg'),
                'message'     => '',
            ],
           
            [
                'id'          => 2,
                'title'       => 'SC',
                'streamName'  => 'fsc24cockfight',
                'channelName' => 'SC',
                'dataId'      => '43',
                'thumb'       => asset('images/channels/sc.jpg'),
                'message'     => '',
            ],
            [
                'id'          => 3,
                'title'       => 'SBB',
                'streamName'  => 'frmsbvdolive',
                'channelName' => 'SBB',
                'dataId'      => '8',
                'thumb'       => asset('images/channels/sbb.jpg'),
                'message'     => '',
            ],
            [
                'id'          => 4,
                'title'       => 'GW',
                'streamName'  => 'chgw24',
                'channelName' => 'GW',
                'dataId'      => '21',
                'thumb'       => asset('images/channels/gw.jpg'),
                'message'     => '',
            ],
            [
                'id'          => 5,
                'title'       => 'PH',
                'streamName'  => 'COCKFIGHPHH',
                'channelName' => 'PH',
                'dataId'      => '1',
                'thumb'       => asset('images/channels/ph.jpg'),
                'message'     => '',
            ],
        ];
    
        // votes_red / votes_blue / *_percent_vote are left out here since this
        // list is static — if you still want live voting per channel, keep
        // pulling those specific fields from your votes table and merge them
        // into each row before returning, e.g.:
        //
        // foreach ($videos as &$v) {
        //     $tally = Vote::where('channel_id', $v['id'])->selectRaw(
        //         "SUM(vote = 'red') as red, SUM(vote = 'blue') as blue"
        //     )->first();
        //     $v['votes_red']  = (int) $tally->red;
        //     $v['votes_blue'] = (int) $tally->blue;
        //     $total = $v['votes_red'] + $v['votes_blue'];
        //     $v['red_percent_vote']  = $total ? round($v['votes_red']  / $total * 100, 1) : 50;
        //     $v['blue_percent_vote'] = $total ? round($v['votes_blue'] / $total * 100, 1) : 50;
        // }
        // unset($v);
        //
        // Left as 0/50 defaults below so the frontend has something to render
        // even without wiring that up.
        foreach ($videos as &$v) {
            $v['votes_red'] = 0;
            $v['votes_blue'] = 0;
            $v['red_percent_vote'] = 50;
            $v['blue_percent_vote'] = 50;
        }
        unset($v);
    
        return response()->json([
            'status' => true,
            'videos' => $videos,
        ]);
    }


}
