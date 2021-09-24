@if(isset($title))
    <html>
    <head>
        <style>
            .main-content-mail{
                width: 500px;
                margin: 50px auto;
                border:2px solid #000;
                font-family: 'Arial';
                text-align: left;
            }
            .main-content-mail .title{
                font-size: 15px;
                font-weight: bold;
                background: #000;
                color: #fff;
                padding: 15px;
                margin: 0;
                display: block;
                text-transform: capitalize;
                text-align: center;
            }
            .main-content-mail .message{
                font-size: 14px;
                line-height: 1.8;
                text-transform: capitalize;
                font-weight: 600;
            }
            .title_span{
                font-size: 16px;
                font-weight: bold;
                display: block;
                margin: 10px 0;
            }
            .box{
                padding: 10px;
            }
        </style>
    </head>
    <body>
    <div class="main-content-mail">
        <p class="title">{{ $title }}</p>
        <div class="box">
            <p class="email">
                <span class="title_span">Email </span> {{ $sender }}
            </p>
            <p class="name">
                <span class="title_span">Name </span> {{ $name }}
            </p>
            <p class="message">
                <span class="title_span">Message </span> {{ $text }}
            </p>
        </div>
    </div>
    </body>
    </html>
@endif
