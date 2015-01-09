<style type="text/css">
    .category-container ul, .category-container li {
        list-style: none;
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    .category-container {
        width: 240px;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    .category {
        padding: 10px 0 10px;
        margin: 0 20px;
        border-bottom: 1px dotted #d1d1d1;
    }

    .category h2 {
        color: #333;
        padding: 3px 2px;
        font-size: 16px;
        font-weight: bold;
        margin: 0;
    }

    .category ul {
        font-size: 12px;
        padding: 5px 0;
    }

    .category li {
        display: inline-block;
    }

    .category li a:hover {
        color: #fff;
        background: #9f2140;
        text-decoration: underline;
    }

    .category a {
        text-decoration: none;
        color: #666;
        line-height: 17px;
        display: block;
        padding: 4px 5px;
        border-radius: 2px;
    }

    .category:last-child {
        border: 0;
    }

    .clear {
        width: 0;
        height: 0;
        overflow: hidden;
        clear: both !important;
        float: none !important;
        padding: 0 !important;
        margin: 0;
    }
</style>
<div class="category-container <?php echo $class ?>" <?php if (!empty($style)) {
    echo 'style="' . $style . '"';
} ?>>
    <div class="category">
        <?php
        foreach ($category_data as $data) {
            echo '<h2>' . $data['title']->name . '</h2>';
            echo '<ul>';
            foreach ($data['list'] as $category) {
                $url = empty($category->url) ? $category->id : $category->url;
                echo '<li><a href="'.Yii::app()->createUrl('catalog/index', array('key'=>$url)).'">' . $category->name . '</a></li>';
            }
            echo '</ul>';
        }
        ?>
    </div>
</div>