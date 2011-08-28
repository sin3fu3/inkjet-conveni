<?php
/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) 2000-2011 LOCKON CO.,LTD. All Rights Reserved.
 *
 * http://www.lockon.co.jp/
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

// {{{ requires
require_once CLASS_REALDIR . 'pages/shopping/LC_Page_Shopping_Multiple.php';

/**
 * お届け先の複数指定 のページクラス(拡張).
 *
 * LC_Page_Shopping_Multiple をカスタマイズする場合はこのクラスを編集する.
 *
 * @package Page
 * @author LOCKON CO.,LTD.
 * @version $Id: LC_Page_Shopping_Multiple_Ex.php 20764 2011-03-22 06:26:40Z nanasess $
 */
class LC_Page_Shopping_Multiple_Ex extends LC_Page_Shopping_Multiple {

    // }}}
    // {{{ functions

    /**
     * Page を初期化する.
     *
     * @return void
     */
    function init() {
        parent::init();
    }

    /**
     * Page のプロセス.
     *
     * @return void
     */
    function process() {
        parent::process();
    }

    /**
     * デストラクタ.
     *
     * @return void
     */
    function destroy() {
        parent::destroy();
    }

    /**
     * フォームを初期化する.
     *
     * @param SC_FormParam $objFormParam SC_FormParam インスタンス
     * @return void
     */
    function lfInitParam(&$objFormParam) {
        $objFormParam->addParam("商品規格ID", "product_class_id", INT_LEN, 'n', array("EXIST_CHECK", "MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("商品名", "name");
        $objFormParam->addParam("規格1", "class_name1");
        $objFormParam->addParam("規格2", "class_name2");
        $objFormParam->addParam("規格分類1", "classcategory_name1");
        $objFormParam->addParam("規格分類2", "classcategory_name2");
        $objFormParam->addParam("メイン画像", "main_image");
        $objFormParam->addParam("メイン一覧画像", "main_list_image");
        $objFormParam->addParam("販売価格", "price");
        // & hatanaka 2011.08.28
        $objFormParam->addParam("数量", 'quantity', INT_LEN, 'n', array("EXIST_CHECK", "MAX_LENGTH_CHECK"), 1);
        // hatanaka & 2011.08.28
        $objFormParam->addParam("配送先住所", 'shipping', INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("カート番号", "cart_no", INT_LEN, 'n', array("EXIST_CHECK", "MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("行数", "line_of_num", INT_LEN, 'n', array("EXIST_CHECK", "MAX_LENGTH_CHECK", "NUM_CHECK"));
    }

}
?>
