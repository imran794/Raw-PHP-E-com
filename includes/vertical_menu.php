 <div class="vertical-menu vertical-category-block">
                            <div class="block-title">
                                <span class="menu-icon">
                                    <span class="line-1"></span>
                                    <span class="line-2"></span>
                                    <span class="line-3"></span>
                                </span>
                                <span class="menu-title">All departments</span>
                                <span class="angle" data-tgleclass="fa fa-caret-down"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                            </div>
                            <div class="wrap-menu">
                                <ul class="menu clone-main-menu">
                                    <?php foreach ($ctgdatas as $ctgdata) { ?>
                                    
                                    <li>
                                        <a href="category.php?status=CatView&&id=<?php echo $ctgdata['cat_id']; ?>" class="menu-name" data-title="<?php echo $ctgdata['cat_name']; ?>"><?php echo $ctgdata['cat_name']; ?></a>
                                        
                                    </li>
                                <?php } ?>
                     
                                </ul>
                            </div>
                        </div>