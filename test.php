<?php
// $handle = fopen('./file.txt', 'r');
// // $handle = fopen('./file.txt', 'r');
// //     echo $handle;
// // fclose($handle);

// $inf ='file.txt';

// $infile = file ($inf);
// // print "$handle";
// print "$infile[0]";

$file = "file.txt";
$handle = fopen($file,'w');
// if($handle){
//     while(! feof($handle)){
//         $text = fgets($handle,100);
//         echo $text."</br>";
//     }
//     fclose($handle);
// }

$msg = "Add by Wahed";

fputs($handle,$msg);
$fileRead = file($file);
printf("$fileRead[0]");
// if($handle){
//     while(! feof($handle)){
//         $text = fgets($handle,100);
//         echo $text."</br>";
//     }
//     fclose($handle);
// }
?>