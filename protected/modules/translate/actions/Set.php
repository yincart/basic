<?php

/**
 * Set Class file
 * 
 * Set CAction sets the language of the application by using the Ei18n Application
 * helper. To be used in any controller.
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
class Set extends CAction {

	/**
	 *
	 * @var string $i18nComponentId the id set for the application component 
	 * Ei18n at the configuration file
	 */
	public $i18nComponentId = 'translate'; /* change name if different */

	/**
	 *
	 * @var Ei18n $_i8n private reference to the application component to set
	 * the language
	 */
	private $_i18n;

	/**
	 * Main function run
	 */
	public function run()
	{
		if (!($this->_i18n = Yii::app()->getComponent($this->i18nComponentId)) instanceof Ei18n)
			throw new CException(Yii::t('translate', 'Set.run "{id}" does not point to a valid Ei18n application component.', array('{id}' => $this->i18nComponentId)));

		$language = Yii::app()->getRequest()->getParam($this->_i18n->languageParameter);
		
		if ($language)
		{
			$this->_i18n->setLanguage($language);
			
			$this->getController()->redirect(Yii::app()->getRequest()->getUrlReferrer());
		}else
			throw new CHttpException(400);
	}

}