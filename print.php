<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Hitesh</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" href="http://fonts.typotheque.com/WF-027106-009064.css" type="text/css" />
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/stylesheet.css">
    </head>
    <body class="white_bg">
    	<?php include("includes/navigation.php"); ?>
        <div class="content-area work-area">
            <div class="container">
            	<div class="">
                	<h1 class="col-lg-12 title"><span>Select Print Projects</span></h1>
                	<div> 
                        <div class="project three columns col-xs-6 col-sm-6 col-md-3 col-lg-3" id="b24534055">
                        	<a class="wrapping" href="#24534055" data-project-id="24534055">
                                <img class="img-responsive" src="assets/images/projects/future_zine.jpg" alt="imaginary museum" />
                                <div class="info">
                                    <h2 class="name">Future Zine—Experiment with Processing</h2>
                                </div>
                            </a>
                        </div>
                        
                        <div class="project three columns col-xs-6 col-sm-6 col-md-3 col-lg-3" id="b26205905">
                        	<a class="wrapping" href="#26205905" data-project-id="26205905">
                                <img class="img-responsive" src="assets/images/projects/four_legged.jpg" alt="imaginary museum" />
                                <div class="info">
                                    <h2 class="name">Four Legged Tale—Lettering</h2>
                                </div>
                            </a>
                        </div>
                        
                        <div class="project three columns col-xs-6 col-sm-6 col-md-3 col-lg-3" id="b26152245">
                        	<a class="wrapping" href="#26152245" data-project-id="26152245">
                                <img class="img-responsive" src="assets/images/projects/how_poster.jpg" alt="howposter" />
                                <div class="info">
                                    <h2 class="name">Cooper Hewitt Book—Publication Design</h2>
                                </div>
                            </a>
                        </div>
                        
                    </div>
                </div>                
                    
                <h1 class="col-lg-12 title"><span>Print Archive</span></h1>
                <div class="row slide col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="slide_desc col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <strong>Bandhini Home, 2014</strong><br>
                        I have seen the days when<br>
                        websites were designed on<br>
                        Flash and only typefaces we<br>
                        could used were Georgia &amp;<br>
                        Verdana. Here are some more<br>
                        old and really old websites I<br>
                        designed. (sans Flash)
                    </div>
                    <div class="slide_img col-xs-12 col-sm-12 col-md-11 col-lg-11 pull-right">
                        <img class="img-responsive" src="assets/images/projects/demo.jpg" title="" />
                    </div>
                </div>
                <div class="row slide col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="slide_desc col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <strong>Bandhini Home, 2014</strong><br>
                        I have seen the days when<br>
                        websites were designed on<br>
                        Flash and only typefaces we<br>
                        could used were Georgia &amp;<br>
                        Verdana. Here are some more<br>
                        old and really old websites I<br>
                        designed. (sans Flash)
                    </div>
                    <div class="slide_img col-xs-12 col-sm-12 col-md-11 col-lg-11 pull-right">
                        <img class="img-responsive" src="assets/images/projects/dummy.jpg" title="" />
                    </div>
                </div>
            </div>
        </div>
        <div id="dynamic-pages">
          <!-- individual pages will appear to "print" here -->
        </div>
        <?php include("includes/footer.php"); ?>
		<?php include("includes/footer_script.php"); ?>
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
			<button class="close">Close</button>
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
              console.log('connected to'+url+'.');
              $('.project a').click(function(){
                var projectID=$(this).attr('data-project-id');
                var projectUrl='https://api.behance.net/v2/projects/'+projectID+'/?api_key='+apiKey+'&callback=?';
                  console.log(projectUrl+'.');
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