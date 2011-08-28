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

require_once CLASS_REALDIR . 'SC_CartSession.php';

class SC_CartSession_Ex extends SC_CartSession {

	// 数量の増加
    function upQuantity($cart_no, $productTypeId) {
        $quantity = $this->getQuantity($cart_no, $productTypeId);
        // & hatanaka 2011.08.28
        if (strlen($quantity + 0.1) <= INT_LEN) {
            $this->setQuantity($quantity + 0.1, $cart_no, $productTypeId);
            // hatanaka & 2011.08.28
        }
    }

    // 数量の減少
    function downQuantity($cart_no, $productTypeId) {
        $quantity = $this->getQuantity($cart_no, $productTypeId);
        // & hatanaka 2011.08.28
        if ($quantity > 0.1) {
            $this->setQuantity($quantity - 0.1, $cart_no, $productTypeId);
            // hatanaka & 2011.08.28
        }
    }

    /**
     * カートが保持するキー(商品種別ID)を配列で返す.
     *
     * @return array 商品種別IDの配列
     */
    function getKeys() {
        $keys = array_keys($this->cartSession);
        // 数量が 0 の商品種別は削除する
        foreach ($keys as $key) {
            $quantity = $this->getTotalQuantity($key);
            // & hatanaka 2011.08.28
            if ($quantity < 0.1) {
            	// hatanaka & 2011.08.28
                unset($this->cartSession[$key]);
            }
        }
        return array_keys($this->cartSession);
    }

}

?>
