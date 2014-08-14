<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 13-12-30
 * Time: 上午9:32
 * To change this template use File | Settings | File Templates.
 */

class Tbfunction {
    static public function add_button()
    {
        echo '<button class="btn btn-primary">Add</button>';
    }
    public function add_user($id)
    {
        echo  CHtml::link('Add',array('create','user_id'=>$id),array('class'=>'btn btn-primary'));
    }
    public function view_user($id){
        echo CHtml::link('view',array('detail','id'=>$id),array('class'=>'btn btn-primary'));
    }

    public function view_log($id){
        echo CHtml::link('view',array('detail','id'=>$id),array('class'=>'btn btn-primary'));
    }

    public function getUser($user_id)
    {
        if($user_id == 0 || $user_id == '0')
        {
            return '匿名购买';
        }
        $user = Users::model()->findByAttributes(array('id' => $user_id));
        return $user->username;
    }
    public function showUser()
    {
        $data_user=array();
        $users= Users::model()->findAll();
        foreach($users as $user){
                $data_user[$user->id]=$user->username;
        }

        return $data_user;
    }

    public function state($id){
        echo CHtml::link('view',array('detail','id'=>$id),array('class'=>'btn btn-primary'));
    }

    public function ReturnStatus(){
        return array('0' => '无效', '1' => '有效');
    }

    public function ReturnOrderStatus(){
        return array('0' => '未提交', '1' => '已提交');
    }

    public function ReturnPayStatus(){
        return array('0' => '待支付', '1' => '已支付');
    }

    public function ReturnShipStatus(){
        return array('0' => '未发货', '1' => '已发货');
    }

    public function ReturnRefundStatus(){
        return array('0' => '未退款', '1' => '已退款');
    }

    public function ReturnShipMethod(){
        return array( '1' => '平邮', '2' => '快递', '3' => 'EMS');
    }

    public function ReturnYesOrNo(){
        return array('0' => '否', '1' => '是');
    }

    public function ReturnPayMethod(){
        return array('0' => '货到付款', '1' => '支付宝', '2' => '银行卡');
    }


    public function showPayStatus($pay_status){
        $payStatus=array('0'=>'待支付','1'=>'已支付');
        return $payStatus[$pay_status];
    }

    public function showReceiveAddress($order)
    {

        $detailAddress = '';
        $country = Area::model()->findByPk(array('area_id'=>$order->receiver_country))->name;
        $state = Area::model()->findByPk(array('area_id'=>$order->receiver_state))->name;
        $city = Area::model()->findByPk(array('area_id' => $order->receiver_city))->name;
        $district = Area::model()->findByPk(array('area_id'=>$order->receiver_district))->name;
        $address = $order->receiver_address;
//        var_dump($order);
//        var_dump($address);
        $detailAddress = $country.' '.$state.' '.$city.' '.$district.' '.$address;
        return $detailAddress;
    }

    public function showRefundStatus($refund_status){
        $refundStatus=array('0'=>'未退款','1'=>'已退款');
        return $refundStatus[$refund_status];
    }

    public function showShipMethod($ship_method){
        $shipMethod=array('0'=>'未设置','1'=>'平邮','2'=>'快递','3'=>'EMS');
        return $shipMethod[$ship_method];
    }

    public function showShipDisabled($ship_status)
    {
        $shipStatus = array('0'=>' ','1'=>' disabled');
        return $shipStatus[$ship_status];
    }

    public function showStatus($status){
        $Status=array('0'=>'未提交','1'=>'有效');
        return $Status[$status];
    }

    public function showOrderStatus($status){
        $Status=array('0'=>'未提交','1'=>'已提交');
        return $Status[$status];
    }

    public function showYesOrNo($status){
        $Status=array('0'=>'否','1'=>'是');
        return $Status[$status];
    }

    public function showPayMethod($pay_method_id){
        $payMethod=array('0'=>'货到付款','1'=>'支付宝','2'=>'银行卡');
        return $payMethod[$pay_method_id];
    }

    public function showShipStatus($ship_status){
        $shipStatus=array('0'=>'未发货','1'=>'已发货');
        return $shipStatus[$ship_status];
    }

    public function mainMenu($url){
        if($url==Yii::app()->request->url) return true;
        else return false;
    }



}
