<?php
// This is the magic line of code. Please make sure this stays at the VERY VERY top of your script output before anything else.
$sitemap_output = _sitemap_print( (isset($_GET['xml'])) ? 'xml' : 'html' );
?>




<?php

/**
 * Name: Automatic Site Map
 * Version: 1.01
 * Thank you for purchasing me!
 * Author: David Baker
 * Website: http://tf.dtbaker.com.au/automatic-sitemap/index.html
 * Email: dtbaker@gmail.com
 *
 * 
 * 
 * INSTRUCTIONS:
 * 
 * Upload this file (sitemap.php) to your website (eg: www.mywebsite.com/sitemap.php).
 * 
 * Style the HTML header and footer so that this sitemap looks the same as the rest of your website.
 * This will be different for everyone depending on how the rest of your website is setup.
 * If you have a DreamWeaver template, you will need to apply your template to this page in DreamWeaver.
 * 
 * To adjust which files are displayed, and which files are hidden, scroll down until you see the 
 * big CONFIGURATION START label. There are further instructions there.
 * 
 * You can adjust the default styles below (colors etc..) in the CSS below. Feel free to cut and paste these styles into your site css files too.
 * 
 */

?>




	<!-- Copy and Paste your website header here -->
	<!-- eg: <html><head><title>My Website</title><body ...... -->

<?php include ($_SERVER['DOCUMENT_ROOT'] . "/new-site/head.php"); ?>
<div class="site-wrap">

	<!-- BEGIN DEFAULT SITEMAP STYLES -->
	<style type="text/css">
	.auto_sitemap_container{font-family:arial;}
	.auto_sitemap_container h2{
		color: #3d5a77;
		font-family:helvecia,arial;
	}
	.auto_sitemap a,
	.auto_sitemap a:link,
	.auto_sitemap a:visited{
		font-size: 13px;
		text-decoration: none;
		color: #333333;
	}
	.auto_sitemap a:hover{text-decoration: underline;}
	.auto_sitemap h3,
	.auto_sitemap h3 a{
		font-size: 17px !important;
		color:#2d50a4 !important;
	}
	.auto_sitemap h3{
		border-left: 5px solid #ced7ea !important; 
		margin:1px 0 6px -11px !important;
		padding:0px 0 0px 9px;
	}
	.auto_sitemap_container ul{
		list-style-type: none;
		padding-left: 0px;
		margin: 0px;
	}
	.auto_sitemap_container ul ul{padding-left: 15px;}
	.auto_sitemap_container ul li{
		padding: 4px 0 4px 8px;
		margin: 0 0 0 2px;
		border-left: 1px solid #ced7ea;
	}
	</style>
	<!-- END DEFAULT SITEMAP STYLES -->
	
	
	<!-- START AUTOMATIC SITE MAP -->
	<div class="auto_sitemap_container">
	<h2>My Site Map</h2>
	<?php 
	// This is where your automatic site map will appear.
	echo $sitemap_output;
	?>
	</div>
	<!-- END AUTOMATIC SITE MAP -->
	
	

	<!-- Copy and paste your website footer here -->
	<!-- eg: </body></html> -->
</div>
<?php include ($_SERVER['DOCUMENT_ROOT'] . "/new-site/footer.php"); ?>






