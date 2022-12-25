{* шаблон корзини *}

<h1>{$pageTitle}</h1>

{if !$rsProducts}
    В корзині порожньо
    {else}
        <h2>Деталі замовлення</h2>
    <table>
        <tr>
            <td>
                №
            </td>
            <td>
                Назва
            </td>
            <td>
                Кількість
            </td>
            <td>
                Ціна за одиницю
            </td>
            <td>
                Ціна
            </td>
            <td>
                Що робимо?
            </td>
        </tr>
        {foreach $rsProducts as $item name=products}
            <tr>
                <td>
                    {$smarty.foreach.products.iteration}
                </td>

                <td>
                    <a href="/product/{$item['id']}/">{$item['name']}</a><br />
                </td>

                <td>
                    {* name для js форми,  id для звертання в js, value значення по дефолту, onchange-подія спрацьовує при зміні в полі input(тобто не 1 товар а 2)*}
                    <input name="itemCnt_{$item['id']}" id="itemCnt_{$item['id']}" type="text" value="1" onchange="conversionPrice({$item['id']});">
                </td>

                <td>
                   <span id="itemPrice_{$item['id']}" value="{$item['price']}">
                      {$item['price']}
                   </span>
                </td>

                <td>
                    <span id="itemRealPrice_{$item['id']}">
                        {$item['price']}
                    </span>
                </td>

                <td>
                    <a id="removeCart_{$item['id']}"  href="#" onclick="removeFromCart({$item['id']}); return false;" alt="Видалення з корзини">Видалити</a>
                    {* подія onclick  return false - щоб силка не відпрацьовувала, як силка*}
                    <a id="addCart_{$item['id']}"  class="hideme" href="#" onclick="addToCart({$item['id']}); return false;" alt="Відновити товар">Відновити</a>
                </td>
            </tr>
        {/foreach}
    </table>
{/if}