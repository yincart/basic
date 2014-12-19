<?php

class SettingsForm extends CFormModel
{
    public  $logo = '';

    public function  getLogo()
    {
        return $this->logo;
    }
    public $site = array(
        'name' => '',
        'domain' => '',
        'googleAPIKey' => '',
        'defaultLanguage' => '',
        'defaultCurrency' => '',
        'about' => '',
        'statistics' => '',
        'logo' => '',
    );
    public $seo = array(
        'mainTitle' => '',
        'mainKwrds' => '',
        'mainDescr' => ''
    );
    public $mail = array(
        'adminEmail' => '',
        'fromReply' => '',
        'fromNoReply' => '',
        'server' => '',
        'port' => '',
        'user' => '',
        'password' => '',
        'ssl'=>'',
    );
    public $filter = array(
        'priceLower'=>'',
        'priceUpper'=>'',
    );
    /*zejun*/

    public $maintain = array(
        "maintain"=>'',
    );

    /*zejun*/
 
    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */
    public function getAttributesLabels($key)
    {
            $keys = array(
                'googleAPIKey' => 'Google API Key',
                'mainTitle' => 'Main Page Title',
                'mainKwrds' => 'Default Keywords (Meta Tag)',
                'mainDescr' => 'Default Description (Meta Tag)',
                'statistics' => 'Third-party statistical code',
                'ssl' => 'SSL',
                'logo' => 'Logo',
            );

        if(array_key_exists($key, $keys))
            return $keys[$key];
 
        $label = trim(strtolower(str_replace(array('-', '_'), ' ', preg_replace('/(?<![A-Z])[A-Z]/', ' \0', $key))));
        $label = preg_replace('/\s+/', ' ', $label);
 
        if (strcasecmp(substr($label, -3), ' id') === 0)
            $label = substr($label, 0, -3);
 
        return ucwords($label);

    }
 
    /**
     * Sets attribues values
     * @param array $values
     * @param boolean $safeOnly
     */
    public function setAttributes($values,$safeOnly=true) 
    { 
        if(!is_array($values)) 
            return;
        $logoUrl = '';
        $tempValues = $values;
        foreach($tempValues as $tempCategory => $tempValues)
        {
            if($tempCategory === 'logo')
            {
                $logoUrl = $tempValues;
            }
        }
        foreach($values as $category=>$values) 
        {
            if(isset($this->$category)) {
                $cat = $this->$category;
                if(!is_array($values))
                {
                    continue;
                }
                foreach ($values as $key => $value) {
                    if(isset($cat[$key])){
                        $cat[$key] = $value;
                    }
                }
                if($category === 'site')
                {
                    $cat['logo'] = $logoUrl;
                }
                $this->$category = $cat;
            }
        }
    }
}