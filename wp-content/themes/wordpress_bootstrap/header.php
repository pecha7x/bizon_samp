  <head>
    <meta charset="utf-8"> 
    <title>BizonAppsSAMP</title> <!-- System Automatic Menegment of Work Process -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Le styles -->
    <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">


    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script type="text/javascript" src="/site1/wp-content/themes/wordpress_bootstrap/Bootstrap, from Twitter_files/jquery.js"></script> 
    <script type="text/javascript" src="/site1/wp-content/themes/wordpress_bootstrap/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="/site1/wp-content/plugins/biz-samp-tasks/js/tasks.js"></script> 
    <script type="text/javascript" src="/site1/wp-content/plugins/biz-samp-tasks/js/mess.js"></script>
    <script type="text/javascript" src="/site1/wp-content/plugins/biz-samp-tasks/datepicker/js/bootstrap-datepicker.js"></script> 
    <script type="text/javascript" src="/site1/wp-content/plugins/biz-samp-tasks/modal-windows/fancybox/jquery.fancybox.js?v=2.1.4"></script> 
    <link rel="stylesheet" href="/site1/wp-content/plugins/biz-samp-tasks/datepicker/css/datepicker.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="/site1/wp-content/plugins/biz-samp-tasks/modal-windows/fancybox/jquery.fancybox.css?v=2.1.4" type="text/css" media="screen" />
    <link rel="stylesheet" href="/site1/wp-content/plugins/biz-samp-tasks/modal-windows/css/style.css" type="text/css" media="screen" />
    <!-- Optionally add helpers - button, thumbnail and/or media -->
    <link rel="stylesheet" href="/site1/wp-content/plugins/biz-samp-tasks/modal-windows/fancybox/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
    <script type="text/javascript" src="/site1/wp-content/plugins/biz-samp-tasks/modal-windows/fancybox/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
    <script type="text/javascript" src="/site1/wp-content/plugins/biz-samp-tasks/modal-windows/fancybox/helpers/jquery.fancybox-media.js?v=1.0.5"></script>
    <link rel="stylesheet" href="/site1/wp-content/plugins/biz-samp-tasks/modal-windows/fancybox/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
    <script type="text/javascript" src="/site1/wp-content/plugins/biz-samp-tasks/modal-windows/fancybox/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
    <?php wp_enqueue_script("jquery"); ?>
    <?php wp_head(); ?>
  </head>
  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href=".<?php get_site_url()?>./site1">BizonAppsSAMP</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              Logged in as <a href="#" class="navbar-link"><?php echo wp_get_current_user()->user_login;?> </a> 
              <a href="<?php echo wp_logout_url(); ?>">Logout</a>
            </p>
            <ul class="nav">
                <?php wp_list_pages(array('title_li' => '', 'exclude' => 4)); ?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

  <div class="container-fluid">