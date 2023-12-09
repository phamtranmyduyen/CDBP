<?php
if(!isset($_GET['id']))
{
    require('bangchamdiem-moinhat.php');
}
if(isset($_GET['id']))
{
    if($_GET['id']=='CN007')
    {
        require('bangchamdiem-moinhat.php');
        
    }
    if($_GET['id']=='CN008')
    {
        require('bangchamdiem-congdoan.php');
    }
    
    if($_GET['id']=='CN009')
    {
        require('khoa-chucnang-chamdiem.php');
    }
    
    if($_GET['id']=='CN010')
    {
        require('notification-BCH.php');       
    }
    if($_GET['id']=='CN011')
    {
        echo "Ý KIẾN";
    }
    if($_GET['id']=='CN015')
    {
        require('introduce-BCH.php');    
    }

}
?>