<?php
function _sitemap_get_dir($directory){
	/*********************************************/
	/*********************************************/
	/*********************************************/
	/*********************************************/
	/**                                         **/
	/**           CONFIGURATION START           **/
	/**                                         **/
	/*********************************************/
	/*********************************************/
	/*********************************************/
	/*********************************************/
	
			// Below is a list of File Extensions that will be displayed in the Site Map. 
			// If you know regular expressions you can get fancy with the below syntax.
			// If you want to add a new extension to the list (eg: .txt) then just copy 
			// one of the existing lines, and change the extension part. 
			$sitemap_include_files = array(
			
			"/\.php$/i",
			// "/\.htm$/i",
			// "/\.html$/i",
			
			);
	
			// These are the list of files to HIDE from your site map. 
			// These are in regular expression format so you can do all sorts of
			// file hiding. Eg: hide files that start with the word "admin" 
			// If you wanted to hide the file "test.html" you would add this line to the ones below:
			//            "/test\.html/", 
			$sitemap_ignore_files = array(
			
			"/sitemap\.php/i",
			"/admin*./i",
			"/.#adbanners.*/",
			"/.#affiliate-emails.*/",
			"/.#affiliate-resources.*/",
			"/.#wp-contents.*/",
			"/.#wp-includes.*/",
			"/.#wp-admin.*/",
			"/.#cart-testing.*/",
			"/.#clickheat.*/",
			"/.#css.*/",
			"/.#countdown.*/",
			"/.#cfg-contactform-1.*/",
			"/.#es-new.*/",
			"/.#flash.*/",
			"/.#images.*/",
			"/.#index-files.*/",
			"/.#js.*/",
			"/.#library.*/",
			"/.#lp.*/",
			"/.#nav.*/",
			"/.#new-site.*/",
			"/.#organix.*/",
			"/.#shopping-with-okuma.*/",
			"/.#try.*/",
			"/.#VIP.*/",
			"/.#vip-benson.*/",
			"/.#vipbarton.*/",
			"/.#vipdietsolution.*/",
			"/.#vipdrsamhouri.*/",
			"/.#vipdrsears.*/",
			"/.#vipftfl.*/",
			"/.#vipgeary.*/",
			"/.#viphealthyback.*/",
			"/.#vipvipmccumber.*/",
			"/.#vippoulos.*/",
			"/.#vipspecial.*/",
			"/.#vipwellness.*/",
			"/.#ultracart.*/",
			"/code-for-ctas-on-blog-sidebar\.php/i",
			"/index-old\.php/i",
			"/michelle-chen-author-bio\.php/i",

			);
	
			// You probably wont need to change these.
			// These are just the default index files that we look for.
			// If you have a custom index file in each folder (eg: my-home.html) 
			// then you would add "/my-home\.html/" to the list below.
			$sitemap_index_files = array(
			
			"/index\.php/i",
			"/index\.htm/i",
			"/home\.htm/i",
			"/welcome\.htm/i",
			
			);
			
			
	/*********************************************/
	/*********************************************/
	/*********************************************/
	/*********************************************/
	/**                                         **/
	/**           CONFIGURATION END             **/
	/**                                         **/
	/*********************************************/
	/*********************************************/
	/*********************************************/
	/*********************************************/
	
	
	// If you want to get fancy and play with the PHP code, have a fiddle below.
	
	$pages=$directories=array();
	
	/**
	 * Here is where you would inject dynamic content from a database.
	 * Example code:
	if($directory == 'products'){
		$sql = "SELECT product_url, product_name FROM products";
		$res = mysql_query($sql);
		while($row = mysql_fetch_assoc($res)){
			$pages[ $row['product_url'] ] = array(
				"title" => $row['product_name'],
			);
		}
	}
	 */
	
	// the below is very simple, it just finds all the files and folders within a 
	// specified directory.
	if($directory){
		$directory = rtrim($directory,'/') . '/';
	}
	foreach(glob($directory."*") as $f){
		if(is_dir($f)){
			// check if this directory is banned.
			$dir_name = basename($f);
			$whitelist=true;
			foreach($sitemap_ignore_files as $regex){
				if(preg_match($regex,$dir_name)){
					$whitelist=false;
					break;
				}
			}
			if(!$whitelist)continue;
			// we look for the main file within this directory
			$hacky_double_up_directory_lookup = _sitemap_get_dir($f);
			// a dummy title incase we cant find one:
			$title = ucwords(str_replace('-',' ',str_replace("_"," ",(($f=='/')?'Main':basename($f))))); 
			$title_link = $custom_ignore = false;
			foreach($sitemap_index_files as $regex){
				foreach($hacky_double_up_directory_lookup['pages'] as $page_uri => $page_data){
					// is this the index file?
					if(preg_match($regex,basename($page_uri))){
						$title = $page_data['title'];
						$title_link = $page_uri;
						$custom_ignore = basename($page_uri);
						break;
					}
				}
				if($title_link)break;
			}
			$directories[$f] = array(
				"title"=>$title,
				"title_link"=>$title_link,
				"custom_ignore"=>$custom_ignore,
			);
		}else{
			$filename = basename($f);
			// we have to check if this file is within our whitelist
			$whitelist=false;
			foreach($sitemap_include_files as $regex){
				if(preg_match($regex,$filename)){
					$whitelist=true;
					break;
				}
			}
			if(!$whitelist)continue;
			// check if this file has been banned?
			foreach($sitemap_ignore_files as $regex){
				if(preg_match($regex,$filename)){
					$whitelist=false;
					break;
				}
			}
			if(!$whitelist)continue;
			// we open up this file and look for information 
			// like the page title.
			$title=$filename;
			if(is_readable($f)){
				$file_data = file_get_contents($f);
				// look for page heading
				if(preg_match('#<title>([^<]+)</title>#imsU',$file_data,$matches)){
					$title = $matches[1];
				}
			}
			$pages[$f] = array(
				"title"=>$title,
			);
		}
	}
	return array(
		"pages"=>$pages,
		"directories"=>$directories,
	);
}

