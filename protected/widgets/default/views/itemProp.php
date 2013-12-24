<style type="text/css">
    .props-container ul, .props-container li {
        list-style: none;
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    .props-container {
        width: 990px;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    .props {
        padding: 10px 0 10px;
        margin: 0 20px;
        border-bottom: 1px dotted #d1d1d1;
    }

    .props ul {
        font-size: 12px;
        padding: 5px 0;
    }

    .props li {
        display: inline-block;
        width: 300px;
    }

    .props:last-child {
        border: 0;
    }
</style>
<div class="props-container">
    <div class="props">
        <ul>
            <?php
            foreach ($prop_data as $prop_name => $prop_value) {
                echo '<li class="col-span-3" title="' . $prop_value . '">' . $prop_name . ': ' . $prop_value . '</li>';
            }
            ?>
        </ul>
    </div>
</div>