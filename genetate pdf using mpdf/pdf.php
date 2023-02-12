<?php

require_once __DIR__ . '/pdf/autoload.php';

$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [290, 100]]);  // عرض وارتفاع الصفحه 

$mpdf->autoScriptToLang = true;   // دعم اللغه العربيه 
$mpdf->autoLangToFont = true;

$mpdf->AddPage("P");  // 
// L وضعيه الافقي 
// D وضع راسي 

$stylesheet = file_get_contents('style.css');   // عشان استخدم css    // اكتب مسار ملق css عشان يطبق علي الكلام 

$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS); // عشان استخدم css  

$html ='';    // هدا المتغير به المحتوب التي سيتم طبعه 

if(isset($_GET["text"])){
    $html = '<h1>' . $_GET["text"] . '</h1>';   // وعادي تكتب كلام باديك 
}

$mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);

$mpdf->Output("myPDF.pdf","I");  // اسم الملف حدده 

// I         فتح الملف مباشره مجرد الدخول الي الصفحه ولا يتم تحميله بل تظهر علامه التحميل فوق
//D     التحميل مباشره مجرد الدخول الي صفحه اللي احنا فيها && ولاتظهره 