<?php
if(empty($remove_jquery)){
?>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<?php
}
?>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<?= $this->Html->script(['bootstrap.min.js', 'custom.js']); ?>
<?php if (!empty($script_for_footer)) echo $this->Html->script($script_for_footer); ?>
</body>
</html>