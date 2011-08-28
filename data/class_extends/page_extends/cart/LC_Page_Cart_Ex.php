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
require_once CLASS_REALDIR . 'pages/cart/LC_Page_Cart.php';

/**
 * カート のページクラス(拡張).
 *
 * LC_Page_Cart をカスタマイズする場合はこのクラスを編集する.
 *
 * @package Page
 * @author LOCKON CO.,LTD.
 * @version $Id: LC_Page_Cart_Ex.php 20764 2011-03-22 06:26:40Z nanasess $
 */
class LC_Page_Cart_Ex extends LC_Page_Cart {

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
     * ユーザ入力値の処理
     *
     * @return object
     */
    function lfInitParam($arrRequest) {
        $objFormParam = new SC_FormParam_Ex();
        $objFormParam->addParam("カートキー", 'cartKey', INT_LEN, 'n', array('NUM_CHECK',"MAX_LENGTH_CHECK"));
        $objFormParam->addParam("カートナンバー", "cart_no", INT_LEN, 'n', array("NUM_CHECK", "MAX_LENGTH_CHECK"));
        // PC版での値引き継ぎ用
        $objFormParam->addParam("カテゴリID", "category_id", INT_LEN, 'n', array("NUM_CHECK", "MAX_LENGTH_CHECK"));
        // スマートフォン版での数量変更用
        // & hatanaka 2011.08.28
        $objFormParam->addParam("数量", 'quantity', INT_LEN, 'n', array("EXIST_CHECK", "ZERO_CHECK", "MAX_LENGTH_CHECK"));
        // hatanaka & 2011.08.28
        // 値の取得
        $objFormParam->setParam($arrRequest);
        // 入力値の変換
        $objFormParam->convParam();
        return $objFormParam;
    }

}
?>
