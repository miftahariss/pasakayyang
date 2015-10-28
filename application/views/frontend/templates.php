<!DOCTYPE HTML>
<!--
Design by Free Responsive Templates
http://www.free-responsive-templates.com
Released for free under a Creative Commons Attribution 3.0 Unported License (CC BY 3.0) 
-->
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Festival Bajo Pasakayyang 2015</title>
<link href="<?php echo base_url(); ?>asset/css/styles.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/flexslider.css" type="text/css" media="screen" />

<?php if($base == "Galeri"){ ?>

<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript"  src="<?php echo base_url(); ?>asset/source/jquery.fancybox.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/source/jquery.fancybox.css" media="screen" />
<script type="text/javascript" src="<?php echo base_url(); ?>asset/source/helpers/jquery.fancybox-media.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      /*
       *  Simple image gallery. Uses default settings
       */

      $('.fancybox').fancybox();

      /*
       *  Different effects
       */
       
      
      // Change title type, overlay closing speed
      $(".fancybox-effects-a").fancybox({
        helpers: {
          title : {
            type : 'outside'
          },
          overlay : {
            speedOut : 0
          }
        }
      });
      });
</script>
 
<?php } else { ?>

<style>
    .flexslider {
      margin-bottom: 10px;
    }

    .flex-control-nav {
        margin-top:20px;
      position: relative;
      bottom: auto;
    }

    .custom-navigation {
      display: table;
      width: 100%;
      table-layout: fixed;
    }

    .custom-navigation > * {
      display: table-cell;
    }

    .custom-navigation > a {
      width: 50px;
    }

    .custom-navigation .flex-next {
      text-align: right;
    }
  </style>

<?php } ?>
</head>
<body>
<div class="container_full">
    <header>
    <div class="logo">
        <div class="logo_fest"><img src="<?php echo base_url(); ?>asset/images/logo_fest.png" alt=""/></div>
        <div class="paitu"><img src="<?php echo base_url(); ?>asset/images/paitu.png" alt=""/></div>
        <div class="wonder"><img src="<?php echo base_url(); ?>asset/images/wonder.png" alt=""/></div> 
        </div>
  </header><br class="clearfloat" />
    <div class="menubar">
        <div class="menu">
          <ul id="button">
                <li id="menu1"><a href="<?php echo base_url(); ?>"></a></li>
                <li id="menu2"><a href="<?php echo base_url(); ?>morowali"></a></li>
                <li id="menu3"><a href="<?php echo base_url(); ?>sukubajo"></a></li>
                <li id="menu4"><a href="<?php echo base_url(); ?>festival"></a></li>
                <li id="menu5"><a href="<?php echo base_url(); ?>galeri"></a></li>
                <li id="menu6"><a href="<?php echo base_url(); ?>update"></a></li>
                <li id="menu7"><a href="<?php echo base_url(); ?>kontak"></a></li>
        </ul>
        </div>
    </div>
    <?php if($base == "Home"){ ?>
    <div class="slider">
         <div class="flexslider">
                <ul class="slides">
                    <li><img src="<?php echo base_url(); ?>asset/images/ilus01.jpg" alt=""><div class="sliderImageCaption"></li>
                    <li><img src="<?php echo base_url(); ?>asset/images/ilus05.jpg" alt=""><div class="sliderImageCaption"></li>
                    <li><img src="<?php echo base_url(); ?>asset/images/ilus02.jpg" alt=""><div class="sliderImageCaption"></li>
                    <li><img src="<?php echo base_url(); ?>asset/images/ilus03.jpg" alt=""><div class="sliderImageCaption"></li>
                    <li><img src="<?php echo base_url(); ?>asset/images/ilus04.jpg" alt=""><div class="sliderImageCaption"></li>
                </ul>
          </div>
     </div>
     <?php } ?>
    
     <?php $this->load->view($mainpage); ?>

        <!-- end .boxes -->   
        
        <br class="clearfloat" />
    </section>
    <footer>
        <ul class="sosmed">
            <li><img src="<?php echo base_url(); ?>asset/images/icon_fb.jpg"></li>
            <li><img src="<?php echo base_url(); ?>asset/images/icon_twitter.jpg"></li>
            <li><img src="<?php echo base_url(); ?>asset/images/icon_pint.jpg"></li>
            <li><img src="<?php echo base_url(); ?>asset/images/icon_youtube.jpg"></li>
        </ul>
        <p>
            Copyright &copy; Festival Bajo Pasakayyang 2015 All Right Reserved 
        </p>
  </footer>
</div>
</div>
<?php if($base == "Home"){ ?>
 <script src="<?php echo base_url(); ?>asset/js/jquery.flexslider-min.js"></script>
  <script src="<?php echo base_url(); ?>asset/js/jquery-1.7.1.min.js"></script>

  <!-- FlexSlider -->
  <script defer src="<?php echo base_url(); ?>asset/js/jquery.flexslider.js"></script>

  <script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        controlsContainer: $(".custom-controls-container"),
        customDirectionNav: $(".custom-navigation a"),
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>
  <?php } ?>
  <?php if($base == "Galeri"){ ?>
  <style type="text/css">
    .fancybox-custom .fancybox-skin {
      box-shadow: 0 0 50px #222;
    }
  </style>
  <?php } ?>
</body>
</html>
