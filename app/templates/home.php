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
    <script src="js/main.js"></script>
</body>
</html>