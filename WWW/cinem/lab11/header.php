
<?php
include ("functions.php");

// Prints a navigation main menu
// Just for reusability purposes
function printHeaderMenu()
{   
    // Language
    print " <p>".translate(Lang).": ";
    print "   <a href='?lang=pt'>[Portugu&ecirc;s]</a>";
    print "   <a href='?lang=en'>[English]</a>";
    print " </p>";

    // Menu
    print
    "
        <div class='header-menu'>
            <ul>
                <li><a href='index.php'>".translate(Home)."</a></li>
                <li><a href='products.php'>".translate(Products)."</a></li>
                <li><a href='contacts.php'>".translate(Contacts)."</a></li>
                <li><a href='user.php'>".translate(User_account)."</a></li>
                <li><a href='cart.php'>".translate("Cart-title")."</a></li>
            </ul>
        </div>
    ";
}

?> 