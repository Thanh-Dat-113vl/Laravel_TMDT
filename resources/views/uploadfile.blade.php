<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Font Awesome JS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <title>Document</title>
    <style>
        @import url("//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");

    .navbar-icon-top .navbar-nav .nav-link > .fa {
      position: relative;
      width: 36px;
      font-size: 24px;
    }

    .navbar-icon-top .navbar-nav .nav-link > .fa > .badge {
      font-size: 0.75rem;
      position: absolute;
      right: 0;
      font-family: sans-serif;
    }

    .navbar-icon-top .navbar-nav .nav-link > .fa {
      top: 3px;
      line-height: 12px;
    }

    .navbar-icon-top .navbar-nav .nav-link > .fa > .badge {
      top: -10px;
    }

    @media (min-width: 576px) {
      .navbar-icon-top.navbar-expand-sm .navbar-nav .nav-link {
        text-align: center;
        display: table-cell;
        height: 70px;
        vertical-align: middle;
        padding-top: 0;
        padding-bottom: 0;
      }

      .navbar-icon-top.navbar-expand-sm .navbar-nav .nav-link > .fa {
        display: block;
        width: 48px;
        margin: 2px auto 4px auto;
        top: 0;
        line-height: 24px;
      }

      .navbar-icon-top.navbar-expand-sm .navbar-nav .nav-link > .fa > .badge {
        top: -7px;
      }
    }

    @media (min-width: 768px) {
      .navbar-icon-top.navbar-expand-md .navbar-nav .nav-link {
        text-align: center;
        display: table-cell;
        height: 70px;
        vertical-align: middle;
        padding-top: 0;
        padding-bottom: 0;
      }

      .navbar-icon-top.navbar-expand-md .navbar-nav .nav-link > .fa {
        display: block;
        width: 48px;
        margin: 2px auto 4px auto;
        top: 0;
        line-height: 24px;
      }

      .navbar-icon-top.navbar-expand-md .navbar-nav .nav-link > .fa > .badge {
        top: -7px;
      }
    }

    @media (min-width: 992px) {
      .navbar-icon-top.navbar-expand-lg .navbar-nav .nav-link {
        text-align: center;
        display: table-cell;
        height: 70px;
        vertical-align: middle;
        padding-top: 0;
        padding-bottom: 0;
      }

      .navbar-icon-top.navbar-expand-lg .navbar-nav .nav-link > .fa {
        display: block;
        width: 48px;
        margin: 2px auto 4px auto;
        top: 0;
        line-height: 24px;
      }

      .navbar-icon-top.navbar-expand-lg .navbar-nav .nav-link > .fa > .badge {
        top: -7px;
      }
    }

    @media (min-width: 1200px) {
      .navbar-icon-top.navbar-expand-xl .navbar-nav .nav-link {
        text-align: center;
        display: table-cell;
        height: 70px;
        vertical-align: middle;
        padding-top: 0;
        padding-bottom: 0;
      }

      .navbar-icon-top.navbar-expand-xl .navbar-nav .nav-link > .fa {
        display: block;
        width: 48px;
        margin: 2px auto 4px auto;
        top: 0;
        line-height: 24px;
      }

      .navbar-icon-top.navbar-expand-xl .navbar-nav .nav-link > .fa > .badge {
        top: -7px;
      }
    }
        </style>
</head>
<body>
    <div class="container">

        <nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-dark">
         <a class="navbar-brand" href="#">Navbar</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <ul class="navbar-nav mr-auto">
             <li class="nav-item active">
               <a class="nav-link" href="#">
                 <i class="fa fa-home"></i>
                 Home
                 <span class="sr-only">(current)</span>
                 </a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="#">
                 <i class="fa fa-envelope-o">
                   <span class="badge badge-danger">11</span>
                 </i>
                 Link
               </a>
             </li>
             <li class="nav-item">
               <a class="nav-link disabled" href="#">
                 <i class="fa fa-envelope-o">
                   <span class="badge badge-warning">11</span>
                 </i>
                 Disabled
               </a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="#">
                 <i class="fa fa-envelope-o">
                   <span class="badge badge-primary">11</span>
                 </i>
                 Link
               </a>

             </li>
           </ul>
           <ul class="navbar-nav ">
             <li class="nav-item">
               <a class="nav-link" href="#">
                 <i class="fa fa-bell">
                   <span class="badge badge-info">11</span>
                 </i>
                 Test
               </a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="#">
                 <i class="fa fa-globe">
                   <span class="badge badge-success">11</span>
                 </i>
                 Test
               </a>
             </li>
           </ul>
           <form class="form-inline my-2 my-lg-0">
             <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
             <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
           </form>
         </div>
       </nav>

        </div>
        <!--container end.//-->
</body>
</html>
