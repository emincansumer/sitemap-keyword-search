<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sitemap Keyword Search</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        padding-top: 20px;
    }
    #loader {
        margin-top: 20px;
    }
    </style>
</head>
<body>
<!-- 3478 -->
    <div class="container">
        <h1 class="text-center">Sitemap Keyword Search</h1>
        <form id="form" action="index.php/search" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" id="sitemap" name="sitemap" placeholder="Sitemap URL..">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Keyword...">
            </div>
            <button type="submit" class="btn btn-default btn-block btn-primary">Search</button>
        </form>
        <div id="loader" style="display:none">
            <div class="progress progress-striped active">
                <div class="progress-bar progress-bar-success"  role="progressbar" style="width: 100%">
                    <span id="progress-text"></span>
                </div>
            </div>
        </div>
        <ul id="result"></ul>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script>
    var urls = [];
    $(function(){
        $('#form').submit(function(e){
            e.preventDefault();
            showLoader();
            $this = $(this);
            init();
            $.post($this.attr('action'), $this.serialize(), function(data){
                $.each(data, function(index, value){
                    urls.push(value);
                });
                processUrl(urls[0], 0);  
            }, 'json');
        })
    });

    function showLoader() {
        $('button').attr('disabled', true);
        $('#loader').show();
    }

    function hideLoader() {
        $('button').attr('disabled', false);
        $('#loader').hide();
    }

    function init()
    {
        $('#progress-text').html('');
        $('#result').html('');
        urls = [];
    }

    function processUrl(url, ind) {
        var keyword = $('#keyword').val();
        if(ind == urls.length){
            hideLoader();
            return;
        }
        $.post('index.php/process', {url: url, keyword: keyword}, function(data){
            if(data == 1) {
                $('#result').prepend('<li><a href="'+url+'" target="_blank" class="text-danger">'+url+'</a></li>');
            }
            $('#progress-text').html( (ind+1) + ' of ' + urls.length + ' processed' );
            processUrl(urls[ind+1], ind+1);
        });
    }

    </script>
</body>
</html>