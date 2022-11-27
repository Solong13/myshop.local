<?php /* Smarty version Smarty-3.1.6, created on 2022-11-21 17:47:24
         compiled from "../views/default\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23365637bab9caf47c2-48218923%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9797888b337e03f99b06385b60a372bbb52d5e02' => 
    array (
      0 => '../views/default\\header.tpl',
      1 => 1669049236,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23365637bab9caf47c2-48218923',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pageTitle' => 0,
    'templateWebPath' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_637bab9cb74cb',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_637bab9cb74cb')) {function content_637bab9cb74cb($_smarty_tpl) {?><html>
<head>
    <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
css/main.css" type="text/css"/>
</head>
<body>
<div id="header">
    <h1>
        my shop - Інтернет магазин
    </h1>
</div>

    <?php echo $_smarty_tpl->getSubTemplate ('leftColum.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="centerColumn">
    centerColumn

<?php }} ?>