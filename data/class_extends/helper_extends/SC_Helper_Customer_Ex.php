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
require_once CLASS_REALDIR . 'helper/SC_Helper_Customer.php';

/**
 * CSV関連のヘルパークラス(拡張).
 *
 * LC_Helper_Customer をカスタマイズする場合はこのクラスを編集する.
 *
 * @package Helper
 * @author LOCKON CO.,LTD.
 * @version $Id:SC_Helper_DB_Ex.php 15532 2007-08-31 14:39:46Z nanasess $
 */
class SC_Helper_Customer_Ex extends SC_Helper_Customer {

	/**
     * 顧客検索パラメーター（管理画面用）
     *
     * @param SC_FormParam $objFormParam SC_FormParam インスタンス
     * @access public
     * @return void
     */
    function sfSetSearchParam(&$objFormParam) {
        $objFormParam->addParam('顧客ID', 'search_customer_id', ID_MAX_LEN, 'n', array("NUM_CHECK","MAX_LENGTH_CHECK"));
        $objFormParam->addParam('お名前', 'search_name', STEXT_LEN, 'KVa', array("SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam('お名前(フリガナ)', 'search_kana', STEXT_LEN, 'CKV', array("SPTAB_CHECK", "MAX_LENGTH_CHECK", "KANABLANK_CHECK"));
        $objFormParam->addParam('都道府県', 'search_pref', INT_LEN, 'n', array("NUM_CHECK","MAX_LENGTH_CHECK"));
        // & hatanaka '11.09.01
        $objFormParam->addParam("会社名", 'search_company_name', MTEXT_LEN, 'KVa', array("SPTAB_CHECK","MAX_LENGTH_CHECK"));
        $objFormParam->addParam("部署名", 'search_section_name', MTEXT_LEN, 'KVa', array("SPTAB_CHECK","MAX_LENGTH_CHECK"));
        // hatanaka & '11.09.01
        $objFormParam->addParam('誕生日(開始年)', 'search_b_start_year', 4, 'n', array("NUM_CHECK","MAX_LENGTH_CHECK"));
        $objFormParam->addParam('誕生日(開始月)', 'search_b_start_month', 2, 'n', array("NUM_CHECK","MAX_LENGTH_CHECK"));
        $objFormParam->addParam('誕生日(開始日)', 'search_b_start_day', 2, 'n', array("NUM_CHECK","MAX_LENGTH_CHECK"));

        $objFormParam->addParam('誕生日(終了年)', 'search_b_end_year', 4, 'n', array("NUM_CHECK","MAX_LENGTH_CHECK"));
        $objFormParam->addParam('誕生日(終了月)', 'search_b_end_month', 2, 'n', array("NUM_CHECK","MAX_LENGTH_CHECK"));
        $objFormParam->addParam('誕生日(終了日)', 'search_b_end_day', 2, 'n', array("NUM_CHECK","MAX_LENGTH_CHECK"));
        $objFormParam->addParam('誕生月', 'search_birth_month', 2, 'n', array("NUM_CHECK","MAX_LENGTH_CHECK"));
        $objFormParam->addParam('メールアドレス', 'search_email', MTEXT_LEN, 'a', array("SPTAB_CHECK", "EMAIL_CHAR_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam('携帯メールアドレス', 'search_email_mobile', MTEXT_LEN, 'a', array("SPTAB_CHECK", "EMAIL_CHAR_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam('電話番号', 'search_tel', TEL_LEN, 'n', array("NUM_CHECK","MAX_LENGTH_CHECK"));
        $objFormParam->addParam('購入金額(開始)', 'search_buy_total_from', PRICE_LEN, 'n', array("NUM_CHECK","MAX_LENGTH_CHECK"));
        $objFormParam->addParam('購入金額(終了)', 'search_buy_total_to', PRICE_LEN, 'n', array("NUM_CHECK","MAX_LENGTH_CHECK"));
        $objFormParam->addParam('購入回数(開始)', 'search_buy_times_from', INT_LEN, 'n', array("NUM_CHECK","MAX_LENGTH_CHECK"));
        $objFormParam->addParam('購入回数(終了)', 'search_buy_times_to', INT_LEN, 'n', array("NUM_CHECK","MAX_LENGTH_CHECK"));
        $objFormParam->addParam('登録・更新日(開始年)', 'search_start_year', 4, 'n', array("NUM_CHECK","MAX_LENGTH_CHECK"));
        $objFormParam->addParam('登録・更新日(開始月)', 'search_start_month', 2, 'n', array("NUM_CHECK","MAX_LENGTH_CHECK"));
        $objFormParam->addParam('登録・更新日(開始日)', 'search_start_day', 2, 'n', array("NUM_CHECK","MAX_LENGTH_CHECK"));
        $objFormParam->addParam('登録・更新日(終了年)', 'search_end_year', 4, 'n', array("NUM_CHECK","MAX_LENGTH_CHECK"));
        $objFormParam->addParam('登録・更新日(終了月)', 'search_end_month', 2, 'n', array("NUM_CHECK","MAX_LENGTH_CHECK"));
        $objFormParam->addParam('登録・更新日(終了日)', 'search_end_day', 2, 'n', array("NUM_CHECK","MAX_LENGTH_CHECK"));
        $objFormParam->addParam('表示件数', 'search_page_max', INT_LEN, 'n', array("NUM_CHECK","MAX_LENGTH_CHECK"), 1, false);
        $objFormParam->addParam('ページ番号', 'search_pageno', INT_LEN, 'n', array("NUM_CHECK","MAX_LENGTH_CHECK"), 1, false);
        $objFormParam->addParam('最終購入日(開始年)', 'search_buy_start_year', 4, 'n', array("NUM_CHECK","MAX_LENGTH_CHECK"));
        $objFormParam->addParam('最終購入日(開始月)', 'search_buy_start_month', 2, 'n', array("NUM_CHECK","MAX_LENGTH_CHECK"));
        $objFormParam->addParam('最終購入日(開始日)', 'search_buy_start_day', 2, 'n', array("NUM_CHECK","MAX_LENGTH_CHECK"));
        $objFormParam->addParam('最終購入日(終了年)', 'search_buy_end_year', 4, 'n', array("NUM_CHECK","MAX_LENGTH_CHECK"));
        $objFormParam->addParam('最終購入日(終了月)', 'search_buy_end_month', 2, 'n', array("NUM_CHECK","MAX_LENGTH_CHECK"));
        $objFormParam->addParam('最終購入日(終了日)', 'search_buy_end_day', 2, 'n', array("NUM_CHECK","MAX_LENGTH_CHECK"));
        $objFormParam->addParam('購入商品コード', 'search_buy_product_code', STEXT_LEN, 'KVa', array("SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam('購入商品名', 'search_buy_product_name', STEXT_LEN, 'KVa', array("SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam('カテゴリ', 'search_category_id', INT_LEN, 'n', array("NUM_CHECK","MAX_LENGTH_CHECK"));
        $objFormParam->addParam('性別', 'search_sex', INT_LEN, 'n', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam('会員状態', 'search_status', INT_LEN, 'n', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam('職業', 'search_job', INT_LEN, 'n', array("MAX_LENGTH_CHECK"));
    }

    /**
     * 会員共通
     *
     * @param SC_FormParam $objFormParam SC_FormParam インスタンス
     * @access public
     * @return void
     */
    function sfCustomerCommonParam (&$objFormParam) {
        $objFormParam->addParam("お名前(姓)", 'name01', STEXT_LEN, 'aKV', array("EXIST_CHECK", "NO_SPTAB", "SPTAB_CHECK" ,"MAX_LENGTH_CHECK"));
        $objFormParam->addParam("お名前(名)", 'name02', STEXT_LEN, 'aKV', array("EXIST_CHECK", "NO_SPTAB", "SPTAB_CHECK" , "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("お名前(フリガナ・姓)", 'kana01', STEXT_LEN, 'CKV', array("EXIST_CHECK", "NO_SPTAB", "SPTAB_CHECK" ,"MAX_LENGTH_CHECK", "KANA_CHECK"));
        $objFormParam->addParam("お名前(フリガナ・名)", 'kana02', STEXT_LEN, 'CKV', array("EXIST_CHECK", "NO_SPTAB", "SPTAB_CHECK" ,"MAX_LENGTH_CHECK", "KANA_CHECK"));
		// & hatanaka '11.09.03
		$objFormParam->addParam("会社名", 'company_name', MTEXT_LEN, 'aKV', array("EXIST_CHECK", "SPTAB_CHECK" ,"MAX_LENGTH_CHECK"));
		$objFormParam->addParam("部署名", 'section_name', MTEXT_LEN, 'aKV', array("EXIST_CHECK", "SPTAB_CHECK" ,"MAX_LENGTH_CHECK"));
		// hatanaka & '11.09.03
		$objFormParam->addParam("郵便番号1", "zip01", ZIP01_LEN, 'n', array("EXIST_CHECK", "SPTAB_CHECK" ,"NUM_CHECK", "NUM_COUNT_CHECK"));
        $objFormParam->addParam("郵便番号2", "zip02", ZIP02_LEN, 'n', array("EXIST_CHECK", "SPTAB_CHECK" ,"NUM_CHECK", "NUM_COUNT_CHECK"));
        $objFormParam->addParam("都道府県", 'pref', INT_LEN, 'n', array("EXIST_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("住所1", "addr01", MTEXT_LEN, 'aKV', array("EXIST_CHECK", "SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("住所2", "addr02", MTEXT_LEN, 'aKV', array("EXIST_CHECK", "SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("お電話番号1", 'tel01', TEL_ITEM_LEN, 'n', array("EXIST_CHECK", "SPTAB_CHECK", "NUM_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("お電話番号2", 'tel02', TEL_ITEM_LEN, 'n', array("EXIST_CHECK", "SPTAB_CHECK", "NUM_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("お電話番号3", 'tel03', TEL_ITEM_LEN, 'n', array("EXIST_CHECK", "SPTAB_CHECK", "NUM_CHECK", "MAX_LENGTH_CHECK"));
    }

}
?>
