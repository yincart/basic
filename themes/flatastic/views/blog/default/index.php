<?php if(!empty($_GET['tag'])): ?>
<h1>Posts Tagged with <i><?php echo CHtml::encode($_GET['tag']); ?></i></h1>
<?php endif; ?>

<?php
//$this->widget('zii.widgets.CListView', array(
//	'dataProvider'=>$dataProvider,
//	'itemView'=>'_view',
//	'template'=>"{items}\n{pager}",
//));
?>
<!--breadcrumbs-->
<section class="breadcrumbs">
	<div class="container">
		<ul class="horizontal_list clearfix bc_list f_size_medium">
			<li class="m_right_10 current"><a href="#" class="default_t_color">Home<i class="fa fa-angle-right d_inline_middle m_left_10"></i></a></li>
			<li><a href="#" class="default_t_color">Blog</a></li>
		</ul>
	</div>
</section>
<!--content-->
<div class="page_content_offset">
	<div class="container">
		<div class="row clearfix">
			<!--left content column-->
			<section class="col-lg-9 col-md-9 col-sm-9">
				<h2 class="tt_uppercase color_dark m_bottom_25">Blog</h2>
				<!--blog post-->
				<article class="m_bottom_25">
					<a href="#" class="d_block photoframe r_corners wrapper shadow m_bottom_25">
						<img src="<?php echo F::themeUrl() ?>/images/blog_img_4.jpg" class="tr_all_long_hover" alt="">
					</a>
					<div class="row clearfix m_bottom_10">
						<div class="col-lg-9 col-md-9 col-sm-9">
							<h4 class="m_bottom_5"><a href="#" class="color_dark fw_medium">Ut tellus dolor, dapibus eget, elementum vel</a></h4>
							<p class="f_size_medium">25 January, 2013, <a href="#" class="color_dark">12 comments</a>, on <a href="#" class="color_dark">Fashion</a></p>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 t_align_r t_sm_align_l">
							<p class="f_size_medium d_sm_inline_middle">Rate this item</p>
							<!--rating-->
							<ul class="horizontal_list d_inline_middle type_2 clearfix rating_list tr_all_hover">
								<li class="active">
									<i class="fa fa-star-o empty tr_all_hover"></i>
									<i class="fa fa-star active tr_all_hover"></i>
								</li>
								<li class="active">
									<i class="fa fa-star-o empty tr_all_hover"></i>
									<i class="fa fa-star active tr_all_hover"></i>
								</li>
								<li class="active">
									<i class="fa fa-star-o empty tr_all_hover"></i>
									<i class="fa fa-star active tr_all_hover"></i>
								</li>
								<li class="active">
									<i class="fa fa-star-o empty tr_all_hover"></i>
									<i class="fa fa-star active tr_all_hover"></i>
								</li>
								<li>
									<i class="fa fa-star-o empty tr_all_hover"></i>
									<i class="fa fa-star active tr_all_hover"></i>
								</li>
							</ul>
							<a href="#" class="d_inline_middle f_size_medium default_t_color m_left_5">(1 Vote)</a>
						</div>
					</div>
					<!--post content-->
					<p class="m_bottom_10">Aliquam erat volutpat. Duis ac turpis. Donec sit amet eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante eu lacus.Vestibulum libero nisl, porta vel, scelerisque eget, malesuada at, neque. Vivamus eget nibh. Etiam cursus leo vel metus. Nulla facilisi. Aenean nec eros. </p>
					<a href="#" class="tt_uppercase f_size_large">Read More</a>
				</article>
				<hr class="divider_type_3 m_bottom_30">
				<article class="m_bottom_20 clearfix">
					<a href="#" class="photoframe d_block d_xs_inline_b f_xs_none wrapper shadow f_left m_right_20 m_bottom_10 r_corners">
						<img src="<?php echo F::themeUrl() ?>/images/blog_img_5.jpg" class="tr_all_long_hover" alt="">
					</a>
					<div class="mini_post_content">
						<h4 class="m_bottom_5"><a href="#" class="color_dark fw_medium">Aenean auctor wisi et urna</a></h4>
						<p class="f_size_medium m_bottom_10">20 January, 2013, <a href="#" class="color_dark">33 comments</a>, on <a href="#" class="color_dark">New Arrivals</a></p>
						<hr>
						<div class="rating_min_article">
							<p class="f_size_medium d_inline_middle d_sm_block d_xs_inline_middle">Rate this item</p>
							<!--rating-->
							<ul class="horizontal_list d_inline_middle type_2 clearfix rating_list tr_all_hover m_left_5 m_sm_left_0">
								<li class="active">
									<i class="fa fa-star-o empty tr_all_hover"></i>
									<i class="fa fa-star active tr_all_hover"></i>
								</li>
								<li class="active">
									<i class="fa fa-star-o empty tr_all_hover"></i>
									<i class="fa fa-star active tr_all_hover"></i>
								</li>
								<li class="active">
									<i class="fa fa-star-o empty tr_all_hover"></i>
									<i class="fa fa-star active tr_all_hover"></i>
								</li>
								<li class="active">
									<i class="fa fa-star-o empty tr_all_hover"></i>
									<i class="fa fa-star active tr_all_hover"></i>
								</li>
								<li>
									<i class="fa fa-star-o empty tr_all_hover"></i>
									<i class="fa fa-star active tr_all_hover"></i>
								</li>
							</ul>
							<a href="#" class="d_inline_middle f_size_medium default_t_color m_left_5">(3 Votes)</a>
						</div>
						<hr class="m_bottom_15">
						<p class="m_bottom_10">Aliquam erat volutpat. Duis ac turpis. Donec sit amet eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. </p>
						<a href="#" class="tt_uppercase f_size_large">Read More</a>
					</div>
				</article>
				<hr class="divider_type_3 m_bottom_30">
				<article class="m_bottom_20 clearfix">
					<a href="#" class="photoframe d_block d_xs_inline_b f_xs_none wrapper shadow f_left m_right_20 m_bottom_10 r_corners">
						<img src="<?php echo F::themeUrl() ?>/images/blog_img_6.jpg" class="tr_all_long_hover" alt="">
					</a>
					<div class="mini_post_content">
						<h4 class="m_bottom_5"><a href="#" class="color_dark fw_medium">Vivamus eget nibh</a></h4>
						<p class="f_size_medium m_bottom_10">19 January, 2013, <a href="#" class="color_dark">add new comment</a>, on <a href="#" class="color_dark">Trends</a></p>
						<hr>
						<div class="rating_min_article">
							<p class="f_size_medium d_inline_middle d_sm_block d_xs_inline_middle">Rate this item</p>
							<!--rating-->
							<ul class="horizontal_list d_inline_middle type_2 clearfix rating_list tr_all_hover m_left_5 m_sm_left_0">
								<li class="active">
									<i class="fa fa-star-o empty tr_all_hover"></i>
									<i class="fa fa-star active tr_all_hover"></i>
								</li>
								<li class="active">
									<i class="fa fa-star-o empty tr_all_hover"></i>
									<i class="fa fa-star active tr_all_hover"></i>
								</li>
								<li class="active">
									<i class="fa fa-star-o empty tr_all_hover"></i>
									<i class="fa fa-star active tr_all_hover"></i>
								</li>
								<li class="active">
									<i class="fa fa-star-o empty tr_all_hover"></i>
									<i class="fa fa-star active tr_all_hover"></i>
								</li>
								<li>
									<i class="fa fa-star-o empty tr_all_hover"></i>
									<i class="fa fa-star active tr_all_hover"></i>
								</li>
							</ul>
							<a href="#" class="d_inline_middle f_size_medium default_t_color m_left_5">(0 Vote)</a>
						</div>
						<hr class="m_bottom_15">
						<p class="m_bottom_10">Aliquam erat volutpat. Duis ac turpis. Donec sit amet eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. </p>
						<a href="#" class="tt_uppercase f_size_large">Read More</a>
					</div>
				</article>
				<hr class="divider_type_3 m_bottom_30">
				<article class="m_bottom_20 clearfix">
					<a href="#" class="photoframe d_block d_xs_inline_b f_xs_none wrapper shadow f_left m_right_20 r_corners m_bottom_10">
						<img src="<?php echo F::themeUrl() ?>/images/blog_img_8.jpg" class="tr_all_long_hover" alt="">
					</a>
					<div class="mini_post_content">
						<h4 class="m_bottom_5"><a href="#" class="color_dark fw_medium">In pede mi, aliquet sit </a></h4>
						<p class="f_size_medium m_bottom_10">11 January, 2013, <a href="#" class="color_dark">50 Comments</a>, on <a href="#" class="color_dark">Fashion</a></p>
						<hr>
						<div class="rating_min_article">
							<p class="f_size_medium d_inline_middle d_sm_block d_xs_inline_middle">Rate this item</p>
							<!--rating-->
							<ul class="horizontal_list d_inline_middle type_2 clearfix rating_list tr_all_hover m_left_5 m_sm_left_0">
								<li class="active">
									<i class="fa fa-star-o empty tr_all_hover"></i>
									<i class="fa fa-star active tr_all_hover"></i>
								</li>
								<li class="active">
									<i class="fa fa-star-o empty tr_all_hover"></i>
									<i class="fa fa-star active tr_all_hover"></i>
								</li>
								<li class="active">
									<i class="fa fa-star-o empty tr_all_hover"></i>
									<i class="fa fa-star active tr_all_hover"></i>
								</li>
								<li class="active">
									<i class="fa fa-star-o empty tr_all_hover"></i>
									<i class="fa fa-star active tr_all_hover"></i>
								</li>
								<li>
									<i class="fa fa-star-o empty tr_all_hover"></i>
									<i class="fa fa-star active tr_all_hover"></i>
								</li>
							</ul>
							<a href="#" class="d_inline_middle f_size_medium default_t_color m_left_5">(7 Votes)</a>
						</div>
						<hr class="m_bottom_15">
						<p class="m_bottom_10">Aliquam erat volutpat. Duis ac turpis. Donec sit amet eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. </p>
						<a href="#" class="tt_uppercase f_size_large">Read More</a>
					</div>
				</article>
				<hr class="divider_type_3 m_bottom_10">
				<div class="row clearfix m_xs_bottom_30">
					<div class="col-lg-7 col-md-7 col-sm-7 col-xs-5">
						<p class="d_inline_middle f_size_medium">Results 1 - 5 of 45</p>
					</div>
					<div class="col-lg-5 col-md-5 col-sm-5 col-xs-7 t_align_r">
						<!--pagination-->
						<a role="button" href="#" class="f_size_large button_type_10 color_dark d_inline_middle bg_cs_hover bg_light_color_1 t_align_c tr_delay_hover r_corners box_s_none"><i class="fa fa-angle-left"></i></a>
						<ul class="horizontal_list clearfix d_inline_middle f_size_medium m_left_10">
							<li class="m_right_10"><a class="color_dark" href="#">1</a></li>
							<li class="m_right_10"><a class="scheme_color" href="#">2</a></li>
							<li class="m_right_10"><a class="color_dark" href="#">3</a></li>
						</ul>
						<a role="button" href="#" class="f_size_large button_type_10 color_dark d_inline_middle bg_cs_hover bg_light_color_1 t_align_c tr_delay_hover r_corners box_s_none"><i class="fa fa-angle-right"></i></a>
					</div>
				</div>
			</section>
			<!--right column-->
			<?php $this->widget('application.modules.blog.widgets.WRightColumn') ?>
		</div>
	</div>
</div>