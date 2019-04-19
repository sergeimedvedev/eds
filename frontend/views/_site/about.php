<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
/* php doc test */
$PHPWord = new \PhpOffice\PhpWord\PhpWord();
$document = $PHPWord->loadTemplate('uploads/templates/Template.docx'); //шаблон
$document->setValue('d_num', '777'); //номер договора
$document->setValue('d_date', '04.10.2014'); //дата договора

// $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($PHPWord,'Word2007');
// $objWriter->save('../../uploads/doc.docx');
// var_dump($objWriter);

$document->saveAs('uploads/Template_full.docx');
var_dump($document);
?>
<div class="site-about">

    <p>This is the About page. You may modify the following file to customize its content:</p>

    <code><?= __FILE__ ?></code>
</div>
