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
require_once CLASS_REALDIR . 'pages/products/LC_Page_Products_List.php';

/**
 * LC_Page_Products_List のページクラス(拡張).
 *
 * LC_Page_Products_List をカスタマイズする場合はこのクラスを編集する.
 *
 * @package Page
 * @author LOCKON CO.,LTD.
 * @version $Id: LC_Page_Products_List_Ex.php 20764 2011-03-22 06:26:40Z nanasess $
 */
class LC_Page_Products_List_Ex extends LC_Page_Products_List {

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

    /* 入力内容のチェック */
    function lfCheckError($product_id, &$arrForm, $tpl_classcat_find1, $tpl_classcat_find2) {

        // 入力データを渡す。
        $objErr = new SC_CheckError_Ex($arrForm);

        // 複数項目チェック
        if ($tpl_classcat_find1[$product_id]) {
            $objErr->doFunc(array("規格1", 'classcategory_id1', INT_LEN), array("EXIST_CHECK", "NUM_CHECK", "MAX_LENGTH_CHECK"));
        }
        if ($tpl_classcat_find2[$product_id]) {
            $objErr->doFunc(array("規格2", 'classcategory_id2', INT_LEN), array("EXIST_CHECK", "NUM_CHECK", "MAX_LENGTH_CHECK"));
        }

        $objErr->doFunc(array("商品規格ID", 'product_class_id', INT_LEN), array("EXIST_CHECK", "NUM_CHECK", "MAX_LENGTH_CHECK"));
        // & hatanaka 2011.08.28
        $objErr->doFunc(array("数量", 'quantity', INT_LEN), array("EXIST_CHECK", "ZERO_CHECK", "MAX_LENGTH_CHECK"));
        // hatanaka & 2011.08.28

        return $objErr->arrErr;
    }

}
?>