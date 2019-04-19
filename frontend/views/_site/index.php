<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
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

$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord,'Word2007');
$objWriter->save('doc.docx');
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
