{*сторінка продукта*}

<h3>{$rsProduct['name']}</h3>

<img width="575" src="/images/products/{$rsProduct['image']}">
Вартість: {$rsProduct['price']}

<a id="addCart_{$rsProduct['id']}" href="#" onclick="addToCart({$rsProduct['id']}); return false;" alt="Додати в корзину">Додати в корзину</a>
<p>Опис <br />{$rsProduct['description']}</p>