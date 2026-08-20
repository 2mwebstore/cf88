<div class="fb-plugin">

    <div class="bennertitle mt-2 mb-2">

        {{-- <img src="/icon/logo.jpg">  --}}

        @lang('home.telegrampage') </div>

    <div class="tgme_page_action">

        <style >

            .bennertitle{

                padding: 10px;

                background: linear-gradient(118deg, #7367f0, rgba(115, 103, 240, 0.7));

                box-shadow: 0 0 10px 1px rgba(115, 103, 240, 0.7);

                color: white;

                top: 5px;

                border-radius: 10px 10px 0 0;

            }

            .tgme_page_action {

                text-align: center;

                line-height: 0;

            }

            a.tgme_action_button_img {

                font-size: 14px;

                line-height: 17px;

                font-weight: bold;

                -webkit-font-smoothing: antialiased;

                color: #FFF;

                border-radius: 22px;

                overflow: hidden;

                display: inline-block;

                text-transform: uppercase;

            }

            .bennertitle img{

                width: 25px;

                border-radius: 50%;

                margin-right: 5px;

                height: 25px;

            }

            .container-telelgram {

                position: relative;

                text-align: center;

                color: white;

            }

            .centere-tele {

                position: absolute;

                top: 50%;

                left: 50%;

                transform: translate(-30%, -50%);

                font-size: 25px;

                font-weight: bold;

                -webkit-font-smoothing: antialiased;

                color: #FFF;

            }

            @media  screen and (max-width: 1200px) {

                .centere-tele {

                    font-size: 20px;

                }

            }

            @media screen and (max-width: 1000px) {

                .wrapper {

                    display: grid;

                    grid-template-columns: 1fr !important;

                }

                .fb-plugin {

                    display: none !important;

                }

            }

        </style>

        <div class="container-telelgram ">

            <a class="tgme_action_button_img" href="tg://resolve?domain={{$telegram->name}}">

                <img src="/icon/IMG_9933.png" alt="Snow" style="width:100%;">

                <div class="centere-tele">{{$telegram->name}}</div>

            </a>

        </div>

    </div>

    <div class="bennertitle mt-2 mb-2">

      @lang('home.facebookpage')

    </div>

    <iframe src="https://www.facebook.com/plugins/page.php?href={{$facebook->name}}&amp;tabs=timeline&amp;small_header=true&amp

    adapt_container_width=true&amp;hide_cover=false&amp;show_facepile=true&amp;appId=739646733933031"

        height="500" width="100%" scrolling="no" frameborder="0" allowfullscreen="" data-lazy="true"

        allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" data-v-7c44f5d2=""

        style="border: none; overflow: hidden;">

    </iframe>

</div>