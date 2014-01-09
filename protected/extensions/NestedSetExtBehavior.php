<?php
/**
 * class NestedSetBehaviorExt is extension for NestedSetBehavior
 * provider some useful function for html view
 * @author Lujie.Zhou(gao_lujie@live.cn, qq:821293064).
 */

class NestedSetExtBehavior extends CActiveRecordBehavior
{

    public $id = 'id';

    /**
     * create category view tree html
     * @param $descendants , if input is int, findByPk in db as root
     * @param array $options , show options for action
     * @param string $name , show display name, can also input function name
     * @return string,
     * @author Lujie.Zhou(gao_lujie@live.cn, qq:821293064).
     */
    public function getTree($descendants, $options = array(), $name = 'name')
    {
        if (is_integer($descendants)) {
            if ($descendants) {
                $root = $this->owner->findByPk($descendants);
                $descendants = $root->descendants()->findAll();
            } else {
                $descendants = $this->owner->findAll();
            }
        }

        $html = '';
        $level = 0;

        foreach ($descendants as $n => $descendant) {
            if ($descendant->level == $level)
                $html .= CHtml::closeTag('li') . "\n";
            else if ($descendant->level > $level)
                $html .= CHtml::openTag('ul') . "\n";
            else {
                $html .= CHtml::closeTag('li') . "\n";

                for ($i = $level - $descendant->level; $i; $i--) {
                    $html .= CHtml::closeTag('ul') . "\n";
                    $html .= CHtml::closeTag('li') . "\n";
                }
            }

            $html .= CHtml::openTag('li', array('data-level' => $descendant->level));
            if (method_exists($descendant, $name)) {
                $html .= $descendant->{$name}();
//                $html = call_user_func(array($descendant, $name));
            } else {
                $html .= CHtml::encode($descendant->{$name});
            }

            $html .= '<span style="float:right;">';
            foreach ($options as $op) {
                $op_id = isset($op['id']) ? $op['id'] : 'id';
                $op['url'] = isset($op['url']) && $op['url'] ? array($op['url'], $op_id => $descendant->{$this->id}) : '';
                if (isset($op['htmlOptions']['submit'])) {
                    $op['htmlOptions']['submit'] = array($op['htmlOptions']['submit'], $op_id => $descendant->{$this->id});
                }
                $html .= '[' . CHtml::link($op['text'], $op['url'], $op['htmlOptions']) . ']';
            }
            $html .= '</span>';

            $level = $descendant->level;
            $level = $descendant->level;
        }

        for ($i = $level; $i; $i--) {
            $html .= CHtml::closeTag('li') . "\n";
            $html .= CHtml::closeTag('ul') . "\n";
        }

        return $html;
    }

    /**
     * get select html
     * @param $descendants
     * @param $select_name
     * @param int $selected_id
     * @param string $name
     * @param array $separators
     * @return string
     * @author Lujie.Zhou(gao_lujie@live.cn, qq:821293064).
     */
    public function getSelectHtml($descendants, $select_name, $selected_id = 0, $name = 'name', $separators = array('&nbsp;&nbsp;|--', '&nbsp;&nbsp;|--', '&nbsp;&nbsp;|--', '&nbsp;&nbsp;|--'))
    {
        if (is_integer($descendants)) {
            $root = $this->owner->findByPk($descendants);
            $descendants = $root->descendants()->findAll();
        }

        $select_id = str_replace(']', '', str_replace('[', '_', $select_name));
        $html = '<select id="' . $select_id . '" name="' . $select_name . '">';
        $level = 1;
        $prefix = array('');
        foreach ($descendants as $n => $descendant) {
            if (!$descendant->isRoot()) {
                if ($descendant->next()->find()) {
                    $descendant_name = $separators[0];
                    $prefix[$descendant->level] = $separators[2];
                } else {
                    $descendant_name = $separators[1];
                    $prefix[$descendant->level] = $separators[3];
                }
            }
            $descendant_name = implode('', array_slice($prefix, 0, $descendant->level - $level)) . $descendant_name . ' ' . $descendant->{$name};
            $selected = $selected_id && $selected_id == $descendant->{$id} ? ' selected="selected"' : '';
            if ($descendant->isLeaf()) {
                $html .= '<option value="' . $descendant->{$this->id} . '"' . $selected . '>' . $descendant_name . '</option>';
            } else {
                $html .= '<optgroup label="' . $descendant_name . '"></optgroup>';
            }
        }
        $html .= '</select>';
        return $html;
    }

    /**
     * get select options
     * @param $descendants
     * @param bool $hasRoot
     * @param string $name
     * @param array $separators
     * @return array
     * @author Lujie.Zhou(gao_lujie@live.cn, qq:821293064).
     */
    public function getSelectOptions($descendants, $hasRoot = false, $name = 'name', $separators = array('--|--', '--|--', '--|--', '--|--'))
    {
        if (is_integer($descendants)) {
            $root = $this->owner->findByPk($descendants);
            $descendants = $root->descendants()->findAll();
        }

        $level = 1;
        $prefix = array('');
        $options = array();
        if ($hasRoot) $options[$root->{$this->id}] = $root->{$name};
        foreach ($descendants as $n => $descendant) {
            if (!$descendant->isRoot()) {
                if ($descendant->next()->find()) {
                    $descendant_name = $separators[0];
                    $prefix[$descendant->level] = $separators[2];
                } else {
                    $descendant_name = $separators[1];
                    $prefix[$descendant->level] = $separators[3];
                }
                $descendant_name = implode('', array_slice($prefix, 0, $descendant->level - $level)) . $descendant_name . ' ' . $descendant->{$name};
                $options[$descendant->{$this->id}] = substr($descendant_name, 2);
            } else {
                $options[$descendant->{$this->id}] = $descendant->{$name};
            }
        }
        return $options;
    }

    /**
     * get descendant Ids
     * @return array
     * @author Lujie.Zhou(gao_lujie@live.cn, qq:821293064).
     */
    public function getDescendantIds()
    {
        $descendants = $this->owner->descendants()->findAll();
        $descendantIds = array($this->owner->category_id);
        foreach ($descendants as $descendant) {
            $descendantIds[] = $descendant->category_id;
        }
        return $descendantIds;
    }
}