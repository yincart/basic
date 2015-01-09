<?php
/**
 * Created by cangzhou.
 * email:wucangzhou@gmail.com
 * Date: 12/17/13
 * Time: 2:47 PM
 */
class WReview extends CWidget
{
    public $_itemId;
    /**
     * @var int
     * for example
     * 1:product;2:article
     */
    public $_entityId;
    public $_rating;
    public $_strOutput;
    public $_strData;

    public function run()
    {
       if(isset($this->_strOutput)){
           if($this->_strOutput){
               $this->_strData=$this->render('review',null,$this->_strOutput);
           }
       }
        else $this->render('review');
    }


    public function reviewData(){
        if(isset($this->_itemId)){
            if($this->_rating!=0){
                $model=Review::model()->reviewFind($this->_itemId,$this->_entityId,$this->_rating);
            }else
                $model=Review::model()->reviewFind($this->_itemId,$this->_entityId,'');
            return $model;
        }
    }
    /**
     * @param $view
     * @param null $data
     * @param bool $return
     * @param bool $processOutput
     * @return string
     * @throws CException
     */
    public function renderPartial($view,$data=null,$return=false,$processOutput=false)
    {
        if(($viewFile=$this->getViewFile($view))!==false)
        {
            $output=$this->renderFile($viewFile,$data,true);
            if($processOutput)
                $output=$this->processOutput($output);
            if($return)
                return $output;
            else
                echo $output;
        }
        else
            throw new CException(Yii::t('yii','{controller} cannot find the requested view "{view}".',
                array('{controller}'=>get_class($this), '{view}'=>$view)));
    }
}
