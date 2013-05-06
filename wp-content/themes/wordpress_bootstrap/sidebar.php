
<div class="sidebar">
<br>
<div class="serch-form">
 <form method="get" class="form-search search-query" id="searchform" action="<?php bloginfo('url'); ?>/"> 
	<input type="text"   placeholder="Поиск..." value="<?php echo $search_text; ?>"
		name="s" id="s"  class="with-button"
		onblur="if (this.value == '')  
		{this.value = '<?php echo $search_text; ?>';}"  
		onfocus="if (this.value == '<?php echo $search_text; ?>')  
		{this.value = '';}" /> 
		<input type="submit" value="Искать" class="btn" />
	<input type="hidden" id="searchsubmit" /> 
	</div>
	<hr>
<div class="list-categories"
	<?php  
wp_list_categories();
?>
</div>
<hr>

<div class="posts">
    <div class="tabbable">
    <ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">Последние статьи</a></li>
    <li><a href="#tab2" data-toggle="tab">Популярные статьи</a></li>
    </ul>
    <div class="tab-content">
    <div class="tab-pane active" id="tab1">
    <p>Здесь список последних опубликованных статей</p>
    </div>
    <div class="tab-pane" id="tab2">
    <p>Здесь список самых популярных статей</p>
    </div>
    </div>
    </div>
	</div>
	
	
</div>