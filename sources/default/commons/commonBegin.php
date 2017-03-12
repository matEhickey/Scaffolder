<html>
    <head>
        <meta name="keywords" content="">
        <meta charset="utf-8">
        <title>Scaffolder default</title>
        <link rel="icon" href="../assets/ico.ico" />
        <meta name="description" content="Scaffolder default">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

        
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="../assets/iframeResponsive.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/font-awesome-animation.min.css">
        
        
        <style>
            :root {
              --main-color: grey;
              --second-bg-color: white;
              --a: black;
            }
        </style>

        <link href="../assets/scaffolder.css" rel="stylesheet" type="text/css">
        
        

    </head>
    <body>
    
    
                                     
         <?php
         
            //Menus -> default sacaffolder: index des bundles et Accueil
            //get customs bundles
            $files = scandir("../");
            $dirs = [];
            //echo(count($dirs));
            foreach($files as $file){
                    if(is_dir("../".$file)){
                        if(($file!=".")and($file!="..")and($file!="Element")and($file!="Fontawesome")and($file!="assets")and($file!="commons")and($file!="fonts")and($file!="uploaded_files") ){
                            array_push($dirs, $file);
                        }
                    }
            }
            
            //hide 2/3 header on other that accueil
            $currentDir = explode("\\",getcwd());
            $currentDir = $currentDir[count($currentDir)-1];
            if( $currentDir != "Accueil"  ){
                echo("
                <style>
                    .cover{
                        min-height: 33%;
                    }
                
                </style>
                ");
            }
        
        ?>
    
    
    
    
    
    
    
        <div class="cover hidden-sm hidden-xs">
            
            <div class="background-image-fixed cover-image" style="background-image : url('http://www.beeple-crap.com/media/everyday10/june2016/big/06-05-16.jpg')"></div> 
            <!--
            <div class="background-image-fixed cover-image" style="background-image : url(' http://www.planwallpaper.com/static/images/abstract-wallpaper-20.jpg ')"></div>
            -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center opaque text-inverse">
                        <h1>Scaffolder default skin</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <br>
                        <br>
                        <?php 
                            foreach($dirs as $dir){
                                echo("<a class='btn btn-lg btn-default' href='../".$dir."'>".$dir."<br></a>");
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        
        <div class="hidden-lg hidden-md navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
                          <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span>
                          <span class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#" style="padding-top: 5px;">
                    <img alt="Brand" src="../assets/ico.ico" height="40px">
                  </a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-ex-collapse">
                    <ul class="nav navbar-nav navbar-right"><li class="active">
                    
        
                        <?php 
                            foreach($dirs as $dir){
                                echo("<li><a href='../".$dir."/'>".$dir."<br></a></li>");
                            }
                        ?>
                         
                    </ul>
                </div>
            </div>
        </div>
        


            <div class="container" style="padding-top:30px;">
                    <div class="alert alert-warning fade in" style="margin-top:18px;">
                            
                                <div class="row">
                                    <div class="col-md-6 col-xs-6" style="padding-top: 15px; text-align:center;">
                                        
                                        <b>Thanks for using "Scaffolder".</b>
                                        <br><b>Remember to change the Beeple artworks, it's not legaly useable. </b>
                                        
                                    </div>
                                    
                                    <div class="col-md-6 col-xs-6">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a>
                                        <div align="center"><i class="fa fa-5x fa-file-image-o" aria-hidden="true"></i></div>
                                    </div>
                                </div>
                    </div>
                    
            </div>
