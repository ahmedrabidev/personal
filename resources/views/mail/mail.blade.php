<html>
<head>
<style>
    .main-content-mail{
        width: 500px;
        margin: 50px auto;
        text-align: center;
        border:2px solid #ddd;
        padding: 20px;
    }
    .main-content-mail .title{
        font-size: 15px;
        font-weight: bold;
        background: #0162e8;
        color: #fff;
        padding: 8px;
        margin-bottom: 20px;
        display: inline-block;
    }
    .main-content-mail .text{
        font-size: 12px;
        line-height: 1.6;
        text-transform: capitalize;
        font-weight: 600;
        margin-bottom: 20px;
    }
    .main-content-mail .link{
        background: #1b4b72;
        color: #fff;
        display: inline-block;
        outline: 0;
        text-decoration: none;
        padding: 5px 10px;
        border-radius: 5px;
        font-weight: bold;
        font-size: 14px;
    }
</style>
</head>
<body>
<div class="main-content-mail">
    <p class="title">{{ $title }}</p>
    <p class="text">{{$text}}</p>
    <a class="link" href="#">
        Verify Email
    </a>
</div>

</body>
</html>
