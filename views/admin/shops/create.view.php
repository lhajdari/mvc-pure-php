<form action="shop-store" method="post">
    <select name="city_id">
        <?php foreach($data as $city): ?>
            <option value="<?= $city->id ?>"><?= $city->name; ?></option>
        <?php endforeach; ?>
    </select>
    <input type="text" name="name">
    <button>Add Shop</button>
</form>
