<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Modal</title>
        <meta name="description" content="This is just a very simple modal made with JavaScript">
        <meta name="viewport" content="width=device-width, initial-scale=1">

       <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">-->
        <link rel="stylesheet" href="/css/modal-blur/style.css">
    </head>
    <body>
        <main id="myContainer" class="MainContainer">
            <header class="MainHeader">
                <h2 class="Heading">Modal Example</h2>
            </header>

            <!-- Open The Modal -->
            <button id="myBtn" class="btn">Open Modal</button>
        </main>

        <!-- Modal container it includes the overlay -->
        <div id="myModal" class="Modal is-hidden is-visuallyHidden">
            <!-- Modal content -->
            <div class="Modal-content">
                <span id="closeModal" class="Close">&times;</span>
                <p>Simple Modal</p>
                <br>
				<br>
                <center><p><img src="Imagens/icons/alert11.png"></p></center>
            </div>
        </div>

        <script src="/js/modal-blur/js/app.min.js"></script>
    </body>
</html>
