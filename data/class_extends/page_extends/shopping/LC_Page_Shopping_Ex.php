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
require_once CLASS_REALDIR . 'pages/shopping/LC_Page_Shopping.php';

/**
 * ショッピングログイン のページクラス(拡張).
 *
 * LC_Page_Shopping をカスタマイズする場合はこのクラスを編集する.
 *
 * @package Page
 * @author LOCKON CO.,LTD.
 * @version $Id: LC_Page_Shopping_Ex.php 20764 2011-03-22 06:26:40Z nanasess $
 */
class LC_Page_Shopping_Ex extends LC_Page_Shopping {

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
     * お客様情報入力時のパラメーター情報の初期化を行う.
     *
     * @param SC_FormParam $objFormParam SC_FormParam インスタンス
     * @return void
     */
    function lfInitParam(&$objFormParam) {

        $objFormParam->addParam("お名前(姓)", "order_name01", STEXT_LEN, 'KVa', array("EXIST_CHECK", "SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("お名前(名)", "order_name02", STEXT_LEN, 'KVa', array("EXIST_CHECK", "SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("お名前(フリガナ・姓)", "order_kana01", STEXT_LEN, 'KVCa', array("EXIST_CHECK", "KANA_CHECK", "SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("お名前(フリガナ・名)", "order_kana02", STEXT_LEN, 'KVCa', array("EXIST_CHECK", "KANA_CHECK", "SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        // & hatanaka '11.09.03
        $objFormParam->addParam("会社名", "order_company_name", MTEXT_LEN, 'KVa', array("EXIST_CHECK", "SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("部署名", "order_section_name", MTEXT_LEN, 'KVa', array("EXIST_CHECK", "SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        // hatanaka & '11.09.03
        $objFormParam->addParam("郵便番号1", "order_zip01", ZIP01_LEN, 'n', array("EXIST_CHECK", "NUM_CHECK", "NUM_COUNT_CHECK"));
        $objFormParam->addParam("郵便番号2", "order_zip02", ZIP02_LEN, 'n', array("EXIST_CHECK", "NUM_CHECK", "NUM_COUNT_CHECK"));
        $objFormParam->addParam("都道府県", "order_pref", INT_LEN, 'n', array("EXIST_CHECK", "MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("住所1", "order_addr01", MTEXT_LEN, 'KVa', array("EXIST_CHECK", "SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("住所2", "order_addr02", MTEXT_LEN, 'KVa', array("EXIST_CHECK", "SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("電話番号1", "order_tel01", TEL_ITEM_LEN, 'n', array("EXIST_CHECK", "MAX_LENGTH_CHECK" ,"NUM_CHECK"));
        $objFormParam->addParam("電話番号2", "order_tel02", TEL_ITEM_LEN, 'n', array("EXIST_CHECK", "MAX_LENGTH_CHECK" ,"NUM_CHECK"));
        $objFormParam->addParam("電話番号3", "order_tel03", TEL_ITEM_LEN, 'n', array("EXIST_CHECK", "MAX_LENGTH_CHECK" ,"NUM_CHECK"));
        $objFormParam->addParam("FAX番号1", "order_fax01", TEL_ITEM_LEN, 'n', array("MAX_LENGTH_CHECK" ,"NUM_CHECK"));
        $objFormParam->addParam("FAX番号2", "order_fax02", TEL_ITEM_LEN, 'n', array("MAX_LENGTH_CHECK" ,"NUM_CHECK"));
        $objFormParam->addParam("FAX番号3", "order_fax03", TEL_ITEM_LEN, 'n', array("MAX_LENGTH_CHECK" ,"NUM_CHECK"));
        $objFormParam->addParam("メールアドレス", "order_email", null, 'KVa', array("EXIST_CHECK", "SPTAB_CHECK", "NO_SPTAB", "EMAIL_CHECK", "EMAIL_CHAR_CHECK"));
        $objFormParam->addParam("メールアドレス（確認）", "order_email02", null, 'KVa', array("EXIST_CHECK", "SPTAB_CHECK", "NO_SPTAB", "EMAIL_CHECK", "EMAIL_CHAR_CHECK"), "", false);
        $objFormParam->addParam("年", 'year', INT_LEN, 'n', array("MAX_LENGTH_CHECK"), "", false);
        $objFormParam->addParam("月", 'month', INT_LEN, 'n', array("MAX_LENGTH_CHECK"), "", false);
        $objFormParam->addParam("日", 'day', INT_LEN, 'n', array("MAX_LENGTH_CHECK"), "", false);
        $objFormParam->addParam("性別", "order_sex", INT_LEN, 'n', array("EXIST_CHECK", "MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("職業", "order_job", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("別のお届け先", "deliv_check", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("お名前(姓)", "shipping_name01", STEXT_LEN, 'KVa', array("SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("お名前(名)", "shipping_name02", STEXT_LEN, 'KVa', array("SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("お名前(フリガナ・姓)", "shipping_kana01", STEXT_LEN, 'KVCa', array("SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("お名前(フリガナ・名)", "shipping_kana02", STEXT_LEN, 'KVCa', array("SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        // & hatanaka '11.09.01
        $objFormParam->addParam("会社名", "shipping_company_name", MTEXT_LEN, 'KVa', array("EXIST_CHECK", "SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("部署名", "shipping_section_name", MTEXT_LEN, 'KVa', array("EXIST_CHECK", "SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        // hatanaka & '11.09.01
        $objFormParam->addParam("郵便番号1", "shipping_zip01", ZIP01_LEN, 'n', array("NUM_CHECK", "NUM_COUNT_CHECK"));
        $objFormParam->addParam("郵便番号2", "shipping_zip02", ZIP02_LEN, 'n', array("NUM_CHECK", "NUM_COUNT_CHECK"));
        $objFormParam->addParam("都道府県", "shipping_pref", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("住所1", "shipping_addr01", MTEXT_LEN, 'KVa', array("SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("住所2", "shipping_addr02", MTEXT_LEN, 'KVa', array("SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("電話番号1", "shipping_tel01", TEL_ITEM_LEN, 'n', array("MAX_LENGTH_CHECK" ,"NUM_CHECK"));
        $objFormParam->addParam("電話番号2", "shipping_tel02", TEL_ITEM_LEN, 'n', array("MAX_LENGTH_CHECK" ,"NUM_CHECK"));
        $objFormParam->addParam("電話番号3", "shipping_tel03", TEL_ITEM_LEN, 'n', array("MAX_LENGTH_CHECK" ,"NUM_CHECK"));
        $objFormParam->addParam("メールマガジン", "mail_flag", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"), 1);
    }

    /**
     * 入力内容のチェックを行う.
     *
     * 追加の必須チェック, 相関チェックを行うため, SC_CheckError を使用する.
     *
     * @param SC_FormParam $objFormParam SC_FormParam インスタンス
     * @return array エラー情報の配
     */
    function lfCheckError(&$objFormParam) {
        // 入力値の変換
        $objFormParam->convParam();
        $objFormParam->toLower('order_mail');
        $objFormParam->toLower('order_mail_check');

        $arrParams = $objFormParam->getHashArray();
        $objErr = new SC_CheckError_Ex($arrParams);
        $objErr->arrErr = $objFormParam->checkError();

        // 別のお届け先チェック
        if (isset($arrParams['deliv_check']) && $arrParams['deliv_check'] == "1") {
            $objErr->doFunc(array("お名前(姓)", "shipping_name01"), array("EXIST_CHECK"));
            $objErr->doFunc(array("お名前(名)", "shipping_name02"), array("EXIST_CHECK"));
            $objErr->doFunc(array("お名前(フリガナ・姓)", "shipping_kana01"), array("EXIST_CHECK"));
            $objErr->doFunc(array("お名前(フリガナ・名)", "shipping_kana02"), array("EXIST_CHECK"));
            // & hatanaka '11.09.03
            $objErr->doFunc(array("会社名", "shipping_company_name"), array("EXIST_CHECK"));
            $objErr->doFunc(array("部署名", "shipping_section_name"), array("EXIST_CHECK"));
            // hatanaka & '11.09.03
            $objErr->doFunc(array("郵便番号1", "shipping_zip01"), array("EXIST_CHECK"));
            $objErr->doFunc(array("郵便番号2", "shipping_zip02"), array("EXIST_CHECK"));
            $objErr->doFunc(array("都道府県", "shipping_pref"), array("EXIST_CHECK"));
            $objErr->doFunc(array("住所1", "shipping_addr01"), array("EXIST_CHECK"));
            $objErr->doFunc(array("住所2", "shipping_addr02"), array("EXIST_CHECK"));
            $objErr->doFunc(array("電話番号1", "shipping_tel01"), array("EXIST_CHECK"));
            $objErr->doFunc(array("電話番号2", "shipping_tel02"), array("EXIST_CHECK"));
            $objErr->doFunc(array("電話番号3", "shipping_tel03"), array("EXIST_CHECK"));
        }

        // 複数項目チェック
        $objErr->doFunc(array('TEL', "order_tel01", "order_tel02", "order_tel03"), array("TEL_CHECK"));
        $objErr->doFunc(array('FAX', "order_fax01", "order_fax02", "order_fax03"), array("TEL_CHECK"));
        $objErr->doFunc(array("郵便番号", "order_zip01", "order_zip02"), array("ALL_EXIST_CHECK"));
        $objErr->doFunc(array('TEL', "shipping_tel01", "shipping_tel02", "shipping_tel03"), array("TEL_CHECK"));
        $objErr->doFunc(array("郵便番号", "shipping_zip01", "shipping_zip02"), array("ALL_EXIST_CHECK"));
        $objErr->doFunc(array("生年月日", 'year', 'month', 'day'), array("CHECK_BIRTHDAY"));
        $objErr->doFunc(array("メールアドレス", "メールアドレス（確認）", "order_email", "order_email02"), array("EQUAL_CHECK"));

        return $objErr->arrErr;
    }

}
?>
