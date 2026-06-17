<?php

//preg_match('#users#','users list', $m);
preg_match('#^hello$#','hello', $m);

print_r($m);

echo '<hr>';

preg_match('#/users/#', '/users/45', $m);
print_r($m);
echo '<hr>';
preg_match('#^admin$#', 'admin', $m);
print_r($m);
echo '<hr>';
preg_match('#User-\d\d#', 'User-42', $m);
print_r($m);
echo '<hr>';
preg_match('#\d{1,3}#', 'Age: 27', $m);
print_r($m);
echo '<hr>';
preg_match('#/product/(\d+)#', '/product/555', $m);
print_r($m[1]);
echo '<hr>';
preg_match('#cat|dog#', 'I have a dog', $m);
print_r($m[0]);
echo '<hr>';
preg_match('#\w+\.jpg#', 'avatar.jpg', $m);
print_r($m[0]);
echo '<hr>';
preg_match('#^/users/(\d+)$#', '/users/99', $m);
print_r($m[1]);
echo '<hr>';


//preg_replace($pattern, $replacement, $string);
$phone = " +49 176  555  88 22 ";

$clean = preg_replace('#\s+#', '', $phone);

echo $clean;
echo '<hr>';