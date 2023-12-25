<script>
    <?php if(session()->hasFlash(\FLASH::SUCCESS)): ?>
        <?php foreach(session()->getFlash(\FLASH::SUCCESS, []) as $message): ?>
            toastr.success("<?= $message ?>", "success");
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if(session()->hasFlash(\FLASH::WARNING)): ?>
        <?php foreach(session()->getFlash(\FLASH::WARNING, []) as $message): ?>
            toastr.warning("<?= $message ?>", "warning");
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if(session()->hasFlash(\FLASH::INFO)): ?>
        <?php foreach(session()->getFlash(\FLASH::INFO, []) as $message): ?>
            toastr.info("<?= $message ?>", "info");
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if(session()->hasFlash(\FLASH::ERROR)): ?>
        <?php foreach(session()->getFlash(\FLASH::ERROR, []) as $message): ?>
            toastr.error("<?= $message ?>", "error");
        <?php endforeach; ?>
    <?php endif; ?>
</script>