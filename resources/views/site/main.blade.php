<!DOCTYPE html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Blog</title>
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="header-wrapper">
    <div id="header">
        <div id="menu">
            <ul>
                <li class="current_page_item"><a href="#">Home</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#" class="last">Contact</a></li>
            </ul>
        </div>
        <!-- end #menu -->

    </div>
</div>
<!-- end #header -->
<!-- end #header-wrapper -->
<div id="logo">
    <h1><a href="#">Predilection </a></h1>
    <p><em> template design by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a></em></p>
</div>
<hr />
<!-- end #logo -->
<div id="page">
    <div id="page-bgtop">
        <div id="content">
            @yield('content')
        </div>

        <div style="clear: both;">&nbsp;</div>
    </div>
    <!-- end #page -->
</div>
<div id="footer">

</div>
<!-- end #footer -->
</body>
</html>