<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
/* php doc test */
$phpWord = new \PhpOffice\PhpWord\PhpWord();

$phpWord->setDefaultFontName('Times New Roman');
$phpWord->setDefaultFontSize(14);

$prop = $phpWord->getDocInfo();

$prop->setCreator('Василий');
$prop->setCompany('СмолГУ');
$prop->setTitle('Кафедра информатики');
$prop->setDescription('Документооборот кафедры ВУЗа');
$prop->setCategory('Дипломная работа');
$prop->setCreated(mktime(0, 0, 0, 3, 12, 2014));
$prop->setModified(mktime(0, 0, 0, 3, 14, 2014));
$prop->setSubject('Тема');
$prop->setKeywords('документ, документооборот, кафедра');

$sectionStyle = array(
	'orientation' => 'landscape',
	'marginTop' => \PhpOffice\PhpWord\Shared\Converter::pixelToTwip(150),
	'marginLeft' => 600,
	'marginRight' => 600,
	'colsNum' => 1,
	'pageNumberingStart' => 1,
	'borderBottomSize' => 100,
	'borderBottomColor' => 'c0c0c0',
);



$section = $phpWord->addSection($sectionStyle);

$text = "PHPWord is a library written in pure PHP that provides a set of classes to write to and read from different document file formats.";
$fontStyle = array('name'=>'Arial', 'size'=>36, 'color'=>'075776', 'bold'=>TRUE, 'italic'=>TRUE);
$parStyle = array('align'=>'right','spaceBefore'=>10);
$section->addText(htmlspecialchars($text), $fontStyle,$parStyle);

header("Content-Description: File Transfer");
header('Content-Disposition: attachment; filename="first.docx"');
header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
header('Content-Transfer-Encoding: binary');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Expires: 0');

$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save("php://output");
?>
<div class="site-contact">

    <p>
        If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
    </p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'subject') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
