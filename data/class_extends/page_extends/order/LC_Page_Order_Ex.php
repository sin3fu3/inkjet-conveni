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
require_once CLASS_REALDIR . 'pages/order/LC_Page_Order.php';

/**
 * 特定商取引に関する法律に基づく表記 のページクラス(拡張).
 *
 * LC_Page_Order をカスタマイズする場合はこのクラスを編集する.
 *
 * @package Page
 * @author LOCKON CO.,LTD.
 * @version $Id: LC_Page_Order_Ex.php 20764 2011-03-22 06:26:40Z nanasess $
 */
class LC_Page_Order_Ex extends LC_Page_Order {

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
     * パラメーター情報の初期化を行う.
     *
     * @param SC_FormParam $objFormParam SC_FormParam インスタンス
     * @return void
     */
    function lfInitParam(&$objFormParam) {
        $objFormParam->addParam("注文番号1", "search_order_id1", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("注文番号2", "search_order_id2", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("対応状況", "search_order_status", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("注文者 お名前", "search_order_name", STEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("注文者 お名前(フリガナ)", "search_order_kana", STEXT_LEN, 'KVCa', array("KANA_CHECK","MAX_LENGTH_CHECK"));
        // & hatanaka '11.09.01
        $objFormParam->addParam("会社名", "search_order_company_name", MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("部署名", "search_order_section_name", MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        // hatanaka & '11.09.01
        $objFormParam->addParam("性別", "search_order_sex", INT_LEN, 'n', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("年齢1", "search_age1", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("年齢2", "search_age2", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("メールアドレス", "search_order_email", STEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam('TEL', "search_order_tel", STEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("支払い方法", "search_payment_id", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("購入金額1", "search_total1", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("購入金額2", "search_total2", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("表示件数", "search_page_max", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        // 受注日
        $objFormParam->addParam("開始年", "search_sorderyear", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("開始月", "search_sordermonth", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("開始日", "search_sorderday", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("終了年", "search_eorderyear", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("終了月", "search_eordermonth", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("終了日", "search_eorderday", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        // 更新日
        $objFormParam->addParam("開始年", "search_supdateyear", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("開始月", "search_supdatemonth", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("開始日", "search_supdateday", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("終了年", "search_eupdateyear", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("終了月", "search_eupdatemonth", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("終了日", "search_eupdateday", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        // 生年月日
        $objFormParam->addParam("開始年", "search_sbirthyear", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("開始月", "search_sbirthmonth", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("開始日", "search_sbirthday", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("終了年", "search_ebirthyear", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("終了月", "search_ebirthmonth", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("終了日", "search_ebirthday", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("購入商品","search_product_name",STEXT_LEN,'KVa',array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("ページ送り番号","search_pageno", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("受注ID", "order_id", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
    }

}
?>
