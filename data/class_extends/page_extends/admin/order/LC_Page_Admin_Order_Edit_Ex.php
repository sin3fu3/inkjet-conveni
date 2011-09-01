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
require_once CLASS_REALDIR . 'pages/admin/order/LC_Page_Admin_Order_Edit.php';

/**
 * 受注修正 のページクラス(拡張).
 *
 * LC_Page_Admin_Order_Edit をカスタマイズする場合はこのクラスを編集する.
 *
 * @package Page
 * @author LOCKON CO.,LTD.
 * @version $Id: LC_Page_Admin_Order_Edit_Ex.php 20764 2011-03-22 06:26:40Z nanasess $
 */
class LC_Page_Admin_Order_Edit_Ex extends LC_Page_Admin_Order_Edit {

    var $arrShippingKeys = array(
        'shipping_id',
        'shipping_name01',
        'shipping_name02',
        'shipping_kana01',
        'shipping_kana02',
    	// & hatanaka '11.09.01
    	'shipping_company_name',
    	'shipping_section_name',
    	// hatanaka & '11.09.01
        'shipping_tel01',
        'shipping_tel02',
        'shipping_tel03',
        'shipping_fax01',
        'shipping_fax02',
        'shipping_fax03',
        'shipping_pref',
        'shipping_zip01',
        'shipping_zip02',
        'shipping_addr01',
        'shipping_addr02',
        'shipping_date_year',
        'shipping_date_month',
        'shipping_date_day',
        'time_id',
    );

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
        // 検索条件のパラメーターを初期化
        parent::lfInitParam($objFormParam);

