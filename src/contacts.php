<h1>Travel agency</h1>
   <h2> Our contacts</h2>
   <hr>
<?php 
    $travel_city = "Chisinau, str. Zamechatelnaia 9/3, of. 23"; // snake_case_name
    $contact_telephone = "+373123456"; 
    $email_us = "info@travel.com";
    $our_skype = "travelagency";
    $how_to_find_us = "Find us on a map";  
?>
<p><b>Our adress:</b> <?php print($travel_city) ?></p>
<p><b>Telephone:</b> <a href="tel: <?php $contact_telephone ?>"><?php print($contact_telephone) ?></a></p>
<p><b>E-mail:</b> <a href="mailto: <?php $email_us ?>"><?php print($email_us) ?></a></p>
<p><b>Skype:</b> <a href="skype: <?php $our_skype ?>?call"><?php print($our_skype) ?></a></p>
<p>
    <a href="https://maps.app.goo.gl/gFvgGpuptQ983mLN9"><b><?php print($how_to_find_us) ?></b><a></p>
<hr>
<h3>Book with us and trave all around the worldl!!!</h3>

<hr>

<?php

$isVip = false;

if ($isVip == true): ?>
    <p>VIP</p>
<?php else: ?>
    <p>Standard</p>
<?php endif; ?>
