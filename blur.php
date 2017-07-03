<script src="https://code.jquery.com/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="js/blur/blur_overlay.js"></script>
<link type="text/css" rel="stylesheet" href="/css/blur/blur_overlay.css" >
<div class="slide-up">
    <div class="slide-wrapper">
        <div class="slide-background"></div>
        <div class="blured"></div>
        <div class="slide-content">
             <h2>Pop up title</h2>

            <p>Pretty neat!</p>
        </div>
    </div>
</div>
<div class="wrapper">
    <div class="content">
         <h1>Some title</h1>

        <div class="image">
            <img src="/imagens/ios-iphone.png" />
        </div>

    </div> <a class="trigger" href="#">trigger slide</a>

</div>
<svg version="1.1" xmlns="http://www.w3.org/2000/svg">
    <filter id="blur">
        <feGaussianBlur stdDeviation="3" />
    </filter>
</svg>

