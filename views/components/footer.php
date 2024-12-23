<?php

$publicDirectory = dirname($_SERVER['SCRIPT_NAME']);
$appVersion = $_SERVER['APP_VERSION'];

?>

<script type="module" src="<?= $publicDirectory ?>/assets/<?= $appVersion ?>/js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>