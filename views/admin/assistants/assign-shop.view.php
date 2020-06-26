<form action="store-assignment" method="post">
  <select name="shop_id">
    <?php foreach ($data['shops'] as $shop): ?>
      <option value="<?= $shop->id; ?>"><?= $shop->name; ?></option>
    <?php endforeach; ?>
  </select>
  <select name="assistant_id">
    <?php foreach ($data['assistants'] as $assistant): ?>
      <option value="<?= $assistant->id; ?>"><?= $assistant->name; ?></option>
    <?php endforeach; ?>
  </select>
  <button type="submit">connect</button>
</form>
