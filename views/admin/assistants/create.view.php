<?php if(isset($_GET['error'])): ?>
    <span><?= $_GET['error']; ?></span>
<?php endif; ?>
<form method="post" action="assistant-store">
    <input type="text" name="name">
    <input type="email" name="email">
    <input type="password" name="password">
    <button>store</button>
</form>
