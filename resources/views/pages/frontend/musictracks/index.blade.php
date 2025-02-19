@extends('layouts.frontend')

@section('content')


   <!-- bradcam_area  -->
   <div class="bradcam_area breadcam_bg_2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>My Tracks</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--/ bradcam_area  -->


    <!-- music_area  -->
    <div class="music_area music_gallery">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-10">
                    <div class="section_title text-center mb-65">
                        <h3>My All Tracks</h3>
                    </div>
                </div>
            </div>
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-10">
                        <div class="row align-items-center justify-content-center mb-20">
                            <div class="col-xl-12">
                                <div class="row align-items-center">
                                    <div class="col-xl-9 col-md-9">
                                        <div class="music_field">
                                            <div class="thumb">
                                                <img src="{{ url('public/assets/frontend/img/music_man/hold-on.jpg') }}" alt="Hold On (to my side of the story)" class="img-fluid audio-thumb">
                                            </div>
                                            <div class="audio_name">
                                                <div class="name">
                                                    <h4>Hold On (to my side of the story)</h4>
                                                    {{-- <p>08 January, 2025</p> --}}
                                                </div>
                                                <audio preload="auto" controls>
                                                    <source src="{{ url('public/assets/frontend/audios/7010-fvr-master_3.mp3') }}">
                                                </audio>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-3">
                                        <div class="music_btn">
                                            <a href="#" class="boxed-btn p-2">buy albam</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center justify-content-center mb-20">
                            <div class="col-xl-12">
                                <div class="row align-items-center">
                                    <div class="col-xl-9 col-md-9">
                                        <div class="music_field">
                                            <div class="thumb">
                                                <img src="{{ url('public/assets/frontend/img/music_man/i-am-fallin.jpg') }}" alt="I Am Fallin" class="img-fluid audio-thumb">
                                            </div>
                                            <div class="audio_name">
                                                <div class="name">
                                                    <h4>I Am Fallin</h4>
                                                    {{-- <p>25 December, 2024</p> --}}
                                                </div>
                                                <audio preload="auto" controls>
                                                    <source src="{{ url('public/assets/frontend/audios/i-am-fallin-king-viking-26Oct2024.mp3') }}">
                                                </audio>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-3">
                                        <div class="music_btn">
                                            <a href="#" class="boxed-btn p-2">buy albam</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center justify-content-center mb-20">
                            <div class="col-xl-12">
                                <div class="row align-items-center">
                                    <div class="col-xl-9 col-md-9">
                                        <div class="music_field">
                                            <div class="thumb">
                                                <img src="{{ url('public/assets/frontend/img/music_man/stay-with-me-remix.jpg') }}" alt="Stay With Me V2 MIX" class="img-fluid audio-thumb">
                                            </div>
                                            <div class="audio_name">
                                                <div class="name">
                                                    <h4>Stay With Me V2 MIX</h4>
                                                    {{-- <p>15 December, 2024</p> --}}
                                                </div>
                                                <audio preload="auto" controls>
                                                    <source src="{{ url('public/assets/frontend/audios/stay-with-me-remix.mp3') }}">
                                                </audio>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-3">
                                        <div class="music_btn">
                                            <a href="#" class="boxed-btn p-2">buy albam</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center justify-content-center mb-20">
                            <div class="col-xl-12">
                                <div class="row align-items-center">
                                    <div class="col-xl-9 col-md-9">
                                        <div class="music_field">
                                            <div class="thumb">
                                                <img src="{{ url('public/assets/frontend/img/music_man/stay-with-me.jpg') }}" alt="Stay With Me"class="img-fluid audio-thumb">
                                            </div>
                                            <div class="audio_name">
                                                <div class="name">
                                                    <h4>Stay WIth Me</h4>
                                                    {{-- <p>02 December, 2024</p> --}}
                                                </div>
                                                <audio preload="auto" controls>
                                                    <source src="{{ url('public/assets/frontend/audios/stay-with-me-sample-mix-128.mp3') }}">
                                                </audio>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-3">
                                        <div class="music_btn">
                                            <a href="#" class="boxed-btn p-2">buy albam</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-10">

                    </div>
               </div>
        </div>
    </div>
    <!-- music_area end  -->



    <!-- youtube_video_area  -->
    <div class="youtube_video_area">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-65">
                        <h3>Music Videos</h3>
                    </div>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="single_video">
                        <div class="thumb">
                            <img src="{{ url('public/assets/frontend/img/video/1.png') }}" alt="">
                        </div>
                        <div class="hover_elements">
                            <div class="video">
                                    <a class="popup-video" href="https://www.youtube.com/watch?v=Hzmp3z6deF8">
                                            <i class="fa fa-play"></i>
                                        </a>
                            </div>

                            <div class="hover_inner">
                                <span>New York Show-2018</span>
                                <h3><a href="#">Shadows of My Dream</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="single_video">
                        <div class="thumb">
                            <img src="{{ url('public/assets/frontend/img/video/2.png') }}" alt="">
                        </div>
                        <div class="hover_elements">
                            <div class="video">
                                    <a class="popup-video" href="https://www.youtube.com/watch?v=Hzmp3z6deF8">
                                            <i class="fa fa-play"></i>
                                        </a>
                            </div>

                            <div class="hover_inner">
                                <span>New York Show-2018</span>
                                <h3><a href="#">Shadows of My Dream</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="single_video">
                        <div class="thumb">
                            <img src="{{ url('public/assets/frontend/img/video/3.png') }}" alt="">
                        </div>
                        <div class="hover_elements">
                            <div class="video">
                                    <a class="popup-video" href="https://www.youtube.com/watch?v=Hzmp3z6deF8">
                                            <i class="fa fa-play"></i>
                                        </a>
                            </div>

                            <div class="hover_inner">
                                <span>New York Show-2018</span>
                                <h3><a href="#">Shadows of My Dream</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="single_video">
                        <div class="thumb">
                            <img src="{{ url('public/assets/frontend/img/video/4.png') }}" alt="">
                        </div>
                        <div class="hover_elements">
                            <div class="video">
                                    <a class="popup-video" href="https://www.youtube.com/watch?v=Hzmp3z6deF8">
                                            <i class="fa fa-play"></i>
                                        </a>
                            </div>

                            <div class="hover_inner">
                                <span>New York Show-2018</span>
                                <h3><a href="#">Shadows of My Dream</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / youtube_video_area  -->

@endsection

@push('css')
    <style>
        img.img-fluid.login-logo{
            width: 120px !important;
        }
        .billing-title {
            color: rgb(81 72 17);
            text-transform: uppercase;
        }
    </style>
@endpush

@push('css')
    <style>

    </style>
@endpush
