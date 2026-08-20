@section('client-livestreams', 'active')
@extends('client.layouts.app')
  <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
@section('content')
<style>
    .wrapper {
        display: grid;
        grid-template-columns: 2fr 0.7fr;
        grid-gap: 30px;
    }


    .brd-5 {
        border-radius: 5px;
    }
    .grid-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-gap: 10px;
    }
    .grid-2 img{
        border-radius: 5px;
    }
    .line-1{
        display: -webkit-box;
        -webkit-line-clamp: 1;
        overflow: hidden;
        -webkit-box-orient: vertical;
        text-overflow: ellipsis;
        font-size: 20px;
    }

    .image-container {
        position: relative;
    }
    .text-overlay {
        position: absolute;
        left: 0;
        color: black;
        padding: 10px;
        bottom: 30px;
        background-color: #fcd44c;
    }
    @media screen and (max-width: 1400px) {
      .video-hls-supported{
        height: 400px !important;
      }
    }
    @media screen and (max-width: 1200px) {
      .video-hls-supported{
        height: 335px !important;
      }
    }
    @media screen and (max-width: 1000px) {
        .fb-plugin {
            display: none !important;
        }
        .wrapper {
            display: grid;
            grid-template-columns: 1fr !important;
        }
        .line-1{
            font-size: 19px !important;
        }
        .text-overlay {
            bottom: 28.5px;
        }
    }
    @media screen and (max-width: 900px) {
        .line-1{
            font-size: 18px !important;
        }
        .text-overlay {
            bottom: 27px;
        }
    }
    @media screen and (max-width: 768px) {
        .video-hls-supported{
          height: 260px !important;
        }
    }
    @media screen and (max-width: 700px) {
        .line-1{
            font-size: 17px !important;
        }
        .text-overlay {
            bottom: 25.5px;
        }
    }
    @media screen and (max-width: 500px) {
        .grid-2 {
            display: grid;
            grid-template-columns: 1fr !important;
        }
    }
    @media screen and (max-width: 400px) {
    
    }
    a:hover .color-brand {
        color: #2f2151 !important;
    }
    a:hover .text-overlay, a:hover #format-date{
        color: #2f2151 !important;
    }
