<!--{*
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
 *}-->
<!--▼CONTENTS-->
<section id="undercolumn">
       <h2 class="title"><!--{$tpl_title|h}--></h2>
         <div class="thankstext">
            <p>会員登録が完了いたしました。</p>
         </div>
       <hr>
         <div id="completetext">
            <p>今後ともご愛顧賜りますよう、よろしくお願い申し上げます。</p>
            <a rel="external" class="btn_s btn_sub" href="<!--{$smarty.const.TOP_URLPATH}-->">トップページへ</a>
         </div>
</section>
<!--▼検索バー -->
<section id="search_area">
<form method="get" action="<!--{$smarty.const.ROOT_URLPATH}-->products/list.php">
<input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
<input type="search" name="name" id="search" value="" placeholder="キーワードを入力" class="searchbox" >
</form>
</section>
<!--▲検索バー -->
<!--▲CONTENTS-->

