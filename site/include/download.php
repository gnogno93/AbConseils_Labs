<?php 
    require_once(dirname(__FILE__).'/head.php'); 
    require_once(dirname(__FILE__).'/menu.php');
    
?>

<section class="jumbotron text-center" style="height:100%;">

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container" style="">
                    <h1 class="jumbotron-heading">Library discord botcpp</h1>
                    <img src="rcs/icon/bot.png" width="128" height="128" class="d-inline-block align-top" alt=""><img>
                    <p class="lead text-muted">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque maximus sagittis risus, 
                        non pharetra arcu mattis eu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere 
                        cubilia Curae; Cras hendrerit ipsum quis augue tempus, sed venenatis felis suscipit. Duis nec diam nulla. 
                        Nullam laoreet erat at imperdiet sodales. Cras tincidunt at ipsum at pretium. Proin vehicula, ante ac dapibus rutrum,
                        ligula erat ullamcorper sem, vitae dictum augue odio a lorem. Aliquam rhoncus ante at ex ultricies rhoncus sit amet sed leo. 
                        Maecenas mollis quis turpis cursus luctus. Integer quis eros nisi. Aenean facilisis iaculis nunc, vel mollis metus vulputate vel. 
                        Phasellus lobortis purus sed lobortis faucibus. Vestibulum bibendum vulputate pulvinar. Donec non finibus erat. Sed scelerisque tellus a 
                        orci consectetur pulvinar.
                    </p>
                    <a href="library.zip" download="library.zip">
                        <button type="button" class="btn btn-primary">Download library</button>
                    </a>
                    <a href="https://github.com/auzou/botcpp">
                        <button type="button" class="btn btn-primary">Git link</button>
                    </a>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container" >
                    <h1 class="jumbotron-heading">Bot discord mybotcpp</h1>
                    <img src="rcs/icon/bot.png" width="128" height="128" class="d-inline-block align-top" alt=""><img>
                    <p class="lead text-muted">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque maximus sagittis risus, 
                        non pharetra arcu mattis eu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere 
                        cubilia Curae; Cras hendrerit ipsum quis augue tempus, sed venenatis felis suscipit. Duis nec diam nulla. 
                        Nullam laoreet erat at imperdiet sodales. Cras tincidunt at ipsum at pretium. Proin vehicula, ante ac dapibus rutrum,
                        ligula erat ullamcorper sem, vitae dictum augue odio a lorem. Aliquam rhoncus ante at ex ultricies rhoncus sit amet sed leo. 
                        Maecenas mollis quis turpis cursus luctus. Integer quis eros nisi. Aenean facilisis iaculis nunc, vel mollis metus vulputate vel. 
                        Phasellus lobortis purus sed lobortis faucibus. Vestibulum bibendum vulputate pulvinar. Donec non finibus erat. Sed scelerisque tellus a 
                        orci consectetur pulvinar.
                    </p>
                    <a href="windows.zip" download="windows.zip">
                        <button type="button" class="btn btn-primary">Download for Windows</button>
                    </a>
                    <a href="linux.zip" download="linux.zip">
                        <button type="button" class="btn btn-primary">Download for Linux</button>
                    </a>            
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span style="color:black;" class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true" style="color:black;"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

</section>

<style>
    .carousel-control-prev,
    .carousel-control-next{
        height: 200px;
        width: 50px;
        outline: color-white;
        background-size: 100%, 100%;
        border-radius: 50%;
        border: 1px solid color-white;
        background-color:color-white;
    }

    .carousel-control-prev-icon { 
        background-image:url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23009be1' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E"); 
        width: 30px;
        height: 48px;
    }
    .carousel-control-next-icon { 
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23009be1' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E");
        width: 30px;
        height: 48px;
    }
</style>


<?php 
    require_once(dirname(__FILE__).'/footer.php'); 
?>