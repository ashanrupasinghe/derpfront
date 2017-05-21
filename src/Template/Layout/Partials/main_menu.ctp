<ul id="nav" class="hidden-xs">

    <li class="active"> <a class="level-top" href="#"><span>Home</span></a></li>
    <?php
    $i = 0;

    foreach ($category_tree[0] AS $main_cat) {
        ?>
    <li class="mega-menu"> <a class="level-top" href="/products/category/<?php echo $main_cat['slug']; ?>"><span><?php echo $main_cat['title']; ?></span></a>
        <div class="level0-wrapper dropdown-6col" style="left: 0px; display: none;">
            <div class="container">
                <div class="level0-wrapper2">
                    <div class="col-1">
                        <div class="nav-block nav-block-center">
                            <!--mega menu-->
                            <ul class="level0">
                                <?php foreach ($category_tree[1][$main_cat['id']] AS $sub_cat) { ?>
                                <li class="level3 nav-6-1 parent item"> <a href="/products/category/<?php echo $sub_cat['slug']; ?>"><span><?php echo $sub_cat['title']; ?></span></a>
                                    <!--sub sub category-->
                                    <ul class="level1">
                                         <?php foreach ($category_tree[2][$sub_cat['id']] AS $sub_sub_cat) { ?>
                                        <li class="level2 nav-6-1-1"> <a href="/products/category/<?php echo $sub_sub_cat['slug']; ?>"><span><?php echo $sub_sub_cat['title']; ?></span></a> </li>
                                         <?php } ?>
                                    </ul>
                                    <!--level1-->
                                    <!--sub sub category-->
                                </li>
                                <?php } ?>
                                <!--level3 nav-6-1 parent item-->
                            </ul>
                            <!--level0-->
                        </div>
                        <!--nav-block nav-block-center-->
                    </div>
                    <!--col-1-->
                    
                    <!--col-2-->
                </div>
                <!--level0-wrapper2-->
            </div>
            <!--container-->
        </div>
        <!--level0-wrapper dropdown-6col-->
        <!--mega menu-->
    </li>
    <?php } ?>
</ul>