// this function does most of the work, it asks the above function for
// a list of pages and directories, and prints it out in a tree structure
// on the screen.
// the below is a recursive function (aka: it calls itself from within itself).
// i <3 recursion 
function _sitemap_print($type='html',$directory='',$directory_data=array()){
	if($directory=='' && $type=='xml'){
		@ob_end_clean(); // incase there is already some output buffering?
	}
	ob_start();
	// first we get a list of files within this directory:
	
	$dir_info = _sitemap_get_dir($directory);
	if($dir_info['pages'] || $dir_info['directories']){
		// if we are looking in a directory then we print out that directory title
		if(isset($directory_data['title'])){
			if($type=='html'){
				?>
				<h3>
				<?=($directory_data['title_link'])?'<a href="'.$directory_data['title_link'].'">':'';?>
				<?=$directory_data['title'];?>
				<?=($directory_data['title_link'])?'</a>':'';?>
				</h3> 
				<?
			}else if($type=='xml' && $directory_data['title_link']){
				?>
				<url>
			      <loc>http://<?=$_SERVER['HTTP_HOST'];?>/<?=$directory_data['title_link'];?></loc>
			      <?php if(is_file($directory_data['title_link'])){ ?>
			      <lastmod><?=date("Y-m-d",filemtime($directory_data['title_link']));?></lastmod>
			      <?php } ?>
			      <changefreq>weekly</changefreq>
			      <priority>0.9</priority>
			   </url>
			   <?
			}
		}
		if($type=='xml' && $directory==''){
			header("Content-Type: text/xml");
			echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
			echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
		}else if($type=='html'){
			echo '<ul class="auto_sitemap">';
		}
		// simply loop through the list of pages on the site and display an LI with a link for each of them
		// additional information like *new stars can also be included here.
		foreach($dir_info['pages'] as $page_uri => $page_data){
			if(isset($directory_data['custom_ignore']) && $directory_data['custom_ignore'] == basename($page_uri))continue;
			if($type=='html'){
				?>
		        <li><a href="<?=$page_uri;?>"><?=$page_data['title'];?></a></li>
		        <?
			}else if($type=='xml'){
				?>
				<url>
			      <loc>http://<?=$_SERVER['HTTP_HOST'];?>/<?=$page_uri;?></loc>
			      <?php if(is_file($page_uri)){ ?>
			      <lastmod><?=date("Y-m-d",filemtime($page_uri));?></lastmod>
			      <?php } ?>
			      <changefreq>monthly</changefreq>
			      <?php if(!$directory && preg_match('/index/i',$page_uri)){ ?> <priority>1</priority> <?php } ?>
			   </url>
				<?
			}
		}
		foreach($dir_info['directories'] as $directory_uri => $directory_data){
			// first we check if this has any info in it.
			$sub_dir_result = _sitemap_print($type,$directory_uri,$directory_data);
			// do it like this otherwise we can end up with empty <li>'s everywhere.
			if($sub_dir_result){
				echo ($type=='html') ? '<li>' : '';
				echo $sub_dir_result;
				echo ($type=='html') ? '</li>' : '';
			}
		}
		echo ($type=='html') ? '</ul>' : '';
		if($type=='xml' && $directory==''){
			echo '</urlset>';
		}
	}
	if($type=='xml' && $directory==''){
		echo ob_get_clean();
		exit;
	}
	return  ob_get_clean();
}

?>