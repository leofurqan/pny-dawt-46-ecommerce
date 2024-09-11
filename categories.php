<div class="hero__categories">
    <div class="hero__categories__all">
        <i class="fa fa-bars"></i>
        <span>All departments</span>
    </div>
    <ul>
        <?php foreach ($categories as $category) { ?>
            <li><a href="#"><?php echo $category["name"]; ?></a></li>
        <?php } ?>
    </ul>
</div>