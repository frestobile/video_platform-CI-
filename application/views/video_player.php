<style>
    *,
*::before,
*::after {
    margin: 0;
    padding: 0;
    border: none;
    box-sizing: border-box;
}
:root {
    --colorBtnPrincipal: #D2D2D2;
    --rangeBg: #333;
}
video { max-width: 100%; }
button { 
    background: none;
    color: var(--colorBtnPrincipal);
    outline: none;
}

button, input { cursor: pointer; }

/*              VIDEO CONTAINER               */
.video-container {
    position: relative;
    max-width: 700px;
}
.video {
    max-width: 100%;
    border-radius: 5px;
}
.video::-webkit-media-controls, .video::-webkit-media-controls-enclosure {
    display:none !important;
}
/*              VIDEO CONTROLS               */
.video:-moz-full-screen + .video-controls {
    bottom: 0;
}
.video:-webkit-full-screen + .video-controls {
    bottom: 0;
}

.video-controls {
    display: flex;
    justify-content: space-around;
    align-items: center;
    position: absolute;
    bottom: 4px;
    left: 0;
    z-index: 2147483647;
    padding: 10px;
    width: 100%;
    border-radius: 0 0 5px 5px;
    background-color: rgba(0,0,0,0.3);
}
.play-and-pause-video {
    padding: 8px 12px;
    width: 40px;
    box-shadow: 2px 2px 3px rgba(0,0,0,0.5);
    border-radius: 4px;
    background-color: crimson;
}


/*              VIDEO PROGRESS               */
.progress-video-container {
    display: flex;
    align-items: center;
    position: relative;
    width: 65%;
}
.time-video {
    font-family: sans-serif;
    font-size: 16px;
    font-weight: bold;
    color: var(--colorBtnPrincipal);
}
.progress-time { order: -1;}

.progress-video, .slide-volume-video {
    background-image: linear-gradient(crimson, crimson);
    background-repeat: no-repeat;
    background-size: 0% 100%;
} 
.progress-video, .slide-volume-video {
    width: 100%;
    height: 10px;
    margin: 0 10px;
    -webkit-appearance: none;
    border-radius: 4px;
    outline: none;
    background-color: var(--rangeBg);
}


/*            ESTILOS COMUNS              */
.progress-video::-moz-range-thumb,
.slide-volume-video::-moz-range-thumb {
    width: 15px;
    height: 15px;
    background-color: var(--colorBtnPrincipal);
    border: none;
}
.slide-volume-video::-webkit-slider-thumb, .progress-video::-webkit-slider-thumb {
    width: 15px;
    height: 15px;
    -webkit-appearance: none;
    border-radius: 50%;
    background-color: var(--colorBtnPrincipal);
}
.progress-video::-moz-range-track, .slide-volume-video::-moz-range-track { 
    height: 0;
    background-color: var(--rangeBg);
    border-radius: 4px;
}
.control-item { font-size: 18px; }


/*              VIDEO AUDIO               */ 
.slide-volume-video {
    width: 60px;
    display: none;
    transition: display .2s ease-out;
    margin-left: -2px;
}

.audio-video-container:hover > .slide-volume-video{
    display: inline-block;
}


/*             MEDIAS QUERIES*            */
@media (max-width: 320px) {
    .control-item { font-size: 10px; }
    .progress-video-container {
        width: 60%;
    }
    .slide-volume-video { width: 40px; }
    .time-video {font-size: 10px; }
}
@media (max-width: 480px){
    .video-controls {
        justify-content: space-around;
        padding: 10px 0px;
    }
    .control-item { font-size: 16px; }
    .time-video { font-size: 12px; }
    .play-and-pause-video {
        width: 15px;
        padding: 0;
        background: none;
        box-shadow: none;
    }
    .progress-video { margin: 0 3px;}
    .slide-volume-video { width: 45px; }
}
@media (min-width: 1200){
    .video:-webkit-full-screen + .video-controls > .progress-video-container {
        width: 100%;
    }
}
</style>
<main>
<div class="video-container" style="margin-top: 10px;">
  <video src="<?php echo base_url();?>uploads/videos/<?php echo $video_url;?>" class="video" width="700"></video>
  <div class="video-controls video-controls-visibility--visible">
    <button class="control-item play-and-pause-video bi bi-play-fill" title="Play or Pause"></button>
    <div class="progress-video-container">
      <input type="range" class="control-item progress-video" min="0.0" value="0.00" step="any" max="100.00">
      <span class="progress-time time-video">00:00</span>
      <span class="duration-time time-video">00:00</span>
    </div>
    <div class="audio-video-container">
      <button class="control-item volume-video fa fa-volume-up" title="Volume"></button>
      <input type="range" class="control-item slide-volume-video" min="0" value="1" step="any" max="1">
    </div>
    <button class="control-item fullscreen-video "></button>
  </div>
</div>    
 </main>
