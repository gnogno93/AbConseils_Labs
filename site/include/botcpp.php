
<script src="asset/js/commentAction"></script>

<section class="jumbotron text-center">
<div class="container">
    <h1 class="jumbotron-heading">Botcpp</h1>
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
</div>
</section>


<div class="row container_comment" id="container_comment">
    <?php foreach(array(1,2,3) as $value) :?>
    <div class="col-md-12">
        <h2>Tittle</h2>
        <h3>Username</h3>
        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, 
           tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. 
           Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. 
        </p>
    </div>
    <?php endforeach ?>
    
    
    <div class="col-md-12">
        <h2>Tittle</h2>
        <h3>Username</h3>
        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, 
           tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. 
           Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. 
        </p>
        <button class="btn btn-outline-secondary" type="button" id="comment_edit" data="data">Edit</button>
        <button class="btn btn-outline-secondary" type="button" id="comment_remove" data="data">Remove</button>
    </div>
    
</div>


<style>
.container_comment {
    padding:0;
    margin:0;
    margin-bottom:100px;
    text-align:center;
    padding-left:20px;
    padding-right:20px;
    
}
.container_comment .col-md-12 {
    margin-bottom:20px;
    padding-bottom:20px;
    border: 0.1em solid #34475E;
    border-radius: 20px;
}
</style>


<div class="row container_comment_edit">

    <form action="send-comment" method="get" class="justify-content-center" style="width:100%;">
    
    <div class="col-md-12">
        <input type="title" class="form-control" id="title" aria-describedby="title" placeholder="Enter a title">
    </div>
    
    <div class="col-md-12">
        <input type="username" class="form-control" id="username" aria-describedby="username" placeholder="Enter your pseudo">
    </div>
    
    <div class="col-md-12">
        <textarea class="form-control" placeholder="Your commentary" id="commentary" rows="4"></textarea>
    </div>
    
    <div class="col-md-12">
        <button class="btn btn-outline-secondary" type="button">Send your comment</button>
    </div>
    <form>
</div>

<style>
.container_comment_edit {
    padding:0;
    margin:0;
    margin-bottom:100px;
    text-align:center;
    border: 0.6em solid #34475E;
    border-radius: 10px;
    margin-left:20px;
    margin-right:20px;
}
.container_comment_edit .col-md-12 {
    margin-bottom:10px;
    margin-top:10px;
}
</style>