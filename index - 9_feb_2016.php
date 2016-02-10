<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Hitesh Singhal | Home</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" href="http://fonts.typotheque.com/WF-027106-009064.css" type="text/css" />
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/stylesheet.css">
    </head>
    <body class="home">
    	<div id="color" class="screen"></div>
        <div id="overlay" class="screen"></div>
    	<?php include("includes/navigation.php"); ?>
        <div class="header">
            <div class="container">
            	<div class="head-content">
                    <p><span>Hi, my name is Hitesh Singhal. I am Graphic&nbsp;</span><span>Designer getting my MFA at MICA, Baltimore.</span></p>
                    <a href="about.php" class="svg-btn"><img src="assets/images/readmore.svg" /></a>
                    <ul class="header-nav">
                        <li><a data-bg-color="#d2d2c8" class="bg-switch" href="#">Hedonist Monk,</a></li>
                        <li><a data-bg-color="#f0a078" class="bg-switch" href="#">Imaginary Museum,</a></li>
                        <li><a data-bg-color="#f0af69" class="bg-switch" href="#"><span>MICA Grad&nbsp;</span><span>Show 2016,</span></a></li>
                        <li><a data-bg-color="#f0a0b4" class="bg-switch" href="#">Future Zine,</a></li>
                        <li><a data-bg-color="#f0a0b4" class="bg-switch" href="#">Coachella Festival,</a></li>
                        <li><a data-bg-color="#d2d2c8" class="bg-switch" href="#">Maven,</a></li>
                        <li><a data-bg-color="#d1dc82" class="bg-switch" href="#">Four-legged Tale,</a></li>
                        <li><a data-bg-color="#beaecd" class="bg-switch" href="#">How Posters Work</a></li>
                    </ul>
                    <a href="about.php" class="svg-btn"><img src="assets/images/seemore.svg" /></a>
            	</div>
            </div>
        </div>
        <div class="content-area">
          <div class="container">
            <h1 class="col-lg-12 title"><span>Selected Work</span></h1>
            <div id="behance-magix" class="group">
              <!-- insert some HTML via magic JS -->
                <p>Loading...</p>
              <!-- this is the template that each behance thing with use to print to the browser -->
              <script id="project-cards" type="text/template">
                {{#projects}}
                <div class="project three columns col-xs-6 col-sm-6 col-md-4 col-lg-4" id="b{{id}}">
                  <a class="wrapping" href="#{{id}}" data-project-id="{{id}}">
                    <img class="img-responsive" src="{{covers.404}}" alt="{{name}}" />
                    <div class="info">
                      <h2 class="name">{{name}}</h2>
                    </div>
                  </a>
                </div>
                {{/projects}}
              </script>
            </div>
          </div>
        </div>
        <div id="dynamic-pages">
          <!-- individual pages will appear to "print" here -->
        </div>
        <footer class="footer">
          <div class="container">
            <div class="col-xs-12 col-sm-6 col-md-8 footer_text">Don't hesitate to <span>drop a line</span> if you want to see more, talk shop, or work togther?</div>
            <div class="col-xs-12 col-sm-6 col-md-4 footer_link">
            	<a href="#">@behance</a>
                <a href="#">@linkedin</a>
                <a href="#">@instagram</a>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 copyright">&copy; 2015 Hitesh Kumar Singhal</div>
          </div>
        </footer>
		<script src="assets/js/jquery-1.11.3.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/custom.js"></script>
        <!--this will print in the above "dynamic pages' area -->
		<script id="project-page" type="text/template">
          <div class="project-page" id="project-{{project.id}}">
			<div class="container">
			<h1>{{project.name}}</h1>
				<p>{{project.description}}</p>
				{{#project.modules}}
				<!--this will print in the above "dynamic pages' area -->
				<span class="{{type}}">
				<img id="img-{{id}}" class="{{type}} img-responsive" src="{{#sizes.max_1200}}{{sizes.max_1200}}{{/sizes.max_1200}}{{^sizes.max_1200}}{{sizes.original}}{{/sizes.max_1200}}" />
				{{/project.modules}}
				<p class="small"></p>
			</div>
			<button class="close">X</button>
          </div>
        </script>
        <!-- this is jquery, needed for a bunch of stuff -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>   
        <!-- this is mustache, required for the templating to happen -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/mustache.js/2.1.2/mustache.min.js"></script>
        <script src="assets/js/behance.js"></script>
        <script>
          var url = 'https://api.behance.net/v2/users/' + userName + '/projects/?api_key=' + apiKey +'&per_page=25&callback=?';
          /* some issue where no more than 25 can be returned at a time, there are ways to ask for more? https://help.behance.net/hc/communities/public/questions/202357274-Number-of-Behance-API-request-results-limited-to-25- */
          console.log('connected to ' + url + '.');
          $.getJSON(url, function(data) {
            //mustache for projects. Get the behance grid the thumbnails.
            var template = $('#project-cards').html();
            var info = Mustache.to_html(template, data);
            $('#behance-magix').html(info);
              //console.log('connected to'+url+'.');
			  $('#behance-magix').append('<div class="three columns col-xs-6 col-sm-6 col-md-4 col-lg-4" id="b{{id}}"><span class="title">Wait, there is more<br>identities, web, print</span></div>');
              $('.project a').click(function(){
                var projectID=$(this).attr('data-project-id');
                var projectUrl='https://api.behance.net/v2/projects/'+projectID+'/?api_key='+apiKey+'&per_page=8';
                  //console.log(projectUrl+'.');
                  $.getJSON(projectUrl, function(data){
                    var template = $('#project-page').html();
                    var info = Mustache.to_html(template, data);
                    $('#dynamic-pages').html(info);
                      $('body').addClass('stop-scrolling');
                      $('button.close').click(function(){
                          $('.project-page').hide();
                          $('body').removeClass('stop-scrolling');
                      });
                  });
              });
          });
		  
        </script>
    </body>
</html>