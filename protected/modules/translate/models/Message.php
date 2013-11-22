 <?php
/**
 * Message Class file
 * 
 * CActiveRecord that handles message translation DB 
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
class Message extends CActiveRecord {

	public $message, $category;

	static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return Yii::app()->getMessages()->translatedMessageTable;
	}

	public function rules()
	{
		return array(
			array('id,language,translation', 'required'),
			array('id', 'numerical', 'integerOnly' => true),
			array('language', 'length', 'max' => 16),
			array('translation', 'safe'),
			array('id, language, translation, category, message', 'safe', 'on' => 'search'),
		);
	}

	public function relations()
	{
		return array(
			'source' => array(self::BELONGS_TO, 'MessageSource', 'id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('translate', 'ID'),
			'language' => Yii::t('translate', 'Language'),
			'translation' => Yii::t('translate', 'Translation'),
			'category' => MessageSource::model()->getAttributeLabel('category'),
			'message' => MessageSource::model()->getAttributeLabel('message'),
		);
	}

	public function search()
	{
		$criteria = new CDbCriteria;
		$criteria->select = 't.*,source.message as message,source.category as category';
		$criteria->with = array('source');

		$criteria->compare('t.id', $this->id);
		$criteria->compare('t.language', $this->language, true);
		$criteria->compare('t.translation', $this->translation, true);
		$criteria->compare('source.category', $this->category, true);
		$criteria->compare('source.message', $this->message, true);

		return new CActiveDataProvider(get_class($this), array(
				'criteria' => $criteria,
			));
	}

}