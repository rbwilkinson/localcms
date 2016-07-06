<div id="sidebar"> 
    <div style='background-color: white;'>
        <img src='../images/lcmslogo.png' width='30' /><img src='../images/localcms.png' />
        <h2><a class="brand" href="../" title="Return to site" target="_blank"><small>View</small> <?php echo $title->content; ?></a></h2>
    </div>
    <button class="open nav-menu x" type="button" role="button" id="menu" aria-label="Toggle Navigation">
        <span class="lines"></span>
    </button>
    <nav class="nav-collapse">
        <!--<a href="#" id="menu-icon"><div></div><div></div><div></div></a>-->
        <ul>
            <?php
            $navitems = array();
            $navitems = ['content', 'menus', 'photos', 'options', 'styles', 'gallery & Slides'];
            $output = '';

            foreach ($navitems as $navitem) {
                $class = '';
                $url = $navitem;

                if ($navitem == $active) {
                    $class = 'class="active"';
                }

                if ($navitem == 'content') {
                    $url = 'index';
                }
                
                 if ($navitem == 'gallery & Slides') {
                    $url = 'gallery';
                }


                $output .= '<li><a href="' . $url . '.php" ' . $class . ' data-instant>' . ucfirst($navitem) . '</a></li>';
            }

            echo $output;
            ?>
            <li><a href="controllers/login.php?action=logout" class="logout">Log Out</a></li>   
        </ul>

    </nav>   

</div> 
