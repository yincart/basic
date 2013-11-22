<?php

/**
 * Ei18n Class file
 * 
 * Application component helper
 * 
 * @author Antonio Ramirez 
 * @link http://www.ramirezcobos.com 
 * 
 * 
 * THIS SOFTWARE IS PROVIDED BY THE CONTRIBUTORS "AS IS" AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR
 * ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON
 * ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */
class Ei18n extends CApplicationComponent {

	/**
	 *
	 * @var boolean $createTranslationTables if set to true will execute the
	 * commands to create the tables if they do not exists
	 */
	public $createTranslationTables = true;

	/**
	 *
	 * @var array the languages array of the application
	 */
	public $languages;

	/**
	 *
	 * @var string $defaultLanguage the default language of the application.
	 * Defaults to Yii::app()->getLanguage()
	 */
	public $defaultLanguage;

	/**
	 *
	 * @var boolean whether to set the langauge automatically or not
	 */
	public $autoSetLanguage = true;

	/**
	 *
	 * @var string $languageParameter the language parameter to check for 
	 * language setting.
	 * 
	 * @see Ei18n getLanguage
	 * @see Set CAction run
	 */
	public $languageParameter;

	/**
	 * @var string the ID of CDbConnection application component. 
	 */
	public $connectionID;

	/**
	 * @var string id of the component.
	 */
	private $_id;

	/**
	 *
	 * @var string $_language a reference to the language set 
	 */
	private $_language;

	/**
	 *
	 * @var $_db CDbConnection pointer
	 */
	private $_db;

	/**
	 *
	 * @var static $_missingTranslations keeps track of the missed translations
	 */
	static $_missingTranslations = array();

	/**
	 *
	 * Component initialization  method
	 */
	public function init()
	{

		if (empty($this->defaultLanguage))
			$this->defaultLanguage = Yii::app()->getLanguage();

		if (empty($this->languageParameter))
			$this->languageParameter = 'lang';

		if ($this->autoSetLanguage)
			$this->setLanguage($this->getLanguage());

		if (!count($this->languages))
		{
			if (($sourceLanguage = Yii::app()->sourceLanguage) !== null)
				$this->languages[$sourceLanguage] = $sourceLanguage;
			if (($targetLanguage = Yii::app()->getLanguage()) != null)
				$this->languages[$targetLanguage] = $targetLanguage;
		}

		if ($this->createTranslationTables)
		{
			$this->createSourceMessageTable();
			$this->createMessageTable();
		}

		return parent::init();
	}

	/**
	 * Method that handles the on missing translation event. If no messagesource is found
	 * then add it to the DB for its future edition from the user's control panel -that is up to you! :).
	 * @param CMissingTranslationEvent $event
	 * @return string the message to translate
	 */
	public static function missingTranslation($event)
	{

		Yii::import('translate.models.MessageSource');
		$attributes = array('category' => $event->category, 'message' => $event->message);
		if (($model = MessageSource::model()->find('message=:message AND category=:category', $attributes)) === null)
		{
			$model = new MessageSource();
			$model->attributes = $attributes;
			if (!$model->save())
				return Yii::log(Yii::t(__CLASS__, 'Message ' . $event->message . ' could not be added to messageSource table'));;
		}
		if ($model->id)
		{
			if (substr($event->language, 0, 2) !== substr(Yii::app()->sourceLanguage, 0, 2) || Yii::app()->getMessages()->forceTranslation
				&& !array_key_exists($model->id, self::$_missingTranslations))
			{
				Yii::trace('--- ADDED TRANSLATION ---', 'translate');
//				$url = Yii::app()->getController()->createUrl('/translate/translate/create', array('id' => $model->id, 'lang'=> $event->language));
				$url = Yii::app()->createUrl('/translate/translate/create', array('id' => $model->id, 'lang'=> $event->language));
				 self::$_missingTranslations[$model->id] = array(
					'ref' => $model->id,
					'text' => self::c(strip_tags($model->message), 45),
					'url' => $url);
			}
		}
		return $event;
	}

