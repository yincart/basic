<style type="text/css">
	.oauth-group{
		clear:both;
		height: 20px;
	}
	.oauth-group p{
		 float: left;
	}
	.oauth-media-list,.oauth-media{
		display: block;
		list-style: none outside none;
		height: 16px;
	}
	.oauth-media{
		float: left;
		margin: 2px 0 0 6px;
		width: 16px;
	}
	i.oauth{
		background-image: url(<?php echo $imgDir.'/media.png'; ?>);
		background-color: rgba(0, 0, 0, 0);
		width: 16px;
		height: 16px;
		display: block;
	}
	.media-weibo{
		background-position: 0 0;
	}
	.media-qq{
		background-position: 0 -192px;
	}
</style>

<div class="oauth-group">
	<p>第三方登录: </p>
	<ul class="oauth-media-list">
		<?php
		foreach ($enable as $media) {
			echo '<li class="oauth-media">';
			echo CHtml::link('<i class="oauth media-'.$media.'"></i>',$this->createUrl('login',array('type'=>$media)));
			echo '</li>';
		}
		?>
	</ul>
</div>