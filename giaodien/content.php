<?php
if(!isset($_GET['act']) && !isset($_GET['id']))
{
    require('point-CDBP.php');
}

if(isset($_GET['act']))
{
  if($_GET['act']=='menuTop')
    {
        if(isset($_GET['id']))
        {
            if($_GET['id']=='1')
            {
                require('introduce.php');
            }
            else if($_GET['id']=='21')
            {
                require('point-CDBP.php');
            }
            else if($_GET['id']=='22')
            {
                require('point-official.php');
            }
            else if($_GET['id']=='23')
            {
                require('giaodien/rank.php');
            }
            else if($_GET['id']=='3')
            {
                require('giaodien/notification.php');
            }
            else if($_GET['id']=='4')
            {
                require('giaodien/lienhe.php');
            }
        }
    }
}
