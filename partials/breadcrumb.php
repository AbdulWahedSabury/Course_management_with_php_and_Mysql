    <section class="is-title-bar">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
            <ul>
                <?php
                    $crumbs = array_slice( explode("/",$_SERVER["REQUEST_URI"]),1);
                    foreach($crumbs as $crumb){
                ?>

                <li>
                    <?= ucfirst(str_replace(array("ginix",".php","_"),array("Dashboard",""," "),$crumb) . ' ');?>
                </li>

                <?php } ?>

            </ul>
        </div>
    </section>