<?php
if(isset($_GET['id']))
{
    if($_GET['id']=='CN001')
    {
        require('quanly-cdbp.php');
    }
    else if($_GET['id']=='CN002')
    {
        require('quanly-donvi.php');
    }
    else if($_GET['id']=='CN003')
    
    {
        require('quanly-bch.php');
    }
    else if($_GET['id']=='CN004')
    {
        require('quanly-thanhvienbch.php');
    }
    else if($_GET['id']=='CN005')
    {
        require('quanly-tieuchichamdiem.php');
    }
    else if($_GET['id']=='CN006')
    {
        require('quanly-chitiettieuchichamdiem.php');       
    }
    else if($_GET['id']=='CN012')
    {
        require('quanly-chucnang.php');
    }
    else if($_GET['id']=='CN013')
    {
        require('quanly-quyen.php');
    }
    else if($_GET['id']=='CN014')
    {
        require('quanly-taikhoan-admin.php');
        
    }
}
