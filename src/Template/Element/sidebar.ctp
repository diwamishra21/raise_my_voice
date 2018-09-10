<div class="col-sm-2 hidden-xs">
    <div class="fixed-side-pane">
        <ul>
            <?php
            $allowed_side = [1, 2, 3];
            $session_data = $this->request->session();
            if (!empty($session_data->read('allowed'))) {
                $allowed_side = $session_data->read('allowed');
            }
//             pr($allowed_side);
//             pr($sidebar);
//             die;

            if (!empty(($allowed_side) && ($sidebar))) {
                //$i = 1;
                foreach ($allowed_side as $id) {
                    if (!empty($sidebar[$id])) {
                        if (!empty($selected_sidebar) && ($selected_sidebar == $id)) {
                            echo '<li class="active" >';
                        } else {
                            echo '<li>';
                        }
                        $sb = $sidebar[$id];
                        if (!empty($is_report)) {
                            echo $this->Html->link($sb['name'], ['controller' => $sb['controller'], 'action' => $sb['action']]);
                        } else {
                            echo $this->Html->link($sb['name'], ['controller' => $sb['controller'], 'action' => $sb['action'], $complaint_id]);
                        }
                        echo '</li>';
                        // $i++;
                    }
                }
            }
            ?>
        </ul>
        <div class="p-a-10">
            <?php
            if (empty($is_report)) {
                echo $this->Html->link('<i class="fa fa-long-arrow-left"></i> Go Back', ['controller' => 'MyVoiceControl', 'action' => 'report'], ['class' => 'btn btn-default btn-block p-a-10', 'escape' => false]);
            }
            ?>
        </div>
        <div class="company-logo">
            <div class="p-b-10">
                <small class="text-muted">Developed By</small>
            </div>
            <div><?= $this->Html->image('logo-quatrro.png') ?></div>
        </div>
    </div>
</div>