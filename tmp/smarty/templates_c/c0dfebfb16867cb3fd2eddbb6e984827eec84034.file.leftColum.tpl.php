<?php /* Smarty version Smarty-3.1.6, created on 2022-11-29 21:08:44
         compiled from "../views/default\leftColum.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4762637bab9cb81057-24861237%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0dfebfb16867cb3fd2eddbb6e984827eec84034' => 
    array (
      0 => '../views/default\\leftColum.tpl',
      1 => 1669752398,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4762637bab9cb81057-24861237',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_637bab9cb92bc',
  'variables' => 
  array (
    'rsCategories' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_637bab9cb92bc')) {function content_637bab9cb92bc($_smarty_tpl) {?>

<div id="leftColumn">

    <div id="leftMenu">
        <div class="menuCaption">Меню:</div>
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsCategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                <a href="#"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a><br />
            <?php } ?>
    </div>

</div><?php }} ?>