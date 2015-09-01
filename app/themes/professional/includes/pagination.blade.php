<?php
$presenter = new App\Presenters\PaginationPresenter($paginator);
?>

@if ($paginator->getLastPage() > 1)
<ul class="pagination">
    <nav class="pagination">
        <ul>
            <?php echo $presenter->render(); ?>
        </ul>
    </nav>
</ul>
@endif
