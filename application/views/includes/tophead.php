<!DOCTYPE html>
<html lang="en">
   <meta http-equiv="content-type" content="text/html;charset=utf-8" />
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta http-equiv="X-Frame-Options" content="deny">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <link rel="shortcut icon" href="misc/favicon.ico" type="image/x-icon" />
      <title>
         বাংলাদেশ (Bangladesh) জাতীয় তথ্য বাতায়ন | গণপ্রজাতন্ত্রী বাংলাদেশ সরকার | People's Republic of Bangladesh
      </title>
      <meta name="description" content="The National Web Portal of Bangladesh (বাংলাদেশ) is the single window of all information and services for citizens and other stakeholders. Here the citizens can find all initiatives, achievements, investments, trade and business, policies, announcements, publications, statistics and others facts"/>
      <!-- =============== tt canonical start =============================== -->
      <link rel="canonical" href="index.html">
      <!-- =============== tt canonical End =============================== -->
      <!-- Mobile Specific Metas
         ================================================== -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="<?php echo base_url();?>asset/admin/css/bootstrap.css" rel="stylesheet" type="text/css">
      <link type="text/css" rel="stylesheet" media="all" href="<?php echo base_url();?>assets/stylesheets/base.css" />
      <link type="text/css" rel="stylesheet" media="all" href="<?php echo base_url();?>assets/stylesheets/skeleton.css" />
      <link type="text/css" rel="stylesheet" media="all" href="<?php echo base_url();?>assets/stylesheets/style.css" />
      <link type="text/css" rel="stylesheet" media="all" href="<?php echo base_url();?>assets/stylesheets/meganizr.css" />
      <link type="text/css" rel="stylesheet" media="all" href="<?php echo base_url();?>assets/stylesheets/demo.css" />
      <link type="text/css" rel="stylesheet" media="all" href="npfadmin/public/css/flaticon/flaticon.css" />
      <link type="text/css" rel="stylesheet" media="all" href="<?php echo base_url();?>assets/templates/bangladesh/style.css" />
      <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>       
      <script src="<?php echo base_url();?>assets/js/jquery.anyslider.js" type="text/javascript"></script>
      <link rel="stylesheet" href="<?php echo base_url();?>assets/stylesheets/responsiveslides.css">
      <script src="<?php echo base_url();?>assets/js/responsiveslides.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/jquery.vticker.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>assets/js/domain_selector.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>assets/js/utils.js" type="text/javascript"></script>
      <script type="text/javascript" src="<?php echo base_url();?>assets/js/yoxview/yoxview-init.js"></script>
      <script>
         function setLanguageCookie(cookieValue) {
             var today = new Date();
             var expire = new Date();
             var cookieName = 'lang';
             //var cookieValue = "bn";
             var nDays = 5;
             expire.setTime(today.getTime() + 3600000 * 24 * nDays);
             document.cookie = cookieName + "=" + escape(cookieValue)
                     + ";expires=" + expire.toGMTString();
         }
         
         function setLanguage() {
             $("#lang_form").submit();
             return false;
         }
         
         // You can also use "$(window).load(function() {"
         $(function() {
         
         
             // Slideshow 4
             $("#front-image-slider").responsiveSlides({
                 auto: true,
                 pager: true,
                 nav: true,
                 speed: 3000,
                 maxwidth: 960,
                 namespace: "callbacks"
             });
             $("#right-content a").click(function() {
                 var url = $(this).attr('href');
                 if (isExternal(url) && url != 'javascript:;') {
                     openInNewTab(url);
                     return false;
                 }
             });
         });
         function openInNewTab(url)
         {
             var win = window.open(url, '_blank');
             win.focus();
         }
         function isExternal(url) {
             var match = url.match(/^([^:\/?#]+:)?(?:\/\/([^\/?#]*))?([^?#]+)?(\?[^#]*)?(#.*)?/);
             if (typeof match[1] === "string" && match[1].length > 0 && match[1].toLowerCase() !== location.protocol)
                 return true;
             if (typeof match[2] === "string" && match[2].length > 0 && match[2].replace(new RegExp(":(" + {"http:": 80, "https:": 443}[location.protocol] + ")?$"), "") !== location.host)
                 return true;
             return false;
         }
      </script>
   </head>
   <body>