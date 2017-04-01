$(document).ready(function(){
    $("form#com-form").on('submit', function(e){
        alert('ato');
        e.preventDefault();
        $.ajax(
            {
                url : "<?= base_url('index.php/accueil/addCommentaire');?>",
                type: "POST",
                dataType : 'json',
                data: new FormData(this),
                success:function(data){
                    $('#comment').append(
                        '<li>'+
                        '<figure><img src="<?= base_url()?>/assets/default/images/content/avatar/1.jpg" alt="Avatar 1" /></figure>'+
                        '<div class="content">'+
                        '<h5><a href="#">Amah Syner Holland</a></h5>'+
                        '<p class="meta">on Sep 12th, 2012 at 3:05 PM</p>'+
                        '<span class="comment-id">1</span>'+
                        '<p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum semper nulla vitae diam lobortis interdum varius arcu tincidunt. Quisque sed nisi vel lorem blandit pharetra.</p>'
                        +'</div>'+
                        '</li>'
                    );

                }
            });
    });
});