	/**
	 * Helper function that renders the translation widget for missed translations
	 */
	public function renderMissingTranslationsEditor()
	{
		/* we can always turn the translator off if no missing translations */
//		if (empty(self::$_missingTranslations))
//			return false;
		Yii::trace('--- RENDER EDITOR ---', 'translate');
		$widget = Yii::createComponent(array(
				'class' => 'translate.widgets.WTranslate',
				'title' => 'Missing translations for \"' . $this->getLanguageName($this->getLanguage()) . '\" '.
				'<span>'.addslashes($this->getChangeLanguageMenu()).'</span>',
				'translations' => array_values(self::$_missingTranslations)));
		$widget->init();
		$widget->run();
	}

	/**
	 * Helper function to return a menu to change the language
	 * @return string a link menu to the translate module
	 */
	public function getChangeLanguageMenu()
	{
		$menu = array();
		foreach($this->languages as $key=>$lang)
		{
			$url = Yii::app()->getController()->createUrl('/translate/translate/set', array('lang' => $key));
			$menu[] = CHtml::link($lang, $url);
		}
		return implode(' | ', $menu);
	}
	/**
	 * Helper function that renders the translation editor widget
	 * @param mixed $categories the categories to edit from DB
	 * @param string $lang the language to edit 
	 */
	public function renderTranslationsEditor($categories, $lang = null)
	{

		if (null === $lang)
			$lang = $this->getLanguage();

		$db = $this->getDbConnection();

		$categories = (is_array($categories) ? '"' . implode('","', $categories) . '"' : '"' . $categories . '"');

		$qry = strtr('SELECT m.id AS ref, s.message as text 
			FROM {table_message} m INNER JOIN {table_source} s ON m.id=s.id WHERE s.category IN({categories})
			AND m.language=:lang', array(
			'{categories}' => $categories,
			'{table_source}' => Yii::app()->getMessages()->sourceMessageTable,
			'{table_message}' => Yii::app()->getMessages()->translatedMessageTable));
		$data = $db->createCommand($qry)
			->bindParam(':lang', $lang)
			->queryAll();
		if (!empty($data))
		{
			$count = count($data);
			$c = Yii::app()->getController();

			for ($i = 0; $i < $count; $i++)
			{
				$data[$i]['url'] = $c->createUrl('/translate/translate/create', array('id' => $data[$i]['ref'], 'lang' => $lang));
			}

			$widget = Yii::createComponent(array(
					'class' => 'translate.widgets.WTranslate',
					'title' => 'Editing translations from ' . $this->getLanguageName(Yii::app()->sourceLanguage) . ' to ' . $this->getLanguageName($lang),
					'translations' => $data));
			$widget->init();
			$widget->run();
		}
	}

	/**
	 * Returns the ID of the widget or generates a new one if requested.
	 * @param boolean $autoGenerate whether to generate an ID if it is not set previously
	 * @return string id of the component.
	 */
	public function getId($autoGenerate=true)
	{
		if ($this->_id !== null)
			return $this->_id;
		else if ($autoGenerate)
			return $this->_id = 'WWVzSXRJc1lpaQ==';
	}

	/**
	 * Sets the ID of the widget.
	 * @param string $value id of the component.
	 */
	public function setId($value)
	{
		$this->_id = $value;
	}

	/**
	 * returns the language in use
	 * the language is determined by many variables: session, post & get, header in this order
	 * it will filter the language by using accepted languages 
	 * 
	 * @return string
	 */
	public function getLanguage()
	{
		if ($this->_language !== null)
			return $this->_language;
		elseif (Yii::app()->getSession()->contains($this->getId()))
			$language = Yii::app()->getSession()->get($this->getId());
		elseif (Yii::app()->request->getParam($this->languageParameter))
			$language = Yii::app()->request->getParam($this->languageParameter);
		else
			$language = Yii::app()->getRequest()->getPreferredLanguage();

		if (!key_exists($language, $this->languages))
		{
			if ($language === Yii::app()->sourceLanguage)
				$language = $this->defaultLanguage;
			elseif (strpos($language, "_") !== false)
			{
				$language = substr($language, 0, 2);
				if (!key_exists($language, $this->languages))
					$language = $this->defaultLanguage;
			}
		}
		$this->_language = $language;

		return $language;
	}
	
	/**
	 * Returns the language name or an empty string if id not found.
	 * @param string $id the id of the language as configured on main.php
	 * @return string 
	 */
	public function getLanguageName($id)
	{
		return isset($this->languages[$id])? $this->languages[$id] : '';
	}

	/**
	 * 
	 * set the language that the application will use
	 * if $language is null then if you use getLanguage to determine the target language 
	 * 
	 * it doesn't check if the language is in the accepted languages 
	 * 
	 * @param string | null $language language to set
	 * @return string the language setted
	 */
	public function setLanguage($language=null)
	{
		if ($language === null)
			$language = $this->getLanguage();

		$this->_language = $language;

		Yii::app()->getSession()->add($this->getId(), $language);
		Yii::app()->setLanguage($language);
		return $language;
	}

	/**
	 * creates message table
	 * @see http://www.yiiframework.com/doc/api/1.1/CDbMessageSource
	 */
	protected function createMessageTable()
	{
		$db = $this->getDbConnection();

		$tableName = Yii::app()->getMessages()->translatedMessageTable;

		if (!$this->tableExists($tableName))
		{

			$sql = "
				CREATE TABLE $tableName
				(
					id INTEGER NOT NULL,
					language VARCHAR(16) NOT NULL,
					translation TEXT,
					PRIMARY KEY (`id`,`language`)
 
				)ENGINE=InnoDB";
			$db->createCommand($sql)->execute();
			
			/* todo: not tested yet */
//			$sourceTable = Yii::app()->getMessages()->sourceMessageTable;
//			$db->createCommand()
//				->addForeignKey('FK_Message_SourceMessage', $tableName, 'id', $sourceTable, 'id', true );
		}
	}

	/**
	 * create the source message table
	 * @see http://www.yiiframework.com/doc/api/1.1/CDbMessageSource
	 */
	protected function createSourceMessageTable()
	{
		$db = $this->getDbConnection();

		$tableName = Yii::app()->getMessages()->sourceMessageTable;

		if (!$this->tableExists($tableName))
		{
			$driver = $db->getDriverName();
			if ($driver === 'mysql')
				$id = 'id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY';
			else if ($driver === 'pgsql')
				$id = 'id SERIAL PRIMARY KEY';
			else
				$id = 'id INTEGER NOT NULL PRIMARY KEY';
			$sql = "
				CREATE TABLE $tableName
				(
					$id,
					category VARCHAR(32) NOT NULL,
					message TEXT
 
				)ENGINE=InnoDB";
			$db->createCommand($sql)->execute();
		}
	}

	/**
	 * Checkes whether a database table exists or not
	 * @param string $tbl the table name to check 
	 * @return boolean
	 */
	protected function tableExists($tbl)
	{
		$db = $this->getDbConnection();

		$sql = "DELETE FROM {$tbl} WHERE 0=1";
		try
		{
			$db->createCommand($sql)->execute();
		} catch (Exception $e)
		{
			return false;
		}
		return true;
	}

	/**
	 * Helper function to return active database connection 
	 * @return CDbConnection the DB connection instance
	 * @throws CException if {@link connectionID} does not point to a valid application component.
	 */
	protected function getDbConnection()
	{
		$id = null;

		if ($this->_db !== null)
			return $this->_db;
		else if (($id = $this->connectionID) !== null)
		{
			if (($this->_db = Yii::app()->getComponent($id)) instanceof CDbConnection)
				return $this->_db;
			else
				throw new CException(Yii::t('yii', 'Ei18n.connectionID "{id}" does not point to a valid CDbConnection application component.', array('{id}' => $id)));
		}
	}

	/**
	 * Helper functionn that truncates a string
	 * @param string $txt the text to cut
	 * @param integer $length the length
	 * @return string 
	 */
	protected static function c($txt, $length, $encoding = 'utf-8')
	{

		if (null != $encoding && mb_strlen($txt) > $length)
		{
			$txt = mb_substr($txt, 0, $length - 3, $encoding);
			$pos = mb_strrpos($txt, ' ', null, $encoding);
			$txt = mb_substr($txt, 0, $pos, $encoding) . '...';
		} else if (strlen($txt) > $length)
		{
			$txt = substr($txt, 0, $length - 3);
			$pos = strrpos($txt, ' ');
			$txt = substr($txt, 0, $pos) . '...';
		}
		return $txt;
	}

}
