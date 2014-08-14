<?php
/**
 * form View file
 * 
 * Renders the form to edit messages
 * 
 * note: No validation occurs on client
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
?>
<?php $action = $model->getIsNewRecord() ? Yii::t('translate', 'Create') : Yii::t('translate', 'Update'); ?>
<h1 class="translate"><?php echo Yii::t('translate', ($action) . ' Message') . " # " . $model->id . " - " . Yii::app()->translate->languages[$model->language] ?></h1>
<p class="title-translate-original">Original</p>
<div class="translate-original">
	<p><?php echo $model->source->message; ?></p>
</div>

<div class="translate-form">
	<?php
	$form = $this->beginWidget('CActiveForm', array(
		'id' => 'message-form',
		'enableAjaxValidation' => false,
		'action' => $model->getIsNewRecord() ? $this->createUrl('create') : $this->createUrl('update', array('id' => $model->id))
		));
	?>
	<?php echo $form->hiddenField($model, 'id'); ?>
	<?php echo $form->hiddenField($model, 'language'); ?>
	<?php echo $form->hiddenField($model->source, 'category'); ?>


	<div class="translate-row">
		<div class="translate-category"><?php echo $model->getAttributeLabel('category'); ?> - <span><?php echo $model->source->category; ?></span></div>
	</div>

	<div class="translate-row">
		<div class="translate-category"><?php echo $model->getAttributeLabel('translation'); ?></div>
		<?php echo $form->textArea($model, 'translation', array('rows' => 2, 'cols' => 80, 'class' => 'wtranslate-wysiwyg', 'style' => 'width:750px;')); ?>
		<?php echo $form->error($model, 'translation'); ?>
	</div>

	<div class="translate-buttons">
		<a class="wtranslator-button large green" href="#" rel="close"><?php echo Yii::t('translate', Yii::t('translate', 'Close')); ?></a>
		<a class="wtranslator-button large green" href="#" rel="submit"><?php echo Yii::t('translate', '{action} translation', array('{action}' => $action)); ?></a>
	</div>

	<?php $this->endWidget(); ?>

</div>