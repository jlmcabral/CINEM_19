
<?php
include ("functions.php");

// Prints a navigation main menu
// Just for reusability purposes
function printHeaderMenu()
{   
    // Menu
    print
    "   
        <div class='container-header-menu'> 
    ";
    createLanguageSelection();        
    print
    "
        <div class='header-menu'>
            <ul>
                <li><a href='index.php'>".translate(Home)."</a></li>
                <li><a href='products.php'>".translate(Products)."</a></li>
                <li><a href='user.php'>".translate(User_account)."</a></li>
                <li><a href='cart.php'>".translate('Cart-title')."</a></li>
            </ul>
        </div>
        ";
    print
    "
    </div>
    ";
}

function createLanguageSelection()
{
    if($_SESSION['lang']=='pt'){
        print
        "
            <div class='language'>
                <a href='?lang=en'>[English]</a>
            </div> 
        ";
    } else {
        print
        "
            <div class='language'>
                <a href='?lang=pt'>[Portugu&ecirc;s]</a>
            </div> 
        ";
    }
}
?> 