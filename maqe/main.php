<!DOCTYPE html>
<html>
<head>
    <title>Javascript Test</title>
</head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<body>

    <div class="container">
        <h1>MAQE Forums</h1>
        <h2>Subtitle</h2>
        <h3>Posts</h3>
        <div class="content"></div>
        <div class="text-center">
            <div class="pagination">
                <a href="#">Previous</a>
                <a class="active" href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <a href="#">6</a>
                <a href="#">Next</a>
            </div>
        </div>
    </div>

    <script id="profiletpl" type="text/template">
        {{#roles}}
        <div class="row">
            <div class="col-sm-10">
                <div class="col-sm-3">
                    <img src="{{post.bannerImage}}" alt="Photo of {{post.bannerImage}}">
                </div>
                <div class="col-sm-9">
                    <div class="content">
                        <h4>{{post.title}}</h4>
                        <span>{{post.message}}</span>
                        <i class="fa fa-clock-o" aria-hidden="true"><i>{{post.datetime}}</i></i>
                    </div>
                </div>
            </div>
            <div class="col-sm-2" style="text-align: center;">
                <div class="user one">
                    <img src="{{author.profilePic}}" alt="Photo of {{author.profilePic}}">
                </div>
                <p>
                    <span style="color:red;">{{author.authorName}}</span>
                    <span>{{author.userType}}</span>
                    <i class="fa fa-map-marker" aria-hidden="true">{{author.address}}</i>
                </p>
            </div>
        </div>
        {{/roles}}
    </script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/2.2.1/mustache.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script type="text/javascript">
    $.ajax({
        dataType: "json",
        url: 'data.php',
        success: function (data) {
            data = {'roles': data};
            var html = Mustache.to_html($('#profiletpl').html(), data);
            $('.content').html(html);
        }
    })

    $(function(){
        $(".row:odd").css("background-color", '#efefef');
    });

    </script>
</body>
</html>