        // お客様情報
        $objFormParam->addParam("注文者 お名前(姓)", "order_name01", STEXT_LEN, 'KVa', array("EXIST_CHECK", "SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("注文者 お名前(名)", "order_name02", STEXT_LEN, 'KVa', array("EXIST_CHECK", "SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("注文者 お名前(フリガナ・姓)", "order_kana01", STEXT_LEN, 'KVCa', array("EXIST_CHECK", "SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("注文者 お名前(フリガナ・名)", "order_kana02", STEXT_LEN, 'KVCa', array("EXIST_CHECK", "SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        // & hatanaka '11.09.01
        $objFormParam->addParam("会社名", order_company_name, MTEXT_LEN, 'KVa', array("EXIST_CHECK", "SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("部署名", order_section_name, MTEXT_LEN, 'KVa', array("EXIST_CHECK", "SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        // hatanaka & '11.09.01
        $objFormParam->addParam("メールアドレス", "order_email", null, 'KVCa', array("NO_SPTAB", "EMAIL_CHECK", "EMAIL_CHAR_CHECK"));
        $objFormParam->addParam("郵便番号1", "order_zip01", ZIP01_LEN, 'n', array("NUM_CHECK", "NUM_COUNT_CHECK"));
        $objFormParam->addParam("郵便番号2", "order_zip02", ZIP02_LEN, 'n', array("NUM_CHECK", "NUM_COUNT_CHECK"));
        $objFormParam->addParam("都道府県", "order_pref", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("住所1", "order_addr01", MTEXT_LEN, 'KVa', array("SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("住所2", "order_addr02", MTEXT_LEN, 'KVa', array("SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("電話番号1", "order_tel01", TEL_ITEM_LEN, 'n', array("MAX_LENGTH_CHECK" ,"NUM_CHECK"));
        $objFormParam->addParam("電話番号2", "order_tel02", TEL_ITEM_LEN, 'n', array("MAX_LENGTH_CHECK" ,"NUM_CHECK"));
        $objFormParam->addParam("電話番号3", "order_tel03", TEL_ITEM_LEN, 'n', array("MAX_LENGTH_CHECK" ,"NUM_CHECK"));

        // 受注商品情報
        $objFormParam->addParam("値引き", 'discount', INT_LEN, 'n', array("EXIST_CHECK", "MAX_LENGTH_CHECK", "NUM_CHECK"), '0');
        $objFormParam->addParam("送料", "deliv_fee", INT_LEN, 'n', array("EXIST_CHECK", "MAX_LENGTH_CHECK", "NUM_CHECK"), '0');
        $objFormParam->addParam("手数料", 'charge', INT_LEN, 'n', array("EXIST_CHECK", "MAX_LENGTH_CHECK", "NUM_CHECK"), '0');

        // ポイント機能ON時のみ
        if (USE_POINT !== false) {
            $objFormParam->addParam("利用ポイント", "use_point", INT_LEN, 'n', array("EXIST_CHECK", "MAX_LENGTH_CHECK", "NUM_CHECK"));
        }

        $objFormParam->addParam("配送業者", "deliv_id", INT_LEN, 'n', array("EXIST_CHECK", "MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("お支払い方法", "payment_id", INT_LEN, 'n', array("EXIST_CHECK", "MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("対応状況", 'status', INT_LEN, 'n', array("EXIST_CHECK", "MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("お支払方法名称", "payment_method");

        // 受注詳細情報
        $objFormParam->addParam("商品項番", "product_class_id", INT_LEN, 'n', array("EXIST_CHECK", "MAX_LENGTH_CHECK", "NUM_CHECK"), '0');
        $objFormParam->addParam("商品種別ID", "product_type_id", INT_LEN, 'n', array("EXIST_CHECK", "MAX_LENGTH_CHECK", "NUM_CHECK"), '0');
        $objFormParam->addParam("単価", 'price', INT_LEN, 'n', array("EXIST_CHECK", "MAX_LENGTH_CHECK", "NUM_CHECK"), '0');
        // & hatanaka 2011.08.28
        $objFormParam->addParam("数量", 'quantity', INT_LEN, 'n', array("EXIST_CHECK", "MAX_LENGTH_CHECK"), '0');
        // hatanaka & 2011.08.28
        $objFormParam->addParam("商品ID", "product_id", INT_LEN, 'n', array("EXIST_CHECK", "MAX_LENGTH_CHECK", "NUM_CHECK"), '0');
        $objFormParam->addParam("商品規格ID", "product_class_id", INT_LEN, 'n', array("EXIST_CHECK", "MAX_LENGTH_CHECK", "NUM_CHECK"), '0');
        $objFormParam->addParam("ポイント付与率", "point_rate");
        $objFormParam->addParam("商品コード", "product_code");
        $objFormParam->addParam("商品名", "product_name");
        $objFormParam->addParam("規格名1", "classcategory_name1");
        $objFormParam->addParam("規格名2", "classcategory_name2");
        $objFormParam->addParam("メモ", 'note', MTEXT_LEN, 'KVa', array("MAX_LENGTH_CHECK"));
        $objFormParam->addParam("削除用項番", "delete_no", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));

        // DB読込用
        $objFormParam->addParam("小計", 'subtotal');
        $objFormParam->addParam("合計", 'total');
        $objFormParam->addParam("支払い合計", "payment_total");
        $objFormParam->addParam("加算ポイント", "add_point");
        $objFormParam->addParam("お誕生日ポイント", "birth_point");
        $objFormParam->addParam("消費税合計", 'tax');
        $objFormParam->addParam("最終保持ポイント", "total_point");
        $objFormParam->addParam("顧客ID", "customer_id", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"), '0');
        $objFormParam->addParam("顧客ID", "edit_customer_id", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"), '0');
        $objFormParam->addParam("現在のポイント", "customer_point");
        $objFormParam->addParam("受注前ポイント", 'point');
        $objFormParam->addParam("注文番号", "order_id");
        $objFormParam->addParam("受注日", "create_date");
        $objFormParam->addParam("発送日", "commit_date");
        $objFormParam->addParam("備考", 'message');
        $objFormParam->addParam("入金日", "payment_date");
        $objFormParam->addParam("アクセス端末", "device_type_id");

        // 複数情報
        // & hatanaka 2011.08.28
        $objFormParam->addParam("配送数", "shipping_quantity", INT_LEN, 'n', array("MAX_LENGTH_CHECK"), 1);
        // hatanaka & 2011.08.28
        $objFormParam->addParam("配送ID", "shipping_id", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"), 0);
        $objFormParam->addParam("お名前(姓)", "shipping_name01", STEXT_LEN, 'KVa', array("SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("お名前(名)", "shipping_name02", STEXT_LEN, 'KVa', array("SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("お名前(フリガナ・姓)", "shipping_kana01", STEXT_LEN, 'KVCa', array("SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("お名前(フリガナ・名)", "shipping_kana02", STEXT_LEN, 'KVCa', array("SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        // & hatanaka '11.09.01
        $objFormParam->addParam("会社名", "shipping_company_name", MTEXT_LEN, 'KVa', array("SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("部署名", "shipping_section_name", MTEXT_LEN, 'KVa', array("SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        // hatanaka & '11.09.01
        $objFormParam->addParam("郵便番号1", "shipping_zip01", ZIP01_LEN, 'n', array("NUM_CHECK", "NUM_COUNT_CHECK"));
        $objFormParam->addParam("郵便番号2", "shipping_zip02", ZIP02_LEN, 'n', array("NUM_CHECK", "NUM_COUNT_CHECK"));
        $objFormParam->addParam("都道府県", "shipping_pref", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("住所1", "shipping_addr01", MTEXT_LEN, 'KVa', array("SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("住所2", "shipping_addr02", MTEXT_LEN, 'KVa', array("SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        $objFormParam->addParam("電話番号1", "shipping_tel01", TEL_ITEM_LEN, 'n', array("MAX_LENGTH_CHECK" ,"NUM_CHECK"));
        $objFormParam->addParam("電話番号2", "shipping_tel02", TEL_ITEM_LEN, 'n', array("MAX_LENGTH_CHECK" ,"NUM_CHECK"));
        $objFormParam->addParam("電話番号3", "shipping_tel03", TEL_ITEM_LEN, 'n', array("MAX_LENGTH_CHECK" ,"NUM_CHECK"));
        $objFormParam->addParam("お届け時間ID", "time_id", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("お届け日(年)", "shipping_date_year", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("お届け日(月)", "shipping_date_month", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("お届け日(日)", "shipping_date_day", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("お届け日", "shipping_date", STEXT_LEN, 'KVa', array("SPTAB_CHECK", "MAX_LENGTH_CHECK"));
        // & hatanaka 2011.08.28
        $objFormParam->addParam("配送商品数量", "shipping_product_quantity", INT_LEN, 'n', array("MAX_LENGTH_CHECK"));
        // hatanaka & 2011.08.28

        $objFormParam->addParam("商品規格ID", "shipment_product_class_id", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("商品コード", "shipment_product_code");
        $objFormParam->addParam("商品名", "shipment_product_name");
        $objFormParam->addParam("規格名1", "shipment_classcategory_name1");
        $objFormParam->addParam("規格名2", "shipment_classcategory_name2");
        $objFormParam->addParam("単価", "shipment_price", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"), '0');
        // & hatanaka 2011.08.28
        $objFormParam->addParam("数量", "shipment_quantity", INT_LEN, 'n', array("MAX_LENGTH_CHECK"), '0');
        // hatanaka & 2011.08.28

        $objFormParam->addParam("商品項番", 'no', INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("追加商品規格ID", "add_product_class_id", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("修正商品規格ID", "edit_product_class_id", INT_LEN, 'n', array("MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("アンカーキー", "anchor_key", STEXT_LEN, 'KVa', array("SPTAB_CHECK", "MAX_LENGTH_CHECK"));
    }

    /**
     * 複数配送用フォームの初期化を行う.
     *
     * @param SC_FormParam $objFormParam SC_FormParam インスタンス
     * @return void
     */
    function lfInitMultipleParam(&$objFormParam) {
        $objFormParam->addParam("商品規格ID", "multiple_product_class_id", INT_LEN, 'n', array("EXIST_CHECK", "MAX_LENGTH_CHECK", "NUM_CHECK"));
        $objFormParam->addParam("商品コード", "multiple_product_code", INT_LEN, 'n', array("EXIST_CHECK", "MAX_LENGTH_CHECK", "NUM_CHECK"), 1);
        $objFormParam->addParam("商品名", "multiple_product_name", INT_LEN, 'n', array("EXIST_CHECK", "MAX_LENGTH_CHECK", "NUM_CHECK"), 1);
        $objFormParam->addParam("規格1", "multiple_classcategory_name1", INT_LEN, 'n', array("EXIST_CHECK", "MAX_LENGTH_CHECK", "NUM_CHECK"), 1);
        $objFormParam->addParam("規格2", "multiple_classcategory_name2", INT_LEN, 'n', array("EXIST_CHECK", "MAX_LENGTH_CHECK", "NUM_CHECK"), 1);
        $objFormParam->addParam("単価", "multiple_price", INT_LEN, 'n', array("EXIST_CHECK", "MAX_LENGTH_CHECK", "NUM_CHECK"), 1);
        // & hatanaka 2011.08.28
        $objFormParam->addParam("数量", "multiple_quantity", INT_LEN, 'n', array("EXIST_CHECK", "MAX_LENGTH_CHECK"), 1);
        // hatanaka & 2011.08.28
        $objFormParam->addParam("配送先住所", "multiple_shipping_id", INT_LEN, 'n', array("EXIST_CHECK", "MAX_LENGTH_CHECK", "NUM_CHECK"));
    }

}
?>
