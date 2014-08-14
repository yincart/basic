<?php

class PageDynamicForm extends CFormModel {
        
        private $_dynamicData=array();
        private $_dynamicFields = array(
                 'keywords' => 1,
                 'descrition' => 1
        );
        
        public function rules() {
                return array(
                        array('keywords, descrition', 'safe')
                );
        }
        
        public function attributeNames() {
                return array_merge(
                        parent::attributeNames(),
                        array_keys($this->_dynamicFields)
                );
        }

        /**
         * Returns the value for a dynamic attribute, if not, falls back to parent
         * method
         * 
         * @param type $name
         * @return type 
         */
        public function __get($name) {
                if (!empty($this->_dynamicFields[$name])) {
                        if (!empty($this->_dynamicData[$name])) {
                                return $this->_dynamicData[$name];
                        } else {
                                return null;
                        }
                        
                } else {
                        return parent::__get($name);
                }
        }
        
        /**
         * Overrides the setter to store dynamic data.
         * 
         * @param type $name
         * @param type $val 
         */
        public function __set($name, $val) {
                if (!empty($this->_dynamicFields[$name])) {
                        $this->_dynamicData[$name] = $val;
                } else {
                        parent::__set($name, $value);
                }
        }
        
}