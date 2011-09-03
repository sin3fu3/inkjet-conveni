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
require_once CLASS_REALDIR . 'pages/contact/LC_Page_Contact.php';

/**
 * お問い合わせ のページクラス(拡張).
 *
 * LC_Page_Contact をカスタマイズする場合はこのクラスを編集する.
 *
 * @package Page
 * @author LOCKON CO.,LTD.
 * @version $Id: LC_Page_Contact_Ex.php 20764 2011-03-22 06:26:40Z nanasess $
 */
class LC_Page_Contact_Ex extends LC_Page_Contact {

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
     * お問い合わせ入力時のパラメーター情報の初期化を行う.
     *
     * @param SC_FormParam $objFormParam SC_FormParam インスタンス
     * @return void
     */
    function lfInitParam(&$objFormParam) {

        $objFormParam->addParam("お名前(姓)", 'name01', STEXT_LEN, 'KVa', array("EXIST_CHECK","SPTAB_CHECK","MAX_LENGTH_CHECK"));
        $objFormParam->addParam("お名前(名)", 'name02', STEXT_LEN, 'KVa', array("EXIST_CHECK","SPTAB_CHECK","MAX_LENGTH_CHECK"));
        $objFormParam->addParam("お名前(フリガナ・姓)", 'kana01', STEXT_LEN, 'KVCa', array("EXIST_CHECK","SPTAB_CHECK","MAX_LENGTH_CHECK", "KANA_CHECK"));
        $objFormParam->addParam("お名前(フリガナ・名)", 'kana02', STEXT_LEN, 'KVCa', array("EXIST_CHECK","SPTAB_CHECK","MAX_LENGTH_CHECK", "KANA_CHECK"));
        // & hatanaka '11.09.03
        $objFormParam->addParam("会社名", 'company_name', MTEXT_LEN, 'KVa', array("EXIST_CHECK","SPTAB_CHECK","MAX_LENGTH_CHECK"));
        $objFormParam->addParam("部署名", 'section_name', MTEXT_LEN, 'KVa', array("EXIST_CHECK","SPTAB_CHECK","MAX_LENGTH_CHECK"));
        // hatanaka & '11.09.03
        $objFormParam->addParam("郵便番号1", "zip01", ZIP01_LEN, 'n',array("SPTAB_CHECK" ,"NUM_CHECK", "NUM_COUNT_CHECK"));
        $objFormParam->addParam("郵便番号2", "zip02", ZIP02_LEN, 'n',array("SPTAB_CHECK" ,"NUM_CHECK", "NUM_COUNT_CHECK"));
        $objFormParam->addParam("都道府県", 'pref', INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("住所1", "addr01", MTEXT_LEN, 'KVa', array("SPTAB_CHECK" ,"MAX_LENGTH_CHECK"));
        $objFormParam->addParam("住所2", "addr02", MTEXT_LEN, 'KVa', array("SPTAB_CHECK" ,"MAX_LENGTH_CHECK"));
        $objFormParam->addParam("お問い合わせ内容", 'contents', MLTEXT_LEN, 'KVa', array("EXIST_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam('メールアドレス', 'email', null, 'KVa',array("EXIST_CHECK", "EMAIL_CHECK", "EMAIL_CHAR_CHECK"));
        $objFormParam->addParam('メールアドレス(確認)', "email02", null, 'KVa',array("EXIST_CHECK", "EMAIL_CHECK", "EMAIL_CHAR_CHECK"));
        $objFormParam->addParam("お電話番号1", 'tel01', TEL_ITEM_LEN, 'n', array("NUM_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("お電話番号2", 'tel02', TEL_ITEM_LEN, 'n', array("NUM_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("お電話番号3", 'tel03', TEL_ITEM_LEN, 'n', array("NUM_CHECK", "MAX_LENGTH_CHECK"));

    }

}
?>
