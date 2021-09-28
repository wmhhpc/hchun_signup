<?php
// 如「模組目錄」= signup，則「首字大寫模組目錄」= Signup
// 如「資料表名」= actions，則「模組物件」= Actions
use Xmf\Request;
use XoopsModules\Tadtools\Utility;
use XoopsModules\Hchun_signup\Hchun_signup_actions;
use XoopsModules\Hchun_signup\Hchun_signup_data;

/*-----------引入檔案區--------------*/
require_once __DIR__ . '/header.php';
$GLOBALS['xoopsOption']['template_main'] = 'hchun_signup_index.tpl';
require_once XOOPS_ROOT_PATH . '/header.php';

/*-----------變數過濾----------*/
$op = Request::getString('op');
$id = Request::getInt('id');

/*-----------執行動作判斷區----------*/
switch ($op) {

    //新增表單
    case 'hchun_signup_actions_create':
        Hchun_signup_actions::create();
        break;

    //新增資料
    case 'hchun_signup_actions_store':
        $id = Hchun_signup_actions::store();
        header("location: {$_SERVER['PHP_SELF']}?id=$id");
        exit;

    //修改用表單
    case 'hchun_signup_actions_edit':
        Hchun_signup_actions::create($id);
        $op = 'hchun_signup_actions_create';
        break;

    //更新資料
    case 'hchun_signup_actions_update':
        Hchun_signup_actions::update($id);
        header("location: {$_SERVER['PHP_SELF']}?id=$id");
        exit;

    //刪除資料
    case 'hchun_signup_actions_destroy':
        Hchun_signup_actions::destroy($id);
        header("location: {$_SERVER['PHP_SELF']}");
        exit;

    default:
        if (empty($id)) {
            Hchun_signup_actions::index();
            $op = 'hchun_signup_actions_index';
        } else {
            Hchun_signup_actions::show($id);
            $op = 'hchun_signup_actions_show';
        }
        break;
}

/*-----------function區--------------*/

/*-----------秀出結果區--------------*/
unset($_SESSION['api_mode']);
$xoopsTpl->assign('toolbar', Utility::toolbar_bootstrap($interface_menu));
$xoopsTpl->assign('now_op', $op);
$xoTheme->addStylesheet(XOOPS_URL . '/modules/hchun_signup/css/module.css');
require_once XOOPS_ROOT_PATH . '/footer.php';