</style>
<style>
        #player-container {
          position: relative;
          width: 100%;
          overflow: hidden;
        }

        video {
          width: 100%;
          height: auto;
        }
        .video-hls-supported{
          height: 500px;
        }
        #thumbnail {
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          transition: opacity 0.5s ease;
      }

        /* Live Badge */
        .hlb-live-badge {
          position: absolute;
          top: 10px;
          left: 10px;
          display: flex;
          align-items: center;
          background: rgba(0, 0, 0, 0.6);
          padding: 5px 10px;
          border-radius: 20px;
          font-weight: bold;
          font-size: 14px;
        }

        .hlb-live-badge .dot {
          width: 10px;
          height: 10px;
          background-color: red;
          border-radius: 50%;
          margin-right: 6px;
          animation: blink 1s infinite;
        }

        @keyframes blink {
          0%, 50%, 100% { opacity: 1; }
          25%, 75% { opacity: 0; }
        }
        .mute-btn {
          position: absolute;
          top: 45px;
          left: 10px;
          display: flex;
          background: rgba(0, 0, 0, 0.6);
          border: 1px solid #555;
          color: #fff;
          border-radius: 50%;
          padding: 10px;
          font-size: 13px;
          cursor: pointer;
          transition: background 0.3s;
          width: 40px;
          height: 40px;
          text-align: center;
          align-items: center;
          justify-content: center;
        }

        .mute-btn:hover {
          border: 1px solid #ffeb3b;
        }
        .channel-list {
          margin-bottom: 5px;
          display: flex;
          flex-wrap: wrap;
          justify-content: start;
          gap: 5px;
        }

        .btn-next-category {
                                background: linear-gradient(118deg, #283046, rgb(3 3 5));


                font-weight: 400;
                border-radius: 4px;
            }
            .btn-next-category:hover , .btn-next-category.active {
                background: linear-gradient(118deg, #ff3e3e, rgb(255 110 110));

                                font-weight: 400;
                                border-radius: 4px;
                            }
        .vote-container {
      display: flex;
      align-items: center;
      justify-content: space-between;
      background: #111b2e;
      padding: 10px 15px;
      width: 100%;
    }

    .side {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      width: 60px;
      height: 60px;
      border-radius: 50%;
      font-weight: bold;
      font-size: 16px;
      cursor: pointer;
    }

    .red-side {
      background: linear-gradient(145deg, #ff4a4a, #ff0000);
      border: 2px solid #ff4a4a;
      border-color: #ff9090;
    }

    .blue-side {
      
      background: linear-gradient(145deg, #0055ff, #3399ff);
      border-color: #93c5fd;
      border: 2px solid #93c5fd;

    }

    .heart {
      font-size: 20px;
    }

    .bar {
      flex: 1;
      height: 35px;
      margin: 0 10px;
      border-radius: 20px;
      background: linear-gradient(to right, #ff3d3d 50%, #007bff 50%);
      position: relative;
      overflow: hidden;
    }

    .bar-red {
      background: linear-gradient(90deg, #ff3d3d, #ff7575);
      height: 100%;
      position: absolute;
      left: 0;
      top: 0;
      width: 50%;
      border-top-left-radius: 20px;
      border-bottom-left-radius: 20px;
      transition: width 0.5s ease;
    }

    .bar-blue {
      background: linear-gradient(90deg, #3b82f6, #1d4ed8);
      height: 100%;
      position: absolute;
      right: 0;
      top: 0;
      width: 50%;
      border-top-right-radius: 20px;
      border-bottom-right-radius: 20px;
      transition: width 0.5s ease;
    }
    .bar-icons-left{
      text-align: end;
    }
    .bar-icons-right{
      text-align: start;
    }
    .bar-icons {
      margin-top: 2.5px;
    }

    .icon {
      width: 25px;
    }

    .stats {
      display: flex;
      justify-content: space-between;
      width: 100%;
      font-size: 14px;
      color: #c0c0c0;
    }

    .stats span strong {
      color: white;
    }

    .red-text {
      color: #ff5252;
    }

    .blue-text {
      color: #3b82f6;
    }

    .total {
      color: #aaa;
    }

    .heart-float {
      position: absolute;
      font-size: 18px;
      color: #ff4a4a;
      animation: floatUp 1s ease-out forwards;
      pointer-events: none;
      z-index: 9999;
    }

    @keyframes floatUp {
      0% {
        opacity: 1;
        transform: translateY(0) scale(1);
      }
      50% {
        opacity: 1;
        transform: translateY(-20px) scale(1.2);
      }
      100% {
        opacity: 0;
        transform: translateY(-50px) scale(1);
      }
    }

    .coming-soon {
      position: absolute;
      z-index: 5;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%) scale(1);
      font-weight: 800;
      letter-spacing: 1px;
      font-size: 2.1rem;
      color: #ffffff;
      text-align: center;
      pointer-events: none;
      transition: opacity 300ms ease, transform 400ms cubic-bezier(.2,.9,.3,1);
      text-shadow: 0 6px 18px rgba(0,0,0,0.6), 0 1px 0 rgba(255,255,255,0.02);
      padding: 8px 14px;
      border-radius: 8px;
      backdrop-filter: blur(2px);
      /* faint background to help readability */
      background: linear-gradient(180deg, rgba(0,0,0,0.25), rgba(0,0,0,0.35));
      animation: pulseText 1.8s ease-in-out infinite;
    }

    @keyframes pulseText {
      0%   { transform: translate(-50%, -50%) scale(1.00); }
      50%  { transform: translate(-50%, -50%) scale(1.04); }
      100% { transform: translate(-50%, -50%) scale(1.00); }
    }
</style>
<style>
     #liveIframe {
        width: 100%;
        aspect-ratio: 16 / 9;
        border: 0;
        border-radius: 5px;
        display: block;
        margin: 0 auto; /* center it within #player-container */
        position: relative;
    }
    #player-container:hover .hlb-live-badge{
        display: none;
    }
</style>
      <div class="container mt-75">
        <div class="wrapper">
            <div>
                <div class="bennertitle mt-2 mb-2" style="padding: 11px;">
                    <i class="fas fa-television"></i>
                    @lang('home.list livestream')
                </div>
                <div class="channel-list mt-2"></div>
                 <div class="row g-0">
                    <div class="col-12 p-0"> 
                      <div id="player-container">
                          <div id="comingSoon" class="coming-soon" style="opacity: 0;"></div>
                          <img id="thumbnail" src="" alt="Channel Thumbnail">
                          <!-- video/HLS.js removed — iframe is now the only player -->
                          <iframe id="liveIframe" allowfullscreen></iframe>
                          <div class="hlb-live-badge">
                          <span class="dot"></span>
                          <span class="txt">LIVE</span>
                          </div>
                          <!-- mute button removed: JS can't control audio inside a
                              cross-origin iframe (browser security), so it had no
                              effect once the player stopped being a <video> tag -->
  
                                              <!-- <button id="fullscreenBtn" style="
                          position: absolute;
                          bottom: 5px;
                          right: 10px;
                          background: transparent;
                          border: none;
                          color: white;
                          cursor: pointer;
                          font-size: 25px;
                      ">
                          ⛶
                      </button> -->
                      </div>
                    </div>
                  </div>
 
                  @if (Auth::guest())
                      <div class="vote-container">
                        <div class="side red-side" id="voteRed" data-bs-toggle="modal" data-bs-target="#loginModal">
                          <div class="heart"><i class="fas fa-heart"></i></div>
                          <div class="score" id="redScore">0</div>
                        </div>
 
                        <div class="bar">
                          <div class="bar-red" style="width: 50%;">
                            <div class="bar-icons bar-icons-left">
                              <img src="/icon/left.png" class="icon">
                            </div>
                          </div>
                          <div class="bar-blue" style="width: 50%;">
                            <div class="bar-icons bar-icons-right">
                              <img src="/icon/right.png" class="icon">
                            </div>
                          </div>
                        </div>
 
                        <div class="side blue-side" id="voteBlue" data-bs-toggle="modal" data-bs-target="#loginModal">
                          <div class="heart"><i class="fas fa-heart"></i></div>
                          <div class="score" id="blueScore">0</div>
                        </div>
                    </div>
                  @else
                    <div class="vote-container">
                        <div class="side red-side" id="voteRed">
                          <div class="heart"><i class="fas fa-heart"></i></div>
                          <div class="score" id="redScore">0</div>
                        </div>
 
                        <div class="bar">
                          <div class="bar-red" style="width: 50%;">
                            <div class="bar-icons bar-icons-left">
                              <img src="/icon/left.png" class="icon">
                            </div>
                          </div>
                          <div class="bar-blue" style="width: 50%;">
                            <div class="bar-icons bar-icons-right">
                              <img src="/icon/right.png" class="icon">
                            </div>
                          </div>
                        </div>
                        <div class="side blue-side" id="voteBlue">
                          <div class="heart"><i class="fas fa-heart"></i></div>
                          <div class="score" id="blueScore">0</div>
                        </div>
                    </div>
                  @endif
                <div class="stats text-center mt-3">
                  <span class="red-text me-3">MERON: <strong id="redPercent">50.0%</strong></span>
                  <span class="total me-3"><i class="fas fa-tachometer-alt"></i> Total: <strong id="totalVotes">0</strong></span>
                  <span class="blue-text">WALA: <strong id="bluePercent">50.0%</strong></span>
                </div>
 
 
            </div>
           @include('client.layouts.telegram')
        </div>
    </div>
  <script>
      const isGuest = @json(Auth::guest());
  </script>
<script>
$(document).ready(function() {
    // Point this at your deployed Go service.
    const CHANNEL_API_URL = 'https://live-snip-production.up.railway.app/channel';
 
    let videos = [];
    let currentChannelId = null;
    const isGuest = {{ Auth::guest() ? 'true' : 'false' }};
 
    const thumbnail = document.getElementById('thumbnail');
    const comingSoon = document.getElementById('comingSoon');
    const listContainer = document.querySelector('.channel-list');
    const liveIframe = document.getElementById('liveIframe');
 
    function createHeart(button) {
        const offset = $(button).offset();
        const heart = $('<span class="heart-float"><i class="fas fa-heart"></i></span>');
        $('body').append(heart);
        heart.css({
            top: offset.top - 10 + 'px',
            left: offset.left + $(button).outerWidth() / 2 - 10 + 'px'
        });
        setTimeout(() => heart.remove(), 1000);
    }
 
    function updateStats(video) {
        const { votes_red, votes_blue, red_percent_vote, blue_percent_vote } = video;
        const total = votes_red + votes_blue;
        video.votes_total = total;
 
        let redPercent = red_percent_vote;
        let bluePercent = blue_percent_vote;
 
        if (total > 0) {
            redPercent = ((votes_red / total) * 100).toFixed(1);
            bluePercent = ((votes_blue / total) * 100).toFixed(1);
        }
 
        $('#redPercent').text(`${redPercent}%`);
        $('#bluePercent').text(`${bluePercent}%`);
        $('#totalVotes').text(total);
        $('.bar-red').css('width', `${redPercent}%`);
        $('.bar-blue').css('width', `${bluePercent}%`);
        $('#redScore').text(votes_red);
        $('#blueScore').text(votes_blue);
    }
 
    function sendVote(channelId, type, button) {
        if (isGuest) return;
 
        fetch(`/vote/${channelId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ vote: type })
        })
        .then(res => res.json())
        .then(data => {
            if (data.status && data.video) {
                const index = videos.findIndex(v => v.id === data.video.id);
                if (index !== -1) {
                    videos[index] = data.video;
                }
                updateStats(data.video);
                createHeart(button);
            } else {
                alert(data.message || 'Failed to vote.');
            }
        })
        .catch(err => console.error('Vote error:', err));
    }
 
    $('#voteRed').click(function() {
        sendVote(currentChannelId, 'red', this);
    });
 
    $('#voteBlue').click(function() {
        sendVote(currentChannelId, 'blue', this);
    });
 
    // Single player path now: every channel comes from the /channel API
    // and gets pasted straight into the iframe's src.
    function playStream(video, button) {
        const { id, dataId, title, thumb, message } = video;
        currentChannelId = id;
 
        fetch(`/getvideos/${id}`)
            .then(res => res.json())
            .then(data => {
                if (data.status && data.video) {
                    const index = videos.findIndex(v => v.id === data.video.id);
                    if (index !== -1) {
                        videos[index].votes_red = data.video.votes_red;
                        videos[index].votes_blue = data.video.votes_blue;
                        videos[index].red_percent_vote = data.video.red_percent_vote;
                        videos[index].blue_percent_vote = data.video.blue_percent_vote;
                        videos[index].votes_total = data.video.votes_red + data.video.votes_blue;
                    }
                    updateStats(data.video);
                }
            })
            .catch(err => console.error('Failed to fetch video votes:', err));
 
        updateStats(video);
        thumbnail.src = thumb;
        thumbnail.style.opacity = '1';
        comingSoon.style.opacity = '1';
        $('#comingSoon').text(message || 'Loading...');
 
        fetch(CHANNEL_API_URL, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                streamName: video.streamName || title,
                channelName: video.channelName || title,
                dataId: String(dataId),
            }),
        })
            .then(res => res.json().then(data => ({ ok: res.ok, data })))
            .then(({ ok, data }) => {
                if (!ok || !data.src) {
                    $('#comingSoon').text(data.error || 'Stream unavailable.');
                    return;
                }
                liveIframe.src = data.src;
                thumbnail.style.opacity = '0';
                comingSoon.style.opacity = '0';
            })
            .catch(err => {
                console.error('Channel API error:', err);
                $('#comingSoon').text('Stream unavailable.');
            });
 
        document.querySelectorAll('.channel-btn').forEach(btn => btn.classList.remove('active'));
        if (button) button.classList.add('active');
    }
 
    // const fullscreenBtn = document.getElementById('fullscreenBtn');
    // fullscreenBtn.addEventListener('click', () => {
    //     if (document.fullscreenElement || document.webkitFullscreenElement) {
    //         if (document.exitFullscreen) document.exitFullscreen();
    //         else if (document.webkitExitFullscreen) document.webkitExitFullscreen();
    //     } else {
    //         if (liveIframe.requestFullscreen) liveIframe.requestFullscreen();
    //         else if (liveIframe.webkitRequestFullscreen) liveIframe.webkitRequestFullscreen();
    //         else if (liveIframe.msRequestFullscreen) liveIframe.msRequestFullscreen();
    //     }
    // });
 
    fetch('/getvideos')
        .then(res => res.json())
        .then(data => {
            if (data.status && Array.isArray(data.videos)) {
                videos = data.videos;
 
                listContainer.innerHTML = '';
                videos.forEach(v => {
                    const btn = document.createElement('div');
                    btn.className = 'btn-line btn text-white btn-next-category channel-btn';
                    btn.innerHTML = `<i class="fas fa-tv"></i> ${v.title}`;
                    btn.onclick = () => playStream(v, btn);
                    listContainer.appendChild(btn);
                });
 
                if (videos.length > 0) playStream(videos[0], listContainer.firstChild);
            }
        })
        .catch(err => console.error('Failed to fetch videos:', err));
});
</script>
 
 
@endsection