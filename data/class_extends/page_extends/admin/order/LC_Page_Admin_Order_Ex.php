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
require_once CLASS_REALDIR . 'pages/admin/order/LC_Page_Admin_Order.php';

/**
 * 受注管理 のページクラス(拡張).
 *
 * LC_Page_Admin_Order をカスタマイズする場合はこのクラスを編集する.
 *
 * @package Page
 * @author LOCKON CO.,LTD.
 * @version $Id: LC_Page_Admin_Order_Ex.php 20764 2011-03-22 06:26:40Z nanasess $
 */
class LC_Page_Admin_Order_Ex extends LC_Page_Admin_Order {

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

    /**
     * クエリを構築する.
     *
     * 検索条件のキーに応じた WHERE 句と, クエリパラメーターを構築する.
     * クエリパラメーターは, SC_FormParam の入力値から取得する.
     *
     * 構築内容は, 引数の $where 及び $arrValues にそれぞれ追加される.
     *
     * @param string $key 検索条件のキー
     * @param string $where 構築する WHERE 句
     * @param array $arrValues 構築するクエリパラメーター
     * @param SC_FormParam $objFormParam SC_FormParam インスタンス
     * @return void
     */
    function buildQuery($key, &$where, &$arrValues, &$objFormParam) {
        $dbFactory = SC_DB_DBFactory_Ex::getInstance();
        switch ($key) {

        case 'search_product_name':
            $where .= " AND EXISTS (SELECT 1 FROM dtb_order_detail od WHERE od.order_id = dtb_order.order_id AND od.product_name LIKE ?)";
            $arrValues[] = sprintf('%%%s%%', $objFormParam->getValue($key));
            break;
        case 'search_order_name':
            $where .= " AND " . $dbFactory->concatColumn(array("order_name01", "order_name02")) . " LIKE ?";
            $arrValues[] = sprintf('%%%s%%', $objFormParam->getValue($key));
            break;
        case 'search_order_kana':
            $where .= " AND " . $dbFactory->concatColumn(array("order_kana01", "order_kana02")) . " LIKE ?";
            $arrValues[] = sprintf('%%%s%%', $objFormParam->getValue($key));
            break;
		// & hatanaka '11.09.01
		case 'search_order_company_name':
			$where .= " AND order_company_name LIKE ?";
			$arrValues[] = sprintf('%%%s%%', $objFormParam->getValue($key));
			break;
		case 'search_order_section_name':
			$where .= " AND order_section_name LIKE ?";
			$arrValues[] = sprintf('%%%s%%', $objFormParam->getValue($key));
			break;
		// hatanaka & '11.09.01
		case 'search_order_id1':
            $where .= " AND order_id >= ?";
            $arrValues[] = sprintf('%d', $objFormParam->getValue($key));
            break;
        case 'search_order_id2':
            $where .= " AND order_id <= ?";
            $arrValues[] = sprintf('%d', $objFormParam->getValue($key));
            break;
        case 'search_order_sex':
            $tmp_where = "";
            foreach($objFormParam->getValue($key) as $element) {
                if($element != "") {
                    if(SC_Utils_Ex::isBlank($tmp_where)) {
                        $tmp_where .= " AND (order_sex = ?";
                    } else {
                        $tmp_where .= " OR order_sex = ?";
                    }
                    $arrValues[] = $element;
                }
            }

            if(!SC_Utils_Ex::isBlank($tmp_where)) {
                $tmp_where .= ")";
                $where .= " $tmp_where ";
            }
            break;
        case 'search_order_tel':
            $where .= " AND (" . $dbFactory->concatColumn(array("order_tel01", "order_tel02", "order_tel03")) . " LIKE ?)";
            $arrValues[] = sprintf('%%%d%%', preg_replace('/[()-]+/','', $objFormParam->getValue($key)));
            break;
        case 'search_order_email':
            $where .= " AND order_email LIKE ?";
            $arrValues[] = sprintf('%%%s%%', $objFormParam->getValue($key));
            break;
        case 'search_payment_id':
            $tmp_where = "";
            foreach($objFormParam->getValue($key) as $element) {
                if($element != "") {
                    if($tmp_where == "") {
                        $tmp_where .= " AND (payment_id = ?";
                    } else {
                        $tmp_where .= " OR payment_id = ?";
                    }
                    $arrValues[] = $element;
                }
            }

            if(!SC_Utils_Ex::isBlank($tmp_where)) {
                $tmp_where .= ")";
                $where .= " $tmp_where ";
            }
            break;
        case 'search_total1':
            $where .= " AND total >= ?";
            $arrValues[] = sprintf('%d', $objFormParam->getValue($key));
            break;
        case 'search_total2':
            $where .= " AND total <= ?";
            $arrValues[] = sprintf('%d', $objFormParam->getValue($key));
            break;
        case 'search_sorderyear':
            $date = SC_Utils_Ex::sfGetTimestamp($objFormParam->getValue('search_sorderyear'),
                                                $objFormParam->getValue('search_sordermonth'),
                                                $objFormParam->getValue('search_sorderday'));
            $where.= " AND create_date >= ?";
            $arrValues[] = $date;
            break;
        case 'search_eorderyear':
            $date = SC_Utils_Ex::sfGetTimestamp($objFormParam->getValue('search_eorderyear'),
                                                $objFormParam->getValue('search_eordermonth'),
                                                $objFormParam->getValue('search_eorderday'), true);
            $where.= " AND create_date <= ?";
            $arrValues[] = $date;
            break;
        case 'search_supdateyear':
            $date = SC_Utils_Ex::sfGetTimestamp($objFormParam->getValue('search_supdateyear'),
                                                $objFormParam->getValue('search_supdatemonth'),
                                                $objFormParam->getValue('search_supdateday'));
            $where.= " AND update_date >= ?";
            $arrValues[] = $date;
            break;
        case 'search_eupdateyear':
            $date = SC_Utils_Ex::sfGetTimestamp($objFormParam->getValue('search_eupdateyear'),
                                                $objFormParam->getValue('search_eupdatemonth'),
                                                $objFormParam->getValue('search_eupdateday'), true);
            $where.= " AND update_date <= ?";
            $arrValues[] = $date;
            break;
        case 'search_sbirthyear':
            $date = SC_Utils_Ex::sfGetTimestamp($objFormParam->getValue('search_sbirthyear'),
                                                $objFormParam->getValue('search_sbirthmonth'),
                                                $objFormParam->getValue('search_sbirthday'));
            $where.= " AND order_birth >= ?";
            $arrValues[] = $date;
            break;
        case 'search_ebirthyear':
            $date = SC_Utils_Ex::sfGetTimestamp($objFormParam->getValue('search_ebirthyear'),
                                                $objFormParam->getValue('search_ebirthmonth'),
                                                $objFormParam->getValue('search_ebirthday'), true);
            $where.= " AND order_birth <= ?";
            $arrValues[] = $date;
            break;
        case 'search_order_status':
            $where.= " AND status = ?";
            $arrValues[] = $objFormParam->getValue($key);
            break;
        default:
        }
    }
}
?>
