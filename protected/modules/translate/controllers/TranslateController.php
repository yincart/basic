<?php

/**
 * TranslateController Class file
 * 
 * Handles the ajax requests of WTranslator widget 
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
class TranslateController extends CController {

	public function actions()
	{
		return array(
			'set'=>array(
				'class'=>'translate.actions.Set',
			),
		);
	}
	/**
	 * Creates a message if form has been submitted or renders the creation/update form
	 */
	public function actionCreate()
	{

		if (isset($_POST['Message']))
		{
			$resp = array(
				'color' => '#FF6600',
				'background_color' => '#FFFFCC',
				'position' => 'top',
				'removebutton' => 0
			);
			$model = new Message();
			$model->setAttributes($_POST['Message']);
			if ($model->save())
			{
				$resp['message'] = Yii::t('translate', 'Message successfully saved');
				$resp['id'] = $model->id;
			} else
			{
				$errors = $this->errors($model);
				$resp['message'] = Yii::t('translate', '<p>Unable to save the message. Something went wrong!<p/>' . implode('<br/>', $errors));
			}
			echo $this->je($resp);

			Yii::app()->end();
		}

		$id = (int) Yii::app()->request->getParam('id');
		$lang = Yii::app()->request->getParam('lang');
		if ($id && $lang)
		{
			$model = MessageSource::model()->findByPk($id);
			if ($model)
			{
				$message = $model->loadMessage();
				$message->id = $model->id;
				$message->language = $lang;

				$this->renderPartial('form', array('model' => $message));
			}else
				throw new CHttpException(400);
		}
		else
			throw new CHttpException(404, 'The requested page does not exist.');
	}

	/**
	 * Updates a message 
	 * @param integer $id 
	 */
	public function actionUpdate($id)
	{
		if (null == $id || !is_numeric($id))
			throw new CHttpException(404, 'The requested page does not exist.');

		$model = Message::model()->findByPk(array('id' => $id, 'language' => Yii::app()->getLanguage()));

		if (isset($_POST['Message']))
		{
			$resp = array(
				'color' => '#FF6600',
				'background_color' => '#FFFFCC',
				'position' => 'top',
				'removebutton' => 0
			);
			$model->attributes = $_POST['Message'];
			if ($model->save())
			{
				$resp['message'] = Yii::t('translate', 'Message successfully updated');
				$resp['id'] = $model->id;
			} else
			{
				$errors = $this->errors($model);
				$resp['message'] = Yii::t('translate', '<p>Unable to update the message. Something went wrong!<p/>' . implode('<br/>', $errors));
			}
			echo $this->je($resp);
		}else
			throw new CHttpException(400);
	}

	/**
	 * Helper function to convert array to JSON object string
	 * @param array $arr
	 * @return string JSON object
	 */
	protected function je($arr)
	{
		return function_exists('json_encode') ? json_encode($arr) : CJSON::encode($arr);
	}

	/**
	 * Helper function to return all the errors of the models as an array
	 * @param mixed $models
	 * @return array of errores
	 */
	protected function errors($models)
	{
		if (!is_array($models))
			$models = array($models);

		$return = array();
		foreach ($models as $model)
		{
			if ($model->hasErrors())
			{
				foreach ($model->getErrors() as $attribute => $errors)
				{
					foreach ($errors as $error)
						array_push($return, $error);
				}
			}
		}
		return $return;
	}

}