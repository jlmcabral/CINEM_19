
<?php
include ("functions.php");

// Prints a navigation main menu
// Just for reusability purposes
function printHeaderMenu()
{   
    print
    "
        <div class='header-menu'>
            <ul>
                <li><a href='index.php?lang=".$_SESSION['lang']."'>".translate(Home)."</a></li>
                <li><a href='products.php?lang=".$_SESSION['lang']."'>".translate(Products)."</a></li>
                <li><a href='contacts.php?lang=".$_SESSION['lang']."'>".translate(Contacts)."</a></li>
                <li><a href='user.php?lang=".$_SESSION['lang']."'>".translate(User_account)."</a></li>
            </ul>
        </div>
    ";
}

?> 